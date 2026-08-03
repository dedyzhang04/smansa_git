@extends('layouts.app')

@section('title', 'Pencarian Calon Siswa Baru (SPMB) – SMAN 1 Tanjungpinang')

@section('content')

    <!-- Hero Header -->
    <section class="profile-hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
        <div class="container">
            <h1>Sistem Penerimaan Murid Baru (SPMB)</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Unggah Berkas SPMB</span>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="container" style="padding: 5rem 2rem; display: flex; justify-content: center; align-items: center; min-height: 50vh;">
        <div style="width: 100%; max-width: 600px;">
            
            @if(Session::has('error'))
                <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239, 68, 68, 0.08); border-color: rgba(239, 68, 68, 0.15); color: #ef4444; padding: 1rem 1.25rem; border-radius: 8px; font-size: 0.9rem; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fa-solid fa-circle-exclamation" style="font-size: 1.1rem;"></i>
                    <span>{{ Session::get('error') }}</span>
                </div>
            @endif

            <div class="admin-card" style="box-shadow: 0 10px 30px rgba(0,0,0,0.08); border: 1px solid rgba(0, 80, 0, 0.05); border-radius: 16px; background-color: #fff; padding: 2.5rem;">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <i class="fa-solid fa-id-card-clip text-gold" style="font-size: 3.5rem; margin-bottom: 1rem;"></i>
                    <h2 style="font-size: 1.6rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem;">Cari Data Calon Siswa Baru</h2>
                    <p style="font-size: 0.9rem; color: var(--text-muted);">Masukkan 10 digit Nomor Induk Siswa Nasional (NISN) Anda untuk melakukan verifikasi data dan mengunggah berkas daftar ulang.</p>
                </div>

                <form action="{{ route('spmb.search.submit') }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="nisn" style="font-weight: 600; color: var(--primary-dark); font-size: 0.95rem; margin-bottom: 0.5rem; display: block;">NISN Calon Siswa *</label>
                        <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Contoh: 0092837482" required style="width: 100%; padding: 0.85rem 1.2rem; border-radius: 8px; border: 1.5px solid #e2e8f0; font-size: 1rem; transition: border-color 0.2s;" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>

                    <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; font-size: 1rem; padding: 0.9rem 1.5rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(212,175,55,0.2);">
                        Cari & Verifikasi Data <i class="fa-solid fa-magnifying-glass" style="margin-left: 0.5rem;"></i>
                    </button>
                </form>
            </div>

            <!-- Info Box -->
            <div style="margin-top: 3rem; background: rgba(0, 102, 68, 0.03); border-left: 4px solid var(--primary-color); border-radius: 4px 8px 8px 4px; padding: 1.5rem;">
                <h4 style="color: var(--primary-dark); font-weight: 700; margin-bottom: 0.75rem;"><i class="fa-solid fa-circle-info"></i> Berkas Persyaratan Yang Harus Disiapkan:</h4>
                <ul style="padding-left: 1.25rem; font-size: 0.85rem; color: var(--text-muted); line-height: 1.7;">
                    <li>Kartu Keluarga (KK) - *Format PNG/JPEG, Maks 2MB*</li>
                    <li>Akta Kelahiran - *Format PNG/JPEG, Maks 2MB*</li>
                    <li>SKL (Surat Keterangan Kelulusan) - *Format PNG/JPEG, Maks 2MB*</li>
                    <li>Bukti Diterima SPMB (Hasil Tangkapan Layar / PDF Kelulusan) - *Format PNG/JPEG, Maks 2MB*</li>
                    <li>Surat Pernyataan Calon Siswa (Template dapat diunduh di halaman berikutnya setelah NISN ditemukan) - *Format PNG/JPEG, Maks 2MB*</li>
                </ul>
                <p style="margin-top: 0.75rem; font-size: 0.8rem; color: var(--primary-dark); font-style: italic; font-weight: 500;">Catatan: Berkas yang diunggah akan otomatis dikompresi oleh sistem tanpa mengurangi tingkat keterbacaan dokumen.</p>
            </div>
            
        </div>
    </section>

@endsection
