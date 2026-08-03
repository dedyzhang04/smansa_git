<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Pendaftaran SPMB – {{ $student->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #004d33;
            --gold: #d4af37;
            --text-dark: #1a202c;
            --text-muted: #4a5568;
            --border-color: #cbd5e0;
        }

        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            color: var(--text-dark);
            line-height: 1.3;
            background-color: #fff;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }

        /* Print Button Utility (hidden in print) */
        .no-print-bar {
            background-color: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 8px 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-print {
            background-color: var(--primary-dark);
            color: #fff;
            border: none;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 700;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-print:hover {
            background-color: #003322;
        }

        /* Kop Surat (Header) */
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px double var(--primary-dark);
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        .kop-logo-left, .kop-logo-right {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .kop-logo-left {
            margin-right: 12px;
        }

        .kop-logo-right {
            margin-left: 12px;
        }

        .kop-text {
            text-align: center;
            flex: 1;
        }

        .kop-text h1 {
            font-size: 12px;
            margin: 0 0 2px 0;
            color: var(--primary-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .kop-text h2 {
            font-size: 14px;
            margin: 0 0 3px 0;
            color: var(--primary-dark);
            font-weight: 800;
            text-transform: uppercase;
        }

        .kop-text p {
            margin: 0;
            font-size: 8.5px;
            color: #4a5568;
            line-height: 1.2;
        }

        /* Document Title */
        .document-title {
            text-align: center;
            margin-bottom: 8px;
        }

        .document-title h3 {
            font-size: 12px;
            text-transform: uppercase;
            margin: 0 0 2px 0;
            font-weight: 700;
            border-bottom: 1px solid var(--text-dark);
            display: inline-block;
            padding-bottom: 1px;
        }

        .document-title span {
            display: block;
            font-size: 9px;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* Section Headings */
        .section-title {
            font-size: 9.5px;
            font-weight: 700;
            color: var(--primary-dark);
            border-bottom: 1px solid var(--primary-dark);
            padding-bottom: 1px;
            margin: 8px 0 4px 0;
            text-transform: uppercase;
        }

        /* Grid Data Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px;
        }

        .data-table th, .data-table td {
            padding: 3px 5px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #e2e8f0;
            font-size: 9px;
        }

        .data-table th {
            width: 35%;
            color: #4a5568;
            font-weight: 600;
            background-color: #f7fafc;
        }

        .data-table td {
            width: 65%;
            font-weight: 600;
        }

        /* Double Column Grid */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 4px;
        }

        /* Signatures Section */
        .signatures {
            margin-top: 15px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            text-align: center;
            page-break-inside: avoid;
        }

        .signature-box {
            display: inline-block;
        }

        .signature-space {
            height: 35px;
        }

        /* Queue Card printed style */
        .queue-box {
            border: 1.5px solid var(--primary-dark);
            border-radius: 4px;
            padding: 4px 8px;
            text-align: center;
            margin-bottom: 0;
            background-color: #f7fafc;
        }

        .queue-box span {
            font-size: 8px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--primary-dark);
            display: block;
        }

        .queue-box strong {
            font-size: 16px;
            color: var(--primary-dark);
            font-weight: 800;
        }

        .info-box {
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            padding: 4px 8px;
            background-color: #f7fafc;
            font-size: 9.5px;
            line-height: 1.4;
        }

        /* Page Break Rules for Printing */
        @media print {
            .no-print-bar {
                display: none;
            }

            body {
                padding: 0;
                margin: 0;
            }

            .page-break {
                page-break-before: always;
                break-before: page;
            }
        }

        @page {
            size: A4 portrait;
            margin: 8mm 10mm;
        }
    </style>
</head>
<body>

    <!-- Top Action Bar (Hidden when printed) -->
    <div class="no-print-bar">
        <div style="font-size: 10px; color: var(--text-muted);">
            <i class="fa-solid fa-circle-info text-gold"></i> Gunakan opsi cetak bawaan browser Anda untuk menyimpan sebagai PDF (A4 Portrait).
        </div>
        <button class="btn-print" onclick="window.print()">
            <i class="fa-solid fa-print"></i> Cetak Dokumen
        </button>
    </div>

    <!-- Kop Surat Resmi Sekolah -->
    <div class="kop-surat">
        @php
            $kopHeader1 = \App\Models\Setting::get('kop_header_1', 'PEMERINTAH PROVINSI KEPULAUAN RIAU');
            $kopHeader2 = \App\Models\Setting::get('kop_header_2', 'SMA NEGERI 1 TANJUNGPINANG');
            $kopAddress = \App\Models\Setting::get('kop_address', 'Jalan K.H. Agus Salim No. 1, Tanjungpinang | Telp: (0771) 21112 | Email: info@smansa-tpi.sch.id');
            $kopWebsite = \App\Models\Setting::get('kop_website', 'Website: smansa-tpi.sch.id | Akreditasi A');
            $kopLogoLeft = \App\Models\Setting::get('kop_logo_left', \App\Models\Setting::get('kop_logo', '/images/logo.png'));
            $kopLogoRight = \App\Models\Setting::get('kop_logo_right', \App\Models\Setting::get('kop_logo', '/images/logo.png'));
        @endphp
        @if($kopLogoLeft)
            <img class="kop-logo-left" src="{{ asset($kopLogoLeft) }}" alt="Logo Kiri">
        @endif
        <div class="kop-text">
            <h1>{{ $kopHeader1 }}</h1>
            <h2>{{ $kopHeader2 }}</h2>
            <p>{{ $kopAddress }}</p>
            <p>{{ $kopWebsite }}</p>
        </div>
        @if($kopLogoRight)
            <img class="kop-logo-right" src="{{ asset($kopLogoRight) }}" alt="Logo Kanan">
        @endif
    </div>

    <!-- Document Title -->
    <div class="document-title">
        <h3>Biodata Pendaftaran Ulang SPMB</h3>
        <span>Tahun Ajaran 2026/2027</span>
    </div>

    <!-- Double column header: Queue number & Basic info -->
    <div class="grid-2">
        <div class="queue-box">
            <span>Nomor Antrean Daftar Ulang</span>
            <strong>#{{ $student->queue_number ?: '-' }}</strong>
        </div>
        <div class="info-box">
            <strong>Tanggal Upload:</strong> {{ $student->uploaded_at ? $student->uploaded_at->format('d F Y H:i') . ' WIB' : 'Belum Lengkap' }} <br>
            <strong>Status:</strong> 
            @if($student->verification_status === 'verified')
                <span style="color: #10b981; font-weight: bold;">Lolos Verifikasi (SAH)</span>
            @elseif($student->verification_status === 'rejected')
                <span style="color: #ef4444; font-weight: bold;">Revisi (Tidak Lolos)</span>
            @else
                <span style="color: #6b7280; font-weight: bold;">Menunggu Verifikasi</span>
            @endif
            | <strong>Petugas:</strong> {{ $student->verified_by ?: '-' }}
        </div>
    </div>

    <!-- A. DATA PRIBADI -->
    <div class="section-title">A. Data Pribadi Calon Siswa</div>
    <div class="grid-2">
        <div>
            <table class="data-table">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $student->nisn }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $student->nik ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $student->gender ?: '-' }}</td>
                </tr>
                <tr>
                    <th>TTL</th>
                    <td>{{ $student->birth_place ?: '-' }}, {{ $student->birth_date ? $student->birth_date->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $student->religion ?: '-' }}</td>
                </tr>
            </table>
        </div>
        <div>
            <table class="data-table">
                <tr>
                    <th>No. HP</th>
                    <td>{{ $student->phone ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Tinggal</th>
                    <td>{{ $student->stay_type ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Kec. / Kel.</th>
                    <td>{{ $student->district ?: '-' }} / {{ $student->subdistrict ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat KTP/KK</th>
                    <td>{{ $student->address ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Rekomendasi</th>
                    <td>{{ $student->class_recommendation ?: 'Umum / Lulus Seleksi' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- B. DATA ORANG TUA KANDUNG -->
    <div class="grid-2">
        <div>
            <div class="section-title">B. Data Ayah Kandung</div>
            <table class="data-table">
                <tr>
                    <th>Nama Ayah</th>
                    <td>{{ $student->father_name ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td>{{ $student->father_education ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $student->father_job ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Penghasilan</th>
                    <td>{{ $student->father_income ?: '-' }}</td>
                </tr>
            </table>
        </div>
        <div>
            <div class="section-title">C. Data Ibu Kandung</div>
            <table class="data-table">
                <tr>
                    <th>Nama Ibu</th>
                    <td>{{ $student->mother_name ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td>{{ $student->mother_education ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $student->mother_job ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Penghasilan</th>
                    <td>{{ $student->mother_income ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat Ortu</th>
                    <td>{{ $student->parent_address ?: '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- D. DATA WALI, KESEJAHTERAAN & JADWAL VERIFIKASI -->
    @if($student->guardian_name)
        <div class="grid-2">
            <div>
                <div class="section-title">D. Data Wali (Jika Ada)</div>
                <table class="data-table">
                    <tr>
                        <th>Nama Wali</th>
                        <td>{{ $student->guardian_name }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan & Kerja</th>
                        <td>{{ $student->guardian_education ?: '-' }} / {{ $student->guardian_job ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan</th>
                        <td>{{ $student->guardian_income ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Wali</th>
                        <td>{{ $student->guardian_address ?: '-' }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <div class="section-title">E. Program Bantuan / Kesejahteraan</div>
                <table class="data-table">
                    <tr>
                        <th>Penerima KPS</th>
                        <td>{{ $student->is_kps ?: 'Tidak' }} @if($student->kps_number) (No: {{ $student->kps_number }}) @endif</td>
                    </tr>
                    <tr>
                        <th>Penerima KIP</th>
                        <td>{{ $student->is_kip ?: 'Tidak' }} @if($student->kip_number) (No: {{ $student->kip_number }}) @endif</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section-title">F. Jadwal Kehadiran Verifikasi Fisik</div>
        <table class="data-table">
            <tr>
                <th style="width: 15%;">Hari, Tanggal</th>
                <td style="width: 25%;">
                    @if($schedule)
                        {{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y') }}
                    @else
                        -
                    @endif
                </td>
                <th style="width: 15%;">Waktu</th>
                <td style="width: 15%;">{{ $schedule ? $schedule->time . ' WIB' : '-' }}</td>
                <th style="width: 15%;">Tempat / Lokasi</th>
                <td style="width: 15%;">{{ $schedule ? ($schedule->location ?: 'Ruang Panitia SPMB SMAN 1 Tanjungpinang') : '-' }}</td>
            </tr>
        </table>
    @else
        <div class="grid-2">
            <div>
                <div class="section-title">D. Program Bantuan / Kesejahteraan</div>
                <table class="data-table">
                    <tr>
                        <th>Penerima KPS</th>
                        <td>{{ $student->is_kps ?: 'Tidak' }} @if($student->kps_number) (No: {{ $student->kps_number }}) @endif</td>
                    </tr>
                    <tr>
                        <th>Penerima KIP</th>
                        <td>{{ $student->is_kip ?: 'Tidak' }} @if($student->kip_number) (No: {{ $student->kip_number }}) @endif</td>
                    </tr>
                </table>
            </div>
            <div>
                <div class="section-title">E. Jadwal Kehadiran Verifikasi Fisik</div>
                <table class="data-table">
                    <tr>
                        <th>Hari, Tanggal</th>
                        <td>
                            @if($schedule)
                                {{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y') }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Waktu & Lokasi</th>
                        <td>
                            {{ $schedule ? $schedule->time . ' WIB' : '-' }} <br>
                            <span style="font-size: 8px; color: var(--text-muted);">{{ $schedule ? ($schedule->location ?: 'Ruang Panitia SPMB SMAN 1 Tanjungpinang') : '-' }}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endif

    <!-- Signatures -->
    <div class="signatures">
        <div class="signature-box">
            <p style="margin: 0 0 2px 0;">Orang Tua / Wali Calon Siswa,</p>
            <div class="signature-space"></div>
            <p style="font-weight: bold; text-decoration: underline; margin: 0;">(......................................................)</p>
        </div>
        <div class="signature-box">
            <p style="margin: 0 0 2px 0;">Tanjungpinang, {{ date('d F Y') }} <br> Petugas Verifikator Panitia SPMB,</p>
            <div class="signature-space"></div>
            <p style="font-weight: bold; text-decoration: underline; margin: 0;">({{ $student->verified_by ?: '......................................................' }})</p>
        </div>
    </div>


    <script>
        // Automatically open print dialog on page load
        window.addEventListener('DOMContentLoaded', () => {
            // Slight delay to ensure layout is ready
            setTimeout(() => {
                window.print();
            }, 500);
        });
    </script>
</body>
</html>
