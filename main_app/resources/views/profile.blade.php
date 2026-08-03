@extends('layouts.app')

@section('title', 'Profil SMAN 1 Tanjungpinang – Sejarah, Visi & Misi')

@section('content')

    <!-- Profile Hero Section -->
    <section class="profile-hero">
        <div class="container">
            <h1>Profil Sekolah</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <a href="#">Profil</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">
                    @if($tab === 'sejarah') Sejarah Singkat
                    @elseif($tab === 'potensi') Keadaan & Potensi
                    @elseif($tab === 'visimisi') Visi & Misi
                    @elseif($tab === 'target') Tujuan & Target
                    @elseif($tab === 'sasaran') Sasaran Program
                    @elseif($tab === 'motto') Motto Sekolah
                    @endif
                </span>
            </div>
        </div>
    </section>

    <!-- Profile Multi-Tab Layout -->
    <section class="container">
        <div class="profile-layout">
            <!-- Sticky Sidebar Menu -->
            <aside class="profile-sidebar">
                <div class="profile-tabs">
                    <button class="profile-tab-btn {{ $tab === 'sejarah' ? 'active' : '' }}" data-tab="sejarah">
                        Sejarah Singkat <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <button class="profile-tab-btn {{ $tab === 'potensi' ? 'active' : '' }}" data-tab="potensi">
                        Keadaan & Potensi <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <button class="profile-tab-btn {{ $tab === 'visimisi' ? 'active' : '' }}" data-tab="visimisi">
                        Visi & Misi <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <button class="profile-tab-btn {{ $tab === 'target' ? 'active' : '' }}" data-tab="target">
                        Tujuan & Target <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <button class="profile-tab-btn {{ $tab === 'sasaran' ? 'active' : '' }}" data-tab="sasaran">
                        Sasaran Program <i class="fa-solid fa-angle-right"></i>
                    </button>
                    <button class="profile-tab-btn {{ $tab === 'motto' ? 'active' : '' }}" data-tab="motto">
                        Motto Sekolah <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </aside>

            <!-- Card Content Wrapper -->
            <div class="profile-content-card">
                               <!-- Tab Content 1: Sejarah Singkat -->
                <div id="sejarah" class="profile-tab-content {{ $tab === 'sejarah' ? 'active' : '' }}">
                    <h2>Sejarah SMA Negeri 1 Tanjungpinang</h2>
                    
                    <h3 style="color: var(--primary-color); margin-top: 1.5rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-book-open"></i> PENDAHULUAN</h3>
                    <p style="text-align: justify; margin-bottom: 1rem; line-height: 1.6;">
                        SMA Negeri 1 Tanjungpinang terletak di Jl. dr. Soetomo Kelurahan Bukit Cermin Kecamatan Tanjungpinang Barat , Kota Tanjungpinang Provinsi Kepulauan Riau. Sekolah ini merupakan sekolah tertua di Provinsi Kepulauan Riau yang didirikan pada bulan 16 Agustus 1956, satu tahun sebelum Provinsi Riau terbentuk berdasarakan UU darurat tanggal 9 Agustus 1957 dimana sebelumnya Provinsi Riau bergabung dalam Provinsi Sumatera Tengah ( Sumbar, Riau dan Jambi ) dan saat itu Kepulauan Riau adalah sebuah Kabupaten yang berada di wilayah Provinsi Riau. Berdasarkan Undang Undang Nomor 25 tahun 2002 Kabupaten Kepulauan Riau memisahkan diri dari Provinsi Riau membentuk Provinsi sendiri Provinsi Kepulauan Riau dimana wilayahnya merupakan wilayah bekas Kabupaten Kepulauan Riau.
                    </p>
                    <p style="text-align: justify; margin-bottom: 1.5rem; line-height: 1.6;">
                        Pada awal berdirinya sebelum bangunan sekolah didirikan di jalan dr. Soetomo sekolah ini diselenggarakan dengan menumpang SD Negeri 6 Tanjungpinang yang beralamatkkan di Jl. MT Haryono Km 3,5 Tanjungpinang pada siang hingga sore hari setelah selesai digunakan oleh sekolah dasar dan diberi nama SMA Negeri Tanjungpinang dengan Jurusan A (Ilmu Bahasa), B ( Ilmu Pasti Alam) dan Jurusan C ( Ilmu Sosial Budaya ) dengan jumlah murid sebanyak 70 orang yang terbagi dalam 4 rombongan belajar. Pada tahun 1958 SMA Negeri Tanjungpinang mulai menempati gedung barunya di Jalan dr. Soetomo dengan jumlah ruang sebanyak 6 ruang yang terdiri dari Ruang Kepala Sekolah dan TU, Ruang Majelis Guru dan 4 Ruang belajar. Seiring bertambahnya SMA di Tanjungpinag maka Pada Tahun 1979 SMA Negeri Tanjungpinang berubah nama menjadi SMA Negeri 1 Tanjungpinang.
                    </p>

                    <h3 style="color: var(--primary-color); margin-top: 2rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-diagram-project"></i> PELAKSANA PROGRAM</h3>
                    <p style="text-align: justify; margin-bottom: 1rem; line-height: 1.6;">
                        Dalam perkembanganya SMA Negeri 1 Tanjungpinang tumbuh menjadi sekolah yang diminati oleh masyarakat Kepulauan Riau dengan akreditasi A ( Amat Baik ), sehingga Pemerintah melalui Kementerian Pendidikan dan Kebudayaan seringkali menitipkan program-program yang harus dilaksanakan oleh SMA Negeri 1 Tanjungpinang sebagai program rintisan pemerintah sebelum program-program itu di kembangkan pada sekolah sekolah imbas lainya. Beberapa Program yang pernah dilaksanakan SMA Negeri 1 Tanjungpinang antara lain :
                    </p>
                    <ul style="padding-left: 1.5rem; margin-bottom: 2rem; list-style-type: decimal; line-height: 1.6;">
                        <li style="margin-bottom: 0.75rem; text-align: justify;">SMA( Sekolah Menengah Atas ) Binaan Khusus didasarkan pada Surat Keputusan Kepala Kantor Wilayah Departemen Pendidikan Provinsi Riau Nomor : 12/KPTS/KEP/P-1995 tanggal 8 Maret 1995.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">SMU ( Sekolah Menengah Umum ) Binaan Khusus didasarkan pada Surat Keputusan Kepala Kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Riau nomor: 01439/I09.B2/A8-1996 tanggal 7 Februari 1996 dengan 21 rombongan belajar masing masing angkatan 7 rombel dengan jumlah murid 860 siswa hingga Tahun Pelajaran 1999/2000.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">Seiring dengan bertambahnya waktu berdasar, Unadang-undang nomor 5 Tahun 2001 tentang Pembentukan Kota Tanjungpinang . Pemerintah Kota Tanjungpinang melalui Dinas Pendidikan Nasional kembali menetapkan SMA Binaan Khusus berdasarkan Surat Keputusan Kepala Dinas Pendidikan Nasional Kota Tanjungpinang Nomor : 132 Tahun 2006 tanggal 2 Mei 2006, dengan 18 rombongan belajar jumlah murid 742 orang.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">Sekolah Rintisan Bertaraf Internasional (RSBI) berdasarkan Surat Keputusan Direktorat Pembinaan SMA Departeman Pendidikan dan Kebudayaan Republik Indonesia nomor : 697/C4/MN/2007 tanggal 18 Juli 2007 dengan rombongan belajar 18 dan jumlah siswa 758 orang.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">Sekolah Rintisan Pelaksana Kurikulum 2013 berdasarkan Surat Keputusan Direktorat Pembinaan SMA Departeman pendidikan dan kebudayaan Republik Indonesia nomor : 697/C4/MN/2007 tanggal 18 Juli 2007 dengan rombongan belajar 27 dan jumlah siswa 914 orang.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">Sekolah Kewirausahaan berdasarkan Surat Keputusan Direktorat Pembinaan SMA Kementerian Pendidikan dan Kebudayaan Republik Indonesia nomor : 2698/D4/TU/2016 tanggal 12 Juli 2016 Tahun 2016 – 2017 dengan rombongan belajar 28 dan jumlah siswa 980 orang.</li>
                        <li style="margin-bottom: 0.75rem; text-align: justify;">Sekolah Rujukan berdasarkan Surat Keputusan Direktorat Pembinaan SMA Kementerian Pendidikan dan Kebudayaan Republik Indonesia nomor : 2876/D4/TU/2018 tanggal 3 April 2018 dengan rombongan belajar 29 dan jumlah siswa 1147 orang.</li>
                    </ul>

                    <h3 style="color: var(--primary-color); margin-top: 2rem; margin-bottom: 1rem;"><i class="fa-solid fa-user-tie"></i> KEPALA SEKOLAH</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6;">Kepala sekolah yang pernah menjabat di SMA Negeri 1 Tanjungpinang antara lain :</p>
                    
                    <div style="background-color: rgba(11, 99, 197, 0.02); border: 1px solid rgba(11, 99, 197, 0.08); border-radius: 12px; padding: 1.5rem; max-height: 400px; overflow-y: auto;">
                        <ul style="padding-left: 1.5rem; line-height: 1.8; list-style-type: decimal;">
                            <li style="margin-bottom: 0.5rem; text-align: justify;">HERKOESOEMO, Kepala sekolah pertama yang memimpin SMA Negeri Tanjungpinang dari Tahun 1956 sampai dengan tahun 1960.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">MUHAMMAD HOLIL, Kepala sekolah Kedua yang memimpin SMA Negeri Tanjungpinang dari Tahun 1960 sampai dengan tahun 1961.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">REDWAN HEPPI, Kepala sekolah Ketiga yang memimpin SMA Negeri Tanjungpinang dari Tahun 1961 sampai dengan tahun 1962</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">DJADJULI, Kepala sekolah Keempat yang memimpin SMA Negeri Tanjungpinang dari Tahun 1962 sampai dengan tahun 1967.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">G.P SAGALA, Kepala sekolah Kelima yang memimpin SMA Negeri Tanjungpinang hingga berubah menjadi SMA Negeri 1 Tanjungpinang dari Tahun 1967 sampai dengan tahun 1982,</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">SYAIFUL AZIM, BA , Kepala sekolah Keenam yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 1982 sampai dengan tahun 1985.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">Drs. ABDUL RAHMAN , Kepala sekolah Ketujuh yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 1985 sampai dengan tahun 1989.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">ZAKIR ZEN , Kepala sekolah Kedelapan yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 1989 sampai dengan tahun 1991</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">ABUBAKAR MATERANG, BA , Kepala sekolah Kesembilan yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 1991 sampai dengan tahun 1998.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">MOHAMMAD YUSUF ACHMAD, BA , Kepala sekolah Kesepuluh yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 1998 sampai dengan tahun 2004.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">ELFIZAH , Kepala sekolah Kesebelas yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 2004 sampai dengan tahun 2008.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">Drs. ENCIK ABDUL HAJAR, MM , Kepala sekolah Keduabelas yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 2008 sampai dengan tahun 2013.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">Dr. IMAM SYAFII, S.Pd, M.Si , Kepala sekolah Ketigabelas yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 2013 sampai dengan 2024.</li>
                            <li style="margin-bottom: 0.5rem; text-align: justify;">DAMAN HURI, S.Pd.Kim., M.M. ,Kepala Sekolah Keempatbelas yang memimpin SMA Negeri 1 Tanjungpinang dari Tahun 2024 sampai dengan sekarang.</li>
                        </ul>
                    </div>
                </div>

                <!-- Tab Content 2: Keadaan & Potensi -->
                <div id="potensi" class="profile-tab-content {{ $tab === 'potensi' ? 'active' : '' }}">
                    <h2>Keadaan & Potensi Sekolah</h2>
                    
                    <p style="text-align: justify; margin-bottom: 1.25rem; line-height: 1.6;">
                        SMA Negeri 1 Tanjungpinang yang merupakan SMA Rinstisan Bertaraf Internasional Wilayahnya termasuk de dalam Wilayah Kota tanjungpinang. Pulau Bintan dikenal sebagai Kawasan ZES (Kawasan Ekonomi Khusus) yang berada di kawasan Singapore, Johor/Malaysia. Sebagian pulau-pulau tersebut sudah dihuni sejak lama dan dikembangkan sebagai daerah Industri dan objek rekreasi pariwisata Internasional.
                    </p>
                    <p style="text-align: justify; margin-bottom: 1.25rem; line-height: 1.6;">
                        SMA Negeri 1 Tanjungpinang berdiri di kawasan kota, dimana terletak di daerah Kecamatan Tanjungpinang Barat serta Kelurahan Kampung Baru yang sekarang sudah dimekarkan menjadi Kelurahan Bukit Cermin Kota Tanjungpinang merupakan Wilayah Pemekaran kabupaten Kepulauan Riau. Wilayahnya merupakan pusat administrasi dan pemerintahan Provinsi Kepulauan Riau. Tata tempat tinggal dan sanitasi kota tanjungpinang cukup baik sedangkan sarana dan prasarana cukup memadai mulai dari mesjid, rumah sakit, sekolah, dermaga, tempat pelelangan ikan (TPI), Kawasan industri manufacture dan industri wisata bertaraf Internasional.
                    </p>
                    <p style="text-align: justify; margin-bottom: 1.25rem; line-height: 1.6;">
                        Untuk pengembangan wilayah, transportasi laut memang sangat strategis dan dibutuhkan, namun sarana ini relatif mahal namun cukup memadai. Kondisi jalan darat burupa jalan protokol provinsi yang kedepannya akan dibangun jembatan penghubung Pulau Bintan dan Batam.
                    </p>
                    <p style="text-align: justify; margin-bottom: 1.5rem; line-height: 1.6;">
                        Adapun potensi daerah yang paling menonjol dari kota Tanjungpinang yang terletak di pulau Bintan ini adalah potensi sumber daya kepariwisataannya, seperti situs-situs sejarah kerajaan Melayu di Pulau Penyengat dan sekitarnya, keindahan alam pantai Trikora dan Lagoi. Tanjungpinang merupakan kota dengan dinamika pertumbuhan ekonomi yang sangat pesat dan menjadi salah satu kota tujuan wisata dalam dan luar negeri.
                    </p>
                </div>

                <!-- Tab Content 3: Visi & Misi -->
                <div id="visimisi" class="profile-tab-content {{ $tab === 'visimisi' ? 'active' : '' }}">
                    <h2>Visi & Misi Sekolah</h2>
                    
                    <div style="background-color: rgba(11, 99, 197, 0.03); border-left: 5px solid var(--accent-color); padding: 1.5rem 2rem; border-radius: 12px; margin-bottom: 2.5rem; box-shadow: 0 4px 15px rgba(11, 99, 197, 0.02);">
                        <h3 style="margin-top: 0; color: var(--primary-dark); font-size: 1.3rem;">VISI SMA Negeri 1 Tanjungpinang</h3>
                        <p style="font-size: 1.2rem; font-style: italic; font-weight: 600; color: var(--primary-color); line-height: 1.6; margin-bottom: 0; text-align: justify;">
                            "Menjadi sekolah Adhiwiyata Mandiri , Sehat, Unggul dalam Disiplin dan Prestasi, Berwawasan IMTAQ, IPTEK dan Seni, Bersendikan Karakter Budaya Bangsa."
                        </p>
                    </div>

                    <h3 style="color: var(--primary-dark); margin-bottom: 1rem;">MISI SMA Negeri 1 Tanjungpinang</h3>
                    <ol style="padding-left: 1.5rem; line-height: 1.8; margin-bottom: 2rem; list-style-type: decimal;">
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan Keimanan dan Ketaqwaan terhadap Tuhan Yang Maha Esa.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan Wawasan kebangsaan dan cinta tanah air.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan karakter kemandirian, kerja keras dan kepemimpinan.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Memperkaya Kurikulum Berwawasan Lingkungan dengan Budaya Karakter Bangsa yang berbasis pada Kearifan Lokal Budaya Melayu.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Mengembangkan kultur sekolah yang disiplin, agamais dan melalui penerapan budaya 5 S ( Senyum, Sapa , Salam, Sopan dan Santun ).</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Mengembangkan sistem pembelajaran yang kondusif, kreatif, dinamis dan menyenangkan yang berbasis pada Teknologi Informasi.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Menghasilkan lulusan yang berkualitas dan mampu bersaing pada perguruan tinggi terkemuka serta dapat memenuhi kebutuhan masyarakat.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Mengembangkan kultur sekolah yang menerapkan aksi 3P (Penampilan, Pelayanan dan Prestasi.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Mengembangkan potensi minat dan bakat siswa melalui kegiatan ekstrakurikuler dan ko kurikuler.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan budaya 7K (Kebersihan, Keindahan, Kenyamanan, keterlibatan, Kerindangan, Kesehatan dan Keamanan) menuju Sekolah Adiwiyata Mandiri.</li>
                    </ol>
                </div>

                <!-- Tab Content 4: Tujuan & Target -->
                <div id="target" class="profile-tab-content {{ $tab === 'target' ? 'active' : '' }}">
                    <h2>Tujuan & Target Strategis</h2>
                    
                    <h3 style="color: var(--primary-color); margin-top: 1.5rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-bullseye"></i> TUJUAN SEKOLAH</h3>
                    <ol style="padding-left: 1.5rem; margin-bottom: 2.5rem; list-style-type: decimal; line-height: 1.8;">
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Menyediakan sarana prasarana pendidikan yang memadai.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Melaksanakan proses belajar mengajar secara efektif dan efisien, berdasarkan semangat kearifan lokal dan global.</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan kinerja masing-masing komponen sekolah (Kepala sekolah, guru, karyawan, peserta didik, dan komite sekolah) untuk bersama-sama melaksanakan kegiatan yang inovatif sesuai dengan Tugas Pokok dan Fungsi (TUPOKSI) masing-masing;</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan program ekstrakurikuler agar lebih efektif dan efisien sesuai dengan bakat dan minat peserta didik sebagai salah satu sarana pengembangan diri peserta didik;</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Mewujudkan peningkatkan kualitas dan jumlah tamatan yang melanjutkan ke perguruan tinggi;</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Melaksanakan tata tertib dan segala ketentuan yang mengatur operasional warga sekolah;</li>
                        <li style="margin-bottom: 0.5rem; text-align: justify;">Meningkatkan kualitas semua Sumber Daya Manusia baik guru, karyawan dan peserta didik yang dapat berkompetisi baik lokal maupun global.</li>
                    </ol>

                    <h3 style="color: var(--primary-color); margin-top: 2rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-circle-check"></i> TARGET SEKOLAH</h3>
                    <p style="margin-bottom: 0.5rem; line-height: 1.6;">Target SMA Negeri 1 Tanjungpinang sebagai berikut:</p>
                    <div style="background-color: rgba(212, 175, 55, 0.05); border-left: 5px solid var(--accent-color); padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
                        <span style="font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; letter-spacing: 0.5px;">
                            PENINGKATAN 3 P (PENAMPILAN, PELAYANAN DAN PRESTASI)
                        </span>
                    </div>

                    <h3 style="color: var(--primary-color); margin-top: 2rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-table"></i> SASARAN & TARGET KINERJA</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6;">Berikut adalah rincian Sasaran Kinerja Sekolah dan Target Capaian di SMA Negeri 1 Tanjungpinang:</p>

                    <div class="responsive-table-container">
                        <table class="responsive-table stack-on-mobile">
                            <thead>
                                <tr>
                                    <th style="width: 60px; text-align: center;">No</th>
                                    <th>Sasaran Kinerja Sekolah</th>
                                    <th style="width: 250px;">Target Capaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="No" class="col-no text-center">1</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan pemahaman dan keterampilan seluruh warga sekolah terhadap 8 Standar Nasional Pendidikan (SNP) dan implementasinya dalam proses pendidikan di sekolah.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">100% Pemahaman & Implementasi 8 SNP</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">2</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan perolehan hasil belajar peserta didik, baik untuk KKM mata pelajaran maupun perolehan nilai Ujian Nasional.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Minimal mencapai 85%</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">3</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan disiplin seluruh warga sekolah (guru, tata usaha, karyawan lainnya, serta peserta didik) ditandai dengan terciptanya 7K dan kehadiran tinggi.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Tingkat Kehadiran &ge; 95% dan Budaya 7K</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">4</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan partisipasi masyarakat dan orang tua (dukungan moril maupun materiil).</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Kehadiran Rapat Komite &ge; 94%</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">5</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Pemeliharaan sarana gedung dan sarana penunjang lainnya secara optimal.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Mencapai 93% dari Kebutuhan Sekolah</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">6</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan mutu proses pembelajaran.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Proses KBM Efektif & Kondusif</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">7</td>
                                    <td data-label="Sasaran Kinerja Sekolah" style="text-align: justify;">Peningkatan mutu dan jumlah lulusan yang diterima di Perguruan Tinggi terakreditasi.</td>
                                    <td data-label="Target Capaian"><span class="badge-category" style="background-color: rgba(212, 175, 55, 0.08); color: var(--primary-dark); border-color: rgba(212, 175, 55, 0.25);">Daya Saing Kelulusan PTN/PTS Meningkat</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab Content 5: Sasaran Program -->
                <div id="sasaran" class="profile-tab-content {{ $tab === 'sasaran' ? 'active' : '' }}">
                    <h2>Sasaran Program</h2>
                    
                    <p style="text-align: justify; margin-bottom: 1rem; line-height: 1.6;">
                        Kepala Sekolah dan Para Guru serta dengan persetujuan Komite Sekolah menetapkan sasaran program, baik untuk jangka pendek, jangka menengah, dan jangka panjang. Sasaran program dimaksudkan untuk mewujudkan visi dan misi sekolah.
                    </p>

                    <!-- Sasaran Program 3-Column Table -->
                    <div class="sasaran-table-card">
                        <div class="sasaran-table-header">
                            SASARAN PROGRAM
                        </div>
                        <div class="sasaran-table-grid">
                            <!-- Column 1: Jangka Pendek -->
                            <div class="sasaran-table-col">
                                <div class="sasaran-col-header">
                                    <div class="sasaran-title">SASARAN PROGRAM 1 TAHUN</div>
                                    <div class="sasaran-years">( 2008 / 2009 )</div>
                                    <div class="sasaran-type">(Program Jangka Pendek)</div>
                                </div>
                                <div class="sasaran-col-body">
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">1</span>
                                        <p class="sasaran-list-text">Terselenggaranya Rintisan SMA Bertaraf Internasional</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">2</span>
                                        <p class="sasaran-list-text">Tercapainya tingkat kelulusan 100%</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">3</span>
                                        <p class="sasaran-list-text">Lebih 90% Lulusan yang diterima di perguruan tinggi dalam dan luar negeri</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">4</span>
                                        <p class="sasaran-list-text">Sarana prasarana sekolah yang sesuai standar nasional Pendidikan</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">5</span>
                                        <p class="sasaran-list-text">Adanya sarana TIK</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Column 2: Jangka Menengah -->
                            <div class="sasaran-table-col">
                                <div class="sasaran-col-header">
                                    <div class="sasaran-title">SASARAN PROGRAM 4 TAHUN</div>
                                    <div class="sasaran-years">( 2007 / 2011 )</div>
                                    <div class="sasaran-type">(Program Jangka Menengah)</div>
                                </div>
                                <div class="sasaran-col-body">
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">1</span>
                                        <p class="sasaran-list-text">Terpenuhinya 8 Standar Nasional Pendidikan</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">2</span>
                                        <p class="sasaran-list-text">Menjadi SMA Bertaraf Internasional (SMA-BI)</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">3</span>
                                        <p class="sasaran-list-text">Meraih Medali dalam Olimpiade Sains tkt.Nasional</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">4</span>
                                        <p class="sasaran-list-text">Menjadi Sekolah Bertipe A</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">5</span>
                                        <p class="sasaran-list-text">Memiliki gedung sekolah yang lengkap dan berbasis TIK</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Column 3: Jangka Panjang -->
                            <div class="sasaran-table-col">
                                <div class="sasaran-col-header">
                                    <div class="sasaran-title">SASARAN PROGRAM 8 TAHUN</div>
                                    <div class="sasaran-years">( 2007 / 2015 )</div>
                                    <div class="sasaran-type">(Program Jangka Panjang)</div>
                                </div>
                                <div class="sasaran-col-body">
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">1</span>
                                        <p class="sasaran-list-text">Menjadi SMA Bertaraf Internasional</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">2</span>
                                        <p class="sasaran-list-text">Meraih medali pada Olimpiade Sains tkt. Nasional dan Intenasinal</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">3</span>
                                        <p class="sasaran-list-text">SMA bertipe A dengan akreditasi A</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">4</span>
                                        <p class="sasaran-list-text">Guru dan pegawai yang menguasai IPTEK dan mampu berbahasa Inggris</p>
                                    </div>
                                    <div class="sasaran-list-item">
                                        <span class="sasaran-list-num">5</span>
                                        <p class="sasaran-list-text">Sarana prasarana gedung sekolah yang lengkap dan berbasis TIK</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p style="text-align: justify; margin-bottom: 1.25rem; line-height: 1.6;">
                        Sasaran program tersebut selanjutnya ditindaklanjuti dengan strategi pelaksanaan yang wajib dilaksanakan oleh seluruh warga sekolah sebagai berikut :
                    </p>
                    
                    <h3 style="color: var(--primary-color); margin-top: 2rem; margin-bottom: 0.75rem;"><i class="fa-solid fa-table"></i> STRATEGI PELAKSANAAN</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6;">Berikut rincian strategi pelaksanaan program SMAN 1 Tanjungpinang untuk mewujudkan visi dan misi:</p>

                    <div class="responsive-table-container">
                        <table class="responsive-table stack-on-mobile">
                            <thead>
                                <tr>
                                    <th style="width: 60px; text-align: center;">No</th>
                                    <th>Strategi Pelaksanaan Sasaran Program</th>
                                    <th style="width: 250px;">Kategori / Bidang Terkait</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="No" class="col-no text-center">1</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Mengadakan pembinaan dan pelatihan berupa workshop terhadap peserta didik, guru dan karyawan secara berkelanjutan;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Peningkatan SDM</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">2</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Mengadakan jam tambahan pada pelajaran tertentu;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Akademik & Kurikulum</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">3</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Melakukan kerjasama dengan pihak kabupaten dan perusahaan yang ada di wilayah Prop.Kep.Riau untuk membantu pembiayaan bagi peserta didik yang mempunyai semangat dan motivasi yang tinggi untuk melanjutkan ke perguruan tinggi;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kerjasama & Pembiayaan</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">4</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Membentuk dan membina Tim Olimpiade Sains dan Matematika, Tim Cerdas Cermat Undang-Undang, Tim Karya Tulis Ilmiah dan Tim Teknologi Informatika (SMANSA Cyber Generation)</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kesiswaan & Prestasi</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">5</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Melengkapi sarana prasarana Teknologi Informatika, berupa Lab.Multimedia, Lab.Komputer, Pustaka Digital, Wireless Hotspot di lingkungan sekolah</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Sarana & Prasarana IT</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">6</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Memperbaiki dan melengkapi sarana lab. Fisika, Kimia, Biologi dan Bahasa</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Sarana Laboratorium</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">7</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Membentuk dan membina Tim Olahraga prestasi dan Tim Kesenian</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kesiswaan & Ekstrakurikuler</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">8</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Membentuk dan membinaTim Debat Bahasa Inggris;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kesiswaan & Prestasi</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">9</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Membentuk kelompok belajar;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Akademik & Pembelajaran</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">10</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Mengadakan buku penunjang dan buku Perpustakaan siswa</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Sarana & Pustaka</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">11</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Mengadakan Majalah Dinding Sekolah dan Majalah Sekolah;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kreativitas & Literasi</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">12</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Menciptakan lingkugan dan kultur sekolah yang ASRI , ramah dan kekeluargaan.</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Kultur & Lingkungan</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">13</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Mengintensifkan komunikasi dan kerjasama dengan orang tua;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Hubungan Masyarakat</span></td>
                                </tr>
                                <tr>
                                    <td data-label="No" class="col-no text-center">14</td>
                                    <td data-label="Strategi Pelaksanaan" style="text-align: justify;">Pelaporan kepada orang secara berkala;</td>
                                    <td data-label="Kategori / Bidang"><span class="badge-category">Transparansi & Akuntabilitas</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab Content 6: Motto & Budaya Sekolah -->
                <div id="motto" class="profile-tab-content {{ $tab === 'motto' ? 'active' : '' }}">
                    <h2>Motto Sekolah</h2>
                    
                    <!-- Motto 1 -->
                    <div style="background-color: rgba(11, 99, 197, 0.02); border: 1px solid rgba(11, 99, 197, 0.06); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem;">
                        <h4 style="color: var(--primary-color); margin-top: 0; margin-bottom: 0.5rem; font-size: 1.1rem; border-bottom: 1px solid rgba(11, 99, 197, 0.08); padding-bottom: 0.5rem;">
                            1. “CERGAS” CERDAS, ENERJIK, RELIGIUS, GLOBALISASI, AMANAH DAN SINERGI
                        </h4>
                        <p style="font-size: 0.95rem; color: var(--text-dark); margin-bottom: 0; text-align: justify; line-height: 1.6;">
                            Cerdas berarti bahwa para siswa dan alumni memiliki pengetahuan dan keterampilan yang dapat diandalkan. Enerjik berarti bahwa para siswa dan alumni memiliki kekuatan dan kesehatan jasmani didukung dengan prestasi olahraga. Religius berarti bahwa para siswa dan alumni memiliki keimanan dan ketaqwaan kepada Allah SWT, Tuhan Yang Maha Esa, rajin menjalankan ibadah sesuai dengan agama dan kepercayaannya masing-masing. Globalisasi maksudnya bahwa SMA Negeri 1 Tanjungpinang berusaha mengembangkan kultur dan pengembangan mutu sekolah sebagai sekolah Bertaraf Internasional sejalan dengan perkembangan global sehingga para lulusan akan dapat bersaing baik nasional maupun internasional. Amanah dimaksudkan bahwa para siswa mengikuti pendidikan di SMA Negeri 1 dalam rangka mengemban amanah dari orang tuan mereka khususnya agar mereka dapat lulus dari SMA Negeri 1 Tanjungpinang dengan hasil baik dan dapat melanjutkan ke perguruan tinggi yang ternama baik di dalam maupun luar negeri. Sinergi disini dimaksudkan bahwa SMA Negeri 1 Tanjungpinang mengembangkan budaya silaturrahim yang mesra antar sesama warga sekolah baik secara internal maupun eksternal sekolah.
                        </p>
                    </div>

                    <!-- Motto 2 -->
                    <div style="background-color: rgba(11, 99, 197, 0.02); border: 1px solid rgba(11, 99, 197, 0.06); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem;">
                        <h4 style="color: var(--primary-color); margin-top: 0; margin-bottom: 0.5rem; font-size: 1.1rem; border-bottom: 1px solid rgba(11, 99, 197, 0.08); padding-bottom: 0.5rem;">
                            2. CERDAS PENUH GAGASAN
                        </h4>
                        <p style="font-size: 0.95rem; color: var(--text-dark); margin-bottom: 0; text-align: justify; line-height: 1.6;">
                            Frase ini memaknai para pelajar dan lulusan SMA Negeri 1 Tanjungpinang yang cerdas memiliki keunggulan pengetahuan dan berdaya inovasi tinggi menjawab tuntutan global.
                        </p>
                    </div>

                    <!-- Motto 3 -->
                    <div style="background-color: rgba(11, 99, 197, 0.02); border: 1px solid rgba(11, 99, 197, 0.06); padding: 1.5rem; border-radius: 12px;">
                        <h4 style="color: var(--primary-color); margin-top: 0; margin-bottom: 0.5rem; font-size: 1.1rem; border-bottom: 1px solid rgba(11, 99, 197, 0.08); padding-bottom: 0.5rem;">
                            2. MAJU BERSAMA, HEBAT SEMUA
                        </h4>
                        <p style="font-size: 0.95rem; color: var(--text-dark); margin-bottom: 0; text-align: justify; line-height: 1.6;">
                            Siswa dan lulusan SMA Negeri 1 Tanjungpinang adalah sumberdaya manusia yang beradab dan terdidik andalan daerah kota Tanjungpinang khususnya dan Provinsi Kepulauan Riau pada umumnya dan merupakan asset daerah yang dapat bersaing di era globalisasi.
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection
