<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Models\Setting;
use App\Models\VerificationSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PpdbController extends Controller
{
    /**
     * Show PPDB Search page.
     */
    public function showSearch()
    {
        return view('ppdb.search');
    }

    /**
     * Process NISN search.
     */
    public function doSearch(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:30',
        ], [
            'nisn.required' => 'NISN wajib diisi.',
        ]);

        $student = NewStudent::where('nisn', $request->nisn)->first();

        if (!$student) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data siswa dengan NISN tersebut tidak ditemukan. Silakan periksa kembali NISN Anda atau hubungi pihak sekolah.');
        }

        return redirect()->route('spmb.upload', ['nisn' => $student->nisn]);
    }

    public function showUpload($nisn)
    {
        $student = NewStudent::where('nisn', $nisn)->firstOrFail();
        $templatePath = Setting::get('ppdb_statement_template', '');
        
        $schedule = null;
        if ($student->queue_number) {
            $schedule = VerificationSchedule::where('start_queue', '<=', $student->queue_number)
                ->where('end_queue', '>=', $student->queue_number)
                ->first();
        }

        return view('ppdb.upload', compact('student', 'templatePath', 'schedule'));
    }

    /**
     * Store uploaded documents with compression.
     */
    public function storeUpload(Request $request, $nisn)
    {
        $student = NewStudent::where('nisn', $nisn)->firstOrFail();

        if ($student->uploaded_at && !$student->allow_edit) {
            return redirect()->back()->with('error', 'Pendaftaran Anda telah dikunci. Silakan hubungi admin sekolah jika ada data yang memerlukan perbaikan.');
        }

        $request->validate([
            'kk_file' => 'nullable|mimes:pdf|max:2048',
            'akta_file' => 'nullable|mimes:pdf|max:2048',
            'photo_file' => 'nullable|mimes:pdf|max:2048',
            'spmb_file' => 'nullable|mimes:pdf|max:2048',
            'statement_file' => 'nullable|mimes:pdf|max:2048',
        ], [
            'kk_file.mimes' => 'Kartu Keluarga harus berformat PDF.',
            'kk_file.max' => 'Ukuran berkas Kartu Keluarga tidak boleh lebih dari 2MB.',
            'akta_file.mimes' => 'Akta Kelahiran harus berformat PDF.',
            'akta_file.max' => 'Ukuran berkas Akta Kelahiran tidak boleh lebih dari 2MB.',
            'photo_file.mimes' => 'SKL (Surat Keterangan Kelulusan) harus berformat PDF.',
            'photo_file.max' => 'Ukuran berkas SKL (Surat Keterangan Kelulusan) tidak boleh lebih dari 2MB.',
            'spmb_file.mimes' => 'Bukti diterima SPMB harus berformat PDF.',
            'spmb_file.max' => 'Ukuran berkas Bukti diterima SPMB tidak boleh lebih dari 2MB.',
            'statement_file.mimes' => 'Surat Pernyataan harus berformat PDF.',
            'statement_file.max' => 'Ukuran berkas Surat Pernyataan tidak boleh lebih dari 2MB.',
        ]);

        $updateData = [];
        $hasUpload = false;

        // Process KK File
        if ($request->hasFile('kk_file')) {
            $path = $this->compressAndStorePdf($request->file('kk_file'), $nisn, 'kk');
            if ($path) {
                // Delete old file if exists
                if ($student->kk_path && file_exists(public_path($student->kk_path))) {
                    @unlink(public_path($student->kk_path));
                }
                $updateData['kk_path'] = $path;
                $hasUpload = true;
            }
        }

        // Process Akta File
        if ($request->hasFile('akta_file')) {
            $path = $this->compressAndStorePdf($request->file('akta_file'), $nisn, 'akta');
            if ($path) {
                if ($student->akta_path && file_exists(public_path($student->akta_path))) {
                    @unlink(public_path($student->akta_path));
                }
                $updateData['akta_path'] = $path;
                $hasUpload = true;
            }
        }

        // Process SKL File
        if ($request->hasFile('photo_file')) {
            $path = $this->compressAndStorePdf($request->file('photo_file'), $nisn, 'skl');
            if ($path) {
                if ($student->photo_path && file_exists(public_path($student->photo_path))) {
                    @unlink(public_path($student->photo_path));
                }
                $updateData['photo_path'] = $path;
                $hasUpload = true;
            }
        }

        // Process SPMB File
        if ($request->hasFile('spmb_file')) {
            $path = $this->compressAndStorePdf($request->file('spmb_file'), $nisn, 'spmb');
            if ($path) {
                if ($student->spmb_path && file_exists(public_path($student->spmb_path))) {
                    @unlink(public_path($student->spmb_path));
                }
                $updateData['spmb_path'] = $path;
                $hasUpload = true;
            }
        }

        // Process Statement File
        if ($request->hasFile('statement_file')) {
            $path = $this->compressAndStorePdf($request->file('statement_file'), $nisn, 'statement');
            if ($path) {
                if ($student->statement_path && file_exists(public_path($student->statement_path))) {
                    @unlink(public_path($student->statement_path));
                }
                $updateData['statement_path'] = $path;
                $hasUpload = true;
            }
        }

        if (!empty($updateData)) {
            // Check if all 5 documents are now uploaded (either currently uploaded or already in DB)
            $isKkUploaded = isset($updateData['kk_path']) || !empty($student->kk_path);
            $isAktaUploaded = isset($updateData['akta_path']) || !empty($student->akta_path);
            $isPhotoUploaded = isset($updateData['photo_path']) || !empty($student->photo_path);
            $isSpmbUploaded = isset($updateData['spmb_path']) || !empty($student->spmb_path);
            $isStatementUploaded = isset($updateData['statement_path']) || !empty($student->statement_path);

            if ($isKkUploaded && $isAktaUploaded && $isPhotoUploaded && $isSpmbUploaded && $isStatementUploaded) {
                $updateData['uploaded_at'] = Carbon::now();
                if (empty($student->queue_number)) {
                    $maxQueue = NewStudent::whereNotNull('queue_number')->max('queue_number');
                    $updateData['queue_number'] = $maxQueue ? $maxQueue + 1 : 1;
                }
            }

            $student->update($updateData);

            return redirect()->back()->with('success', 'Berkas persyaratan berhasil diunggah dan dikompresi secara sukses!');
        }

        return redirect()->back()->with('error', 'Tidak ada berkas yang dipilih untuk diunggah.');
    }

    /**
     * Store student biodata.
     */
    public function storeBiodata(Request $request, $nisn)
    {
        $student = NewStudent::where('nisn', $nisn)->firstOrFail();

        if ($student->uploaded_at && !$student->allow_edit) {
            return redirect()->back()->with('error', 'Pendaftaran Anda telah dikunci. Silakan hubungi admin sekolah jika ada data yang memerlukan perbaikan.');
        }

        $request->validate([
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'nik' => 'required|string|max:30',
            'religion' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'address' => 'required|string',
            'district' => 'required|string|max:100',
            'subdistrict' => 'required|string|max:100',
            'stay_type' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'is_kps' => 'required|string|in:Iya,Tidak',
            'kps_number' => 'required_if:is_kps,Iya|nullable|string|max:50',
            'father_name' => 'required|string|max:100',
            'father_education' => 'required|string|in:-,Putus SD,SD,SMP,SMA,D3,S1,S2,S3',
            'father_job' => 'required|string|max:100',
            'father_income' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'mother_education' => 'required|string|in:-,Putus SD,SD,SMP,SMA,D3,S1,S2,S3',
            'mother_job' => 'required|string|max:100',
            'mother_income' => 'required|string|max:100',
            'parent_address' => 'required|string',
            'guardian_name' => 'nullable|string|max:100',
            'guardian_education' => 'nullable|string|in:-,Putus SD,SD,SMP,SMA,D3,S1,S2,S3',
            'guardian_job' => 'nullable|string|max:100',
            'guardian_income' => 'nullable|string|max:100',
            'guardian_address' => 'nullable|string',
            'is_kip' => 'required|string|in:Iya,Tidak',
            'kip_number' => 'required_if:is_kip,Iya|nullable|string|max:50',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'required_if' => 'Kolom :attribute wajib diisi jika memilih Iya.',
            'in' => 'Pilihan :attribute tidak valid.',
        ], [
            'gender' => 'Jenis Kelamin',
            'nik' => 'NIK',
            'religion' => 'Agama',
            'address' => 'Alamat Peserta Didik',
            'district' => 'Kecamatan',
            'subdistrict' => 'Kelurahan',
            'stay_type' => 'Jenis Tinggal',
            'phone' => 'Handphone',
            'is_kps' => 'Penerima KPS',
            'kps_number' => 'Nomor KPS',
            'father_name' => 'Nama Ayah',
            'father_education' => 'Pendidikan Ayah',
            'father_job' => 'Pekerjaan Ayah',
            'father_income' => 'Penghasilan Ayah',
            'mother_name' => 'Nama Ibu',
            'mother_education' => 'Pendidikan Ibu',
            'mother_job' => 'Pekerjaan Ibu',
            'mother_income' => 'Penghasilan Ibu',
            'parent_address' => 'Alamat Orang Tua',
            'guardian_name' => 'Nama Wali',
            'guardian_education' => 'Pendidikan Wali',
            'guardian_job' => 'Pekerjaan Wali',
            'guardian_income' => 'Penghasilan Wali',
            'guardian_address' => 'Alamat Wali',
            'is_kip' => 'Penerima KIP',
            'kip_number' => 'Nomor KIP',
        ]);

        $student->update([
            'gender' => $request->gender,
            'nik' => $request->nik,
            'religion' => $request->religion,
            'address' => $request->address,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'stay_type' => $request->stay_type,
            'phone' => $request->phone,
            'is_kps' => $request->is_kps,
            'kps_number' => $request->is_kps === 'Iya' ? $request->kps_number : null,
            'father_name' => $request->father_name,
            'father_education' => $request->father_education,
            'father_job' => $request->father_job,
            'father_income' => $request->father_income,
            'mother_name' => $request->mother_name,
            'mother_education' => $request->mother_education,
            'mother_job' => $request->mother_job,
            'mother_income' => $request->mother_income,
            'parent_address' => $request->parent_address,
            'guardian_name' => $request->guardian_name,
            'guardian_education' => $request->guardian_education,
            'guardian_job' => $request->guardian_job,
            'guardian_income' => $request->guardian_income,
            'guardian_address' => $request->guardian_address,
            'is_kip' => $request->is_kip,
            'kip_number' => $request->is_kip === 'Iya' ? $request->kip_number : null,
        ]);

        return redirect()->back()->with('success', 'Biodata berhasil disimpan! Silakan lanjutkan ke pengunggahan berkas persyaratan.');
    }

    /**
     * Lock student biodata and files after correction (Student Only).
     */
    public function lockBiodata($nisn)
    {
        $student = NewStudent::where('nisn', $nisn)->firstOrFail();
        
        $student->update(['allow_edit' => false]);

        return redirect()->route('spmb.upload', ['nisn' => $student->nisn])
            ->with('success', 'Perbaikan data berhasil disimpan dan akses telah dikunci kembali.');
    }

    /**
     * Print student biodata and attachments.
     */
    public function printStudent($nisn)
    {
        $student = NewStudent::where('nisn', $nisn)->firstOrFail();
        
        // Find verification schedule if exists
        $schedule = null;
        if ($student->queue_number) {
            $schedule = VerificationSchedule::where('start_queue', '<=', $student->queue_number)
                ->where('end_queue', '>=', $student->queue_number)
                ->first();
        }

        return view('admin.ppdb-print', compact('student', 'schedule'));
    }

    /**
     * Compress and store uploaded PDF in storage/app/public/ppdb
     */
    private function compressAndStorePdf($file, $nisn, $documentType)
    {
        try {
            $filename = $nisn . '_' . $documentType . '_' . time() . '.pdf';
            $dir = storage_path('app/public/ppdb');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $destinationPath = $dir . DIRECTORY_SEPARATOR . $filename;
            $sourcePath = $file->getRealPath();

            // Try to compress using Ghostscript if available
            $gsPath = $this->findGhostscript();
            if ($gsPath) {
                // Command to compress PDF using Ghostscript
                $cmd = sprintf(
                    '"%s" -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile="%s" "%s"',
                    $gsPath,
                    $destinationPath,
                    $sourcePath
                );
                
                exec($cmd, $output, $returnVar);
                
                // Verify if output file exists and is not empty, otherwise fallback to direct copy
                if ($returnVar === 0 && file_exists($destinationPath) && filesize($destinationPath) > 0) {
                    return '/storage/ppdb/' . $filename;
                }
            }

            // Fallback: Copy directly if Ghostscript is not available or failed
            if (copy($sourcePath, $destinationPath)) {
                return '/storage/ppdb/' . $filename;
            }

            return null;
        } catch (\Exception $e) {
            \Log::error('PDF upload/compression failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Find Ghostscript path if available
     */
    private function findGhostscript()
    {
        if (!function_exists('exec')) {
            return null;
        }

        // Check Windows executables
        $windowsPaths = [
            'C:\Program Files\gs\gs*\bin\gswin64c.exe',
            'C:\Program Files (x86)\gs\gs*\bin\gswin32c.exe',
            'gswin64c',
            'gswin32c'
        ];

        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            foreach ($windowsPaths as $path) {
                if (strpos($path, '*') !== false) {
                    $matches = glob($path);
                    if (!empty($matches)) {
                        return $matches[count($matches) - 1]; // Use latest version
                    }
                } else {
                    // Check if it's executable in system path
                    exec("where " . escapeshellarg($path), $output, $returnVar);
                    if ($returnVar === 0 && !empty($output)) {
                        return trim($output[0]);
                    }
                }
            }
        } else {
            // Unix
            exec("which gs", $output, $returnVar);
            if ($returnVar === 0 && !empty($output)) {
                return trim($output[0]);
            }
        }

        return null;
    }
}
