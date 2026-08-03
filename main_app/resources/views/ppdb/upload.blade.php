@extends('layouts.app')

@section('title', 'Unggah Berkas Persyaratan SPMB – SMAN 1 Tanjungpinang')

@section('content')
    <style>
        .spmb-upload-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: start;
        }
        .document-upload-row {
            display: grid;
            grid-template-columns: 3fr 1.5fr;
            gap: 2rem;
            border-bottom: 1px solid #edf2f7;
            padding-bottom: 1.5rem;
            align-items: center;
        }
        .document-upload-row:last-of-type {
            border-bottom: none;
            padding-bottom: 0;
        }
        @media (max-width: 992px) {
            .spmb-upload-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 768px) {
            .spmb-container {
                padding: 2rem 1rem !important;
            }
        }
        @media (max-width: 576px) {
            .document-upload-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .document-upload-row > div:last-child {
                justify-content: flex-start !important;
            }
        }
        @media (max-width: 480px) {
            .spmb-actions {
                flex-direction: column;
                align-items: stretch;
            }
            .spmb-actions > a, .spmb-actions > button {
                text-align: center;
                width: 100%;
            }
        }
        .tab-btn {
            border: 2px solid #e2e8f0;
            background-color: #f8fafc;
            color: var(--text-muted);
        }
        .tab-btn.active {
            border-color: var(--primary-color) !important;
            background-color: #fff !important;
            color: var(--primary-color) !important;
        }
        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }
        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
            display: block;
            color: var(--text-dark);
        }
        .form-control {
            border: 1.5px solid #cbd5e1;
            border-radius: 6px;
            padding: 0.6rem 0.8rem;
            width: 100%;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 102, 68, 0.1);
        }

        /* Validation Styles */
        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23ef4444'%3e%3ccircle cx='6' cy='6' r='4.5' stroke-width='1'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23ef4444' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            padding-right: calc(1.5em + 0.75rem);
        }

        .invalid-feedback-client,
        .invalid-feedback-server {
            display: none;
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 0.35rem;
            font-weight: 500;
        }

        .was-validated .form-control:invalid ~ .invalid-feedback-client,
        .form-control.is-invalid ~ .invalid-feedback-server {
            display: block;
        }
    </style>

    <!-- Hero Header -->
    <section class="profile-hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
        <div class="container">
            <h1>Sistem Penerimaan Murid Baru (SPMB)</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <a href="{{ route('spmb.search') }}">SPMB</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Unggah Berkas</span>
            </div>
        </div>
    </section>

    <!-- Upload Content -->
    <section class="container spmb-container" style="padding: 5rem 2rem;">
        <div class="spmb-upload-grid">
            
            <!-- Left Side: Student Info & Download Template -->
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                
                <!-- Student Card -->
                <div class="admin-card" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 1.75rem;">
                    <div style="border-bottom: 2px dashed #edf2f7; padding-bottom: 1rem; margin-bottom: 1.5rem; text-align: center;">
                        <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(0, 102, 68, 0.05); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.75rem auto;">
                            <i class="fa-solid fa-user-graduate text-gold" style="font-size: 2.2rem;"></i>
                        </div>
                        <h3 style="font-size: 1.25rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.25rem;">{{ $student->name }}</h3>
                        <span class="badge {{ $student->uploaded_at ? 'badge-success' : 'badge-warning' }}" style="font-size: 0.8rem; padding: 0.4rem 0.8rem;">
                            {{ $student->uploaded_at ? 'Verifikasi Lengkap' : 'Menunggu Berkas' }}
                        </span>
                    </div>

                    <table style="width: 100%; font-size: 0.85rem; border-collapse: collapse; text-align: left;">
                        <tr style="border-bottom: 1px solid #f7fafc;">
                            <th style="padding: 0.75rem 0; color: var(--text-muted); font-weight: 500;">NISN</th>
                            <td style="padding: 0.75rem 0; font-weight: 700; color: var(--primary-dark);">{{ $student->nisn }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f7fafc;">
                            <th style="padding: 0.75rem 0; color: var(--text-muted); font-weight: 500;">Tempat Lahir</th>
                            <td style="padding: 0.75rem 0; color: var(--primary-dark);">{{ $student->birth_place ?: '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f7fafc;">
                            <th style="padding: 0.75rem 0; color: var(--text-muted); font-weight: 500;">Tanggal Lahir</th>
                            <td style="padding: 0.75rem 0; color: var(--primary-dark);">{{ $student->birth_date ? $student->birth_date->format('d M Y') : '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f7fafc;">
                            <th style="padding: 0.75rem 0; color: var(--text-muted); font-weight: 500;">Rekomendasi</th>
                            <td style="padding: 0.75rem 0; font-weight: 600; color: var(--primary-color);">{{ $student->class_recommendation ?: 'Umum / Lulus Seleksi' }}</td>
                        </tr>
                        @if($student->uploaded_at)
                        <tr>
                            <th style="padding: 0.75rem 0; color: var(--text-muted); font-weight: 500;">Tanggal Upload</th>
                            <td style="padding: 0.75rem 0; color: var(--text-muted);">{{ $student->uploaded_at->format('d M Y H:i') }} WIB</td>
                        </tr>
                        @endif
                    </table>
                    
                    @if($student->uploaded_at && !empty($student->nik))
                        <div style="margin-top: 1.25rem; border-top: 1px solid #edf2f7; padding-top: 1.25rem;">
                            <a href="{{ route('spmb.print', ['nisn' => $student->nisn]) }}" class="btn-primary" target="_blank" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none; padding: 0.7rem 1rem; border-radius: 8px; font-weight: 700; color: #fff; font-size: 0.85rem; background-color: var(--primary-color); border: none; text-align: center;">
                                <i class="fa-solid fa-print"></i> Cetak Bukti & Berkas
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Template Download Card -->
                <div class="admin-card" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid rgba(0, 102, 68, 0.1); border-radius: 12px; background: linear-gradient(135deg, rgba(0, 102, 68, 0.02) 0%, rgba(212, 175, 55, 0.02) 100%); padding: 1.75rem;">
                    <h4 style="font-size: 1.05rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.75rem;"><i class="fa-solid fa-file-signature text-gold"></i> Template Surat Pernyataan</h4>
                    <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 1.25rem;">
                        Silakan unduh template Surat Pernyataan Calon Siswa Baru di bawah ini. Cetak (print), tanda tangani di atas materai Rp10.000, lalu scan/foto dan unggah di formulir sebelah kanan.
                    </p>
                    
                    @if(!empty($templatePath))
                        <a href="{{ asset($templatePath) }}" class="btn-primary" target="_blank" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none; padding: 0.75rem 1rem; border-radius: 8px; font-weight: 600;">
                            <i class="fa-solid fa-download"></i> Unduh Template Surat
                        </a>
                    @else
                        <div style="background-color: #f7fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 0.75rem; text-align: center; font-size: 0.8rem; color: var(--text-muted); font-style: italic;">
                            <i class="fa-solid fa-hourglass-half"></i> Template belum diunggah oleh admin. Silakan tanyakan kepada panitia PPDB.
                        </div>
                    @endif
                </div>
                
            </div>            <!-- Right Side: Document Upload Form / Biodata Form -->
            <div>
                
                @if(Session::has('success'))
                    <div class="alert alert-success" style="margin-bottom: 2rem; background-color: rgba(16, 185, 129, 0.08); border-color: rgba(16, 185, 129, 0.15); color: #10b981; padding: 1rem 1.25rem; border-radius: 8px; font-size: 0.9rem; display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
                        <span>{{ Session::get('success') }}</span>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239, 68, 68, 0.08); border-color: rgba(239, 68, 68, 0.15); color: #ef4444; padding: 1rem 1.25rem; border-radius: 8px; font-size: 0.9rem; display: flex; align-items: center; gap: 0.75rem;">
                        <i class="fa-solid fa-circle-exclamation" style="font-size: 1.1rem;"></i>
                        <span>{{ Session::get('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239, 68, 68, 0.08); border-color: rgba(239, 68, 68, 0.15); color: #ef4444; padding: 1rem 1.25rem; border-radius: 8px; font-size: 0.9rem;">
                        <ul style="padding-left: 1.25rem; margin: 0;">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $isBiodataFilled = !empty($student->nik);
                    $defaultTab = $isBiodataFilled ? 'berkas' : 'biodata';
                    $isAllCompleted = $isBiodataFilled && !empty($student->uploaded_at) && !$student->allow_edit;
                @endphp

                @if($isAllCompleted)
                    <!-- Success screen for completed submission -->
                    @php
                        $borderColor = '#3b82f6';
                        if ($student->verification_status === 'verified') {
                            $borderColor = '#10b981';
                        } elseif ($student->verification_status === 'rejected') {
                            $borderColor = '#f59e0b';
                        }
                    @endphp
                    <div class="admin-card" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid rgba(16, 185, 129, 0.15); border-radius: 12px; background-color: #fff; padding: 3.5rem 2rem; text-align: center; border-top: 4px solid {{ $borderColor }};">
                        <div style="width: 80px; height: 80px; border-radius: 50%; background-color: {{ $student->verification_status === 'verified' ? 'rgba(16, 185, 129, 0.08)' : ($student->verification_status === 'rejected' ? 'rgba(245, 158, 11, 0.08)' : 'rgba(59, 130, 246, 0.08)') }}; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto;">
                            @if($student->verification_status === 'verified')
                                <i class="fa-solid fa-circle-check" style="font-size: 3.5rem; color: #10b981;"></i>
                            @elseif($student->verification_status === 'rejected')
                                <i class="fa-solid fa-clock-rotate-left" style="font-size: 3rem; color: #f59e0b;"></i>
                            @else
                                <i class="fa-solid fa-hourglass-half" style="font-size: 3rem; color: #3b82f6;"></i>
                            @endif
                        </div>
                        
                        @if($student->verification_status === 'verified')
                            <h2 style="font-size: 1.5rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.75rem;">Pendaftaran Terverifikasi!</h2>
                            <p style="font-size: 1rem; color: #10b981; font-weight: 700; margin-bottom: 0.75rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;"><i class="fa-solid fa-circle-check"></i> Berkas & Data Pendaftaran Anda Dinyatakan SAH</p>
                            <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6; max-width: 500px; margin: 0 auto 1.5rem auto;">
                                Selamat! Berkas dan data pendaftaran Anda telah berhasil diverifikasi oleh panitia SPMB SMAN 1 Tanjungpinang dan dinyatakan sah. Silakan hadir ke sekolah sesuai jadwal verifikasi fisik di bawah ini.
                            </p>
                        @elseif($student->verification_status === 'rejected')
                            <h2 style="font-size: 1.5rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.75rem;">Perbaikan Berkas Terkirim!</h2>
                            <p style="font-size: 1rem; color: #f59e0b; font-weight: 700; margin-bottom: 0.75rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;"><i class="fa-solid fa-hourglass"></i> Menunggu Verifikasi Ulang oleh Panitia</p>
                            <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6; max-width: 500px; margin: 0 auto 1.5rem auto;">
                                Anda telah mengunci perbaikan data Anda. Panitia akan segera memeriksa ulang perbaikan yang Anda kirimkan. Silakan cek halaman ini secara berkala.
                            </p>
                        @else
                            <h2 style="font-size: 1.5rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.75rem;">Pendaftaran Selesai!</h2>
                            <p style="font-size: 1rem; color: var(--text-dark); font-weight: 600; margin-bottom: 0.75rem;">Anda sudah mengisi biodata dan unggah berkas.</p>
                            <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.6; max-width: 500px; margin: 0 auto 1.5rem auto;">
                                Terima kasih telah melakukan pendaftaran ulang. Seluruh biodata dan berkas kelengkapan Anda telah kami terima secara lengkap dan aman. Silakan menunggu proses verifikasi lebih lanjut oleh panitia SPMB SMAN 1 Tanjungpinang.
                            </p>
                        @endif

                        <!-- Queue Number & Schedule Info -->
                        <div style="display: flex; flex-direction: column; gap: 1.5rem; max-width: 500px; margin: 0 auto 2rem auto; align-items: center;">
                            
                            <!-- Queue Badge -->
                            <div style="background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%); border: 2px solid #f59e0b; border-radius: 12px; padding: 1.25rem 2rem; width: 100%; text-align: center; box-shadow: 0 4px 15px rgba(245, 158, 11, 0.05);">
                                <span style="display: block; font-size: 0.85rem; color: #b45309; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Nomor Antrean Daftar Ulang Anda</span>
                                <strong style="display: block; font-size: 3rem; color: #d97706; font-weight: 800; line-height: 1.1;">#{{ $student->queue_number ?: '-' }}</strong>
                            </div>

                            <!-- Schedule Card -->
                            <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; width: 100%; text-align: left;">
                                <h4 style="font-size: 0.95rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fa-solid fa-calendar-check text-gold"></i> Jadwal Verifikasi Fisik di Sekolah
                                </h4>
                                
                                @if($schedule)
                                    <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.85rem; color: var(--text-dark);">
                                        <div style="display: flex; gap: 0.75rem; align-items: center;">
                                            <div style="width: 28px; height: 28px; border-radius: 6px; background-color: rgba(0, 102, 68, 0.05); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                                <i class="fa-solid fa-calendar-day"></i>
                                            </div>
                                            <div>
                                                <span style="color: var(--text-muted); display: block; font-size: 0.75rem;">Hari & Tanggal</span>
                                                <strong>{{ \Carbon\Carbon::parse($schedule->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y') }}</strong>
                                            </div>
                                        </div>

                                        <div style="display: flex; gap: 0.75rem; align-items: center;">
                                            <div style="width: 28px; height: 28px; border-radius: 6px; background-color: rgba(0, 102, 68, 0.05); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                                <i class="fa-solid fa-clock"></i>
                                            </div>
                                            <div>
                                                <span style="color: var(--text-muted); display: block; font-size: 0.75rem;">Waktu Kehadiran</span>
                                                <strong>{{ $schedule->time }} WIB</strong>
                                            </div>
                                        </div>

                                        <div style="display: flex; gap: 0.75rem; align-items: center;">
                                            <div style="width: 28px; height: 28px; border-radius: 6px; background-color: rgba(0, 102, 68, 0.05); display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div>
                                                <span style="color: var(--text-muted); display: block; font-size: 0.75rem;">Tempat / Ruangan</span>
                                                <strong>{{ $schedule->location ?: 'Ruang Panitia SPMB SMAN 1 Tanjungpinang' }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 1rem; background-color: rgba(0, 102, 68, 0.03); border: 1px solid rgba(0, 102, 68, 0.08); border-radius: 6px; padding: 0.75rem; font-size: 0.75rem; color: var(--primary-color); display: flex; gap: 0.5rem; align-items: flex-start;">
                                        <i class="fa-solid fa-circle-info" style="margin-top: 0.1rem;"></i>
                                        <span>Penting: Harap membawa dokumen asli (Kartu Keluarga, Akta Kelahiran, SKL, dll.) untuk verifikasi kesesuaian berkas.</span>
                                    </div>
                                @else
                                    <div style="text-align: center; padding: 1rem 0; color: var(--text-muted);">
                                        <i class="fa-solid fa-hourglass-half" style="font-size: 2rem; color: #cbd5e1; margin-bottom: 0.5rem; display: block;"></i>
                                        <p style="font-size: 0.85rem; line-height: 1.5; margin: 0;">
                                            Jadwal verifikasi dokumen fisik di sekolah belum diatur oleh panitia. Silakan periksa halaman ini secara berkala menggunakan NISN Anda.
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div style="border-top: 1px dashed #edf2f7; padding-top: 1.5rem; display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                            <a href="{{ route('spmb.search') }}" class="btn-primary" style="background-color: #64748b; color: #fff; padding: 0.65rem 1.5rem; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                                <i class="fa-solid fa-arrow-left"></i> Kembali ke Pencarian
                            </a>
                            <a href="{{ route('spmb.print', ['nisn' => $student->nisn]) }}" class="btn-accent" target="_blank" style="padding: 0.65rem 1.5rem; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 0.85rem; color: #fff; display: inline-flex; align-items: center; gap: 0.5rem;">
                                <i class="fa-solid fa-print"></i> Cetak Bukti Pendaftaran & Berkas
                            </a>
                        </div>
                    </div>
                @else
                    @if($student->allow_edit)
                        @if($student->verification_status === 'rejected')
                            <div class="alert alert-danger" style="margin-bottom: 1.5rem; background-color: rgba(239, 68, 68, 0.08); border-color: rgba(239, 68, 68, 0.15); color: #ef4444; padding: 1.25rem; border-radius: 8px; font-size: 0.9rem; border-left: 4px solid #ef4444;">
                                <div style="display: flex; gap: 0.75rem; align-items: flex-start;">
                                    <i class="fa-solid fa-circle-xmark" style="font-size: 1.25rem; margin-top: 0.1rem; color: #ef4444;"></i>
                                    <div>
                                        <strong style="display: block; margin-bottom: 0.25rem; font-size: 0.95rem;">Catatan Perbaikan dari Panitia</strong>
                                        <p style="margin: 0; line-height: 1.5; font-weight: 700; color: #b91c1c;">
                                            "{{ $student->verification_notes }}"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form id="lock-form" action="{{ route('spmb.upload.lock', ['nisn' => $student->nisn]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin sudah selesai melakukan perbaikan dan ingin mengunci data Anda kembali?');" style="display: none;">
                            @csrf
                        </form>

                        <div class="alert alert-warning" style="margin-bottom: 2rem; background-color: rgba(245, 158, 11, 0.08); border-color: rgba(245, 158, 11, 0.2); color: #d97706; padding: 1.25rem; border-radius: 8px; font-size: 0.9rem; border-left: 4px solid #f59e0b;">
                            <div style="display: flex; gap: 0.75rem; align-items: flex-start; justify-content: space-between; flex-wrap: wrap;">
                                <div style="display: flex; gap: 0.75rem; align-items: flex-start; flex: 1; min-width: 280px;">
                                    <i class="fa-solid fa-circle-exclamation" style="font-size: 1.25rem; margin-top: 0.1rem;"></i>
                                    <div>
                                        <strong style="display: block; margin-bottom: 0.25rem; font-size: 0.95rem;">Mode Perbaikan Data Aktif</strong>
                                        <p style="margin: 0; line-height: 1.5;">
                                            Administrator telah membuka akses bagi Anda untuk melakukan perbaikan data PPDB/SPMB. Silakan perbarui data pribadi Anda pada tab <strong>Isi Formulir Biodata</strong> dan/atau unggah ulang berkas pada tab <strong>Unggah Berkas Persyaratan</strong>. Setelah semua data diperbaiki dengan benar, Anda <strong>wajib</strong> mengklik tombol <strong>"Selesai Perbaikan & Kunci Data"</strong> untuk mengunci kembali berkas Anda agar dapat diverifikasi oleh panitia.
                                        </p>
                                    </div>
                                </div>
                                <div style="margin-top: 0.5rem; align-self: center;">
                                    <button type="submit" form="lock-form" class="btn-primary" style="background-color: #10b981; color: #fff; padding: 0.6rem 1.2rem; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);">
                                        <i class="fa-solid fa-lock"></i> Selesai Perbaikan & Kunci Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                <!-- Tab Headers -->
                <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                    <button id="tab-biodata" class="tab-btn {{ $defaultTab === 'biodata' ? 'active' : '' }}" onclick="switchTab('biodata')" style="flex: 1; min-width: 200px; padding: 1rem; border-radius: 8px; font-weight: 700; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="fa-solid fa-file-invoice"></i> 1. Isi Formulir Biodata
                        @if($isBiodataFilled)
                            <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                        @endif
                    </button>
                    <button id="tab-berkas" class="tab-btn {{ $defaultTab === 'berkas' ? 'active' : '' }}" onclick="switchTab('berkas')" style="flex: 1; min-width: 200px; padding: 1rem; border-radius: 8px; font-weight: 700; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 0.5rem;" {{ !$isBiodataFilled ? 'disabled title="Isi biodata terlebih dahulu"' : '' }}>
                        <i class="fa-solid fa-cloud-arrow-up"></i> 2. Unggah Berkas Persyaratan
                        @if(!$isBiodataFilled)
                            <i class="fa-solid fa-lock" style="color: #94a3b8;"></i>
                        @else
                            @if($student->uploaded_at)
                                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i>
                            @endif
                        @endif
                    </button>
                </div>

                <!-- SECTION 1: BIODATA FORM -->
                <div id="biodata-section" style="display: {{ $defaultTab === 'biodata' ? 'block' : 'none' }};">
                    <div class="admin-card" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 2rem;">
                        <form action="{{ route('spmb.biodata.submit', ['nisn' => $student->nisn]) }}" method="POST" novalidate>
                            @csrf
                            
                            <!-- A. DATA PRIBADI PESERTA DIDIK -->
                            <h4 style="font-size: 1.1rem; color: var(--primary-dark); border-bottom: 2.5px solid var(--primary-color); padding-bottom: 0.4rem; margin-bottom: 1.5rem; font-weight: 700;">
                                <i class="fa-solid fa-user text-gold" style="margin-right: 0.5rem;"></i> A. Data Pribadi Calon Siswa
                            </h4>
                            
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
                                <!-- Nama (Readonly) -->
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $student->name }}" disabled style="background-color: #f1f5f9; cursor: not-allowed; border: 1.5px solid #cbd5e1; border-radius: 6px; padding: 0.6rem 0.8rem; width: 100%; font-size: 0.9rem;">
                                </div>
                                
                                <!-- NISN (Readonly) -->
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" value="{{ $student->nisn }}" disabled style="background-color: #f1f5f9; cursor: not-allowed; border: 1.5px solid #cbd5e1; border-radius: 6px; padding: 0.6rem 0.8rem; width: 100%; font-size: 0.9rem;">
                                </div>

                                <!-- Tempat Lahir (Readonly) -->
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $student->birth_place ?: '-' }}" disabled style="background-color: #f1f5f9; cursor: not-allowed; border: 1.5px solid #cbd5e1; border-radius: 6px; padding: 0.6rem 0.8rem; width: 100%; font-size: 0.9rem;">
                                </div>

                                <!-- Tanggal Lahir (Readonly) -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="{{ $student->birth_date ? $student->birth_date->format('d M Y') : '-' }}" disabled style="background-color: #f1f5f9; cursor: not-allowed; border: 1.5px solid #cbd5e1; border-radius: 6px; padding: 0.6rem 0.8rem; width: 100%; font-size: 0.9rem;">
                                </div>

                                <!-- NIK (Required) -->
                                <div class="form-group">
                                    <label for="nik">NIK (Nomor Induk Kependudukan) *</label>
                                    <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $student->nik) }}" required placeholder="Contoh: 2171xxxxxxxxxxxx" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    <span class="invalid-feedback-client">NIK wajib diisi dengan format angka 16 digit.</span>
                                    @error('nik')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin (Required) -->
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin *</label>
                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('gender', $student->gender) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('gender', $student->gender) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Jenis Kelamin.</span>
                                    @error('gender')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Agama (Required) -->
                                <div class="form-group">
                                    <label for="religion">Agama *</label>
                                    <select id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Islam" {{ old('religion', $student->religion) === 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('religion', $student->religion) === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('religion', $student->religion) === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('religion', $student->religion) === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('religion', $student->religion) === 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Khonghucu" {{ old('religion', $student->religion) === 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Agama.</span>
                                    @error('religion')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Handphone (Required) -->
                                <div class="form-group">
                                    <label for="phone">Nomor Handphone *</label>
                                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $student->phone) }}" required placeholder="Contoh: 08xxxxxxxxxx" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    <span class="invalid-feedback-client">Nomor Handphone wajib diisi.</span>
                                    @error('phone')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Jenis Tinggal (Required) -->
                                <div class="form-group">
                                    <label for="stay_type">Jenis Tinggal *</label>
                                    <select id="stay_type" name="stay_type" class="form-control @error('stay_type') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Jenis Tinggal --</option>
                                        <option value="Bersama Orang Tua" {{ old('stay_type', $student->stay_type) === 'Bersama Orang Tua' ? 'selected' : '' }}>Bersama Orang Tua</option>
                                        <option value="Wali" {{ old('stay_type', $student->stay_type) === 'Wali' ? 'selected' : '' }}>Wali</option>
                                        <option value="Kos" {{ old('stay_type', $student->stay_type) === 'Kos' ? 'selected' : '' }}>Kos</option>
                                        <option value="Asrama" {{ old('stay_type', $student->stay_type) === 'Asrama' ? 'selected' : '' }}>Asrama</option>
                                        <option value="Lainnya" {{ old('stay_type', $student->stay_type) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Jenis Tinggal.</span>
                                    @error('stay_type')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Kecamatan (Required) -->
                                <div class="form-group">
                                    <label for="district">Kecamatan *</label>
                                    <input type="text" id="district" name="district" class="form-control @error('district') is-invalid @enderror" value="{{ old('district', $student->district) }}" required placeholder="Contoh: Bukit Bestari">
                                    <span class="invalid-feedback-client">Kecamatan wajib diisi.</span>
                                    @error('district')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Kelurahan (Required) -->
                                <div class="form-group">
                                    <label for="subdistrict">Kelurahan *</label>
                                    <input type="text" id="subdistrict" name="subdistrict" class="form-control @error('subdistrict') is-invalid @enderror" value="{{ old('subdistrict', $student->subdistrict) }}" required placeholder="Contoh: Senggarang">
                                    <span class="invalid-feedback-client">Kelurahan wajib diisi.</span>
                                    @error('subdistrict')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Alamat (Required) -->
                            <div class="form-group" style="margin-bottom: 2rem;">
                                <label for="address">Alamat Lengkap Peserta Didik *</label>
                                <textarea id="address" name="address" rows="3" class="form-control @error('address') is-invalid @enderror" required placeholder="Contoh: Jl. Pemuda No. 12, RT 01/RW 03" style="resize: vertical;">{{ old('address', $student->address) }}</textarea>
                                <span class="invalid-feedback-client">Alamat Lengkap Peserta Didik wajib diisi.</span>
                                @error('address')
                                    <span class="invalid-feedback-server">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- B. DATA AYAH KANDUNG -->
                            <h4 style="font-size: 1.1rem; color: var(--primary-dark); border-bottom: 2.5px solid var(--primary-color); padding-bottom: 0.4rem; margin-bottom: 1.5rem; font-weight: 700;">
                                <i class="fa-solid fa-user-tie text-gold" style="margin-right: 0.5rem;"></i> B. Data Ayah Kandung
                            </h4>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label for="father_name">Nama Ayah Kandung *</label>
                                    <input type="text" id="father_name" name="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ old('father_name', $student->father_name) }}" required placeholder="Contoh: Bambang">
                                    <span class="invalid-feedback-client">Nama Ayah Kandung wajib diisi.</span>
                                    @error('father_name')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="father_education">Pendidikan Ayah *</label>
                                    <select id="father_education" name="father_education" class="form-control @error('father_education') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="-" {{ old('father_education', $student->father_education) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Putus SD" {{ old('father_education', $student->father_education) === 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                        <option value="SD" {{ old('father_education', $student->father_education) === 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('father_education', $student->father_education) === 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('father_education', $student->father_education) === 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="D3" {{ old('father_education', $student->father_education) === 'D3' ? 'selected' : '' }}>D3</option>
                                        <option value="S1" {{ old('father_education', $student->father_education) === 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ old('father_education', $student->father_education) === 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ old('father_education', $student->father_education) === 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Pendidikan Ayah.</span>
                                    @error('father_education')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="father_job">Pekerjaan Ayah *</label>
                                    <input type="text" id="father_job" name="father_job" class="form-control @error('father_job') is-invalid @enderror" value="{{ old('father_job', $student->father_job) }}" required placeholder="Contoh: Wiraswasta">
                                    <span class="invalid-feedback-client">Pekerjaan Ayah wajib diisi.</span>
                                    @error('father_job')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="father_income">Penghasilan Ayah *</label>
                                    <select id="father_income" name="father_income" class="form-control @error('father_income') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Penghasilan --</option>
                                        <option value="-" {{ old('father_income', $student->father_income) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Tidak Berpenghasilan" {{ old('father_income', $student->father_income) === 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                        <option value="Kurang dari Rp 500.000" {{ old('father_income', $student->father_income) === 'Kurang dari Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                                        <option value="Rp 500.000 – Rp 999.999" {{ old('father_income', $student->father_income) === 'Rp 500.000 – Rp 999.999' ? 'selected' : '' }}>Rp 500.000 – Rp 999.999</option>
                                        <option value="Rp 1.000.000 – Rp 1.999.999" {{ old('father_income', $student->father_income) === 'Rp 1.000.000 – Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 – Rp 1.999.999</option>
                                        <option value="Rp 2.000.000 – Rp 4.999.999" {{ old('father_income', $student->father_income) === 'Rp 2.000.000 – Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 – Rp 4.999.999</option>
                                        <option value="Rp 5.000.000 – Rp 20.000.000" {{ old('father_income', $student->father_income) === 'Rp 5.000.000 – Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 – Rp 20.000.000</option>
                                        <option value="Lebih dari Rp 20.000.000" {{ old('father_income', $student->father_income) === 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Penghasilan Ayah.</span>
                                    @error('father_income')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- C. DATA IBU KANDUNG -->
                            <h4 style="font-size: 1.1rem; color: var(--primary-dark); border-bottom: 2.5px solid var(--primary-color); padding-bottom: 0.4rem; margin-bottom: 1.5rem; font-weight: 700;">
                                <i class="fa-solid fa-user-group text-gold" style="margin-right: 0.5rem;"></i> C. Data Ibu Kandung
                            </h4>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label for="mother_name">Nama Ibu Kandung *</label>
                                    <input type="text" id="mother_name" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror" value="{{ old('mother_name', $student->mother_name) }}" required placeholder="Contoh: Aminah">
                                    <span class="invalid-feedback-client">Nama Ibu Kandung wajib diisi.</span>
                                    @error('mother_name')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mother_education">Pendidikan Ibu *</label>
                                    <select id="mother_education" name="mother_education" class="form-control @error('mother_education') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="-" {{ old('mother_education', $student->mother_education) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Putus SD" {{ old('mother_education', $student->mother_education) === 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                        <option value="SD" {{ old('mother_education', $student->mother_education) === 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('mother_education', $student->mother_education) === 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('mother_education', $student->mother_education) === 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="D3" {{ old('mother_education', $student->mother_education) === 'D3' ? 'selected' : '' }}>D3</option>
                                        <option value="S1" {{ old('mother_education', $student->mother_education) === 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ old('mother_education', $student->mother_education) === 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ old('mother_education', $student->mother_education) === 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Pendidikan Ibu.</span>
                                    @error('mother_education')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mother_job">Pekerjaan Ibu *</label>
                                    <input type="text" id="mother_job" name="mother_job" class="form-control @error('mother_job') is-invalid @enderror" value="{{ old('mother_job', $student->mother_job) }}" required placeholder="Contoh: Ibu Rumah Tangga">
                                    <span class="invalid-feedback-client">Pekerjaan Ibu wajib diisi.</span>
                                    @error('mother_job')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mother_income">Penghasilan Ibu *</label>
                                    <select id="mother_income" name="mother_income" class="form-control @error('mother_income') is-invalid @enderror" required style="background-color: #fff;">
                                        <option value="">-- Pilih Penghasilan --</option>
                                        <option value="-" {{ old('mother_income', $student->mother_income) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Tidak Berpenghasilan" {{ old('mother_income', $student->mother_income) === 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                        <option value="Kurang dari Rp 500.000" {{ old('mother_income', $student->mother_income) === 'Kurang dari Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                                        <option value="Rp 500.000 – Rp 999.999" {{ old('mother_income', $student->mother_income) === 'Rp 500.000 – Rp 999.999' ? 'selected' : '' }}>Rp 500.000 – Rp 999.999</option>
                                        <option value="Rp 1.000.000 – Rp 1.999.999" {{ old('mother_income', $student->mother_income) === 'Rp 1.000.000 – Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 – Rp 1.999.999</option>
                                        <option value="Rp 2.000.000 – Rp 4.999.999" {{ old('mother_income', $student->mother_income) === 'Rp 2.000.000 – Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 – Rp 4.999.999</option>
                                        <option value="Rp 5.000.000 – Rp 20.000.000" {{ old('mother_income', $student->mother_income) === 'Rp 5.000.000 – Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 – Rp 20.000.000</option>
                                        <option value="Lebih dari Rp 20.000.000" {{ old('mother_income', $student->mother_income) === 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan pilih Penghasilan Ibu.</span>
                                    @error('mother_income')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 2rem;">
                                <label for="parent_address">Alamat Orang Tua *</label>
                                <textarea id="parent_address" name="parent_address" rows="2" class="form-control @error('parent_address') is-invalid @enderror" required placeholder="Contoh: Jl. Pemuda No. 12, RT 01/RW 03" style="resize: vertical;">{{ old('parent_address', $student->parent_address ?: $student->address) }}</textarea>
                                <span class="invalid-feedback-client">Alamat Orang Tua wajib diisi.</span>
                                @error('parent_address')
                                    <span class="invalid-feedback-server">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- D. DATA WALI -->
                            <h4 style="font-size: 1.1rem; color: var(--primary-dark); border-bottom: 2.5px solid var(--primary-color); padding-bottom: 0.4rem; margin-bottom: 0.5rem; font-weight: 700;">
                                <i class="fa-solid fa-user-shield text-gold" style="margin-right: 0.5rem;"></i> D. Data Wali <span style="font-size: 0.8rem; font-weight: 400; color: var(--text-muted);">(Opsional)</span>
                            </h4>
                            <p style="font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1rem; font-style: italic;">Note: Kolom Data Wali <strong>tidak wajib diisi</strong>. Kosongkan saja jika tidak ada wali.</p>
                            
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label for="guardian_name">Nama Wali</label>
                                    <input type="text" id="guardian_name" name="guardian_name" class="form-control @error('guardian_name') is-invalid @enderror" value="{{ old('guardian_name', $student->guardian_name) }}" placeholder="Kosongkan jika tidak ada wali">
                                    @error('guardian_name')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guardian_education">Pendidikan Wali</label>
                                    <select id="guardian_education" name="guardian_education" class="form-control @error('guardian_education') is-invalid @enderror" style="background-color: #fff;">
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="-" {{ old('guardian_education', $student->guardian_education) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Putus SD" {{ old('guardian_education', $student->guardian_education) === 'Putus SD' ? 'selected' : '' }}>Putus SD</option>
                                        <option value="SD" {{ old('guardian_education', $student->guardian_education) === 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('guardian_education', $student->guardian_education) === 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('guardian_education', $student->guardian_education) === 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="D3" {{ old('guardian_education', $student->guardian_education) === 'D3' ? 'selected' : '' }}>D3</option>
                                        <option value="S1" {{ old('guardian_education', $student->guardian_education) === 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ old('guardian_education', $student->guardian_education) === 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ old('guardian_education', $student->guardian_education) === 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    @error('guardian_education')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guardian_job">Pekerjaan Wali</label>
                                    <input type="text" id="guardian_job" name="guardian_job" class="form-control @error('guardian_job') is-invalid @enderror" value="{{ old('guardian_job', $student->guardian_job) }}" placeholder="Kosongkan jika tidak ada wali">
                                    @error('guardian_job')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guardian_income">Penghasilan Wali</label>
                                    <select id="guardian_income" name="guardian_income" class="form-control @error('guardian_income') is-invalid @enderror" style="background-color: #fff;">
                                        <option value="">-- Pilih Penghasilan --</option>
                                        <option value="-" {{ old('guardian_income', $student->guardian_income) === '-' ? 'selected' : '' }}>-</option>
                                        <option value="Tidak Berpenghasilan" {{ old('guardian_income', $student->guardian_income) === 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                        <option value="Kurang dari Rp 500.000" {{ old('guardian_income', $student->guardian_income) === 'Kurang dari Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                                        <option value="Rp 500.000 – Rp 999.999" {{ old('guardian_income', $student->guardian_income) === 'Rp 500.000 – Rp 999.999' ? 'selected' : '' }}>Rp 500.000 – Rp 999.999</option>
                                        <option value="Rp 1.000.000 – Rp 1.999.999" {{ old('guardian_income', $student->guardian_income) === 'Rp 1.000.000 – Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 – Rp 1.999.999</option>
                                        <option value="Rp 2.000.000 – Rp 4.999.999" {{ old('guardian_income', $student->guardian_income) === 'Rp 2.000.000 – Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 – Rp 4.999.999</option>
                                        <option value="Rp 5.000.000 – Rp 20.000.000" {{ old('guardian_income', $student->guardian_income) === 'Rp 5.000.000 – Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 – Rp 20.000.000</option>
                                        <option value="Lebih dari Rp 20.000.000" {{ old('guardian_income', $student->guardian_income) === 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                    </select>
                                    @error('guardian_income')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 2rem;">
                                <label for="guardian_address">Alamat Wali</label>
                                <textarea id="guardian_address" name="guardian_address" rows="2" class="form-control @error('guardian_address') is-invalid @enderror" placeholder="Kosongkan jika tidak ada wali" style="resize: vertical;">{{ old('guardian_address', $student->guardian_address) }}</textarea>
                                @error('guardian_address')
                                    <span class="invalid-feedback-server">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- E. DATA PROGRAM BANTUAN -->
                            <h4 style="font-size: 1.1rem; color: var(--primary-dark); border-bottom: 2.5px solid var(--primary-color); padding-bottom: 0.4rem; margin-bottom: 1.5rem; font-weight: 700;">
                                <i class="fa-solid fa-hand-holding-hand text-gold" style="margin-right: 0.5rem;"></i> E. Data Program Bantuan
                            </h4>
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 2rem;">
                                <!-- KPS -->
                                <div class="form-group">
                                    <label for="is_kps">Apakah Penerima KPS? *</label>
                                    <select id="is_kps" name="is_kps" class="form-control @error('is_kps') is-invalid @enderror" required onchange="toggleKpsNumber(this.value)" style="background-color: #fff;">
                                        <option value="Tidak" {{ old('is_kps', $student->is_kps) === 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        <option value="Iya" {{ old('is_kps', $student->is_kps) === 'Iya' ? 'selected' : '' }}>Iya</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan tentukan status Penerima KPS.</span>
                                    @error('is_kps')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" id="kps-number-wrapper" style="display: {{ old('is_kps', $student->is_kps) === 'Iya' ? 'block' : 'none' }};">
                                    <label for="kps_number">Nomor Kartu Perlindungan Sosial (KPS) *</label>
                                    <input type="text" id="kps_number" name="kps_number" class="form-control @error('kps_number') is-invalid @enderror" value="{{ old('kps_number', $student->kps_number) }}" placeholder="Masukkan Nomor KPS">
                                    <span class="invalid-feedback-client">Nomor KPS wajib diisi jika Anda memilih Penerima KPS: Iya.</span>
                                    @error('kps_number')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- KIP -->
                                <div class="form-group">
                                    <label for="is_kip">Apakah Penerima KIP? (Kartu Indonesia Pintar) *</label>
                                    <select id="is_kip" name="is_kip" class="form-control @error('is_kip') is-invalid @enderror" required onchange="toggleKipNumber(this.value)" style="background-color: #fff;">
                                        <option value="Tidak" {{ old('is_kip', $student->is_kip) === 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        <option value="Iya" {{ old('is_kip', $student->is_kip) === 'Iya' ? 'selected' : '' }}>Iya</option>
                                    </select>
                                    <span class="invalid-feedback-client">Silakan tentukan status Penerima KIP.</span>
                                    @error('is_kip')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" id="kip-number-wrapper" style="display: {{ old('is_kip', $student->is_kip) === 'Iya' ? 'block' : 'none' }};">
                                    <label for="kip_number">Nomor Kartu Indonesia Pintar (KIP) *</label>
                                    <input type="text" id="kip_number" name="kip_number" class="form-control @error('kip_number') is-invalid @enderror" value="{{ old('kip_number', $student->kip_number) }}" placeholder="Masukkan Nomor KIP">
                                    <span class="invalid-feedback-client">Nomor KIP wajib diisi jika Anda memilih Penerima KIP: Iya.</span>
                                    @error('kip_number')
                                        <span class="invalid-feedback-server">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div style="border-top: 2px dashed #edf2f7; padding-top: 1.5rem; text-align: right; display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
                                <a href="{{ route('spmb.search') }}" class="btn-primary" style="background-color: #64748b; color: #fff; padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 8px; font-weight: 600;">
                                    <i class="fa-solid fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn-accent" style="padding: 0.75rem 2.5rem; border-radius: 8px; font-weight: 700; box-shadow: 0 4px 15px rgba(212,175,55,0.2); display: flex; align-items: center; gap: 0.5rem;">
                                    Simpan Biodata & Lanjutkan <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- SECTION 2: DOCUMENT UPLOAD FORM -->
                <div id="berkas-section" style="display: {{ $defaultTab === 'berkas' ? 'block' : 'none' }};">
                    <form action="{{ route('spmb.upload.submit', ['nisn' => $student->nisn]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="admin-card" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 2rem; display: flex; flex-direction: column; gap: 2rem;">
                            <h2 style="font-size: 1.3rem; color: var(--primary-dark); font-weight: 700; border-bottom: 2px solid #edf2f7; padding-bottom: 0.75rem; margin-bottom: 0.5rem;"><i class="fa-solid fa-cloud-arrow-up text-gold"></i> Formulir Unggah Dokumen Persyaratan</h2>
                            
                            <!-- 1. Kartu Keluarga (KK) -->
                            <div class="document-upload-row">
                                <div>
                                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block; margin-bottom: 0.25rem;">1. Kartu Keluarga (KK) *</label>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.75rem;">Unggah salinan berkas Kartu Keluarga Anda (PDF, Maks. 2MB)</p>
                                    <input type="file" name="kk_file" accept="application/pdf" class="form-control file-input" style="padding: 0.5rem;" onchange="validateSize(this)">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    @if($student->kk_path)
                                        <div style="text-align: center;">
                                            <div style="font-size: 2.2rem; color: #10b981; margin-bottom: 0.25rem;">
                                                <i class="fa-solid fa-file-shield"></i>
                                            </div>
                                            <div style="font-size: 0.75rem; color: #10b981; font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Sudah Diunggah</div>
                                        </div>
                                    @else
                                        <div style="font-size: 0.75rem; color: #d4af37; font-weight: 600; text-align: center; border: 1.5px dashed #e2e8f0; border-radius: 6px; padding: 1rem; width: 100%; max-width: 150px;">
                                            <i class="fa-solid fa-file-circle-exclamation" style="font-size: 1.5rem; margin-bottom: 0.25rem; display: block;"></i> Belum Diunggah
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- 2. Akta Kelahiran -->
                            <div class="document-upload-row">
                                <div>
                                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block; margin-bottom: 0.25rem;">2. Akta Kelahiran *</label>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.75rem;">Unggah salinan berkas Akta Kelahiran Anda (PDF, Maks. 2MB)</p>
                                    <input type="file" name="akta_file" accept="application/pdf" class="form-control file-input" style="padding: 0.5rem;" onchange="validateSize(this)">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    @if($student->akta_path)
                                        <div style="text-align: center;">
                                            <div style="font-size: 2.2rem; color: #10b981; margin-bottom: 0.25rem;">
                                                <i class="fa-solid fa-file-shield"></i>
                                            </div>
                                            <div style="font-size: 0.75rem; color: #10b981; font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Sudah Diunggah</div>
                                        </div>
                                    @else
                                        <div style="font-size: 0.75rem; color: #d4af37; font-weight: 600; text-align: center; border: 1.5px dashed #e2e8f0; border-radius: 6px; padding: 1rem; width: 100%; max-width: 150px;">
                                            <i class="fa-solid fa-file-circle-exclamation" style="font-size: 1.5rem; margin-bottom: 0.25rem; display: block;"></i> Belum Diunggah
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- 3. SKL (Surat Keterangan Kelulusan) -->
                            <div class="document-upload-row">
                                <div>
                                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block; margin-bottom: 0.25rem;">3. SKL (Surat Keterangan Kelulusan) *</label>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.75rem;">Unggah salinan berkas Surat Keterangan Kelulusan (SKL) Anda (PDF, Maks. 2MB)</p>
                                    <input type="file" name="photo_file" accept="application/pdf" class="form-control file-input" style="padding: 0.5rem;" onchange="validateSize(this)">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    @if($student->photo_path)
                                        <div style="text-align: center;">
                                            <div style="font-size: 2.2rem; color: #10b981; margin-bottom: 0.25rem;">
                                                <i class="fa-solid fa-file-shield"></i>
                                            </div>
                                            <div style="font-size: 0.75rem; color: #10b981; font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Sudah Diunggah</div>
                                        </div>
                                    @else
                                        <div style="font-size: 0.75rem; color: #d4af37; font-weight: 600; text-align: center; border: 1.5px dashed #e2e8f0; border-radius: 6px; padding: 1rem; width: 100%; max-width: 150px;">
                                            <i class="fa-solid fa-file-circle-exclamation" style="font-size: 1.5rem; margin-bottom: 0.25rem; display: block;"></i> Belum Diunggah
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- 4. Bukti Diterima SPMB -->
                            <div class="document-upload-row">
                                <div>
                                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block; margin-bottom: 0.25rem;">4. Bukti Diterima SPMB *</label>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.75rem;">Unggah Bukti Kelulusan/Penerimaan SPMB Anda (PDF, Maks. 2MB)</p>
                                    <input type="file" name="spmb_file" accept="application/pdf" class="form-control file-input" style="padding: 0.5rem;" onchange="validateSize(this)">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    @if($student->spmb_path)
                                        <div style="text-align: center;">
                                            <div style="font-size: 2.2rem; color: #10b981; margin-bottom: 0.25rem;">
                                                <i class="fa-solid fa-file-shield"></i>
                                            </div>
                                            <div style="font-size: 0.75rem; color: #10b981; font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Sudah Diunggah</div>
                                        </div>
                                    @else
                                        <div style="font-size: 0.75rem; color: #d4af37; font-weight: 600; text-align: center; border: 1.5px dashed #e2e8f0; border-radius: 6px; padding: 1rem; width: 100%; max-width: 150px;">
                                            <i class="fa-solid fa-file-circle-exclamation" style="font-size: 1.5rem; margin-bottom: 0.25rem; display: block;"></i> Belum Diunggah
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- 5. Surat Pernyataan -->
                            <div class="document-upload-row">
                                <div>
                                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block; margin-bottom: 0.25rem;">5. Surat Pernyataan Calon Siswa *</label>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.75rem;">Unggah berkas Surat Pernyataan yang telah ditandatangani basah (PDF, Maks. 2MB)</p>
                                    <input type="file" name="statement_file" accept="application/pdf" class="form-control file-input" style="padding: 0.5rem;" onchange="validateSize(this)">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    @if($student->statement_path)
                                        <div style="text-align: center;">
                                            <div style="font-size: 2.2rem; color: #10b981; margin-bottom: 0.25rem;">
                                                <i class="fa-solid fa-file-shield"></i>
                                            </div>
                                            <div style="font-size: 0.75rem; color: #10b981; font-weight: 600;"><i class="fa-solid fa-circle-check"></i> Sudah Diunggah</div>
                                        </div>
                                    @else
                                        <div style="font-size: 0.75rem; color: #d4af37; font-weight: 600; text-align: center; border: 1.5px dashed #e2e8f0; border-radius: 6px; padding: 1rem; width: 100%; max-width: 150px;">
                                            <i class="fa-solid fa-file-circle-exclamation" style="font-size: 1.5rem; margin-bottom: 0.25rem; display: block;"></i> Belum Diunggah
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="spmb-actions" style="border-top: 2px dashed #edf2f7; padding-top: 1.5rem; display: flex; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
                                <button type="button" onclick="switchTab('biodata')" class="btn-primary" style="background-color: #64748b; color: #fff; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; border: none;">
                                    <i class="fa-solid fa-arrow-left"></i> Edit Biodata
                                </button>
                                <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                                    @if($student->allow_edit)
                                        <button type="submit" form="lock-form" class="btn-primary" style="background-color: #10b981; color: #fff; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 700; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.15);">
                                            <i class="fa-solid fa-lock"></i> Selesai Perbaikan & Kunci Data
                                        </button>
                                    @endif
                                    <button type="submit" class="btn-accent" style="padding: 0.75rem 2rem; border-radius: 8px; font-weight: 700; box-shadow: 0 4px 15px rgba(212,175,55,0.15); display: flex; align-items: center; gap: 0.5rem;">
                                        Unggah Dokumen <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            
        </div>
    </section>

    <script>
        // Client-side validation for file size (max 2MB) and type (PDF)
        function validateSize(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const fileSize = file.size / 1024 / 1024; // in MB
                const fileType = file.type;

                if (fileType !== 'application/pdf') {
                    alert("Berkas harus berupa PDF!");
                    input.value = ''; // clear input
                    return;
                }

                if (fileSize > 2) {
                    alert("Ukuran berkas melebihi batas maksimal 2MB! Silakan pilih berkas PDF lain yang berukuran lebih kecil.");
                    input.value = ''; // clear input
                }
            }
        }

        // Tab Switching function
        function switchTab(tabName) {
            const tabBiodata = document.getElementById('tab-biodata');
            const tabBerkas = document.getElementById('tab-berkas');
            const biodataSection = document.getElementById('biodata-section');
            const berkasSection = document.getElementById('berkas-section');

            if (tabName === 'biodata') {
                tabBiodata.classList.add('active');
                tabBerkas.classList.remove('active');
                biodataSection.style.display = 'block';
                berkasSection.style.display = 'none';
            } else if (tabName === 'berkas') {
                if (tabBerkas.hasAttribute('disabled')) {
                    alert('Silakan isi dan simpan biodata Anda terlebih dahulu.');
                    return;
                }
                tabBiodata.classList.remove('active');
                tabBerkas.classList.add('active');
                biodataSection.style.display = 'none';
                berkasSection.style.display = 'block';
            }
        }

        // Toggle KPS Number wrapper and required validation
        function toggleKpsNumber(val) {
            const wrapper = document.getElementById('kps-number-wrapper');
            const input = document.getElementById('kps_number');
            if (!wrapper || !input) return;
            if (val === 'Iya') {
                wrapper.style.display = 'block';
                input.setAttribute('required', 'required');
            } else {
                wrapper.style.display = 'none';
                input.removeAttribute('required');
                input.value = '';
            }
        }

        // Toggle KIP Number wrapper and required validation
        function toggleKipNumber(val) {
            const wrapper = document.getElementById('kip-number-wrapper');
            const input = document.getElementById('kip_number');
            if (!wrapper || !input) return;
            if (val === 'Iya') {
                wrapper.style.display = 'block';
                input.setAttribute('required', 'required');
            } else {
                wrapper.style.display = 'none';
                input.removeAttribute('required');
                input.value = '';
            }
        }

        // Initialize on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {
            const isKpsSelect = document.getElementById('is_kps');
            const isKipSelect = document.getElementById('is_kip');
            if (isKpsSelect) {
                toggleKpsNumber(isKpsSelect.value);
            }
            if (isKipSelect) {
                toggleKipNumber(isKipSelect.value);
            }

            // Client-side HTML5 visual validation styling on submit
            const biodataForm = document.querySelector('#biodata-section form');
            if (biodataForm) {
                biodataForm.addEventListener('submit', function(event) {
                    if (!biodataForm.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();

                        // Focus on the first invalid field
                        const firstInvalid = biodataForm.querySelector(':invalid');
                        if (firstInvalid) {
                            firstInvalid.focus();
                        }
                    }
                    biodataForm.classList.add('was-validated');
                }, false);
            }
        });
    </script>

@endsection
