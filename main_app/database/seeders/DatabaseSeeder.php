<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear existing records to prevent duplicates on re-seeding
        User::truncate();
        Article::truncate();
        Gallery::truncate();
        \App\Models\Setting::truncate();

        // 0. Seed Default Statistics Settings
        \App\Models\Setting::create(['key' => 'siswa_aktif', 'value' => '1250']);
        \App\Models\Setting::create(['key' => 'guru_staff', 'value' => '84']);
        \App\Models\Setting::create(['key' => 'ruang_kelas', 'value' => '36']);
        \App\Models\Setting::create(['key' => 'akreditasi', 'value' => 'A']);

        // 1. Create Default Admin User
        User::create([
            'name' => 'Administrator Humas',
            'email' => 'admin@sman1-tpi.sch.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // 1b. Create Sample Writer User
        User::create([
            'name' => 'Writer Humas',
            'email' => 'writer@sman1-tpi.sch.id',
            'password' => Hash::make('writer123'),
            'role' => 'writer',
        ]);

        // 2. Create Sample Articles
        $articles = [
            [
                'title' => 'Kolaborasi SMA Negeri 1 Tanjungpinang dan Ganesha Operation: Adakan Seminar “Revolusi Mengajar”',
                'category' => 'utama',
                'author' => 'Admin Humas',
                'content' => 'SMANSANEWS — Ganesha Operation kembali menunjukkan komitmennya dalam mendukung peningkatan kualitas pendidikan melalui penyelenggaraan Seminar “Revolusi Mengajar”. Kegiatan ini bertujuan untuk menumbuhkan semangat belajar, memperkenalkan teknik mengajar inovatif bagi para guru, serta memotivasi siswa untuk berprestasi lebih tinggi di kancah akademik maupun non-akademik.',
                'image' => '/images/slider_seminar.png',
                'published_at' => '2026-04-23 09:00:00',
                'is_featured' => true,
            ],
            [
                'title' => 'Seleksi FLS3N Cipta Lagu dan Instrumen Gitar Solo Kota Tanjungpinang Berjalan Sukses',
                'category' => 'utama',
                'author' => 'Admin Humas',
                'content' => 'SMANSANEWS — Kegiatan Seleksi Festival dan Lomba Seni Siswa Nasional (FLS3N) SMA sederajat tingkat Kota Tanjungpinang untuk cabang lomba gitar solo dan cipta lagu sukses diselenggarakan di aula utama SMAN 1 Tanjungpinang. Kegiatan ini dihadiri oleh puluhan peserta berbakat dari berbagai sekolah, yang menampilkan kreativitas seni tingkat tinggi. SMANSA berhasil menyabet gelar juara untuk kategori cipta lagu.',
                'image' => '/images/slider_guitar.png',
                'published_at' => '2026-04-23 10:30:00',
                'is_featured' => true,
            ],
            [
                'title' => '​Edukasi Bahaya Terorisme dari Densus 88 AT: Membekali Generasi Z dengan Kesadaran dan Benteng Diri',
                'category' => 'pendidikan',
                'author' => 'Admin Humas',
                'content' => 'SMANSANEWS – Setelah selesainya rangkaian acara edukasi yang diselenggarakan hari ini oleh tim Densus 88 Anti Teror, harapan besar tertuju pada masa depan generasi muda, khususnya Generasi Z di lingkungan SMAN 1 Tanjungpinang. Kegiatan ini bertujuan membekali para siswa dengan pemahaman yang tepat mengenai toleransi, kewaspadaan terhadap radikalisme digital, serta pentingnya menjaga persatuan NKRI.',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800&auto=format&fit=crop',
                'published_at' => '2026-04-23 14:15:00',
                'is_featured' => false,
            ],
            [
                'title' => 'SMA Negeri 1 Tanjungpinang Gelar Lebaran Antar-Kelas: Mempererat Ikatan Emosional Seluruh Warga Sekolah',
                'category' => 'utama',
                'author' => 'Sugeng Fitri Aji',
                'content' => '​SMANSANEWS – SMA Negeri 1 Tanjungpinang mengadakan apel pagi setelah libur panjang bulan Ramadhan. Kegiatan ini menandai kembalinya aktivitas sekolah, SMAN 1 Tanjungpinang (SMANSA) juga menggelar tradisi Lebaran Antar-Kelas. Setiap kelas menyajikan hidangan khas lebaran dan saling berkunjung untuk memupuk kebersamaan dan persaudaraan antarsiswa maupun guru.',
                'image' => '/images/slider_lebaran.png',
                'published_at' => '2026-03-31 08:30:00',
                'is_featured' => true,
            ],
            [
                'title' => 'Apel Pagi dan Halal Bihalal Jadi Momentum Saling Memaafkan dan Mempererat Silaturahmi',
                'category' => 'umum',
                'author' => 'Sugeng Fitri Aji',
                'content' => 'SMANSANEWS – SMA Negeri 1 Tanjungpinang menggelar kegiatan Apel Pagi yang dirangkaikan dengan Halal Bihalal sebagai momentum untuk mempererat silaturahmi serta memulai kembali aktivitas sekolah. Dalam suasana yang khidmat, Kepala Sekolah menyampaikan pesan agar semangat Ramadhan tetap dijaga dalam proses belajar-mengajar sehari-hari.',
                'image' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=800&auto=format&fit=crop',
                'published_at' => '2026-03-31 07:15:00',
                'is_featured' => false,
            ],
            [
                'title' => 'SISTEM PENERIMAAN MURID BARU (PPDB) TAHUN PELAJARAN 2025/2026',
                'category' => 'pendidikan',
                'author' => 'Widodo Aja',
                'content' => 'Informasi Resmi Penerimaan Peserta Didik Baru (PPDB) SMA Negeri 1 Tanjungpinang Tahun Ajaran 2025/2026 telah dibuka. Terdapat empat jalur utama penerimaan: Zonasi (50%), Prestasi (30%), Afirmasi (15%), dan Perpindahan Orang Tua (5%). Pendaftaran dilakukan sepenuhnya secara daring melalui portal PPDB Provinsi Kepulauan Riau.',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop',
                'published_at' => '2025-05-24 08:00:00',
                'is_featured' => false,
            ],
            [
                'title' => 'SMANSA Ramadan Berbagi: 200 Paket Sembako di Bagikan',
                'category' => 'umum',
                'author' => 'Admin Humas',
                'content' => 'SMANSANEWS – Kegiatan sosial “SMANSA Ramadan Berbagi 2026” yang diselenggarakan oleh OSIS SMA Negeri 1 Tanjungpinang sukses menyalurkan 200 paket sembako kepada warga sekitar sekolah and kaum dhuafa yang membutuhkan. Kegiatan ini didanai oleh sumbangan sukarela dari seluruh siswa, guru, dan staf komite sekolah.',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=800&auto=format&fit=crop',
                'published_at' => '2026-03-12 16:00:00',
                'is_featured' => false,
            ],
            [
                'title' => 'Bazar Kewirausahaan SMANSA 2018: Melatih Jiwa Kreatif Generasi Muda',
                'category' => 'iptek',
                'author' => 'Syawal',
                'content' => 'SMANSANEWS – Sebagai bentuk implementasi kurikulum kewirausahaan, siswa kelas XI SMAN 1 Tanjungpinang menggelar bazar produk kreatif. Produk-produk yang dipamerkan meliputi kuliner nusantara, kerajinan tangan daur ulang, serta aplikasi digital buatan siswa sendiri. Kegiatan ini melatih kemandirian dan jiwa bisnis siswa sejak dini.',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop',
                'published_at' => '2018-12-17 10:00:00',
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $art) {
            Article::create([
                'title' => $art['title'],
                'slug' => Str::slug($art['title']),
                'category' => $art['category'],
                'author' => $art['author'],
                'content' => $art['content'],
                'image' => $art['image'],
                'is_featured' => $art['is_featured'],
                'published_at' => $art['published_at'],
            ]);
        }

        // 3. Create Sample Galleries
        $galleries = [
            [
                'title' => 'Upacara Hari Pendidikan Nasional 2026',
                'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=800&auto=format&fit=crop',
                'category' => 'kegiatan',
            ],
            [
                'title' => 'Laboratorium Komputer SMANSA Unggulan',
                'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop',
                'category' => 'fasilitas',
            ],
            [
                'title' => 'Rapat Dinas Guru & Staff Kurikulum Merdeka',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop',
                'category' => 'kegiatan',
            ],
            [
                'title' => 'Kunjungan Studi Banding SMK Seri Kotaputri Malaysia',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop',
                'category' => 'osis',
            ],
            [
                'title' => 'Penyerahan Piala Juara Gitar Solo FLS3N',
                'image' => 'https://images.unsplash.com/photo-1531058020387-3be344559be6?q=80&w=800&auto=format&fit=crop',
                'category' => 'prestasi',
            ],
            [
                'title' => 'Gedung Utama SMAN 1 Tanjungpinang yang Asri',
                'image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=800&auto=format&fit=crop',
                'category' => 'fasilitas',
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::create($gal);
        }
    }
}
