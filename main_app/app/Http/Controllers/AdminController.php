<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\NewStudent;
use App\Models\Setting;
use App\Models\VerificationSchedule;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Show admin login view.
     */
    public function showLogin()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle authentication.
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $user->id);
            Session::put('admin_name', $user->name);
            Session::put('admin_email', $user->email);
            Session::put('admin_role', $user->role);

            if ($user->role === 'writer') {
                return redirect()->route('admin.articles')->with('success', 'Selamat datang kembali, Writer Humas!');
            } elseif ($user->role === 'ppdb') {
                return redirect()->route('admin.ppdb')->with('success', 'Selamat datang kembali, Panitia SPMB!');
            }

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Administrator!');
        }

        return redirect()->back()->withErrors([
            'login_error' => 'Email atau password yang Anda masukkan salah.',
        ])->withInput();
    }

    /**
     * Handle logout.
     */
    public function logout()
    {
        Session::forget(['admin_logged_in', 'admin_id', 'admin_name', 'admin_email', 'admin_role']);
        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar dari panel admin.');
    }

    /**
     * Display the main admin dashboard view.
     */
    public function dashboard()
    {
        $this->checkAuth(true);

        $stats = [
            'articles' => Article::count(),
            'galleries' => Gallery::count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count()
        ];

        // Fetch latest messages
        $messages = ContactMessage::orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('stats', 'messages'));
    }

    /**
     * List and manage articles.
     */
    public function manageArticles()
    {
        $this->checkAuth();
        $articles = Article::orderBy('published_at', 'desc')->paginate(8);
        return view('admin.articles', compact('articles'));
    }

    /**
     * Show create article form.
     */
    public function createArticle()
    {
        $this->checkAuth();
        return view('admin.articles-create');
    }

    /**
     * Store new article.
     */
    public function storeArticle(Request $request)
    {
        $this->checkAuth();
        $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string',
            'author' => 'required|string|max:100',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = 'https://picsum.photos/seed/' . Str::random(5) . '/800/450';
        
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/uploads/articles'), $filename);
            $imagePath = '/storage/uploads/articles/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category' => $request->category,
            'author' => $request->author,
            'content' => $request->content,
            'image' => $imagePath,
            'is_featured' => $request->has('is_featured'),
            'published_at' => now(),
        ]);

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil diterbitkan!');
    }

    /**
     * Delete article.
     */
    public function deleteArticle($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil dihapus.');
    }

    /**
     * List and manage galleries (Admin Only).
     */
    public function manageGalleries()
    {
        $this->checkAuth(true);
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.galleries', compact('galleries'));
    }

    /**
     * Store new gallery image (Admin Only).
     */
    public function storeGallery(Request $request)
    {
        $this->checkAuth(true);
        $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string',
            'image_url' => 'nullable|url',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = 'https://picsum.photos/seed/' . Str::random(5) . '/800/600';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/uploads/gallery'), $filename);
            $imagePath = '/storage/uploads/gallery/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries')->with('success', 'Foto baru berhasil ditambahkan ke galeri!');
    }

    /**
     * Delete gallery image (Admin Only).
     */
    public function deleteGallery($id)
    {
        $this->checkAuth(true);
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('admin.galleries')->with('success', 'Foto galeri berhasil dihapus.');
    }

    /**
     * List all contact messages (Admin Only).
     */
    public function manageMessages()
    {
        $this->checkAuth(true);
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.messages', compact('messages'));
    }

    /**
     * Mark contact message as read (Admin Only).
     */
    public function readMessage($id)
    {
        $this->checkAuth(true);
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Pesan ditandai sebagai dibaca.');
    }

    /**
     * Delete contact message (Admin Only).
     */
    public function deleteMessage($id)
    {
        $this->checkAuth(true);
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }

    /**
     * Toggle the featured status of an article.
     */
    public function toggleFeaturedArticle($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        $article->update([
            'is_featured' => !$article->is_featured
        ]);

        return redirect()->route('admin.articles')->with('success', 'Status slider artikel "' . $article->title . '" berhasil diperbarui!');
    }

    /**
     * Display the school profile editor and reader view (Admin Only).
     */
    public function manageProfile()
    {
        $this->checkAuth(true);
        $stats = [
            'siswa_aktif' => \App\Models\Setting::get('siswa_aktif', '1250'),
            'guru_staff' => \App\Models\Setting::get('guru_staff', '84'),
            'ruang_kelas' => \App\Models\Setting::get('ruang_kelas', '36'),
            'akreditasi' => \App\Models\Setting::get('akreditasi', 'A'),
        ];

        return view('admin.profile', compact('stats'));
    }

    /**
     * Save updated school profile statistics settings (Admin Only).
     */
    public function updateProfileStats(Request $request)
    {
        $this->checkAuth(true);
        $request->validate([
            'siswa_aktif' => 'required|integer|min:1',
            'guru_staff' => 'required|integer|min:1',
            'ruang_kelas' => 'required|integer|min:1',
            'akreditasi' => 'required|string|max:50',
        ]);

        \App\Models\Setting::set('siswa_aktif', $request->siswa_aktif);
        \App\Models\Setting::set('guru_staff', $request->guru_staff);
        \App\Models\Setting::set('ruang_kelas', $request->ruang_kelas);
        \App\Models\Setting::set('akreditasi', $request->akreditasi);

        return redirect()->route('admin.profile')->with('success', 'Statistik landing page sekolah berhasil diperbarui!');
    }

    /**
     * Show edit article form.
     */
    public function editArticle($id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        return view('admin.articles-edit', compact('article'));
    }

    /**
     * Update existing article.
     */
    public function updateArticle(Request $request, $id)
    {
        $this->checkAuth();
        $article = Article::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string',
            'author' => 'required|string|max:100',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imagePath = $article->image;
        
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/uploads/articles'), $filename);
            $imagePath = '/storage/uploads/articles/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category' => $request->category,
            'author' => $request->author,
            'content' => $request->content,
            'image' => $imagePath,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * List all users (Admin Only).
     */
    public function manageUsers()
    {
        $this->checkAuth(true);
        $users = User::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.users', compact('users'));
    }

    /**
     * Show create user form (Admin Only).
     */
    public function createUser()
    {
        $this->checkAuth(true);
        return view('admin.users-create');
    }

    /**
     * Store new user (Admin Only).
     */
    public function storeUser(Request $request)
    {
        $this->checkAuth(true);
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,writer,ppdb',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'Pengguna baru berhasil didaftarkan!');
    }

    /**
     * Show edit user form (Admin Only).
     */
    public function editUser($id)
    {
        $this->checkAuth(true);
        $user = User::findOrFail($id);
        return view('admin.users-edit', compact('user'));
    }

    /**
     * Update existing user (Admin Only).
     */
    public function updateUser(Request $request, $id)
    {
        $this->checkAuth(true);
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:admin,writer,ppdb',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Delete user (Admin Only).
     */
    public function deleteUser($id)
    {
        $this->checkAuth(true);
        $user = User::findOrFail($id);
        
        // Prevent admin from deleting themselves
        if ($user->id === Session::get('admin_id')) {
            return redirect()->route('admin.users')->with('success', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang aktif.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil dihapus.');
    }

    /**
     * Manage PPDB (New Students) (Admin Only).
     */
    public function managePpdb(Request $request)
    {
        $this->checkPpdbAuth();

        $status = $request->get('status', 'all');
        $search = $request->get('q');
        
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        if (!in_array($sortBy, ['name', 'nisn', 'created_at', 'uploaded_at'])) {
            $sortBy = 'created_at';
        }
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc';
        }

        $query = NewStudent::orderBy($sortBy, $sortOrder);

        if ($status === 'complete') {
            $query->whereNotNull('uploaded_at');
        } elseif ($status === 'pending') {
            $query->whereNull('uploaded_at');
        }

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }

        $students = $query->paginate(15);
        $templatePath = Setting::get('ppdb_statement_template', '');
        $schedules = VerificationSchedule::orderBy('start_queue', 'asc')->get();
        $queuedStudents = NewStudent::whereNotNull('queue_number')->orderBy('queue_number', 'asc')->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.ppdb-table', compact('students', 'templatePath', 'status', 'search', 'sortBy', 'sortOrder'))->render()
            ]);
        }

        return view('admin.ppdb', compact('students', 'templatePath', 'status', 'search', 'sortBy', 'sortOrder', 'schedules', 'queuedStudents'));
    }

    /**
     * Import new students from Excel (Admin Only).
     */
    public function importPpdb(Request $request)
    {
        $this->checkPpdbAuth();

        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls|max:5120'
        ], [
            'excel_file.required' => 'Berkas Excel wajib diunggah.',
            'excel_file.mimes' => 'Format berkas wajib berupa XLSX atau XLS.',
            'excel_file.max' => 'Ukuran berkas tidak boleh melebihi 5MB.'
        ]);

        try {
            $file = $request->file('excel_file');
            $spreadsheet = IOFactory::load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            $imported = 0;
            $updated = 0;

            foreach ($rows as $index => $row) {
                if ($index === 0) continue; // Skip header

                $nisn = trim($row[0] ?? '');
                $name = trim($row[1] ?? '');

                if (empty($nisn) || empty($name)) {
                    continue;
                }

                $birthPlace = trim($row[2] ?? '');
                
                // Parse Date
                $birthDateVal = $row[3] ?? null;
                $birthDate = null;
                if ($birthDateVal) {
                    try {
                        $birthDate = Carbon::parse($birthDateVal)->format('Y-m-d');
                    } catch (\Exception $e) {
                        if (is_numeric($birthDateVal)) {
                            $unixDate = ($birthDateVal - 25569) * 86400;
                            $birthDate = date('Y-m-d', $unixDate);
                        }
                    }
                }

                $classRec = trim($row[4] ?? '');

                $existing = NewStudent::where('nisn', $nisn)->first();

                NewStudent::updateOrCreate(
                    ['nisn' => $nisn],
                    [
                        'name' => $name,
                        'birth_place' => $birthPlace,
                        'birth_date' => $birthDate,
                        'class_recommendation' => $classRec
                    ]
                );

                if ($existing) {
                    $updated++;
                } else {
                    $imported++;
                }
            }

            return redirect()->back()->with('success', "Impor berhasil! {$imported} data siswa diimpor baru, {$updated} data diperbarui.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor berkas: ' . $e->getMessage());
        }
    }

    /**
     * Upload statement template (Admin Only).
     */
    public function uploadTemplate(Request $request)
    {
        $this->checkPpdbAuth();

        $request->validate([
            'template_file' => 'required|file|mimes:pdf,docx,doc,jpg,jpeg,png|max:4096'
        ], [
            'template_file.required' => 'Berkas template wajib diunggah.',
            'template_file.mimes' => 'Format berkas wajib berupa PDF, DOCX, DOC, atau Gambar (JPG, PNG).',
            'template_file.max' => 'Ukuran berkas tidak boleh melebihi 4MB.'
        ]);

        try {
            $file = $request->file('template_file');
            $filename = 'template_surat_pernyataan_' . time() . '.' . $file->getClientOriginalExtension();
            
            $dir = storage_path('app/public/templates');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            $file->move($dir, $filename);
            $dbPath = '/storage/templates/' . $filename;

            // Delete old template if exists
            $oldPath = Setting::get('ppdb_statement_template');
            if ($oldPath && file_exists(public_path($oldPath))) {
                @unlink(public_path($oldPath));
            }

            Setting::set('ppdb_statement_template', $dbPath);

            return redirect()->back()->with('success', 'Template Surat Pernyataan berhasil diunggah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengunggah template: ' . $e->getMessage());
        }
    }

    /**
     * Delete student and associated documents (Admin Only).
     */
    public function deleteStudent($id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);

        // Delete uploaded files
        $files = [$student->kk_path, $student->akta_path, $student->photo_path, $student->spmb_path, $student->statement_path];
        foreach ($files as $file) {
            $resolved = $this->resolveLocalFilePath($file);
            if ($resolved) {
                @unlink($resolved);
            }
        }

        $student->delete();

        return redirect()->back()->with('success', 'Data siswa dan seluruh berkasnya berhasil dihapus.');
    }

    /**
     * Reset student biodata and delete associated documents (Admin Only).
     */
    public function resetStudent($id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);

        // Delete uploaded files physically
        $files = [$student->kk_path, $student->akta_path, $student->photo_path, $student->spmb_path, $student->statement_path];
        foreach ($files as $file) {
            $resolved = $this->resolveLocalFilePath($file);
            if ($resolved) {
                @unlink($resolved);
            }
        }

        // Reset all biodata fields to null
        $student->update([
            'queue_number' => null,
            'gender' => null,
            'nik' => null,
            'religion' => null,
            'address' => null,
            'district' => null,
            'subdistrict' => null,
            'stay_type' => null,
            'phone' => null,
            'is_kps' => null,
            'kps_number' => null,
            'father_name' => null,
            'father_education' => null,
            'father_job' => null,
            'father_income' => null,
            'mother_name' => null,
            'mother_education' => null,
            'mother_job' => null,
            'mother_income' => null,
            'parent_address' => null,
            'guardian_name' => null,
            'guardian_education' => null,
            'guardian_job' => null,
            'guardian_income' => null,
            'guardian_address' => null,
            'is_kip' => null,
            'kip_number' => null,
            'kk_path' => null,
            'akta_path' => null,
            'photo_path' => null,
            'spmb_path' => null,
            'statement_path' => null,
            'uploaded_at' => null,
        ]);

        return redirect()->back()->with('success', 'Biodata dan berkas pendaftaran siswa ' . $student->name . ' berhasil direset.');
    }

    /**
     * Toggle student edit access permission (Admin Only).
     */
    public function toggleEditStudent($id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);
        
        $newStatus = !$student->allow_edit;
        $student->update(['allow_edit' => $newStatus]);

        $message = $newStatus 
            ? 'Akses edit/perbaikan data untuk siswa ' . $student->name . ' berhasil DIBUKA.' 
            : 'Akses edit/perbaikan data untuk siswa ' . $student->name . ' berhasil DITUTUP/DIKUNCI kembali.';

        return redirect()->back()->with('success', $message);
    }

    /**
     * Store new verification schedule (Admin Only).
     */
    public function storeSchedule(Request $request)
    {
        $this->checkPpdbAuth();

        $request->validate([
            'start_queue' => 'required|integer|min:1',
            'end_queue' => 'required|integer|gte:start_queue',
            'date' => 'required|date',
            'time' => 'required|string',
            'location' => 'nullable|string|max:200',
        ], [
            'start_queue.required' => 'Rentang antrean mulai wajib diisi.',
            'start_queue.integer' => 'Rentang antrean mulai harus berupa angka.',
            'start_queue.min' => 'Rentang antrean mulai minimal 1.',
            'end_queue.required' => 'Rentang antrean selesai wajib diisi.',
            'end_queue.integer' => 'Rentang antrean selesai harus berupa angka.',
            'end_queue.gte' => 'Rentang antrean selesai harus lebih besar atau sama dengan antrean mulai.',
            'date.required' => 'Tanggal verifikasi wajib diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'time.required' => 'Jam verifikasi wajib diisi.',
        ]);

        // Check if there's an overlapping queue range
        $overlap = VerificationSchedule::where(function($q) use ($request) {
            $q->whereBetween('start_queue', [$request->start_queue, $request->end_queue])
              ->orWhereBetween('end_queue', [$request->start_queue, $request->end_queue])
              ->orWhere(function($sq) use ($request) {
                  $sq->where('start_queue', '<=', $request->start_queue)
                     ->where('end_queue', '>=', $request->end_queue);
              });
        })->exists();

        if ($overlap) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Rentang nomor antrean tumpang tindih dengan jadwal yang sudah ada.');
        }

        VerificationSchedule::create([
            'start_queue' => $request->start_queue,
            'end_queue' => $request->end_queue,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Jadwal verifikasi berkas berhasil ditambahkan.');
    }

    /**
     * Verify student registration details (Admin/Staff).
     */
    public function verifyStudent(Request $request, $id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);

        $request->validate([
            'verification_status' => 'required|string|in:verified,rejected',
            'verification_notes' => 'required_if:verification_status,rejected|nullable|string',
            'admin_notes' => 'nullable|string',
            'allow_edit' => 'nullable|boolean',
        ], [
            'verification_status.required' => 'Status verifikasi wajib dipilih.',
            'verification_status.in' => 'Status verifikasi tidak valid.',
            'verification_notes.required_if' => 'Catatan verifikasi wajib diisi jika status tidak OK.',
        ]);

        $status = $request->verification_status;
        $allowEdit = $request->has('allow_edit') ? (bool)$request->allow_edit : false;

        if ($status === 'rejected') {
            $student->allow_edit = true;
        } elseif ($status === 'verified') {
            $student->allow_edit = false;
        } else {
            $student->allow_edit = $allowEdit;
        }

        $student->verification_status = $status;
        $student->verification_notes = $status === 'rejected' ? $request->verification_notes : null;
        $student->admin_notes = $request->admin_notes;
        $student->verified_by = Session::get('admin_name') ?? 'Admin';
        $student->save();

        $statusText = $status === 'verified' ? 'Lolos (OK)' : 'Perlu Perbaikan (Tidak OK)';
        return redirect()->back()->with('success', 'Status verifikasi siswa ' . $student->name . ' berhasil disimpan sebagai ' . $statusText . '.');
    }

    /**
     * Delete verification schedule (Admin Only).
     */
    public function deleteSchedule($id)
    {
        $this->checkPpdbAuth();

        $schedule = VerificationSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Jadwal verifikasi berkas berhasil dihapus.');
    }

    /**
     * Centralized auth & role validation.
     */
    /**
     * Print student biodata.
     */
    public function printStudent($id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);
        
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
     * Download all student documents in ZIP format.
     */
    public function downloadStudentZip($id)
    {
        $this->checkPpdbAuth();

        $student = NewStudent::findOrFail($id);
        
        $filesToZip = [
            'Kartu_Keluarga' => $student->kk_path,
            'Akta_Kelahiran' => $student->akta_path,
            'SKL' => $student->photo_path,
            'Bukti_SPMB' => $student->spmb_path,
            'Surat_Pernyataan' => $student->statement_path
        ];

        // Filter only uploaded/existing files
        $validFiles = [];
        foreach ($filesToZip as $label => $path) {
            $resolved = $this->resolveLocalFilePath($path);
            if ($resolved) {
                $validFiles[$label] = $resolved;
            }
        }

        if (empty($validFiles)) {
            return redirect()->back()->with('error', 'Siswa ' . $student->name . ' belum mengunggah berkas apapun.');
        }

        // Create temporary ZIP file
        $zipFileName = 'Berkas_SPMB_' . $student->nisn . '_' . Str::slug($student->name) . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            foreach ($validFiles as $label => $fullPath) {
                $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
                // Name pattern: 0092837482_Nama_Kartu_Keluarga.pdf
                $fileNameInZip = $student->nisn . '_' . Str::slug($student->name) . '_' . $label . '.' . $extension;
                $zip->addFile($fullPath, $fileNameInZip);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Gagal membuat berkas ZIP.');
        }

        // Return file download and delete file after send
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Export all students to XLSX format.
     */
    public function exportPpdbXlsx()
    {
        $this->checkPpdbAuth();

        $students = NewStudent::orderBy('queue_number', 'asc')->orderBy('created_at', 'desc')->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Calon Siswa SPMB');

        // Header Style
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '006644'] // SMANSA Green
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => 'CCCCCC']
                ]
            ]
        ];

        // Data Row Style
        $dataStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => 'E0E0E0']
                ]
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ]
        ];

        // Headers Definition
        $headers = [
            'No. Antrean', 'NISN', 'Nama Lengkap', 'Rekomendasi Kelas', 'Status Verifikasi', 'Diverifikasi Oleh', 'Catatan Verifikasi', 
            'Catatan Internal Admin', 'Tanggal Daftar (Upload Berkas)', 'NIK', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 
            'Agama', 'No. HP', 'Kecamatan', 'Kelurahan', 'Alamat Lengkap', 'Jenis Tinggal', 
            'Nama Ayah', 'Pendidikan Ayah', 'Pekerjaan Ayah', 'Penghasilan Ayah', 
            'Nama Ibu', 'Pendidikan Ibu', 'Pekerjaan Ibu', 'Penghasilan Ibu', 
            'Alamat Orang Tua', 
            'Nama Wali', 'Pendidikan Wali', 'Pekerjaan Wali', 'Penghasilan Wali', 'Alamat Wali',
            'Penerima KPS', 'No. KPS', 'Penerima KIP', 'No. KIP'
        ];

        // Write Headers
        foreach ($headers as $colIndex => $headerText) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);
            $sheet->setCellValue($colLetter . '1', $headerText);
        }

        // Set row height for header
        $sheet->getRowDimension('1')->setRowHeight(30);

        // Apply style to header
        $lastColLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(count($headers));
        $sheet->getStyle('A1:' . $lastColLetter . '1')->applyFromArray($headerStyle);

        // Write Data Rows
        $rowIndex = 2;
        foreach ($students as $student) {
            $verificationStatus = 'Belum Diverifikasi';
            if ($student->verification_status === 'verified') {
                $verificationStatus = 'Lolos (OK)';
            } elseif ($student->verification_status === 'rejected') {
                $verificationStatus = 'Revisi (Tidak OK)';
            }

            $uploadedAt = $student->uploaded_at ? $student->uploaded_at->format('Y-m-d H:i') . ' WIB' : '-';
            $birthDate = $student->birth_date ? $student->birth_date->format('Y-m-d') : '-';

            $rowData = [
                $student->queue_number ? '#' . $student->queue_number : '-',
                $student->nisn,
                $student->name,
                $student->class_recommendation ?: 'Umum / Lulus Seleksi',
                $verificationStatus,
                $student->verified_by ?: '-',
                $student->verification_notes ?: '-',
                $student->admin_notes ?: '-',
                $uploadedAt,
                $student->nik ?: '-',
                $student->gender ?: '-',
                $student->birth_place ?: '-',
                $birthDate,
                $student->religion ?: '-',
                $student->phone ?: '-',
                $student->district ?: '-',
                $student->subdistrict ?: '-',
                $student->address ?: '-',
                $student->stay_type ?: '-',
                $student->father_name ?: '-',
                $student->father_education ?: '-',
                $student->father_job ?: '-',
                $student->father_income ?: '-',
                $student->mother_name ?: '-',
                $student->mother_education ?: '-',
                $student->mother_job ?: '-',
                $student->mother_income ?: '-',
                $student->parent_address ?: '-',
                $student->guardian_name ?: '-',
                $student->guardian_education ?: '-',
                $student->guardian_job ?: '-',
                $student->guardian_income ?: '-',
                $student->guardian_address ?: '-',
                $student->is_kps ?: 'Tidak',
                $student->kps_number ?: '-',
                $student->is_kip ?: 'Tidak',
                $student->kip_number ?: '-'
            ];

            foreach ($rowData as $colIndex => $value) {
                $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex + 1);
                
                // Explicitly format NISN and NIK as text to prevent Excel from converting to scientific notation
                if ($colIndex === 1 || $colIndex === 9 || $colIndex === 14 || $colIndex === 34 || $colIndex === 36) {
                    $sheet->setCellValueExplicit($colLetter . $rowIndex, $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                } else {
                    $sheet->setCellValue($colLetter . $rowIndex, $value);
                }
            }

            $sheet->getRowDimension($rowIndex)->setRowHeight(22);
            $rowIndex++;
        }

        // Apply borders & alignment to data
        if ($rowIndex > 2) {
            $sheet->getStyle('A2:' . $lastColLetter . ($rowIndex - 1))->applyFromArray($dataStyle);
            
            // Align center for specific columns (queue_number, nisn, status, gender, religion, phone)
            $centerCols = ['A', 'B', 'D', 'E', 'F', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'AH', 'AJ'];
            foreach ($centerCols as $col) {
                $sheet->getStyle($col . '2:' . $col . ($rowIndex - 1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
        }

        // Auto-fit Column Widths
        for ($col = 1; $col <= count($headers); $col++) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
            $sheet->getColumnDimension($colLetter)->setAutoSize(true);
        }

        // Write output and return download stream
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = 'Data_Calon_Siswa_SPMB_SMANSA_' . date('Ymd_His') . '.xlsx';
        
        return response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );
    }

    /**
     * Show general system settings page (Admin Only).
     */
    public function manageSettings()
    {
        $this->checkAuth(true);

        $settings = [
            'kop_header_1' => Setting::get('kop_header_1', 'PEMERINTAH PROVINSI KEPULAUAN RIAU'),
            'kop_header_2' => Setting::get('kop_header_2', 'SMA NEGERI 1 TANJUNGPINANG'),
            'kop_address' => Setting::get('kop_address', 'Jalan K.H. Agus Salim No. 1, Tanjungpinang | Telp: (0771) 21112 | Email: info@sman1-tpi.sch.id'),
            'kop_website' => Setting::get('kop_website', 'Website: smansa-tpi.sch.id | Akreditasi A'),
            'kop_logo_left' => Setting::get('kop_logo_left', Setting::get('kop_logo', '/images/logo.png')),
            'kop_logo_right' => Setting::get('kop_logo_right', Setting::get('kop_logo', '/images/logo.png')),
        ];

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update system settings (Admin Only).
     */
    public function updateSettings(Request $request)
    {
        $this->checkAuth(true);

        $request->validate([
            'kop_header_1' => 'required|string|max:200',
            'kop_header_2' => 'required|string|max:200',
            'kop_address' => 'required|string|max:300',
            'kop_website' => 'required|string|max:300',
            'kop_logo_left_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kop_logo_right_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'kop_header_1.required' => 'Header baris 1 wajib diisi.',
            'kop_header_2.required' => 'Header baris 2 (Nama Sekolah) wajib diisi.',
            'kop_address.required' => 'Alamat kop wajib diisi.',
            'kop_website.required' => 'Website & akreditasi wajib diisi.',
            'kop_logo_left_file.image' => 'Logo kiri harus berupa berkas gambar.',
            'kop_logo_left_file.max' => 'Ukuran logo kiri tidak boleh melebihi 2MB.',
            'kop_logo_right_file.image' => 'Logo kanan harus berupa berkas gambar.',
            'kop_logo_right_file.max' => 'Ukuran logo kanan tidak boleh melebihi 2MB.',
        ]);

        Setting::set('kop_header_1', $request->kop_header_1);
        Setting::set('kop_header_2', $request->kop_header_2);
        Setting::set('kop_address', $request->kop_address);
        Setting::set('kop_website', $request->kop_website);

        $dir = storage_path('app/public/uploads/logo');
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        // Upload custom Left Logo if exists
        if ($request->hasFile('kop_logo_left_file')) {
            $file = $request->file('kop_logo_left_file');
            $filename = 'kop_logo_left_' . time() . '.' . $file->getClientOriginalExtension();
            
            $file->move($dir, $filename);
            $logoPath = '/storage/uploads/logo/' . $filename;
            
            // Delete old left logo if exists
            $oldLogo = Setting::get('kop_logo_left');
            if ($oldLogo && $oldLogo !== '/images/logo.png' && $oldLogo !== 'images/logo.png') {
                $resolvedOld = $this->resolveLocalFilePath($oldLogo);
                if ($resolvedOld) {
                    @unlink($resolvedOld);
                }
            }
            
            Setting::set('kop_logo_left', $logoPath);
        }

        // Upload custom Right Logo if exists
        if ($request->hasFile('kop_logo_right_file')) {
            $file = $request->file('kop_logo_right_file');
            $filename = 'kop_logo_right_' . time() . '.' . $file->getClientOriginalExtension();
            
            $file->move($dir, $filename);
            $logoPath = '/storage/uploads/logo/' . $filename;
            
            // Delete old right logo if exists
            $oldLogo = Setting::get('kop_logo_right');
            if ($oldLogo && $oldLogo !== '/images/logo.png' && $oldLogo !== 'images/logo.png') {
                $resolvedOld = $this->resolveLocalFilePath($oldLogo);
                if ($resolvedOld) {
                    @unlink($resolvedOld);
                }
            }
            
            Setting::set('kop_logo_right', $logoPath);
            // Backward compatibility update for general kop_logo
            Setting::set('kop_logo', $logoPath);
        }

        return redirect()->back()->with('success', 'Pengaturan Kop Surat berhasil diperbarui!');
    }

    private function checkAuth($isAdminOnly = false)
    {
        if (!Session::has('admin_logged_in')) {
            redirect()->route('admin.login')->send();
            exit;
        }

        $role = Session::get('admin_role');

        if ($isAdminOnly) {
            if ($role !== 'admin') {
                abort(403, 'Akses ditolak. Halaman ini hanya dapat diakses oleh Administrator.');
            }
        } else {
            if ($role !== 'admin' && $role !== 'writer') {
                abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
            }
        }
    }

    /**
     * Auth validation for PPDB/SPMB committee (Admin and PPDB role).
     */
    private function checkPpdbAuth()
    {
        if (!Session::has('admin_logged_in')) {
            redirect()->route('admin.login')->send();
            exit;
        }

        $role = Session::get('admin_role');
        if ($role !== 'admin' && $role !== 'ppdb') {
            abort(403, 'Akses ditolak. Halaman ini hanya dapat diakses oleh Administrator atau Panitia SPMB.');
        }
    }

    /**
     * Resolve the absolute path of an uploaded file.
     */
    private function resolveLocalFilePath($webPath)
    {
        if (empty($webPath)) {
            return null;
        }

        $cleanPath = ltrim($webPath, '/');

        // Check 1: public_path
        $loc1 = public_path($cleanPath);
        if (file_exists($loc1)) {
            return $loc1;
        }

        // Check 2: public_html folder (common on shared hosting)
        $loc2 = base_path('public_html/' . $cleanPath);
        if (file_exists($loc2)) {
            return $loc2;
        }

        // Check 3: physical storage folder (if symlinked)
        $relativePath = str_replace('storage/', '', $cleanPath);
        $loc3 = storage_path('app/public/' . $relativePath);
        if (file_exists($loc3)) {
            return $loc3;
        }

        return null;
    }
}
