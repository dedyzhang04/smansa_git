PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

-- Table structure for migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

-- Dumping data for migrations
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_06_01_073039_create_articles_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2026_06_01_073039_create_contact_messages_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2026_06_01_073039_create_galleries_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2026_06_01_152656_add_is_featured_to_articles_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2026_06_01_152701_create_settings_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2026_06_01_153445_add_role_to_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2026_06_23_051650_create_new_students_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2026_06_23_152508_add_biodata_columns_to_new_students_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2026_06_26_150759_add_allow_edit_to_new_students_table', '4');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2026_06_26_151712_add_queue_number_to_new_students_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2026_06_26_151817_create_verification_schedules_table', '6');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('16', '2026_06_26_153416_add_verification_fields_to_new_students_table', '6');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('17', '2026_06_26_161200_add_location_to_verification_schedules_table', '7');

-- Table structure for users
DROP TABLE IF EXISTS `users`;
CREATE TABLE "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime, "role" varchar not null default 'writer');

-- Dumping data for users
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES ('1', 'Administrator Humas', 'admin@smansa-tpi.sch.id', NULL, '$2y$12$J2lMTyrRZgAdOI0XpDn4yO4anY6qK0sEcuQSy1rTctXdBLfanEnaS', NULL, '2026-06-01 15:35:59', '2026-06-23 05:28:50', 'admin');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES ('2', 'Writer Humas', 'writer@smansa-tpi.sch.id', NULL, '$2y$12$IY8wunPYWaxXWv.5Ux4MDejfXFw/RbCIe2XHf1lmD.l2jzgNKaqPy', NULL, '2026-06-01 15:35:59', '2026-06-23 05:28:50', 'writer');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES ('4', 'Contoh', 'contoh@panitia.smansa-tpi.sch.id', NULL, '$2y$12$JXNPmeRgi9z023ZQVZc1r.y1qvjgRfyRBVwCTvVS.83IMM7uZb8iG', NULL, '2026-06-26 15:52:08', '2026-06-26 15:52:08', 'ppdb');

-- Table structure for password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));

-- Table structure for sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));

-- Dumping data for sessions
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('4qpcXux0cshF08Tou50omtsNsg0oVZygyvTiOthR', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDJuTWJUaFpSOFFqRUZENW5MZXFWU3ZEZXFWRmJnbWJSenRZczM0SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1782487442');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('82VZb2Z8V4BNsRh1uGswGSgCmKoR2Yp4d59m6SGe', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTFZOHNmejJPUzcxTjhCQXUzUWtLZnREdElHaHJkQWtOTlRBSFptdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1782487452');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('KzVtxZ058t22cibXG6yznrzhw1H9tBByNjE9vdC1', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjBLRHZTZFJPbEtxYnp2Rlp2YkszOFY2QWp6UFJYRVFTMEdud0lXUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1782487462');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('ClDF6DLDJWJF0lKseZt8HDgWTyGZ5wRj7QeOKfZI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiS3lRNEI0Y2J6OTJ2eDZldWE4SnFqdDhGNmZRaXV4UUNjN3ZaRkI3VCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zcG1iL3VwbG9hZC8wMDkyODM3NDgzIjtzOjU6InJvdXRlIjtzOjExOiJzcG1iLnVwbG9hZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTU6ImFkbWluX2xvZ2dlZF9pbiI7YjoxO3M6ODoiYWRtaW5faWQiO2k6NDtzOjEwOiJhZG1pbl9uYW1lIjtzOjY6IkNvbnRvaCI7czoxMToiYWRtaW5fZW1haWwiO3M6MzI6ImNvbnRvaEBwYW5pdGlhLnNtYW5zYS10cGkuc2NoLmlkIjtzOjEwOiJhZG1pbl9yb2xlIjtzOjQ6InBwZGIiO30=', '1782490977');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('uQeddLe6M80vjNcWlP6UXLh5tshM9OVz20kKjHdi', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmRtcHZsRFhUN1IyemdpU0hFbG9WNExzbWNUSXJHcjluQWhoM1Z5YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1782488297');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('2qYwnLKX6yt1H84S56RBhCl41vRlQ89Q7pp8Tlrp', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGRzelh2N2JzRUNqeGk4VEs0NUk4NTVMT1ZGdVhCSEs2S2dkejVzQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1782488314');

-- Table structure for cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

-- Table structure for cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));

-- Table structure for jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);

-- Table structure for job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));

-- Table structure for failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);

-- Table structure for articles
DROP TABLE IF EXISTS `articles`;
CREATE TABLE "articles" ("id" integer primary key autoincrement not null, "title" varchar not null, "slug" varchar not null, "category" varchar not null, "content" text not null, "image" varchar, "author" varchar not null default 'Admin Humas', "published_at" datetime not null default CURRENT_TIMESTAMP, "created_at" datetime, "updated_at" datetime, "is_featured" tinyint(1) not null default '0');

-- Dumping data for articles
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('1', 'Kolaborasi SMA Negeri 1 Tanjungpinang dan Ganesha Operation: Adakan Seminar “Revolusi Mengajar”', 'kolaborasi-sma-negeri-1-tanjungpinang-dan-ganesha-operation-adakan-seminar-revolusi-mengajar', 'utama', '
<p>SMANSANEWS — Ganesha Operation kembali menunjukkan komitmennya dalam mendukung peningkatan kualitas pendidikan melalui penyelenggaraan Seminar &#8220;Revolusi Mengajar&#8221;. Kegiatan ini bertujuan untuk menumbuhkan semangat belajar, memperkenalkan strategi belajar yang efektif, serta membantu siswa dalam menghadapi tantangan pendidikan di era modern yang semakin kompetitif, Tanjungpinang, Kamis, (23/5/2026).</p>



<p>Seminar ini diikuti oleh seluruh murid kelas X dan XI di Aula Soekarno-Hatta dan dikelas masing-masing. Suasana kegiatan berlangsung interaktif dan penuh semangat, di mana peserta tidak hanya mendengarkan materi, tetapi juga diajak untuk memahami pentingnya pola belajar yang terstruktur, konsisten, dan sesuai dengan kebutuhan masing-masing individu.</p>



<p>Acara dibuka oleh secara resmi oleh Waka Bidang Kurikulum Efrina Parmawati, S.Pd yang memberikan sambutan sekaligus motivasi kepada seluruh peserta. Dalam penyampaiannya, ia menekankan bahwa keberhasilan dalam belajar tidak hanya ditentukan oleh kecerdasan, tetapi juga oleh kedisiplinan, serta kemauan untuk terus berusaha dan berkembang. </p>



<p>&#8220;Pentingnya kita sebagai generasi masa depan harus terus belajar mengikuti perkembangan zaman. Tidak kalah penting kita juga harus terus membangun mindset positif agar mampu menghadapi berbagai tantangan akademik dengan percaya diri&#8221;, ujarnya.</p>



<p>Sebagai pembicara utama dari Ganesha Operation (GEO), Zulfadli, S.Pd.I menyampaikan materi yang inspiratif dan aplikatif. Dalam sesi pemaparannya, ia membagikan berbagai teknik belajar efektif, seperti cara memahami materi dengan cepat, mengatur waktu belajar yang efisien, serta strategi menghadapi ujian agar mendapatkan hasil yang maksimal. Materi yang disampaikan dikemas dengan bahasa yang mudah dipahami sehingga peserta dapat langsung menerapkannya dalam kegiatan belajar sehari-hari.</p>



<p>Selain itu, seminar ini juga menjadi wadah bagi peserta untuk berdiskusi dan berbagi pengalaman terkait kesulitan dalam belajar. Interaksi antara pembicara dan peserta berlangsung aktif, sehingga menciptakan suasana belajar yang lebih hidup dan menyenangkan. Hal ini diharapkan dapat meningkatkan motivasi serta kepercayaan diri siswa dalam mengembangkan potensi akademik mereka.</p>



<p>Melalui kegiatan Seminar &#8220;Revolusi Mengajar&#8221; ini, harapannya dapat memberikan dampak positif yang berkelanjutan bagi para peserta. Dengan menerapkan strategi dan tips yang telah diberikan, siswa diharapkan mampu meningkatkan prestasi belajar, mengelola waktu dengan lebih baik, serta meraih cita-cita yang diinginkan. (Sar/Rich)</p>
', '/storage/images/articles/kolaborasi-sma-negeri-1-tanjungpinang-dan-ganesha-operation-adakan-seminar-revolusi-mengajar-d63811.jpg', 'Admin Humas', '2026-04-23 23:03:04', '2026-06-01 15:35:59', '2026-06-09 02:46:40', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('2', 'Seleksi FLS3N Cipta Lagu dan Instrumen Gitar Solo Kota Tanjungpinang Berjalan Sukses', 'seleksi-fls3n-cipta-lagu-dan-instrumen-gitar-solo-kota-tanjungpinang-berjalan-sukses', 'utama', 'SMANSANEWS — Kegiatan Seleksi Festival dan Lomba Seni Siswa Nasional (FLS3N) SMA sederajat tingkat Kota Tanjungpinang untuk cabang lomba gitar solo dan cipta lagu sukses diselenggarakan di aula utama SMAN 1 Tanjungpinang. Kegiatan ini dihadiri oleh puluhan peserta berbakat dari berbagai sekolah, yang menampilkan kreativitas seni tingkat tinggi. SMANSA berhasil menyabet gelar juara untuk kategori cipta lagu.', '/images/slider_guitar.png', 'Admin Humas', '2026-04-23 10:30:00', '2026-06-01 15:35:59', '2026-06-01 15:35:59', '1');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('3', 'Edukasi Bahaya Terorisme dari Densus 88 AT: Membekali Generasi Z dengan Kesadaran dan Benteng Diri', 'edukasi-bahaya-terorisme-dari-densus-88-at-membekali-generasi-z-dengan-kesadaran-dan-benteng-diri-1780329508', 'pendidikan', '<p>SMANSANEWS – Setelah selesainya rangkaian acara edukasi yang diselenggarakan hari ini oleh tim Densus 88 Anti Teror, harapan besar tertuju pada masa depan generasi muda, khususnya Generasi Z di lingkungan SMAN 1 Tanjungpinang. Kegiatan ini bertujuan membekali para siswa dengan pemahaman yang tepat mengenai toleransi, kewaspadaan terhadap radikalisme digital, serta pentingnya menjaga persatuan NKRI.</p>', '/storage/uploads/articles/1780329508_edukasi-bahaya-terorisme-dari-densus-88-at-membekali-generasi-z-dengan-kesadaran-dan-benteng-diri.jpeg', 'Admin Humas', '2026-04-23 14:15:00', '2026-06-01 15:35:59', '2026-06-01 15:58:34', '1');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('4', 'SMA Negeri 1 Tanjungpinang Gelar Lebaran Antar-Kelas: Mempererat Ikatan Emosional Seluruh Warga Sekolah', 'sma-negeri-1-tanjungpinang-gelar-lebaran-antar-kelas-mempererat-ikatan-emosional-seluruh-warga-sekolah', 'utama', '
<p>​SMANSANEWS – SMA Negeri 1 Tanjungpinang mengadakan apel pagi setelah libur panjang bulan Ramadhan. Kegiatan ini menandai kembalinya aktivitas sekolah, SMAN 1 Tanjungpinang (SMANSA) juga menggelar rangkaian kegiatan halal bihalal dan &#8220;Lebaran Antarkelas&#8221;. Kegiatan ini bertujuan untuk memulihkan semangat belajar siswa sekaligus mempererat ikatan emosional seluruh warga sekolah setelah cukup lama vakum dari kegiatan tatap muka yang bersifat kekeluargaan. Senin,(30/03/2026).</p>



<p>​Kepala SMA Negeri 1 Tanjungpinang, Drs. Kariadi, dalam penyampaiannya menekankan bahwa esensi dari kegiatan ini adalah untuk menghapus jarak antarwaktu dan ruang selama masa libur.</p>



<p>“Kita adakan ini semata-mata untuk menambah keakraban. Supaya antara guru dengan guru, guru dengan siswa, maupun sesama siswa semakin dekat hubungan secara emosionalnya. Kita ingin kekeluargaannya terasa seperti keluarga sendiri,” ujarnya.</p>



<p>​Rangkaian acara dimulai sejak pagi hari yang diawali dengan apel bersama di lapangan sekolah. Setelah itu, acara dilanjutkan dengan sesi halalbihalal di mana para siswa, guru, dan staf saling bermaaf-maafan. Puncak kemeriahan terjadi saat tradisi &#8220;Lebaran Antarkelas&#8221; berlangsung, di mana setiap kelas menyajikan hidangan khas lebaran dan saling bertukar kudapan serta kue antarkelas.</p>



<p>​Wakil Kepala Sekolah Bidang Kesiswaan, Suhendhy, S.Si. turut memberikan pandangannya mengenai keunikan acara tahun ini. Beliau mencatat bahwa meskipun ada kelas yang masih beradaptasi, suasana kebersamaan tahun ini terasa jauh lebih hangat.</p>



<p>&#8220;Ini pertama kali kita lakukan di SMAN 1 Tanjungpinang. Ada yang kaget, ada yang persiapannya sangat baik, namun lebaran tahun ini terasa lebih hangat. Kebersamaan kita dapat, dan mudah-mudahan ini terjalin terus untuk tahun-tahun ke depan dengan persiapan yang lebih matang lagi,&#8221; ungkap beliau.</p>



<p>​Lebih lanjut, Bapak Suhendhy menjelaskan bahwa semangat berbagi ini sebenarnya sudah menjadi tradisi kuat di SMANSA, seperti pada peringatan Maulid Nabi atau Isra Mi&#8217;raj.</p>



<p>&#8220;Biasanya anak-anak membawa kue ke kelas, saling berbagi, dan menyisihkan sebagian untuk diantarkan ke majelis guru. Tradisi seperti ini akan terus kita jaga agar hubungan emosional warga sekolah tetap erat,&#8221; tambahnya.</p>



<p>​Dalam wawancara terpisah, Drs. Kariadi juga menjelaskan bahwa konsep acara ini merupakan hasil kolaborasi pemikiran dari berbagai pihak di sekolah.</p>



<p>“Ide ini datang dari siswa dan beberapa guru yang kemudian kita tampung dan jalankan bersama. Jadi semua merasa berperan di sekolah ini. Inovasi kegiatan ini bukan hanya milik kepala sekolah, tapi milik semuanya,” tutup beliau.</p>



<p>​Melalui kegiatan perdana pasca-libur ini, diharapkan semangat kebersamaan ini dapat menjadi pondasi kuat bagi siswa dalam menjalani sisa semester dengan lebih harmonis. Pihak sekolah juga berharap kegiatan serupa yang berbasis pada aspirasi siswa dan guru dapat terus dilaksanakan secara berkelanjutan untuk memajukan kualitas hubungan sosial di lingkungan SMA Negeri 1 Tanjungpinang. (Ger)</p>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-gelar-lebaran-antar-kelas-mempererat-ikatan-emosional-seluruh-warga-sekolah-32b2fa.jpeg', 'Sugeng Fitri Aji', '2026-03-31 08:31:04', '2026-06-01 15:35:59', '2026-06-09 02:46:43', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('5', 'Apel Pagi dan Halal Bihalal Jadi Momentum Saling Memaafkan dan Mempererat Silaturahmi', 'apel-pagi-dan-halal-bihalal-jadi-momentum-saling-memaafkan-dan-mempererat-silaturahmi', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang menggelar kegiatan Apel Pagi yang dirangkaikan dengan Halal Bihalal sebagai momentum untuk mempererat silaturahmi serta memulai kembali aktivitas sekolah dengan semangat kebersamaan. Kegiatan ini dilaksanakan di lingkungan sekolah dan diikuti oleh seluruh dewan guru, tenaga kependidikan, serta para siswa. Senin, 30 Maret 2026.</p>



<p>Dalam suasana yang penuh kehangatan dan kebersamaan, kegiatan diawali dengan pelaksanaan apel pagi yang dipimpin langsung oleh Kepala Sekolah Drs. Kariadi. Dalam amanatnya, beliau menyampaikan pentingnya menjaga semangat kebersamaan, disiplin, serta meningkatkan kualitas pembelajaran setelah menjalani masa libur.</p>



<p>“Momentum Halal Bihalal ini menjadi kesempatan bagi kita semua untuk saling memaafkan, mempererat tali silaturahmi, serta menumbuhkan kembali semangat dalam menjalankan tugas dan kewajiban di sekolah,” ujarnya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="988" src="/storage/images/articles/apel-pagi-dan-halal-bihalal-jadi-momentum-saling-memaafkan-dan-mempererat-silaturahmi-inline-1-e24ab3.jpeg" alt="" class="wp-image-1398" data-recalc-dims="1"/></figure>



<p></p>



<p>Usai pelaksanaan apel, kegiatan dilanjutkan dengan Halal Bihalal yang berlangsung dengan penuh keakraban. Seluruh guru, tenaga kependidikan, dan siswa saling bersalaman sebagai bentuk saling memaafkan setelah merayakan Hari Raya Idulfitri.</p>



<p>Pada kesempatan tersebut, Kepala Sekolah Drs. Kariadi juga menyampaikan permohonan maaf lahir dan batin kepada seluruh siswa serta bapak dan ibu guru. Beliau menyampaikan bahwa selama kebersamaan di lingkungan sekolah, mungkin terdapat kesalahan baik dalam perkataan, perbuatan, maupun sikap yang tidak disengaja.</p>



<p>Kegiatan ini tidak hanya menjadi ajang mempererat hubungan kekeluargaan di lingkungan sekolah, tetapi juga menjadi langkah awal untuk kembali fokus dalam proses belajar mengajar serta berbagai program sekolah yang telah direncanakan.</p>



<p>Melalui kegiatan Apel Pagi dan Halal Bihalal ini, diharapkan seluruh warga sekolah dapat memulai kembali aktivitas pendidikan dengan hati yang bersih, semangat baru, serta komitmen bersama untuk terus meningkatkan prestasi dan kualitas pendidikan di SMA Negeri 1 Tanjungpinang. (Sar/Ric)</p>
', '/storage/images/articles/apel-pagi-dan-halal-bihalal-jadi-momentum-saling-memaafkan-dan-mempererat-silaturahmi-c2eea0.png', 'Sugeng Fitri Aji', '2026-03-31 08:12:10', '2026-06-01 15:35:59', '2026-06-09 02:46:48', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('6', 'SISTEM PENERIMAAN MURID BARU (PPDB) TAHUN PELAJARAN 2025/2026', 'sistem-penerimaan-murid-baru-ppdb-tahun-pelajaran-20252026', 'pendidikan', 'Informasi Resmi Penerimaan Peserta Didik Baru (PPDB) SMA Negeri 1 Tanjungpinang Tahun Ajaran 2025/2026 telah dibuka. Terdapat empat jalur utama penerimaan: Zonasi (50%), Prestasi (30%), Afirmasi (15%), dan Perpindahan Orang Tua (5%). Pendaftaran dilakukan sepenuhnya secara daring melalui portal PPDB Provinsi Kepulauan Riau.', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop', 'Widodo Aja', '2025-05-24 08:00:00', '2026-06-01 15:35:59', '2026-06-01 15:35:59', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('7', 'SMANSA Ramadan Berbagi: 200 Paket Sembako di Bagikan', 'smansa-ramadan-berbagi-200-paket-sembako-di-bagikan', 'umum', 'SMANSANEWS – Kegiatan sosial “SMANSA Ramadan Berbagi 2026” yang diselenggarakan oleh OSIS SMA Negeri 1 Tanjungpinang sukses menyalurkan 200 paket sembako kepada warga sekitar sekolah and kaum dhuafa yang membutuhkan. Kegiatan ini didanai oleh sumbangan sukarela dari seluruh siswa, guru, dan staf komite sekolah.', 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=800&auto=format&fit=crop', 'Admin Humas', '2026-03-12 16:00:00', '2026-06-01 15:35:59', '2026-06-02 02:08:48', '1');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('8', 'Bazar Kewirausahaan SMANSA 2018: Melatih Jiwa Kreatif Generasi Muda', 'bazar-kewirausahaan-smansa-2018-melatih-jiwa-kreatif-generasi-muda', 'iptek', 'SMANSANEWS – Sebagai bentuk implementasi kurikulum kewirausahaan, siswa kelas XI SMAN 1 Tanjungpinang menggelar bazar produk kreatif. Produk-produk yang dipamerkan meliputi kuliner nusantara, kerajinan tangan daur ulang, serta aplikasi digital buatan siswa sendiri. Kegiatan ini melatih kemandirian dan jiwa bisnis siswa sejak dini.', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop', 'Syawal', '2018-12-17 10:00:00', '2026-06-01 15:35:59', '2026-06-01 15:35:59', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('10', 'Seleksi FLS3N Cipta Lagu dan Instrumen Gitar Solo Kota Tanjungpinang Berjalan Sukses', 'seleksi-fls3n-cipta-lagu-dan-instrumen-gita-solo-kota-tanjungpinang-berjalan-sukses', 'utama', '
<p>SMANSANEWS — Kegiatan Seleksi Festival dan Lomba Seni Siswa Nasional (FLS3N) SMA sederajat tingkat Kota Tanjungpinang untuk cabang lomba gitar solo dan cipta lagu sukses dilaksanakan pada Kamis, (23/04) di TRRC SMAN 1 Tanjungpinang. Kegiatan ini diikuti oleh para siswa berbakat dari berbagai sekolah yang siap menunjukkan kemampuan terbaik mereka di bidang seni musik.</p>



<p>Acara dibuka secara resmi oleh Waka Kurikulum, Efrina Parmawati, S.Pd.. Dalam sambutannya, beliau menekankan pentingnya seni dalam membentuk karakter dan kepribadian siswa.</p>



<p>Ia menyampaikan, “Seni itu memang melekat di kehidupan. Sampai ke filosofinya, dengan bersemi, orang akan memiliki jiwa yang lebih humanis, lebih sosial, dan cinta sesama. Hal itu akan tercermin dalam kehidupan sehari-hari.”</p>



<p>Lebih lanjut, beliau berharap kegiatan ini dapat melahirkan generasi seniman muda yang bermartabat. Ia juga menegaskan pentingnya menjaga nilai positif dalam seni.</p>



<p>“Kami berharap anak-anak kami menjadi seniman yang bermartabat. Ciptakanlah bagaimana seni itu bisa mengangkat martabat diri kita, martabat orang tua, martabat sekolah, dan bahkan martabat bangsa,” ujarnya.</p>



<p>Selain itu, beliau turut mengapresiasi seluruh pihak yang telah berkontribusi dalam kegiatan ini.</p>



<p>“Terima kasih kepada penyelenggara, panitia, OSIS, dan para pendamping. Jadikan kegiatan ini sebagai amal ibadah. Jika kita ikhlas, rezeki akan datang dari mana saja yang tidak kita duga,” tambahnya.</p>



<p>Kegiatan seleksi ini diharapkan dapat menghasilkan perwakilan terbaik yang akan melanjutkan perjuangan ke tingkat provinsi. Suasana acara berlangsung dengan penuh semangat dan antusiasme dari para peserta maupun pendukung yang hadir hingga akhir kegiatan. (Ger)</p>
', '/storage/images/articles/seleksi-fls3n-cipta-lagu-dan-instrumen-gita-solo-kota-tanjungpinang-berjalan-sukses-8a38b3.jpeg', 'Admin Humas', '2026-04-23 22:52:47', '2026-06-09 02:46:41', '2026-06-09 02:46:41', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('11', '​Edukasi Bahaya Terorisme dari Densus 88 AT: Membekali Generasi Z dengan Kesadaran dan Benteng Diri', 'edukasi-bahaya-terorisme-membekali-generasi-z-dengan-kesadaran-dan-benteng-diri', 'utama', '
<p>SMANSANEWS – Setelah selesainya rangkaian acara edukasi yang diselenggarakan hari ini, harapan besar tertuju pada masa depan generasi muda, khususnya Generasi Z yang saat ini masih duduk di bangku sekolah. Kegiatan ini diharapkan menjadi titik balik bagi para pelajar untuk lebih waspada terhadap pengaruh negatif di lingkungan mereka. Rabu, (15/5/2026).</p>



<p>​Dalam sesi wawancara setelah penutupan acara, AKP Risyal Hardiansyah Nugroho selaku anggota satgaswil Densus 88 Anti Teror (AT) Kepri menyampaikan bahwa harapan utama dari kegiatan ini adalah tumbuhnya kesadaran kolektif di kalangan pelajar. Beliau menekankan pentingnya bagi Generasi Z untuk memiliki tingkat kesadaran yang tinggi agar tidak mudah terjerumus ke dalam hal-hal yang merugikan.</p>



<p>​&#8221;Harapan kita semua, setidaknya generasi Z sekarang ini yang sedang menjadi pelajar bisa sadar. Itu yang utama,&#8221; ujar AKP Risyal Hardiansyah Nugroho. Beliau menambahkan bahwa kesadaran ini sangat krusial agar para siswa memiliki kewaspadaan atau sikap <em>aware</em> saat menghadapi situasi atau ajakan yang mencurigakan di masa mendatang.</p>



<p>​Lebih lanjut, beliau menjelaskan bahwa tantangan bagi anak muda saat ini adalah adanya ajakan atau undangan dari pihak-pihak yang tidak jelas tujuannya. Dengan adanya bekal pemahaman yang cukup, diharapkan para siswa mampu membentengi diri sejak dini sehingga dapat mencegah keterlibatan dalam perbuatan yang tidak baik, termasuk pengaruh paham radikalisme dan terorisme.</p>



<p>​&#8221;Setidaknya mereka bisa membentengi diri dulu di awal, sehingga bisa mencegah perbuatan-perbuatan yang tidak bagus di kemudian hari,&#8221; pungkas beliau menutup sesi wawancara tersebut.</p>



<p>​Melalui kegiatan ini, diharapkan para pelajar tidak hanya sekadar menerima informasi, tetapi benar-benar mampu mengimplementasikan sikap waspada dalam kehidupan sehari-hari demi masa depan yang lebih aman bagi bangsa. (Nat/Ger)</p>
', '/storage/images/articles/edukasi-bahaya-terorisme-membekali-generasi-z-dengan-kesadaran-dan-benteng-diri-d5bc2d.jpg', 'Admin Humas', '2026-04-23 22:41:26', '2026-06-09 02:46:42', '2026-06-09 02:46:42', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('12', 'SMANSA Ramadan Berbagi: 200 Paket Sembako di Bagikan', 'smansa-ramadan-berbagi-2026-200-paket-sembako-di-bagikan', 'utama', '
<p>SMANSANEWS – Kegiatan sosial “SMANSA Ramadan Berbagi 2026” yang diselenggarakan oleh OSIS SMA Negeri 1 Tanjungpinang dilaksanakan pada Kamis, (12/03) dengan menyalurkan 200 paket sembako kepada warga sekitar sekolah. Kegiatan yang berlangsung di lingkungan SMA Negeri 1 Tanjungpinang ini merupakan bentuk kepedulian siswa terhadap masyarakat sekitar sekaligus upaya menumbuhkan nilai empati dan semangat berbagi di bulan suci Ramadan.</p>



<p>Kepala SMA Negeri 1 Tanjungpinang, Drs. Kariadi, dalam sambutannya menyampaikan apresiasi atas inisiatif dan kerja keras para siswa yang telah melaksanakan kegiatan tersebut.</p>



<p>“Saya mengucapkan terima kasih kepada tim OSIS yang telah menginisiasi kegiatan ini. Anak-anak belajar bagaimana cara berbagi dan peduli terhadap sesama. Semoga kegiatan ini menjadi pembelajaran yang baik bagi mereka,” ujarnya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/smansa-ramadan-berbagi-2026-200-paket-sembako-di-bagikan-inline-1-fc065a.jpg" alt="" class="wp-image-1391" data-recalc-dims="1"/></figure>



<p></p>



<p>Pelaksanaan kegiatan diawali dengan pengumpulan sumbangan yang berlangsung dari 26 Februari hingga 6 Maret 2026. Sumbangan yang terkumpul berasal dari siswa, guru, serta warga sekolah yang kemudian dikelola oleh panitia untuk dijadikan paket bantuan bagi masyarakat yang membutuhkan.</p>



<p>Dari hasil pengumpulan tersebut, panitia berhasil menghimpun berbagai kebutuhan pokok seperti beras, tepung terigu, telur, minyak goreng, gula pasir, mie instan, teh, sirup, susu kental manis, dan biskuit. Selain itu, dana yang terkumpul mencapai Rp7.115.000 dan digunakan untuk membeli tambahan sembako dengan total pengeluaran Rp6.988.700, sehingga tersisa saldo Rp126.300.</p>



<p>Seluruh bantuan yang diperoleh kemudian dikemas oleh panitia menjadi 200 paket sembako yang selanjutnya didistribusikan kepada warga sekitar sekolah serta beberapa penerima lainnya yang membutuhkan. Penyerahan bantuan dilakukan secara simbolis sekaligus langsung kepada masyarakat penerima.</p>



<p>Dalam wawancara, Kepala SMA Negeri 1 Tanjungpinang Drs. Kariadi juga menyampaikan kesannya terhadap kegiatan tersebut.</p>



<p>“Kegiatan Semansa Berbagi tahun ini berjalan sangat baik. Panitia siswa bekerja maksimal mulai dari pengumpulan hingga distribusi sehingga berhasil menyalurkan 200 paket sembako kepada masyarakat sekitar,” ungkapnya.</p>



<p>Melalui kegiatan ini, diharapkan nilai kepedulian sosial dan semangat berbagi dapat terus tumbuh di kalangan siswa SMA Negeri 1 Tanjungpinang serta menjadi bagian dari pembentukan karakter generasi muda yang peduli terhadap sesama. (Tan/Ras)</p>
', '/storage/images/articles/smansa-ramadan-berbagi-2026-200-paket-sembako-di-bagikan-255b55.jpg', 'Admin Humas', '2026-03-12 21:11:35', '2026-06-09 02:46:54', '2026-06-09 02:46:54', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('13', 'Moderasi Beragama: Kebersamaan SMAN 1 Tanjungpinang Sambut Tahun baru Imlek 2547 dan Puasa Ramadan 1447 Hijriah', 'kebersamaan-sman-1-tanjungpinang-sambut-tahun-baru-imlek-2547-dan-puasa-ramadan-1447-hijriah', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang menggelar kegiatan sarapan bersama di Lapangan pada Jumat, (13/02) dalam rangka menyambut bulan suci Ramadan dan Tahun Baru Imlek. Kegiatan ini diikuti oleh kepala sekolah, guru, staf, serta seluruh siswa sebagai wujud mempererat silaturahmi dan memperkuat nilai toleransi dan membumikan moderasi beragama di lingkungan sekolah.</p>



<p>Kepala sekolah, Drs. Kariadi, menyampaikan rasa syukur atas terselenggaranya kegiatan tersebut. “Puji syukur Alhamdulillah pagi hari ini kita bertemu kembali secara bersama-sama di lapangan SMAN 1 Tanjung Pinang dalam rangka kegiatan yang insya Allah akan menumbuhkan silaturahim di antara kita semuanya,” ujarnya.</p>



<p>Ia juga mengajak siswa Muslim mempersiapkan diri menyambut Ramadan dengan sungguh-sungguh.<br>“Selamat menjalankan ibadah puasa, semoga berjalan lancar dan diterima oleh Tuhan Yang Maha Esa. Untuk yang merayakan Imlek, rayakan dengan bijaksana dan penuh makna,” tuturnya.</p>



<p>Ia juga mengingatkan pentingnya menjaga sikap saling menghormati. “Yang tidak berpuasa boleh makan, tetapi tolong jaga sikap di depan kawan-kawan yang sedang berpuasa. Mari kita sama-sama jaga toleransi,” pesannya.</p>



<p>Kegiatan ini menjadi simbol kebersamaan dan moderasi beragama di lingkungan keluarga besar SMAN 1 Tanjung Pinang dalam merawat harmoni dan menghargai keberagaman. (Nat)</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/kebersamaan-sman-1-tanjungpinang-sambut-tahun-baru-imlek-2547-dan-puasa-ramadan-1447-hijriah-inline-1-4f7ddd.jpeg" alt="" class="wp-image-1382" data-recalc-dims="1"/></figure>
', '/storage/images/articles/kebersamaan-sman-1-tanjungpinang-sambut-tahun-baru-imlek-2547-dan-puasa-ramadan-1447-hijriah-e2493e.jpeg', 'Admin Humas', '2026-02-16 14:47:56', '2026-06-09 02:47:02', '2026-06-09 02:47:02', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('14', 'Upacara Terakhir Angkatan 67 SMA Negeri 1 Tanjungpinang Berlangsung Khidmat dan Sarat Makna', 'upacara-terakhir-angkatan-67-sma-negeri-1-tanjungpinang-berlangsung-khidmat-dan-sarat-makna', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang menggelar upacara bendera terakhir bagi peserta didik kelas XII Angkatan 67 pada Selasa, 9 Februari 2026, di lingkungan sekolah. Upacara menunjukkan suasana yang khidmat, tertib, dan penuh makna, serta menjadi momen penting menjelang berakhirnya masa pendidikan Angkatan 67 di SMA Negeri 1 Tanjungpinang.</p>



<p>Upacara tersebut diikuti oleh seluruh warga sekolah, mulai dari peserta didik, dewan guru, hingga tenaga kependidikan. Kegiatan berlangsung dengan lancar dan mencerminkan nilai kedisiplinan serta tanggung jawab yang selama ini menjadi karakter utama SMA Negeri 1 Tanjungpinang.</p>



<p>Kepala SMA Negeri 1 Tanjungpinang, Drs. Kariadi, bertindak sebagai pembina upacara. Dalam amanatnya, Drs. Kariadi menekankan pentingnya peran seluruh warga sekolah dalam menjaga disiplin dan tanggung jawab. &#8220;Masing-masing memiliki tanggung jawab, baik siswa maupun Bapak dan Ibu Guru, agar nilai kedisiplinan dan tanggung jawab tetap terjaga di SMA Negeri 1 Tanjungpinang,&#8221; ujar Drs. Kariadi.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="https://i2.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2026/02/DSC0034-1.jpg?resize=790%2C445&#038;ssl=1" alt="" class="wp-image-1377" data-recalc-dims="1"/></figure>



<p></p>



<p>Lebih lanjut, Drs. Kariadi menyampaikan pesan khusus kepada peserta didik kelas XII Angkatan 67. Ia menegaskan bahwa fase akhir pendidikan di jenjang SMA merupakan masa yang sangat menentukan bagi masa depan siswa. &#8220;Kelas XII adalah waktu yang krusial, terutama dalam mempersiapkan diri untuk melanjutkan pendidikan ke jenjang yang lebih tinggi, baik ke perguruan tinggi negeri, swasta, maupun ke luar negeri,&#8221; tambahnya.</p>



<p>Menurutnya, keberhasilan di masa depan tidak hanya ditentukan oleh kemampuan akademik, tetapi juga oleh sikap disiplin, tanggung jawab, serta kesiapan mental dalam menghadapi tantangan baru. Oleh karena itu, Drs. Kariadi mengimbau Angkatan 67 agar tetap fokus menjalankan seluruh agenda angkatan serta kegiatan sekolah hingga akhir masa pendidikan.</p>



<p>Upacara terakhir ini menjadi simbol penutup perjalanan Angkatan 67 di SMA Negeri 1 Tanjungpinang, sekaligus momen refleksi atas proses pendidikan yang telah dilalui. Pihak sekolah menyatakan komitmennya untuk terus mendukung seluruh kegiatan akademik dan nonakademik siswa sebagai bagian dari pembinaan karakter dan pengembangan potensi.</p>



<p>Menutup amanatnya, Drs. Kariadi menyampaikan harapan dan doa agar seluruh peserta didik kelas XII Angkatan 67 dapat menyelesaikan setiap rangkaian kegiatan dengan baik serta meraih kesuksesan di masa mendatang. &#8220;Semoga Angkatan 67 mampu melangkah ke tahap berikutnya dengan membawa nilai-nilai kedisiplinan, tanggung jawab, dan karakter baik yang telah dibentuk selama menempuh pendidikan di SMA Negeri 1 Tanjungpinang,&#8221; tutupnya. (Ric/Sar)</p>
', '/storage/images/articles/upacara-terakhir-angkatan-67-sma-negeri-1-tanjungpinang-berlangsung-khidmat-dan-sarat-makna-0bbd2a.jpg', 'Admin Humas', '2026-02-16 14:32:41', '2026-06-09 02:47:17', '2026-06-09 02:47:17', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('15', 'Rapat Dinas Pembagian Tugas Tambahan Tahun Ajaran 2025/2026 SMA Negeri 1 Tanjungpinang', 'rapat-dinas-pembagian-tugas-tambahan-tahun-ajaran-2025-2026-sma-negeri-1-tanjungpinang', 'utama', '
<p>SMANSA NEWS — SMA Negeri 1 Tanjungpinang melaksanakan Rapat Dinas Pembagian Tugas Guru dan Tenaga Kependidikan Tahun Ajaran 2025/2026 sebagai bagian dari pengelolaan managerial dan layanan pendidikan. Kegiatan ini berlangsung di Aula Gedung Soekarno-Hatta SMA Negeri 1 Tanjungpinang dan diikuti oleh seluruh guru serta tenaga kependidikan. Selasa, (3/2/2026).</p>



<p>Rapat dinas dipimpin langsung oleh Drs. Kariadi sebagai Kepala SMA Negeri 1 Tanjungpinang, yang dalam arahannya menegaskan pentingnya pembagian tugas yang proporsional, profesional, dan berorientasi pada peningkatan mutu layanan pendidikan.<br>&#8220;Kita berharap SMA Negeri 1 Tanjungpinang bisa lebih baik lagi kedepannya, hari ini sudah baik, namun kita usahakan kedepannya dapat lebih baik lagi.&#8221; ujarnya.</p>



<p>Selain pembagian tugas, rapat dinas juga menjadi forum penyamaan persepsi terkait kebijakan pendidikan, program prioritas sekolah, serta penguatan komitmen bersama dalam mendukung visi dan misi SMA Negeri 1 Tanjungpinang pada Tahun Ajaran 2025/2026.</p>



<p>Pembagian tugas ini diharapkan dapat menjadi pijakan awal dan sebagai proses regenerasi yang baik untuk menciptakan proses pembelajaran yang lebih efektif, inovatif, dan berpihak pada peserta didik. Adapun pembagian tugas yang baru disampaikan antara lain susunan Tim Wakil Kepala Sekolah:<br>1. Wakil Kepala Sekolah Bidang Kurikulum di pimpin oleh Efrina Parmawati, S.Pd.<br>2. Wakil Kepala Sekolah Bidang Kesiswaan di pimpin oleh Suhendy, S.Si.<br>3. Wakil Kepala Sekolah Bidang Humas di pimpin oleh Sugeng Fitri Aji, M.Pd.I.<br>4. Wakil Kepala Sekolah Bidang Sarpras di pimpin oleh Julini Siregar, S.Sos.</p>



<p>Melalui rapat dinas ini, diharapkan seluruh warga sekolah memiliki pemahaman yang sama terhadap peran dan tanggung jawab masing-masing, sehingga dapat bersama-sama mewujudkan lingkungan belajar yang kondusif, berprestasi, dan berkarakter. (Humas)</p>
', '/storage/images/articles/rapat-dinas-pembagian-tugas-tambahan-tahun-ajaran-2025-2026-sma-negeri-1-tanjungpinang-511698.jpeg', 'Admin Humas', '2026-02-03 22:15:55', '2026-06-09 02:47:21', '2026-06-09 02:47:21', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('16', 'Dinas Pendidikan Kepri Dukung Kolaborasi SMAN 1 Tanjungpinang dengan CIE, Dorong Siswa Manfaatkan Peluang Beasiswa', 'dinas-pendidikan-kepri-dukung-kolaborasi-sman-1-tanjungpinang-dengan-cie-dorong-siswa-manfaatkan-peluang-beasiswa', 'utama', '
<p>SMANSANEWS — Kolaborasi antara SMA Negeri 1 Tanjungpinang dengan CIE (Center for International Education) mendapat dukungan positif dari Dinas Pendidikan Provinsi Kepulauan Riau. Hal ini disampaikan oleh Yuliana, S.Sos., M.M, dalam kegiatan yang berlangsung di lingkungan SMAN 1 Tanjungpinang.</p>



<p>Dalam kesempatan tersebut, Tim Humas SMAN 1 Tanjungpinang menanyakan pandangan Yuliana, S.Sos., M.M, terkait potensi dan kesiapan siswa SMANSA dalam mengikuti program kolaborasi internasional bersama CIE.</p>



<p>Menurut Yuliana, S.Sos., M.M,, siswa-siswi SMAN 1 Tanjungpinang memiliki potensi yang besar untuk mengikuti program pendidikan hingga ke luar negeri, terlebih dengan adanya pendampingan dan informasi yang jelas dari pihak CIE.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="593" src="/storage/images/articles/dinas-pendidikan-kepri-dukung-kolaborasi-sman-1-tanjungpinang-dengan-cie-dorong-siswa-manfaatkan-peluang-beasiswa-inline-1-279d71.jpeg" alt="" class="wp-image-1369" data-recalc-dims="1"/></figure>



<p></p>



<p>Lebih lanjut, Yuliana, S.Sos., M.M, menyampaikan harapan pribadinya khususnya dalam hal pengelolaan beasiswa.</p>



<p>&#8220;Saya berharap semua anak-anak termotivasi untuk mendaftar. Beasiswa itu ada, termasuk untuk kampus luar negeri. Mudah-mudahan siswa bisa termotivasi, mendaftar, dan lulus,&#8221; ungkapnya.</p>



<p>Ia juga menambahkan bahwa keberhasilan satu siswa diharapkan dapat menjadi pemicu semangat bagi siswa lainnya.</p>



<p>&#8220;Setelah mereka lulus, harapannya bisa mengajak teman-teman yang lain untuk ikut mendaftar juga. Insyaallah, setiap ada kemauan pasti akan ada jalannya,&#8221; tambah Yuliana, S.Sos., M.M,.</p>



<p>Dengan adanya dukungan dari Dinas Pendidikan Provinsi Kepulauan Riau serta kolaborasi bersama CIE, SMAN 1 Tanjungpinang optimis dapat membuka lebih banyak peluang pendidikan internasional bagi peserta didik dan menumbuhkan semangat untuk berprestasi hingga ke tingkat global. (Sar/Ric)</p>
', '/storage/images/articles/dinas-pendidikan-kepri-dukung-kolaborasi-sman-1-tanjungpinang-dengan-cie-dorong-siswa-manfaatkan-peluang-beasiswa-e57be6.jpeg', 'Admin Humas', '2026-01-28 08:59:28', '2026-06-09 02:47:27', '2026-06-09 02:47:27', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('17', 'SMAN 1 Tanjungpinang Jalin Kolaborasi dengan CIE, Buka Peluang Beasiswa Studi Internasional bagi Siswa', 'sman-1-tanjungpinang-jalin-kolaborasi-dengan-cie-buka-peluang-beasiswa-studi-internasional-bagi-siswa', 'utama', '
<p>SMANSANEWS — SMA Negeri 1 Tanjungpinang terus berkomitmen membuka peluang pendidikan yang lebih luas bagi peserta didik. Melalui kolaborasi dengan CIE (Center for International Education), sekolah memberikan akses informasi dan kesempatan studi internasional bagi siswa, khususnya kelas XI dan XII.</p>



<p>Tim Humas SMAN 1 Tanjungpinang berkesempatan mewawancarai Kepala Sekolah SMAN 1 TANJUNGPINANG, Drs. Kariadi, terkait harapan beliau terhadap kolaborasi ini.</p>



<p>Dalam keterangannya, Drs. Kariadi menyampaikan bahwa kolaborasi dengan CIE diharapkan dapat memberikan informasi yang detail dan jelas kepada siswa mengenai peluang beasiswa studi ke luar negeri.</p>



<p>&#8220;Minimal dari kegiatan yang diselenggarakan oleh CIE di sekolah kita, siswa mendapatkan informasi yang detail terkait beasiswa kuliah ke Luar Negeri. Tadi juga disampaikan ada rencana studi ke Tiongkok, Cina, Australia, Korea, Singapore, Canada dan berbagai negara lainnya. Peluangnya sangat banyak,&#8221; ujar beliau.</p>



<p>Lebih lanjut, Drs. Kariadi menegaskan bahwa kerja sama ini akan terus dibangun dan dikembangkan sebagai bentuk kontribusi besar bagi kemajuan SMAN 1 Tanjungpinang.</p>



<p>&#8220;Yang jelas, kolaborasi ini tetap kita bangun. Kita ingin memberikan kontribusi yang besar untuk sekolah kita, SMA Negeri 1 Tanjungpinang,&#8221; tambahnya.</p>



<p>Beliau juga menekankan bahwa melalui program ini, siswa tidak hanya memperoleh pendidikan bertaraf internasional, tetapi juga membangun relasi global yang dapat memperluas wawasan dan kesempatan di masa depan.</p>



<p>&#8220;Sifatnya internasional, relasi lokal bisa menjadi relasi internasional. Namun, calon siswa juga harus berusaha, bekerja keras, dan memiliki komitmen yang tinggi,&#8221; tutupnya.</p>



<p>Dengan adanya kolaborasi ini, SMAN 1 Tanjungpinang berharap dapat mencetak generasi muda yang berdaya saing global, berwawasan luas, serta siap menghadapi tantangan di dunia internasional. (Sar/Ric)</p>
', '/storage/images/articles/sman-1-tanjungpinang-jalin-kolaborasi-dengan-cie-buka-peluang-beasiswa-studi-internasional-bagi-siswa-03d351.jpeg', 'Admin Humas', '2026-01-28 08:41:43', '2026-06-09 02:47:32', '2026-06-09 02:47:32', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('18', 'Turnamen Futsal SMANSA Internal Cup 2026: Ajang Talenta dan Perekat Solidaritas Siswa', 'turnamen-futsal-smansa-internal-cup-2026-ajang-talenta-dan-perekat-solidaritas-siswa', 'utama', '
<p>SMANSANEWS &#8211; SMA Negeri 1 Tanjungpinang kembali menggelar ajang olahraga di lingkungan sekolah melalui Turnamen Futsal SMANSA Internal Cup 2026. Kegiatan ini berlangsung selama lima hari (17-18 dan 23-25 Januari 2026) dan diikuti oleh siswa-siswi kelas X, XI, dan XII sebagai bentuk upaya mempererat solidaritas serta kebersamaan antar-angkatan. </p>



<p>Turnamen futsal internal ini dilaksanakan dalam dua lokasi berbeda. Pada hari pertama dan kedua, pertandingan digelar di Lapangan Futsal BNP pada 17–18 Januari 2026. Selanjutnya, pertandingan hari ketiga dan Keempat di Lapangan Wong Solo dan hari terakhir kelima dilanjutkan di Lapangan Junior pada sekaligus penutupan. Perpindahan lokasi ini tidak mengurangi antusiasme peserta maupun penonton yang terus memadati area pertandingan.</p>



<p>Lebih dari sekadar kompetisi olahraga, turnamen ini menjadi wadah bagi para siswa untuk menyalurkan bakat, hobi, dan semangat kompetisi mereka di lapangan. Setiap kelas mengirimkan tim terbaiknya untuk memperebutkan gelar juara serta piala bergilir sekolah. Selain itu, panitia juga menyediakan penghargaan individu seperti Best Player dan Top Scorer, serta Best Supporter bagi pendukung paling kreatif dan sportif.</p>



<p>Wakil Kepala Sekolah Bidang Humas, Sugeng Fitri Aji, S.Pd.I., M.Pd.I., menyampaikan apresiasinya terhadap pelaksanaan kegiatan ini.<br>“Alhamdulillah, kegiatan Futsal Internal SMANSA akhirnya dapat terlaksana dengan sangat baik. Melihat antusiasme para pemain yang begitu luar biasa, saya merasa bangga karena kegiatan ini berjalan lancar tanpa hambatan yang berarti,” ujarnya.<br>Ia juga menambahkan bahwa turnamen ini bukan hanya tentang pertandingan, tetapi juga menjunjung tinggi nilai sportivitas dan silaturahmi antarpelajar. Ke depannya, ia berharap ajang ini dapat digelar lebih meriah dengan format yang lebih beragam.</p>



<p>Sementara itu, Firdaus, S.Pd., selaku Ketua Panitia Futsal SMANSA Internal Cup 2026, turut memberikan tanggapannya. Ia mengaku sangat terkesan dengan jumlah peserta yang meningkat dibandingkan tahun sebelumnya.<br>“Semangat juang para siswa luar biasa. Atmosfer pertandingannya sudah terasa seperti kompetisi profesional sekelas champions,” ungkapnya.<br>Ia berharap SMANSA Internal Cup dapat terus menjadi agenda rutin tahunan untuk menggali dan mengembangkan potensi siswa, khususnya di bidang olahraga futsal.</p>



<p>Dengan terselenggaranya Turnamen Futsal SMANSA Internal Cup 2026, diharapkan semangat kebersamaan, sportivitas, dan prestasi siswa SMA Negeri 1 Tanjungpinang dapat terus tumbuh dan berkembang. (Nat/Ger)</p>
', '/storage/images/articles/turnamen-futsal-smansa-internal-cup-2026-ajang-talenta-dan-perekat-solidaritas-siswa-36fdfd.png', 'Admin Humas', '2026-01-27 08:53:55', '2026-06-09 02:47:33', '2026-06-09 02:47:33', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('19', 'Kegiatan Kokurikuler Keagamaan: Penguatan Karakter Akhlak Mulia Siswa SMAN 1 Tanjungpinang', 'kegiatan-kokurikuler-keagamaan-penguatan-karakter-akhlak-mulia-siswa-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang melaksanakan kegiatan Kokurikuler Keagamaan berupa Ceramah Agama dalam rangka memperingati Isra Mi’raj Nabi Muhammad SAW yang bertempat di Masjid Ulul Albab SMA Negeri 1 Tanjungpinang, Jumat, (23/01/26). Kegiatan ini diikuti oleh siswa-siswi muslim dengan tertib.</p>



<p>Sambutan pertama oleh Gerrard Tsaqif Alfarely, selaku Ketua Rohis Wilayah Kepulauan Riau. Dalam penyampaiannya, ia menekankan bahwa peristiwa Isra Mi’raj memiliki makna mendalam bagi umat Islam. “Peristiwa Isra Mi’raj bukan sekadar perjalanan sejarah yang kita peringati setiap tahunnya. Ini adalah momentum refleksi diri. Perjalanan dari Masjidil Haram ke Masjidil Aqsa hingga ke Sidratul Muntaha adalah bukti kekuasaan Allah yang melampaui logika manusia,” ungkapnya. Ia mengajak seluruh peserta untuk memperbaiki kualitas ibadah, terutama salat lima waktu sebagai “oleh-oleh” utama dari peristiwa Mi’raj, serta berharap generasi muda semakin dekat dengan masjid.</p>



<p>Selanjutnya sambutan Kepala SMA Negeri 1 Tanjungpinang, Drs. Kariadi. Dalam sambutannya, beliau mengajak seluruh siswa untuk berintrospeksi diri, khususnya dalam pelaksanaan salat lima waktu. “Mari kita berintrospeksi diri, mengevaluasi apakah salat kita selama ini sudah benar. Mari kita cek kembali apakah rukun salat kita sudah lengkap, baik yang wajib maupun yang sunnah, serta apakah kita sudah memahami bacaan dalam salat,” ujarnya. Beliau menegaskan bahwa tujuan utama kegiatan ini adalah untuk mengingatkan dan membangkitkan kembali semangat siswa agar tetap menjaga serta meningkatkan kualitas salat secara bertahap.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/kegiatan-kokurikuler-keagamaan-penguatan-karakter-akhlak-mulia-siswa-sman-1-tanjungpinang-inline-1-0edda9.jpg" alt="" class="wp-image-1351" data-recalc-dims="1"/></figure>



<p></p>



<p>Drs. Kariadi juga menyampaikan apresiasinya terhadap pelaksanaan kegiatan kerohanian di SMA Negeri 1 Tanjungpinang meskipun dirinya baru beberapa hari bertugas. “Meski Bapak baru dua atau tiga hari bertugas di sekolah ini, Bapak sudah merasa sangat kagum. Kegiatan kerohanian dengan jumlah peserta sebanyak ini tetap bisa berjalan tertib,” tuturnya. Beliau turut memberikan apresiasi kepada Umi Hafizah atas lantunan bacaan Al-Qur’an serta kepada Ketua Rohis dan seluruh pengurus yang telah menyukseskan kegiatan tersebut, seraya berharap kegiatan kerohanian dapat terus dikembangkan melalui kolaborasi yang lebih kuat.</p>



<p>Puncak kegiatan diisi dengan ceramah agama oleh H. Muhammad Dirham, S.Ag., M.Sy. Dalam ceramahnya, beliau mengingatkan para siswa untuk meninggalkan hal-hal yang tidak bermanfaat dan mulai membentuk karakter sejak dini. “Anak-anakku, hal-hal yang kurang berguna tolong ditinggalkan. Ingat, 20 atau 30 tahun lagi, kalianlah yang akan menjadi pemimpin,” pesannya. Beliau juga menekankan pentingnya sikap gemar bersedekah tanpa menunggu keadaan berkecukupan. “Jangan pernah merasa rugi untuk berbagi. Jangan menunggu kaya untuk bersedekah, meskipun sedikit yang penting mau memulai,” ujarnya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/kegiatan-kokurikuler-keagamaan-penguatan-karakter-akhlak-mulia-siswa-sman-1-tanjungpinang-inline-2-1f0a16.jpg" alt="" class="wp-image-1352" data-recalc-dims="1"/></figure>



<p>Selain itu, H. Muhammad Dirham menegaskan beberapa prinsip penting dalam kehidupan, seperti menjaga amanah, menghindari perbuatan sia-sia, gemar bersedekah, menepati janji, serta menjaga salat tepat waktu. “Orang yang selalu menjaga salat tepat waktu adalah orang yang luar biasa. Lima atau sepuluh menit sebelum azan, kalian sudah siap menuju masjid,” tegasnya.</p>



<p>Melalui kegiatan peringatan Isra Mi’raj ini, diharapkan seluruh siswa SMA Negeri 1 Tanjungpinang dapat semakin meningkatkan keimanan, memperbaiki kualitas ibadah, serta menerapkan nilai-nilai Islam dalam kehidupan sehari-hari. (Ger/Nat)</p>
', '/storage/images/articles/kegiatan-kokurikuler-keagamaan-penguatan-karakter-akhlak-mulia-siswa-sman-1-tanjungpinang-75b644.png', 'Admin Humas', '2026-01-24 01:29:22', '2026-06-09 02:47:45', '2026-06-09 02:47:45', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('20', 'In House Training (IHT) Pengisian Pengelolaan Kinerja Pegawai Tahun 2026 SMAN 1 Tanjungpianang', 'in-house-training-iht-pengisian-pengelolaan-kinerja-pegawai-tahun-2026-sman-1-tanjungpianang', 'utama', '
<p>SMANSANEWS — Dalam rangka meningkatkan pemahaman dan kompetensi aparatur dalam pengelolaan kinerja pegawai, SMA Negeri 1 Tanjungpinang menyelenggarakan In House Training (IHT) Pengisian Pengelolaan Kinerja Pegawai Tahun 2026. Kegiatan ini diikuti oleh seluruh guru dan tenaga kependidikan sebagai bagian dari upaya penguatan tata kelola kinerja yang akuntabel dan berorientasi pada peningkatan mutu layanan pendidikan. Kamis, (22/1/2026). </p>



<p>IHT ini bertujuan untuk memberikan pemahaman yang komprehensif terkait kebijakan terbaru pengelolaan kinerja pegawai, mekanisme penyusunan perencanaan kinerja, pelaksanaan, hingga evaluasi kinerja yang selaras dengan target organisasi dan individu. Selain itu, kegiatan ini juga membekali peserta dengan keterampilan teknis dalam pengisian dan pemanfaatan sistem pengelolaan kinerja pegawai secara tepat dan bertanggung jawab.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="988" src="/storage/images/articles/in-house-training-iht-pengisian-pengelolaan-kinerja-pegawai-tahun-2026-sman-1-tanjungpianang-inline-1-2db53d.jpeg" alt="" class="wp-image-1347" data-recalc-dims="1"/></figure>



<p></p>



<p>Dalam pelaksanaannya, peserta mendapatkan materi mengenai prinsip dasar pengelolaan kinerja, penyusunan Sasaran Kinerja Pegawai (SKP), indikator kinerja, serta praktik langsung pengisian dokumen dan sistem pengelolaan kinerja pegawai Tahun 2026. Sesi diskusi dan tanya jawab berlangsung aktif, mencerminkan antusiasme peserta dalam memahami setiap tahapan proses pengelolaan kinerja.</p>



<p>Melalui kegiatan IHT ini, diharapkan seluruh guru dan tenaga kependidikan mampu melaksanakan pengelolaan kinerja pegawai secara profesional, objektif, dan berkelanjutan. Dengan demikian, pengelolaan kinerja tidak hanya menjadi kewajiban administratif, tetapi juga sebagai instrumen strategis dalam meningkatkan kinerja individu dan mendorong kemajuan satuan pendidikan secara keseluruhan. (Ger/Nat)</p>
', '/storage/images/articles/in-house-training-iht-pengisian-pengelolaan-kinerja-pegawai-tahun-2026-sman-1-tanjungpianang-854d11.jpeg', 'Admin Humas', '2026-01-24 01:12:31', '2026-06-09 02:47:51', '2026-06-09 02:47:51', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('21', 'Sertijab dan Ramah Tamah Kepala SMA Negeri 1 Tanjungpinang', 'sertijab-dan-ramah-tamah-kepala-sma-negeri-1-tanjungpinang', 'utama', '
<p>SMANSANEWS — SMA Negeri 1 Tanjungpinang melaksanakan kegiatan Serah Terima Jabatan (Sertijab) dan Ramah Tamah Kepala Sekolah pada Kamis, 22 Januari 2026. Kegiatan ini menandai berakhirnya masa tugas Plt. Kepala Sekolah, Efrina Parmawati, S.Pd., dan dimulainya kepemimpinan Drs. Kariadi sebagai Kepala SMA Negeri 1 Tanjungpinang yang baru.</p>



<p>Acara berlangsung dengan khidmat dan penuh suasana kekeluargaan, dihadiri oleh pengawas sekolah, jajaran wakil kepala sekolah, dewan guru, tenaga kependidikan, serta tamu undangan lainnya. Prosesi sertijab diawali dengan menyanyikan lagu Indoensia Raya, Sholawat Busro, Pembacaan Do&#8217;a, penandatanganan berita acara serah terima jabatan, serta penyerahan dokumen kepemimpinan dari Plt. Kepala Sekolah kepada Kepala Sekolah definitif.</p>



<p>Dalam sambutannya perdananya, Drs. Kariadi menyampaikan komitmen untuk terus meningkatkan prestasi baik secara akademik maupun non akademik, serta mengajak seluruh warga sekolah untuk bekerja sama dalam meningkatkan mutu pendidikan, prestasi peserta didik, dan penguatan karakter sesuai dengan visi dan misi sekolah.</p>



<p>Kegiatan ditutup dengan acara ramah tamah, yang menjadi momentum mempererat silaturahmi dan kebersamaan seluruh warga SMA Negeri 1 Tanjungpinang. Suasana hangat dan penuh keakraban mencerminkan semangat kolaborasi dan optimisme dalam menyongsong kepemimpinan baru demi kemajuan sekolah. (Nat/Ger)</p>
', '/storage/images/articles/sertijab-dan-ramah-tamah-kepala-sma-negeri-1-tanjungpinang-772bfb.jpeg', 'Admin Humas', '2026-01-24 01:03:56', '2026-06-09 02:47:52', '2026-06-09 02:47:52', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('22', 'Ramah Tamah SMANSA: Sambut Kepala Sekolah Baru Lewat Kegiatan Sarapan Sehat Bersama', 'ramah-tamah-smansa-sambut-kepala-sekolah-baru-lewat-kegiatan-sarapan-sehat-bersama', 'utama', '
<p>SMANSANEWS – Suasana hangat dan penuh haru menyelimuti lapangan SMA Negeri 1 Tanjungpinang (SMANSA) pada Kamis pagi, (22/01/26). Seluruh warga sekolah, mulai dari siswa, guru, tenaga kependidikan, hingga jajaran pimpinan wakil kepala sekolah, berkumpul dalam kegiatan sarapan sehat bersama sebagai bentuk kebersamaan sekaligus Ranah Tamah penyambutan Kepala Sekolah baru, Drs. Kariadi, yang resmi menjabat sejak 14 Januari 2025. Kegiatan ini dilaksanakan di lapangan utama SMA Negeri 1 Tanjungpinang, dengan tujuan mempererat silaturahmi, menumbuhkan budaya hidup sehat, serta menandai awal kepemimpinan baru yang diharapkan membawa semangat dan prestasi bagi SMANSA.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/ramah-tamah-smansa-sambut-kepala-sekolah-baru-lewat-kegiatan-sarapan-sehat-bersama-inline-1-09d489.jpeg" alt="" class="wp-image-1339" data-recalc-dims="1"/></figure>



<p></p>



<p>Dalam sambutan perdananya, Drs. Kariadi mengungkapkan rasa syukur dan haru dapat kembali berdiri di hadapan keluarga besar SMA Negeri 1 Tanjungpinang. Ia mengapresiasi antusiasme siswa yang mengikuti sarapan sehat bersama, bahkan dengan menu yang menurutnya “sangat sehat dan luar biasa.</p>



<p>“Perasaan saya sangat terharu melihat kalian semua sudah sarapan sehat. Namun yang saya lihat, bukan sekadar sehat, tapi sangat sehat. Ada yang sarapan empat telur rebus sekaligus, bahkan ada yang menu makan siangnya sudah dimakan pagi ini,” ujarnya disambut tawa dan tepuk tangan siswa.</p>



<p>Ia pun mendoakan agar seluruh warga SMANSA senantiasa diberi kesehatan, baik fisik, mental, jasmani, maupun rohani. Dalam kesempatan tersebut, Drs. Kariadi juga memperkenalkan perjalanan panjang pengabdiannya di dunia pendidikan. Ia mengungkapkan bahwa SMA Negeri 1 Tanjungpinang merupakan sekolah pertama tempatnya bertugas sejak tahun 1998, sebelum kemudian melanjutkan pengabdian di SMA Negeri 2 Tanjungpinang dan menjabat sebagai kepala sekolah di sana hingga tahun 2025. Tahun 2026 menjadi momen kembalinya beliau ke SMANSA, sekolah yang memiliki sejarah prestisius sebagai sekolah pertama di Tanjungpinang dengan berbagai predikat unggulan&#8221;. ucapnya</p>



<p>Dalam sesi wawancara, Drs. Kariadi menyampaikan bahwa kembali ke SMA Negeri 1 Tanjungpinang terasa seperti pulang ke rumah sendiri.</p>



<p>“Rasanya memang seperti pulang ke rumah sendiri. Walaupun banyak siswa yang belum saya kenal, suasananya sudah terasa akrab. Belum kenal tapi sudah akrab, itulah kenyamanan yang saya rasakan,” tuturnya.</p>



<p>Ia juga berharap doa dan dukungan dari seluruh warga sekolah agar dapat memimpin SMA Negeri 1 Tanjungpinang dengan baik, serta menyeimbangkan kemajuan akademik dan ekstrakurikuler demi kesuksesan siswa di masa depan.</p>



<p>Momen mengharukan semakin terasa saat salah satu guru yang merupakan mantan murid Drs. Kariadi menyampaikan kesan dan harapannya. Dengan penuh rasa hormat dan bangga, ia mengenang Drs. Kariadi sebagai guru matematika yang pernah membimbingnya hingga lulus, dan kini kembali sebagai pemimpin sekolah.</p>



<p>“Sebagai mantan murid Bapak yang kini menjadi rekan sejawat, saya sangat berharap Bapak bisa membawa perubahan yang lebih baik lagi. Anak-anak kita memiliki banyak talenta, baik akademik maupun non-akademik,” ungkapnya.</p>



<p>Ia juga menekankan pentingnya koordinasi antara Gedung A dan Gedung B serta kerja sama solid seluruh guru demi kemajuan sekolah. Pernyataan tersebut disambut dengan baik dari para siswa, diiringi tepuk tangan meriah yang di lapangan sekolah.</p>



<p>Menutup rangkaian kegiatan, Drs. Kariadi menyampaikan terima kasih atas sambutan hangat dan kepercayaan yang diberikan kepadanya.</p>



<p>“Mari kita bekerja sama untuk kemajuan sekolah kita tercinta,” ucapnya penuh semangat. (Nat/Ger)</p>
', '/storage/images/articles/ramah-tamah-smansa-sambut-kepala-sekolah-baru-lewat-kegiatan-sarapan-sehat-bersama-760c7d.png', 'Admin Humas', '2026-01-24 00:49:38', '2026-06-09 02:48:00', '2026-06-09 02:48:00', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('23', 'Ajang Talenta Pensi SMAN 1 Tanjungpinang Tampilkan Kreativitas dan Semangat Kolaborasi Siswa', 'ajang-talenta-pensi-sman-1-tanjungpinang-tampilkan-kreativitas-dan-semangat-kolaborasi-siswa', 'utama', '
<p>SMANSANEWS — SMAN 1 Tanjungpinang menyelenggarakan kegiatan Pentas Seni (Pensi) dan Pameran Seni Nirmana oleh siswa-siswi kelas XI pada Rabu, (17/12/25). Kegiatan ini berlangsung di Panggung SMAN 1 Tanjungpinang, sementara pameran seni nirmana dipajang di Aula SMAN 1 Tanjungpinang. Acara tersebut turut dihadiri oleh siswa dari berbagai sekolah yang datang untuk menyaksikan dan mengapresiasi karya seni para peserta.</p>



<p>Pentas seni yang bertajuk Ajang Talenta Pensi Siswa SMAN 1 Tanjungpinang menampilkan beragam pertunjukan kreatif dari kelas XI.1 hingga XI.19. Setiap kelas menampilkan konsep yang berbeda-beda, mulai dari tarian, penampilan vokal, band, fashion show, hingga flash mob yang menunjukkan kekompakan dan kreativitas siswa.</p>



<p>Selain pentas seni, karya seni nirmana hasil kreativitas siswa kelas XI juga dipamerkan di Aula SMAN 1 Tanjungpinang. Pameran ini menjadi wadah bagi siswa untuk mengekspresikan ide, imajinasi, serta keterampilan seni rupa yang telah mereka pelajari selama proses pembelajaran.</p>



<p>Plt. Kepala SMAN 1 Tanjungpinang, Efrina Parmawati, menyampaikan bahwa kegiatan ini memiliki peran penting dalam pengembangan karakter dan potensi siswa. “Kegiatan ini merupakan salah satu ajang untuk kreativitas anak-anak kita, kolaborasi, senang berkompetisi, dan merupakan semangat kolaborasi di antara anak-anak kita. Semoga kegiatan ini benar-benar dapat menjadi bekal bagi anak-anak kita ke depannya untuk menghadapi kehidupan di masa depan,” ujarnya.</p>



<p>Guru Seni Budaya kelas XI sekaligus juri penampilan, Miss Eva, mengaku terkesan dengan hasil penampilan para siswa yang dinilai melampaui ekspektasinya. “Terus terang, pada awalnya saya berpikir bahwa penampilan para peserta hari ini akan berlangsung biasa saja. Mengingat waktu persiapan yang sangat singkat, ditambah dengan jadwal ujian yang cukup padat, saya sempat memiliki ekspektasi yang tidak terlalu tinggi. Namun ternyata, apa yang ditampilkan oleh para siswa benar-benar di luar dugaan dan ekspektasi saya,” ungkapnya.</p>



<p>Ia menambahkan bahwa hampir seluruh peserta mampu tampil maksimal tanpa kesalahan berarti. “Para peserta mampu tampil secara maksimal, bahkan hampir tidak terlihat adanya kesalahan yang berarti dalam setiap penampilan. Hal ini menunjukkan adanya persiapan yang matang, kerja keras, serta komitmen yang tinggi dari masing-masing kelompok,” jelasnya.</p>



<p>Menurut Miss Eva, penampilan <em>flash mob</em> menjadi salah satu penampilan paling menantang. “Terutama pada penampilan flash mob, yang menurut saya merupakan salah satu penampilan paling menantang. Menyatukan berbagai karakter, latar belakang, dan teman-teman satu kelas untuk dapat tampil kompak di atas panggung tentu bukan hal yang mudah. Dibutuhkan komunikasi, kerja sama, serta latihan yang intens agar semuanya bisa tampil selaras,” tuturnya.</p>



<p>Ia juga mengapresiasi keberagaman konsep yang ditampilkan para siswa. “Selain itu, ragam penampilan yang ditampilkan juga sangat beragam dan kreatif. Tadi kita menyaksikan adanya fashion show, tarian, penampilan vokal, hingga band. Semua itu tentu membutuhkan waktu, proses latihan, serta keberanian untuk tampil di depan umum,” tambahnya.</p>



<p>Lebih lanjut, Miss Eva menegaskan bahwa kegiatan pentas seni ini memiliki nilai edukatif yang tinggi. “Menurut saya, kegiatan ini bukan hanya sekadar hiburan, tetapi juga menjadi wadah pembentukan karakter, kreativitas, dan kepercayaan diri siswa. Saya sangat mengapresiasi seluruh peserta dan panitia yang telah bekerja keras sehingga kegiatan ini dapat berjalan dengan baik dan memberikan kesan yang sangat positif,” pungkasnya.</p>



<p>Melalui kegiatan ini, minat dan bakat siswa dalam bidang seni dapat tersalurkan dan diapresiasi dengan baik. Dari keseluruhan penampilan, panitia dan dewan juri menetapkan enam kelas terbaik sebagai bentuk penghargaan atas kreativitas, kekompakan, dan dedikasi para siswa. (Ger/Nat)</p>
', '/storage/images/articles/ajang-talenta-pensi-sman-1-tanjungpinang-tampilkan-kreativitas-dan-semangat-kolaborasi-siswa-926a41.png', 'Admin Humas', '2025-12-22 09:58:50', '2026-06-09 02:48:01', '2026-06-09 02:48:01', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('24', 'Keseruan Classmeeting dan Bazar SMAN 1 Tanjungpinang', 'keseruan-classmeeting-dan-bazar-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS — SMAN 1 Tanjungpinang menggelar kegiatan Classmeeting yang berlangsung pada 10–17 Desember, dengan rangkaian kegiatan meriah yang melibatkan seluruh siswa. Selain itu, kegiatan Bazar SMANSA turut diselenggarakan selama tiga hari, mulai 15 hingga 17 Desember, sebagai bagian dari agenda penutup semester.</p>



<p>Classmeeting tahun ini diisi dengan berbagai kegiatan menarik, seperti pentas seni siswa kelas XI, bazar, lomba voli, takraw, serta dukungan dari Honda melalui kegiatan servis motor dan stand Honda. Seluruh kegiatan dipusatkan di lingkungan SMAN 1 Tanjungpinang dan mendapat antusiasme tinggi dari siswa.</p>



<p>Plt Kepala Sekolah SMAN 1 Tanjungpinang, Efrina Parmawati, S.Pd. menyampaikan bahwa kegiatan classmeeting menjadi ajang positif bagi siswa untuk mengembangkan potensi diri. “Classmeeting ini merupakan wadah bagi siswa SMANSA untuk menyalurkan kreativitas, mengasah bakat, serta membangun semangat kolaborasi dan sportivitas dalam suasana kompetisi yang sehat dan menyenangkan,” ujarnya.</p>



<p>Ia menjelaskan bahwa kegiatan ini dirangkaikan dalam SMANSA CUP, classmeeting, dan bazar Afterion sebagai sarana pengembangan siswa di bidang olahraga, seni, dan kewirausahaan. “Melalui berbagai perlombaan, pertandingan, dan kegiatan bazar yang dikelola langsung oleh siswa dengan bimbingan guru, diharapkan dapat melatih kemandirian, tanggung jawab, serta jiwa wirausaha sejak dini,” tambahnya.</p>



<p>Plt Kepala SMAN 1 TANJUNGPINANG juga menyampaikan apresiasi kepada pihak sponsor yang telah mendukung kelancaran kegiatan. “Kami mengucapkan terima kasih kepada Honda sebagai sponsor utama. Dukungan ini menjadi bukti sinergi antara dunia pendidikan dan dunia industri dalam mendukung perkembangan generasi muda,” ungkapnya.</p>



<p>Sementara itu, Ketua OSIS SMAN 1 Tanjungpinang, Fakhri Al Zaffan, menyampaikan bahwa seluruh rangkaian kegiatan berjalan dengan baik meskipun terdapat beberapa kendala. “Sejak awal hingga akhir acara, kegiatan classmeeting dan bazar berjalan sesuai rencana. Kendala yang muncul sebagian besar disebabkan oleh faktor cuaca dan hal teknis di luar kendali panitia,” jelasnya.</p>



<p>Ia menambahkan bahwa panitia berupaya mengatasi setiap kendala yang ada agar kegiatan tetap berjalan lancar. “Yang terpenting adalah bagaimana kami menangani setiap permasalahan tersebut. Alhamdulillah, seluruh kendala dapat dikendalikan dan tidak mengganggu jalannya acara hingga selesai,” pungkasnya.</p>



<p>Melalui kegiatan classmeeting dan bazar ini, SMAN 1 Tanjungpinang tidak hanya menghadirkan hiburan bagi siswa, tetapi juga menjadi sarana pembelajaran non-akademik dalam membentuk karakter, kreativitas, serta kebersamaan antarwarga sekolah.</p>
', '/storage/images/articles/keseruan-classmeeting-dan-bazar-sman-1-tanjungpinang-b5bc45.png', 'Admin Humas', '2025-12-22 09:50:40', '2026-06-09 02:48:03', '2026-06-09 02:48:03', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('25', 'SMAN 1 Tanjungpinang Gandeng Honda Meriahkan Classmeeting “School Verse”', 'sman-1-tanjungpinang-gandeng-honda-meriahkan-classmeeting-school-verse', 'utama', '
<p>SMANSANEWS — SMAN 1 Tanjungpinang berkolaborasi dengan Honda dalam kegiatan Classmeeting SMANSA yang digelar pada 10–17 Desember di lapangan SMAN 1 Tanjungpinang. Kolaborasi ini menghadirkan Honda sebagai sponsor dengan tajuk “School Verse”.</p>



<p>Kegiatan ini diselenggarakan sebagai bagian dari SMANSA CUP yang dirangkaikan dengan classmeeting dan bazar Afterion, serta diikuti oleh seluruh siswa SMAN 1 Tanjungpinang. Tujuannya untuk menyalurkan kreativitas, mengembangkan bakat, serta menumbuhkan semangat sportivitas dan kolaborasi siswa setelah kegiatan pembelajaran.</p>



<p>Plt Kepala Sekolah SMAN 1 Tanjungpinang, Efrina Parmawari, S.Pd. menyampaikan bahwa kegiatan ini memiliki nilai positif bagi pengembangan karakter siswa.<br>“Kegiatan ini merupakan ajang positif bagi anak-anak kita untuk menyalurkan kreativitas, mengasah bakat, serta membangun semangat kolaborasi dan sportivitas dalam kompetisi yang sehat,” ujarnya.</p>



<p>Ia juga mengapresiasi dukungan Honda sebagai sponsor utama dalam kegiatan tersebut.<br>“Dukungan Honda menjadi bukti sinergi antara dunia pendidikan dan dunia industri dalam mendukung perkembangan generasi muda,” tambahnya.</p>



<p>Sementara itu, perwakilan Honda Cabang Tanjungpinang dan Kijang (Pulau Bintan), Bu Mery, mengungkapkan apresiasinya atas partisipasi seluruh siswa.<br>“Kami sangat mengapresiasi antusiasme dan sportivitas peserta sehingga seluruh rangkaian kegiatan dapat berjalan dengan baik dan lancar,” tuturnya.</p>



<p>Melalui kolaborasi ini, kegiatan classmeeting tidak hanya menjadi hiburan, tetapi juga sarana pembelajaran non-akademik yang melatih kerja sama, kreativitas, dan karakter positif siswa. (Nat/Ger)</p>
', '/storage/images/articles/sman-1-tanjungpinang-gandeng-honda-meriahkan-classmeeting-school-verse-fd919e.jpg', 'Admin Humas', '2025-12-22 09:35:03', '2026-06-09 02:48:04', '2026-06-09 02:48:04', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('26', 'Pemilihan Pengurus Komite SMAN 1 Tanjungpinang Masa Bakti 2025–2028', 'pemilihan-pengurus-komite-sman-1-tanjungpinang-masa-bakti-2025-2028', 'utama', '
<p>SMANSANEWS — Pemilihan Ketua Komite SMA Negeri 1 Tanjungpinang untuk masa bakti 2025–2028 berlangsung di Gedung Aula SMA Negeri 1 Tanjungpinang, pada Kamis (11/12). Kegiatan dibuka secara resmi oleh Plt. Kepala SMA Negeri 1 Tanjungpinang, Efrina Parmawati, S.Pd., yang menyampaikan sambutan mengenai pentingnya peran komite sekolah dalam mendukung mutu pendidikan.</p>



<p>Dalam proses pemilihan tersebut, Calon Ketua Komite Abdullah, S.Sos., M.H. terpilih sebagai Ketua Komite untuk periode 2025–2028. Dalam kutipan sambutannya, Abdullah menyampaikan rasa syukur dan terima kasih atas kepercayaan yang diberikan kepadanya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="395" src="/storage/images/articles/pemilihan-pengurus-komite-sman-1-tanjungpinang-masa-bakti-2025-2028-inline-1-66152d.png" alt="" class="wp-image-1321" data-recalc-dims="1"/></figure>



<p></p>



<p>“Saya pertama-tama mengucapkan terima kasih atas kesempatan dan waktu yang diberikan kepada saya untuk memimpin komite SMA Negeri 1 Tanjungpinang untuk periode 2025–2028. Saya berdoa semoga amanah yang diberikan kepada saya ini dapat saya jalankan dengan sebaik-baiknya,” ujarnya.</p>



<p>Ia juga menyampaikan harapan agar SMA Negeri 1 Tanjungpinang dapat semakin maju baik di tingkat provinsi maupun nasional, serta menegaskan pentingnya dukungan semua pihak. “Komite tidak bisa bekerja sendiri. Komite butuh dukungan dari pihak sekolah, wali murid, dan siswa,” tambahnya.</p>



<p>Terkait program kerja ke depan, Abdullah mengungkapkan beberapa fokus utama, di antaranya penataan area parkir, pembangunan fasilitas baru yang lebih representatif untuk kegiatan pembelajaran, serta peningkatan kualitas tenaga pengajar.</p>



<p>“Kualitas guru sangat menentukan kualitas siswa. Guru yang baik akan menghasilkan murid yang baik. Karena itu, kompetensi guru harus terus ditingkatkan,” jelasnya.</p>



<p>Ia juga menekankan pentingnya memberikan ruang bagi para guru untuk berkreasi dan mengembangkan diri melalui pelatihan dan pendidikan lanjutan. Hal tersebut dianggap penting untuk meningkatkan mutu proses belajar-mengajar di SMA Negeri 1 Tanjungpinang.</p>



<p>Dengan terpilihnya ketua komite yang baru, diharapkan kerja sama antara pihak sekolah, komite, wali murid, dan siswa semakin solid dalam mendorong kemajuan SMA Negeri 1 Tanjungpinang di masa mendatang. (Nat/Ger)</p>
', '/storage/images/articles/pemilihan-pengurus-komite-sman-1-tanjungpinang-masa-bakti-2025-2028-0a3ad0.jpeg', 'Admin Humas', '2025-12-11 21:22:09', '2026-06-09 02:48:13', '2026-06-09 02:48:13', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('27', 'SMAN 1 Tanjungpinang Peringati HUT PGRI Ke-80 dan Hari Guru Nasional 2025', 'sman-1-tanjungpinang-peringati-hut-pgri-dan-hari-guru-nasional-2025', 'utama', '
<p>SMANSANEWS – SMAN 1 Tanjungpinang menggelar upacara peringatan Hari Ulang Tahun (HUT) Persatuan Guru Republik Indonesia (PGRI) dan Hari Guru Nasional tahun 2025 dengan penuh khidmat pada Selasa, (25/11/25).</p>



<p>Meski cuaca di luar diwarnai hujan, hal tersebut tidak menyurutkan semangat warga sekolah. Upacara yang semula dijadwalkan di lapangan upacara terpaksa dipindahkan ke Aula SMAN 1 Tanjungpinang, namun tetap berjalan dengan lancar.</p>



<p>Bertindak sebagai pembina upacara, Plt. Kepala SMAN 1 Tanjungpinang, Efrina Parmawati, S.Pd., menyampaikan amanat dari Menteri Pendidikan Dasar dan Menengah (Mendikdasmen), Prof. Dr. Abdul Mu’ti, M.Ed.</p>



<p>Dalam amanat tersebut, Mendikdasmen menekankan peran krusial guru sebagai figur sentral dalam pendidikan, tidak hanya di dalam kelas tetapi juga di luar kelas.</p>



<p>&#8220;Kehadiran guru diperlukan sebagai figur inspiratif, teladan yang dijunjung dan ditiru oleh orang tua, mentor, motivator, dan sahabat dalam suka dan duka. Amanat tersebut juga menyoroti tantangan yang dihadapi guru. Disebutkan bahwa guru harus memiliki kekuatan intelektual, sosial, dan moral, serta teguh dan tegar di tengah berbagai tantangan dan permasalahan. Kepada para murid, Mendikdasmen mengingatkan lima nasehat penting dari Presiden Prabowo Subianto:</p>



<ol>
<li>Belajarlah yang baik.</li>



<li>Cintai ayah dan ibu.</li>



<li>Hormati guru.</li>



<li>Rukun sama teman.</li>



<li>Cinta tanah air dan bangsa.</li>
</ol>



<p>Pesan untuk siswa diperkuat dengan kalimat, &#8220;Muliakan dirimu dengan muliakan gurumu. Rido dari orang tua ibumu menentukan masa depanmu.&#8221;</p>



<p>Upacara ditutup dengan ucapan terima kasih yang mendalam atas pengabdian para pahlawan tanpa tanda jasa.</p>



<p>&#8220;Terimakasih kepada ibu guru atas semua dasa darma bakti yang tidak ternilai dengan materi, teruslah mengabdi untuk negeri. Di tanganmu kualitas sumber daya manusia, masa depan bangsa dan negara. Selamat Hari Guru 2025, guru hebat, Indonesia kuat,&#8221; tutup Efrina Parmawati. (Nat)</p>
', '/storage/images/articles/sman-1-tanjungpinang-peringati-hut-pgri-dan-hari-guru-nasional-2025-a0f8f5.jpg', 'Admin Humas', '2025-12-01 11:10:35', '2026-06-09 02:48:18', '2026-06-09 02:48:18', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('28', 'SMA Negeri 1 Tanjungpinang Berkolaborasi dengan Kemenkeu Mengajar Kenalkan Anjing Pelacak “Barry” untuk Menangkal Narkoba dan Barang Terlarang', 'sma-negeri-1-tanjungpinang-berkolaborasi-dengan-kemenkeu-mengajar-adakan-edukasi-bersama-anjing-pelacak-bea-cukai-barry', 'utama', '
<p>SMANSANEWS &#8211; SMA Negeri 1 Tanjungpinang kedatangan tamu istimewa dari Bea dan Cukai hari ini. Kegiatan tersebut menghadirkan anjing pelacak bernama Barry, yang terkenal terlatih dalam mendeteksi barang-barang terlarang seperti narkotika dan obat-obatan terlarang. Senin, (10/11/2025)</p>



<p>Dalam kegiatan ini, para petugas Bea Cukai bersama kakak dan abang pembimbing memberikan penjelasan mengenai cara kerja anjing pelacak serta peran penting mereka dalam menjaga keamanan negara dari peredaran barang ilegal. Barry menunjukkan kemampuannya secara langsung dengan mendeteksi benda uji yang telah disiapkan oleh petugas.</p>



<p>Antusiasme siswa terlihat sangat tinggi. Banyak di antara mereka bersemangat untuk maju menjadi sukarelawan percobaan, agar bisa berinteraksi langsung dengan Barry dan melihat dari dekat bagaimana proses penciuman dilakukan.</p>



<p>Kegiatan edukatif ini tidak hanya memberikan wawasan baru kepada siswa, tetapi juga menumbuhkan kesadaran tentang bahaya narkoba dan pentingnya peran masyarakat, terutama generasi muda, dalam ikut serta menjaga lingkungan sekolah bebas dari zat terlarang.</p>



<p>Kegiatan pun berlangsung dengan aman, tertib, dan penuh keceriaan. Diharapkan melalui kegiatan seperti ini, para siswa SMA Negeri 1 Tanjungpinang semakin termotivasi untuk menjauhi narkoba. (Ric/Sar).</p>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-berkolaborasi-dengan-kemenkeu-mengajar-adakan-edukasi-bersama-anjing-pelacak-bea-cukai-barry-dab215.png', 'Admin Humas', '2025-11-18 09:29:12', '2026-06-09 02:48:19', '2026-06-09 02:48:19', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('29', 'SMA Negeri 1 Tanjungpinang Apresiasi Program Kemenkeu Mengajar 10 Menuju Visi Indonesia Emas 2045', 'sma-negeri-1-tanjungpinang-apresiasi-program-kemenkeu-mengajar-10-menuju-visi-indonesia-emas-2045', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang sukses melaksanakan kegiatan Kemenkeu Mengajar, sebuah program nasional yang digagas oleh Kementerian Keuangan Republik Indonesia untuk memberikan inspirasi dan wawasan kepada para pelajar tentang pentingnya peran generasi muda dalam pembangunan bangsa menuju Indonesia Emas 2045. Senin, (10/11/2025).</p>



<p>Program yang baru pertama kali diadakan di SMA Negeri 1 Tanjungpinang ini disambut antusias oleh seluruh siswa, khususnya kelas X. Melalui kegiatan ini, para siswa mendapatkan banyak ilmu dan pengalaman baru yang tidak hanya menambah pengetahuan akademik, tetapi juga menanamkan nilai-nilai integritas, tanggung jawab, serta semangat melayani negeri.</p>



<p>Dalam acara penutupan, perwakilan siswa menyampaikan pidato apresiasi dan refleksi terhadap kegiatan tersebut. Ia menyampaikan rasa terima kasih kepada pemerintah, panitia, serta seluruh pihak yang telah berkontribusi menyukseskan program Kemenkeu Mengajar di sekolah.</p>



<p>“Kami sangat berterima kasih karena program ini benar-benar membuka wawasan kami tentang pentingnya peran anak muda dalam membangun bangsa. Semoga kegiatan seperti ini bisa terus dilaksanakan di tahun-tahun mendatang,” ujar salah satu perwakilan siswa SMA Negeri 1 Tanjungpinang.</p>



<p>Selain apresiasi, pembicara juga menyampaikan permohonan maaf kepada para guru dan pihak terkait apabila selama kegiatan berlangsung terdapat perilaku siswa yang kurang berkenan. Ia menegaskan bahwa seluruh siswa masih dalam tahap belajar dan pembentukan karakter, sehingga kegiatan seperti ini menjadi wadah penting untuk proses pendewasaan diri.</p>



<p>Kegiatan Kemenkeu Mengajar di SMA Negeri 1 Tanjungpinang berjalan dengan lancar dan penuh makna. Para relawan dari Kementerian Keuangan berbagi cerita inspiratif tentang pengalaman mereka bekerja untuk negara, memberikan motivasi agar siswa terus belajar dengan semangat dan berkontribusi bagi kemajuan bangsa.</p>



<p>Menutup acara, pembicara menyampaikan harapan agar Kemenkeu Mengajar dapat terus hadir di tahun-tahun berikutnya serta menjadi inspirasi bagi sekolah lain.</p>



<p>“Ilmu dan pengalaman yang kami dapatkan hari ini sangat berharga. Semoga ini menjadi langkah awal untuk terus belajar, berbuat baik, dan berkontribusi untuk Indonesia Emas 2045,” tutupnya. (Nat).</p>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-apresiasi-program-kemenkeu-mengajar-10-menuju-visi-indonesia-emas-2045-63c823.png', 'Admin Humas', '2025-11-18 08:45:24', '2026-06-09 02:48:31', '2026-06-09 02:48:31', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('30', 'SMA Negeri 1 Tanjungpinang Berkolaborasi dengan Kemenkeu Mengajar 10 Peringati Hari Pahlawan Tahun 2025', 'sma-negeri-1-tanjungpinang-berkolaborasi-dengan-kemenkeu-mengajar-10-peringati-hari-pahlawan-tahun-2025', 'utama', '
<p>SMANSANEWS – Peringatan Hari Pahlawan Nasional pada Senin pagi (10/11/2025) di Lapangan SMA Negeri 1 Tanjungpinang untuk menanamkan semangat kepahlawanan kepada para siswa. Peringatan Hari Pahlawan ini disejalankan dengan kegiatan kemenkeu mengajar 10.</p>



<p>Upacara bendera diawali dengan pembacaan amanat Menteri Sosial, Saifullah Yusuf, yang diwakilkan oleh Kepala Kantor Wilayah Direktorat Jenderal Perbendaharaan (DJPB) Provinsi Kepulauan Riau, Budiman, S.S.T., Ak., M.B.A.</p>



<p>Dalam amanat tersebut, Menteri Sosial mengajak seluruh bangsa untuk meneladani tiga hal penting dari para pahlawan. Pertama, kesabaran dalam menempuh ilmu, menentukan strategi, dan membangun kebersamaan di tengah keterbatasan. Kedua, semangat mengutamakan kepentingan bangsa di atas segalanya, di mana para pahlawan setelah merdeka tidak berebut jabatan, melainkan kembali mengabdi kepada rakyat. Ketiga, pandangan jauh ke depan, yaitu berjuang demi kemakmuran generasi yang akan datang.</p>



<p>Menteri Sosial juga menekankan bahwa perjuangan di masa kini tidak lagi dengan bambu runcing, melainkan dengan ilmu, empati, dan pengabdian, sejalan dengan Astacita Presiden Prabowo Subianto dalam memajukan pendidikan dan menegakkan keadilan sosial.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/sma-negeri-1-tanjungpinang-berkolaborasi-dengan-kemenkeu-mengajar-10-peringati-hari-pahlawan-tahun-2025-inline-1-b2e246.jpg" alt="" class="wp-image-1299" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Usai upacara, kegiatan dilanjutkan dengan sosialisasi Kemenkeu Mengajar (KM) ke-10. Budiman, Kepala Kanwil DJPB Provinsi Kepulauan Riau, menjelaskan bahwa kegiatan ini bertujuan mengenalkan tugas dan fungsi Kemenkeu dalam mengelola keuangan negara.</p>



<p>&#8220;Hari ini, saya bersama kurang lebih 80 teman-teman dari berbagai unit Kemenkeu, termasuk DJP, Bea Cukai, dan DJPB, akan mengenalkan bagaimana kami menjaga arus keuangan negara, mulai dari uang yang masuk hingga tujuannya tercapai,&#8221; ujar Budiman.</p>



<p>Kegiatan ini secara khusus menyasar siswa kelas 10 untuk memahami Anggaran Pendapatan dan Belanja Negara (APBN). Menurut Budiman, APBN yang tahun depan mencapai hampir Rp4.000 triliun tersebut merupakan iuran bersama rakyat dan dikelola dengan integritas tinggi untuk menjalankan empat misi abadi Indonesia, termasuk mencerdaskan kehidupan bangsa.</p>



<p>&#8220;Setiap warga Indonesia berpartisipasi dalam APBN. Ketika kita keluar rumah merasa aman, itu karena negara membayar pihak keamanan. Gedung sekolah ini pun sebagian besar dananya berasal dari APBN,&#8221; jelas Budiman, seraya berharap kegiatan ini dapat menginspirasi siswa SMA Negeri 1 Tanjungpinang untuk menjadi generasi penerus pengelola keuangan negara di masa depan. (Nat)</p>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-berkolaborasi-dengan-kemenkeu-mengajar-10-peringati-hari-pahlawan-tahun-2025-d7c7ca.png', 'Admin Humas', '2025-11-18 08:28:04', '2026-06-09 02:48:39', '2026-06-09 02:48:39', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('31', 'SMA Negeri 1 Tanjungpinang Sukses Menjalankan TKA Tahun 2025', 'sma-negeri-1-tanjungpinang-sukses-menjalankan-tka-tahun-2025', 'utama', '
<p>SMANSANEWS – Suasana penuh keseriusan tampak di lingkungan SMA Negeri 1 Tanjungpinang sejak awal pekan ini. Selama empat hari, mulai Senin hingga Kamis, 3 sampai 6 November 2025, sekolah melaksanakan Tes Kemampuan Akademik (TKA) bagi seluruh siswa kelas XII. Kegiatan ini menjadi momen penting karena merupakan pelaksanaan perdana TKA di tahun ajaran 2025/2026. </p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="593" src="/storage/images/articles/sma-negeri-1-tanjungpinang-sukses-menjalankan-tka-tahun-2025-inline-1-5d00d9.jpeg" alt="" class="wp-image-1291" data-recalc-dims="1"/></figure>



<p></p>



<p>Pelaksanaan TKA berlangsung tertib dan lancar. Hal ini disampaikan oleh Wakil Kepala Sekolah Bidang Kurikulum, Julini Siregar, S.Sos, yang turut memantau jalannya ujian dari hari pertama hingga hari keempat.</p>



<p>“Alhamdulillah TKA ini berjalan dengan lancar sampai hari keempat ini sesi pertama tidak ada kendala, lancar pelaksanaannya dari segi alat dan siswa-siswa datang tepat waktu masuk dengan tertib. Sekolah sudah melakukan persiapan bagi anak-anak kelas 12 yang mengikuti TKA, semoga mereka mendapat nilai yang baik, kemudian bisa lolos SNBP dari hasil nilai TKA yang terbaik, jadi sinkron hasil nilai TKA-nya dengan impiannya untuk lolos di SNBP ke universitas yang diinginkan,” ujar Julini Siregar.</p>



<p>Beliau juga menyampaikan pandangannya bahwa TKA merupakan langkah positif dalam dunia pendidikan.</p>



<p>“Lembaga pendidikan itu selalu mengikuti regulasi dari kementerian, TKA merupakan hal yang positif dimana sudah sekitar 6 tahun khususnya pendidikan di Indonesia tidak ada yang namanya Ujian Nasional. Artinya ini juga meningkatkan keseriusan siswa dalam belajar, karena dia menghadapi yang namanya Ujian Nasional dalam bentuk Tes Kemampuan Akademik (TKA) walaupun ini tidak untuk menentukan kelulusan, hanya untuk masuk ke perguruan tinggi jalur SNBP. Dan yang pasti dengan adanya TKA, keseriusan belajar anak kelas 12 lebih terlihat karena dengan tidak adanya Ujian Nasional dalam bentuk apapun selama 6 tahun ini semangat belajarnya itu kurang karena siswanya jadi lebih santai. Kalau sekarang mereka lebih ada usaha untuk belajar karena ada Tes Kemampuan Akademik ini,” tambahnya.</p>



<p>Sementara itu, Plt. Kepala SMA Negeri 1 Tanjungpinang, Efrina Parmawati, S.Pd. juga memberikan apresiasi dan harapan besar terhadap pelaksanaan TKA perdana ini.</p>



<p>“Mengenai TKA yang dilalui oleh kelas 12 pada tahun ini, ini memang merupakan hal yang pertama kali yang baru bagi kelas 12 tahun ajaran 2025/2026. Tentu hal baru menjadi tantangan tersendiri bagi kakak kelas kalian untuk menghadapi ini, karena beberapa tahun ini itu (TKA) belum ada. Tapi saya yakin kelas 12 dapat melewati ini dengan baik. Tentu saya juga berharap semoga mereka bisa melewatinya dengan baik, mendapatkan hasil yang juga baik dan dapat menjadi sebagai tolak ukur bagi sekolah. Hasil yang didapatnya itu nanti menjadi bahan perbaikan bagi sekolah ke depannya,” ujar Efrina Parmawati.</p>



<p>Untuk angkatan mendatang, beliau juga memberikan pesan khusus kepada kelas 11 agar dapat mempersiapkan diri sejak dini.</p>



<p>“Untuk yang siswa kelas 11 tentu melihat dari kakak kelas yang melewati TKA tahun ini, tentu saya berharap kelas 11 juga bisa mempersiapkan diri sebaik mungkin sehingga siap menghadapi TKA yang akan datang.” tutup Efrina Parmawati.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="593" src="/storage/images/articles/sma-negeri-1-tanjungpinang-sukses-menjalankan-tka-tahun-2025-inline-2-f20b07.jpeg" alt="" class="wp-image-1290" data-recalc-dims="1"/></figure>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-sukses-menjalankan-tka-tahun-2025-3caa50.jpeg', 'Admin Humas', '2025-11-07 09:51:11', '2026-06-09 02:48:50', '2026-06-09 02:48:50', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('32', 'Perpisahan Haru Kepala Sekolah SMAN 1 Tanjungpinang: Menutup 35 Tahun 8 Bulan Pengabdian', 'perpisahan-haru-pak-daman-kepala-sekolah-sman-1-tanjungpinang-menutup-35-tahun-8-bulan-pengabdian', 'utama', '
<p>SMANSANEWS – Upacara pelantikan Ketua Ekstrakurikuler di SMAN 1 Tanjungpinang pada Kamis, (30/10/25). Menjadi momen penting perpisahan yang mengharukan bagi Kepala Sekolah, Daman Huri S.Pd., Kim., M.M., yang akan memasuki masa pensiun pada esok hari, 31 Oktober 2025.</p>



<p>Di akhir amanatnya, Daman Huri, S.Pd.Kim., M.M. menyampaikan salam perpisahan di hadapan seluruh siswa dan guru. Beliau mengenang kembali masa pengabdiannya yang sangat panjang di dunia pendidikan, khususnya masa-masa pengabdian bersama anak didiknya di SMAN 1 Tanjungpinang.</p>



<p>&#8220;Mungkin ini Pak Daman terakhir kali berdiri di sini karena Insya Allah besok hari terakhir Pak Daman masuk sekolah, tapi bagaimanapun Pak Daman sangat senang dengan kalian semua,&#8221; ungkapnya, disambut suasana haru di lapangan utama.</p>



<p>Beliau menyebutkan bahwa perjalanan waktunya telah membawanya mengabdi 35 tahun 8 bulan, terhitung sejak tahun 1991 bulan Maret hingga Oktober 2025.</p>



<p>Sebagai penutup, beliau menyampaikan permohonan maaf dan keyakinan akan masa depan sekolah yang cerah.</p>



<p>&#8220;Mungkin ada hal yang kurang pas dan sebagainya dari Pak Daman selama berada di tengah anak-anak semua. Jadi dalam kesempatan ini Pak Daman juga mohon maaf yang sebesar-besarnya, Pak Daman yakin nanti yang akan menggantikan Pak Daman pasti jauh lebih hebat dari Pak Daman.&#8221; tutupnya.</p>



<p>Momen perpisahan ini menjadi catatan manis yang menutup lembaran karier panjang Kepala Sekolah, meninggalkan kenangan mendalam bagi seluruh keluarga besar SMAN 1 Tanjungpinang. (Nat/Sar)</p>
', '/storage/images/articles/perpisahan-haru-pak-daman-kepala-sekolah-sman-1-tanjungpinang-menutup-35-tahun-8-bulan-pengabdian-4ab050.png', 'Admin Humas', '2025-10-30 21:20:10', '2026-06-09 02:48:53', '2026-06-09 02:48:53', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('33', 'Pelantikan Ketua Ekstrakurikuler SMANSA Masa Bakti 2025/2026: SMAN 1 Tanjungpinang Tegaskan Pentingnya Prestasi Non-Akademik', 'pelantikan-ketua-ekstrakurikuler-smansa-masa-bakti-2025-2026-sman-1-tanjungpinang-tegaskan-pentingnya-prestasi-non-akademik', 'utama', '
<p>SMANSANEWS – Suasana penuh semangat menyelimuti Lapangan Utama SMA Negeri 1 Tanjungpinang pada Kamis, (30/10/25). Dengan dilantiknya 36 Ketua Ekstrakurikuler baru untuk Masa Bakti 2025/2026. Acara pelantikan ini menandai dimulainya periode baru kepemimpinan siswa dalam berbagai kegiatan non-akademik sekolah.</p>



<p>Dalam sambutannya, Kepala Sekolah, Daman Huri S.Pd., Kim., M.M., memberikan ucapan selamat kepada para ketua ekskul yang baru dan para pembina, sekaligus menekankan bahwa pembelajaran di sekolah tidak terbatas pada kurikulum akademik.</p>



<p>Pak Daman Huri mengingatkan bahwa membina anak didik dalam kegiatan non-akademik adalah tugas dan tanggung jawab seorang guru. Beliau berpesan agar para ketua yang baru dapat memanfaatkan peran mereka untuk memajukan sekolah.</p>



<p>&#8220;Pembelajaran di sekolah itu tidak hanya dalam bidang akademik tetapi juga bidang non-akademik&#8230; Karena itu manfaatkan sebaik-baiknya kegiatan itu. Ayo kita sama-sama angkat sekolah kita dengan satu prestasi,&#8221; ujar Pak Daman.</p>



<p>Beliau juga berpesan agar para ketua ekskul yang baru dapat bekerja sesuai tupoksinya, merekrut anggota sesuai bakat dan minat, serta selalu bergerak cepat sambil berkoordinasi.</p>



<p>&#8220;Anak-anak Bapak yang sudah dipercaya sebagai ketua-ketua itu langsung bergerak dengan selalu berkoordinasi dengan pembina. Selamat bekerja, selamat berkreatifitas, selama kreatifitas itu hal yang positif pasti sekolah akan selalu mendukung.&#8221;</p>



<p>Pelantikan 36 Ketua Ekstrakurikuler ini diharapkan menjadi pendorong utama bagi peningkatan prestasi SMAN 1 Tanjungpinang di kancah non-akademik pada tahun mendatang. (Nat/Sar)</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/pelantikan-ketua-ekstrakurikuler-smansa-masa-bakti-2025-2026-sman-1-tanjungpinang-tegaskan-pentingnya-prestasi-non-akademik-inline-1-9733e5.jpg" alt="" class="wp-image-1279" data-recalc-dims="1"/></figure></div>', '/storage/images/articles/pelantikan-ketua-ekstrakurikuler-smansa-masa-bakti-2025-2026-sman-1-tanjungpinang-tegaskan-pentingnya-prestasi-non-akademik-b08870.jpg', 'Admin Humas', '2025-10-30 21:13:07', '2026-06-09 02:49:06', '2026-06-09 02:49:06', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('34', 'Sugeng Fitri Aji Guru SMA Negeri 1 Tanjungpinang Raih Juara 3 GTK Transformatif Guru SMA Provinsi Kepulauan Riau', 'sugeng-fitri-aji-guru-sma-negeri-1-tanjungpinang-raih-juara-3-gtk-transformatif-guru-sma-provinsi-kepulauan-riau', 'utama', '
<p>SMANSANEWS &#8211; Prestasi membanggakan kembali diraih oleh SMA Negeri 1 Tanjungpinang. Kali ini salah satu guru terbaiknya, Sugeng Fitri Aji, S.Pd.I., M.Pd.I., berhasil meraih Juara 3 Kategori GTK Transformatif Guru SMA dalam ajang penghargaan bergengsi yang diselenggarakan oleh Kantor Guru dan Tenaga Kependidikan (KGTK) Provinsi Kepulauan Riau sempena Hari Guru Nasional (HGN) Tahun 2025. Acara penganugerahan tersebut berlangsung di Aston Batam Hotel &amp; Residence pada Senin, (27/10/2025).</p>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><img decoding="async" loading="lazy" width="790" height="1053" src="https://i2.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/10/WhatsApp-Image-2025-10-27-at-11.01.37.jpeg?resize=790%2C1053&#038;ssl=1" alt="" class="wp-image-1272" style="aspect-ratio:0.75;width:736px;height:auto" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Penghargaan GTK ini diberikan kepada para kepala sekolah, pengawas, dan tenaga kependidikan berprestasi yang dinilai memiliki dedikasi, inovasi, transformasi pembelajaran, serta memberikan dampak nyata bagi peningkatan mutu pendidikan di satuan pendidikan masing-masing.</p>



<p>Sugeng Fitri Aji dikenal aktif mengembangkan berbagai inovasi pembelajaran berbasis teknologi dan nilai-nilai karakter, di antaranya program Aplikasi Pendidikan Agama Islam dan model Kokurikuler Berbasis STEM.</p>



<p>Kepala SMA Negeri 1 Tanjungpinang, Daman Huri, S.Pd.Kim., M.M., menyampaikan rasa bangga dan apresiasi atas capaian tersebut.</p>



<p>“Prestasi ini bukan hanya kebanggaan bagi sekolah, tetapi juga menjadi inspirasi bagi seluruh guru untuk terus berinovasi dan bertransformasi dalam pembelajaran. Semoga keberhasilan Pak Sugeng menjadi motivasi bagi kita semua untuk memberikan pelayanan terbaik bagi peserta didik,” ujar Daman Huri.</p>



<p>Sementara itu, Sugeng Fitri Aji menyampaikan rasa syukur atas penghargaan yang diraihnya. Ia mengungkapkan bahwa pencapaian ini merupakan hasil kolaborasi dan dukungan seluruh warga sekolah.</p>



<p>“Saya bersyukur atas penghargaan ini. Inovasi pembelajaran hanya bisa tumbuh di lingkungan sekolah yang mendukung dan kolaboratif. Terima kasih kepada pimpinan sekolah, rekan guru, serta peserta didik yang selalu menjadi inspirasi,” ungkapnya.</p>



<p>Dengan diraihnya penghargaan ini, SMA Negeri 1 Tanjungpinang semakin menegaskan komitmennya sebagai sekolah yang terus bertransformasi menuju pembelajaran mendalam, berlandaskan inovasi, kolaborasi, dan nilai-nilai karakter bangsa. (Nat)</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="790" height="1053" src="/storage/images/articles/sugeng-fitri-aji-guru-sma-negeri-1-tanjungpinang-raih-juara-3-gtk-transformatif-guru-sma-provinsi-kepulauan-riau-inline-2-3d9cd2.jpeg" alt="" class="wp-image-1271" data-recalc-dims="1"/></figure></div>', '/storage/images/articles/sugeng-fitri-aji-guru-sma-negeri-1-tanjungpinang-raih-juara-3-gtk-transformatif-guru-sma-provinsi-kepulauan-riau-708ebd.jpeg', 'Admin Humas', '2025-10-30 12:46:46', '2026-06-09 02:49:25', '2026-06-09 02:49:25', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('35', 'Semangat Pemuda, Wujudkan Indonesia Maju: SMAN 1 Tanjungpinang Peringati Hari Sumpah Pemuda ke-97', 'semangat-pemuda-wujudkan-indonesia-maju-sman-1-tanjungpinang-peringati-hari-sumpah-pemuda-ke-97', 'utama', '
<p>SMANSANEWS &#8211; Dalam rangka memperingati Hari Sumpah Pemuda ke-97, SMA Negeri 1 Tanjungpinang menggelar upacara bendera yang berlangsung khidmat di lapangan sekolah SMA Negeri 1 Tanjungpinang. Pada Selasa, (28/10/25).</p>



<p>Kegiatan upacara Sumpah Pemuda ini diikuti oleh seluruh warga sekolah, baik dari siswa, guru, serta semua tenaga kependidikan SMA Negeri 1 Tanjungpinang. Upacara dimulai pada pukul 07.00 WIB dengan pengibaran bendera Merah Putih oleh Pasukan Khusus (Pasus) dan diiringi oleh lagu Indonesia Raya.</p>



<p>Amanat dari Kepala SMAN 1 Tanjungpinang, Daman Huri S.Pd., Kim., M.M., menyampaikan pentingnya semangat persatuan dan tanggung jawab generasi muda dalam menjaga keutuhan bangsa.</p>



<p>“Pemuda hari ini harus mampu menjadi pemuda yang tidak hanya berprestasi di bidang akademik, tetapi juga memiliki karakter, kepedulian sosial, dan cinta tanah air,” ujarnya dalam amanat upacara.</p>



<p>Upacara Sumpah Pemuda diharapkan dapat menumbuhkan semangat persatuan dan rasa cinta tanah air di kalangan siswa. Kegiatan ini juga menjadi momen untuk meneladani perjuangan para pemuda 1928 yang berani bersatu demi Indonesia. Melalui upacara ini, generasi muda diharapkan semakin berkarakter, berprestasi, dan siap membangun bangsa.</p>



<p></p>



<p>Acara diakhiri dengan pembacaan doa bersama dan pengumuman juara lomba serta dengan diadakannya Fashion Show bertemakan baju adat dan Lomba Membaca Pantun yang diadakan di aula SMA Negeri 1 Tanjungpinang. (Ric/Sar)</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="790" height="420" src="https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/10/PIALAA-1.png?resize=790%2C420&#038;ssl=1" alt="" class="wp-image-1267" data-recalc-dims="1"/></figure></div>', '/storage/images/articles/semangat-pemuda-wujudkan-indonesia-maju-sman-1-tanjungpinang-peringati-hari-sumpah-pemuda-ke-97-8e8c74.png', 'Admin Humas', '2025-10-28 23:46:09', '2026-06-09 02:49:40', '2026-06-09 02:49:40', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('36', 'Jaringan Pendidikan Internasional Diperkuat: SMAN 1 Tanjungpinang dan Sekolah Menengah Sains Johor Gelar Program Pertukaran Ilmu', 'jaringan-pendidikan-internasional-diperkuat-sman-1-tanjungpinang-dan-sekolah-menengah-sains-johor-gelar-program-pertukaran-ilmu', 'utama', '
<p>SMANSANEWS &#8211; Semangat kolaborasi pendidikan lintas negara terjalin erat antara Indonesia dan Malaysia. SMA Negeri 1 Tanjungpinang menjadi tuan rumah bagi delegasi dari Sekolah Menengah Sains Kota Tinggi (SMSKT), Bandar Penawar, Johor, Malaysia, dalam sebuah acara bertajuk Program Keantarabangsaan dan Perkongsian Ilmu Amalan Terbaik. Acara ini diselenggarakan di Aula SMA Negeri 1 Tanjungpinang, pada Sabtu, (18/10/25)</p>



<p>Kunjungan ini merupakan langkah awal penjajakan kerjasama dan pertukaran praktik terbaik antara kedua institusi pendidikan. Perwakilan dari SMSKT yang hadir dipimpin langsung oleh Tuan Hj. MD Zin bin Dekan (Pengetua), didampingi Dr. Mazlena binti Murshed (Penolong Kanan Hal Ehwal Murid) dan Encik Hermin Bin Sirat (Penolong Kanan Kurikulum), serta diikuti oleh guru dan sejumlah siswa/i SMSKT.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="684" height="524" src="/storage/images/articles/jaringan-pendidikan-internasional-diperkuat-sman-1-tanjungpinang-dan-sekolah-menengah-sains-johor-gelar-program-pertukaran-ilmu-inline-1-d270a6.png" alt="" class="wp-image-1260" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Dalam sambutannya, Pengetua SMSKT, Tuan Hj. MD Zin bin Dekan, mengungkapkan rasa syukurnya atas terlaksananya kegiatan ini.</p>



<p>“Alhamdulillah pada petang ini kita dapat mengadakan satu majelis yang bertemakan program keantarakebangsaan dan perkongsian ilmu amalan terbaik dari antara sekolah dengan [Sekolah Menengah] Sains Kota Tinggi dan SMA Negeri 1 Tanjungpinang, semoga program ini memberikan amalan terbaik untuk antar sekolah” ujar Tuan Hj. MD Zin. Beliau juga secara terbuka mengundang balik SMAN 1 Tanjungpinang, “InsyaAllah nanti suatu masa saya jemput Bapak beserta rombongan sama-sama datang ke Sekolah Sains Tinggi.”</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/jaringan-pendidikan-internasional-diperkuat-sman-1-tanjungpinang-dan-sekolah-menengah-sains-johor-gelar-program-pertukaran-ilmu-inline-2-2f2c71.jpg" alt="" class="wp-image-1261" data-recalc-dims="1"/></figure>



<p></p>



<p>Sementara itu, Kepala Sekolah SMAN 1 Tanjungpinang menyoroti sejarah panjang dan keunggulan institusinya. Beliau menyebut bahwa SMAN 1 Tanjungpinang adalah sekolah tertua di Kepulauan Riau, yang berdiri sejak 1956, dan telah melahirkan banyak alumni berprestasi, salah satunya yang akan dikukuhkan sebagai guru besar/profesor dalam waktu dekat.</p>



<p>Lebih lanjut, beliau memaparkan perbedaan sistem pendidikan yang menjadi fokus pertukaran ide, yaitu sistem sekolah asrama (boarding) 24 jam yang diterapkan di SMSKT, berbanding sistem sekolah pagi hingga sore di SMAN 1 Tanjungpinang. “Mungkin inilah yang bisa kita ambil plus minus-nya antara yang boarding dan kita yang masuk pagi pulang sore. Di sinilah kita bertukar pikiran,” jelas Daman Huri.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="593" src="/storage/images/articles/jaringan-pendidikan-internasional-diperkuat-sman-1-tanjungpinang-dan-sekolah-menengah-sains-johor-gelar-program-pertukaran-ilmu-inline-3-a7df55.jpg" alt="" class="wp-image-1262" data-recalc-dims="1"/></figure>



<p></p>



<p>Kepala Sekolah juga memperkenalkan kebiasaan unik sekolah, yaitu pelaksanaan menyanyikan lagu kebangsaan yang dilanjutkan dengan pembacaan Sholawat Busyro sebagai program dari pemerintah daerah.</p>



<p>Acara ditutup dengan harapan besar agar jaringan persahabatan dan kerjasama ini dapat berkelanjutan, meskipun beliau mengakui bahwa kunjungan ke luar negeri membutuhkan persiapan yang matang. Namun, kami percaya bahwa jika untuk kebaikan dan kemajuan bersama maka semua akan dapat tercapai dengan baik. (Nat)</p>



<p></p>
', '/storage/images/articles/jaringan-pendidikan-internasional-diperkuat-sman-1-tanjungpinang-dan-sekolah-menengah-sains-johor-gelar-program-pertukaran-ilmu-f3f84a.jpg', 'Admin Humas', '2025-10-19 12:14:55', '2026-06-09 02:50:11', '2026-06-09 02:50:11', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('37', 'Pelantikan Pengurus OSIS SMA Negeri 1 Tanjungpinang Masa Bakti 2025/2026', 'pelantikan-pengurus-osis-sma-negeri-1-tanjungpinang-masa-bakti-2025-2026', 'utama', '
<p>SMANSANEWS — SMA Negeri 1 Tanjungpinang melaksanakan kegiatan Pelantikan Pengurus Organisasi Siswa Intra Sekolah (OSIS) masa bakti 2025/2026. Kegiatan ini berlangsung di Lapangan Utama SMA Negeri 1 Tanjungpinang pada hari Senin, (13/10/25).</p>



<p>Pelantikan ini menjadi momen penting bagi pergantian kepengurusan OSIS dari masa bakti 2024/2025 ke masa bakti 2025/2026.</p>



<p>Pengurus inti OSIS masa bakti 2024/2025 terdiri dari:</p>



<p>Ketua OSIS: Abrian Octario,</p>



<p>Wakil Ketua 1: M. Alfachry Sembiring,</p>



<p>Wakil Ketua 2: M. Fakhri Al Zaffan,</p>



<p>Sekretaris Umum: Violetta Augustia Renata,</p>



<p>Sekretaris 1: Khanza Nayla Diah Putri,</p>



<p>Sekretaris 2: Vanesha Fitriani,</p>



<p>Bendahara 1: Ghaida Aliya Tsurayya, dan</p>



<p>Bendahara 2: Grace Aprilia Lee.</p>



<p>Sementara itu, pengurus inti OSIS masa bakti 2025/2026 yang baru dilantik terdiri dari:</p>



<p>Ketua OSIS: M. Fakhri Al Zaffan,</p>



<p>Wakil Ketua 1: Divani Indah Syahputri,</p>



<p>Wakil Ketua 2: Daffa Putra Surya,</p>



<p>Sekretaris Umum: Vanesha Fitriani,</p>



<p>Sekretaris 1: Zahara Talitawati,</p>



<p>Sekretaris 2: Keisha Assyfa Rahma,</p>



<p>Bendahara 1: Annisa Aura Syifa, dan</p>



<p>Bendahara 2: Rasendriya Faiz Ramadhan Varianto.</p>



<p>Dalam sambutannya, Ketua OSIS terpilih M. Fakhri Al Zaffan menyampaikan ucapan terima kasih kepada seluruh warga sekolah atas dukungan dan keterlibatan dalam proses pemilihan hingga pelantikan. Ia menegaskan bahwa jabatan ketua OSIS merupakan tanggung jawab besar yang harus dijalankan dengan penuh dedikasi.</p>



<p>“OSIS bukan hanya sebuah organisasi, tetapi wadah bagi kita semua untuk berkontribusi dan bersuara. Saya ingin setiap siswa SMA Negeri 1 Tanjungpinang berani menyampaikan pendapat, kritik, dan aspirasinya. Karena pemimpin yang baik adalah pemimpin yang terbuka terhadap kritik,” ujar Fakhri dalam pidatonya.</p>



<p>Sementara itu, Kepala SMA Negeri 1 Tanjungpinang, Daman Huri, S.Pd.Kim., M.M., dalam amanatnya memberikan apresiasi kepada pengurus OSIS masa bakti 2024/2025 atas dedikasi dan kerja keras mereka selama menjabat.</p>



<p>“Terima kasih kepada seluruh pengurus OSIS 2024/2025 yang telah berjuang membawa nama baik sekolah. Saya sering melihat bagaimana mereka bekerja keras bahkan saat siswa lain sudah pulang. Itu adalah bentuk pengorbanan dan tanggung jawab seorang pemimpin,” ucap beliau.</p>



<p>Beliau juga menyampaikan harapannya kepada pengurus baru agar dapat melanjutkan program-program baik dari kepengurusan sebelumnya, serta tidak ragu untuk bertanya dan menerima kritik demi kemajuan organisasi.</p>



<p>“Seorang pemimpin yang baik harus siap menerima kritik, karena dari kritiklah kita bisa melihat kekurangan yang tidak tampak oleh diri sendiri,” tambahnya.</p>



<p>Acara pelantikan ditutup dengan pemasangan selempang secara simbolis kepada para pengurus baru serta doa bersama. Diharapkan, dengan semangat baru kepemimpinan ini, OSIS SMA Negeri 1 Tanjungpinang dapat terus berkembang dan menjadi wadah aspirasi seluruh siswa. (Nat)</p>
', '/storage/images/articles/pelantikan-pengurus-osis-sma-negeri-1-tanjungpinang-masa-bakti-2025-2026-46d4d0.png', 'Admin Humas', '2025-10-13 23:22:41', '2026-06-09 02:50:16', '2026-06-09 02:50:16', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('38', 'Evan Nicholas Ukir Prestasi, SMAN 1 Tanjungpinang Raih Juara 3 OSN 2025 Tingkat Nasional Cabang Kebumian', 'evan-nicholas-ukir-prestasi-sman-1-tanjungpinang-raih-juara-3-osn-2025-tingkat-nasional-cabang-kebumian', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang kembali mengukir prestasi membanggakan di kancah nasional setelah salah satu siswanya, Evan Nicholas, berhasil meraih Juara III dalam ajang Olimpiade Sains Nasional (OSN) 2025 untuk Cabang Kebumian.</p>



<p>Prestasi ini dikukuhkan dalam pengumuman resmi dari Balai Pengembangan Talenta Indonesia (BPTI), Pusat Prestasi Nasional, yang melaksanakan final lomba pada tanggal 6 hingga 11 Oktober 2025 di Univeristas Muhammadiyah Malang. Evan Nicholas menjadi perwakilan tunggal dari sekolah tersebut yang sukses menembus tiga besar kompetisi sains paling bergengsi di Indonesia.</p>



<p>Kepala Sekolah SMAN 1 Tanjungpinang, Daman Huri S.Pd., Kim., M.M., menyampaikan rasa bangga yang luar biasa atas pencapaian ini. Ia menegaskan bahwa prestasi ini menempatkan sekolahnya pada posisi yang istimewa.</p>



<p>&#8220;Luar biasa, satu-satunya SMA negeri di provinsi di Kepulauan Riau hanya di SMA Negeri 1 yang meraih juara OSN tingkat Nasional, Ini merupakan kabar baik yang harus kita syukuri dan pertahankan.&#8221; ujar Daman Huri. </p>



<p>Kepala sekolah berharap agar prestasi ini menjadi motivasi bagi murid lain untuk terus berprestasi. &#8220;Semoga adik-adik semua harus bangga jadi siswa SMA Negeri 1, wujudkan dengan prestasi,&#8221; pesannya.</p>



<p>Ia meyakini kemampuan para siswanya untuk membawa nama baik sekolah. &#8220;Kalau tidak kita, siapa lagi yang mampu membawa SMA 1 terbang jauh ke awan. Ini tugas dan tanggung jawab kita semua,&#8221; tegasnya.</p>



<p>Daman Huri, S.Pd.Kim., M.M. memastikan bahwa sekolah akan memberikan dukungan penuh bagi setiap siswa yang ingin berkompetisi, baik di bidang akademik maupun non-akademik. Ia berpesan kepada siswa untuk mempersiapkan diri dan bekal ilmu sebanyak-banyaknya. &#8220;Persiapkan lah diri kalian masing-masing bekal sebanyak-banyaknya, mumpung masih ada orang tua yang membiayai, dan masih ada fasilitator-fasilitator yang luar biasa di sekolah ini,&#8221; tutupnya.</p>



<p>Semoga kedepan SMA Negeri 1 Tanjungpinang semakin maju dan mendunia. (Nat)</p>
', '/storage/images/articles/evan-nicholas-ukir-prestasi-sman-1-tanjungpinang-raih-juara-3-osn-2025-tingkat-nasional-cabang-kebumian-b54546.jpeg', 'Admin Humas', '2025-10-12 23:56:57', '2026-06-09 02:50:18', '2026-06-09 02:50:18', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('39', 'SMA Negeri 1 Tanjungpinang Sukses Gelar PPTA 2025/2026', 'sma-negeri-1-tanjungpinang-sukses-gelar-ppta-2025-2026', 'utama', '
<p>SMANSANEWS – Rangkaian kegiatan Perkemahan Penerimaan Tamu Ambalan (PPTA) Gugus Depan 01-001 dan 01-002 Pangkalan SMA Negeri 1 Tanjungpinang Tahun 2025 resmi ditutup dengan khidmat dalam sebuah upacara penutupan di Lapangan Utama sekolah pada Minggu siang, (12/10/25).</p>



<p>Kegiatan yang telah berlangsung sejak Jumat lalu ini ditutup secara resmi oleh Pembina Upacara, Kak Daman Huri S.Pd., Kim., M.M., selaku Kamabigus SMAN 1 Tanjungpinang yang mengapresiasi kerja keras seluruh pihak.</p>



<p>Dalam amanat penutupannya, Kak Daman Huri, S.Pd.Kim., M.M. menyampaikan rasa syukur atas kelancaran kegiatan, terutama karena cuaca yang &#8220;sangat bersahaja,&#8221; dan menekankan bahwa tidak ada kejadian luar biasa yang terjadi.</p>



<p>&#8220;Ucapan terima kasih kepada segenap panitia yang telah membantu adik-adik semua, baik dari pembina serta majelis guru maupun kakak-kakak kelas, karena tanpa adanya panitia, kegiatan PPTA ini tidak akan bisa terlaksana,&#8221; ucap Kak Daman Huri.</p>



<p>Apresiasi khusus juga diberikan kepada tim kesehatan PMR dan UKS yang telah berperan besar dalam menjaga kondisi peserta.</p>



<p>Tantangan dan Prestasi Sekolah. Kak Daman Huri, S.Pd.Kim., M.M. menyoroti bahwa perkemahan ini telah menjadi wadah bagi murid untuk menampilkan bakat dan kreativitas, yang menjadi cikal bakal kepengurusan Ambalan di masa depan.</p>



<p><strong>Pentingnya Persiapan Diri</strong>:</p>



<p>Kak Daman Huri, S.Pd.Kim., M.M. berpesan kepada para murid agar dapat memanfaatkan fasilitas sekolah dan dukungan orang tua untuk mempersiapkan diri sebaik mungkin kedepannya.</p>



<p>&#8220;Adik-adik semua sudah ditempa selama 2 malam 3 hari, InsyaAllah akan menjadi pribadi yang lebih kuat. Karena ke depan, tanpa kesiapan kita, maka kita akan tersisih. Karena itu, persiapkanlah diri kalian masing-masing dengan memanfaatkan fasilitas yang ada disekolah ini,&#8221; pungkasnya.</p>



<p>Upacara penutupan diakhiri dengan pelepasan tanda peserta, penyerahan sertifikat, dan pengumuman Juara Umum.</p>



<p>&#8220;Dengan mengucap alhamdulillah, kegiatan Perkemahan Penerimaan Tamu Ambalan SMA Negeri 1 Tanjungpinang Tahun 2025 secara resmi kakak nyatakan ditutup,&#8221; tutup Daman Huri.</p>



<p>DAFTAR JUARA LOMBA PPTA SMAN 1 TANJUNGPINANG 2025</p>



<p>kelas X.13 berhasil keluar sebagai Juara Umum.</p>



<p>Berikut adalah rincian pemenang untuk setiap mata lomba:</p>



<p>* Trailer: Juara 1 diraih oleh kelas X.16, Juara 2 oleh X.7, dan Juara 3 oleh X.13.</p>



<p>* Trailer Favorite: Kelas X.16 menempati posisi pertama, diikuti X.13 dan X.17.</p>



<p>* Cerdas Cermat: Kelas X.1 meraih Juara 1, X.17 Juara 2, dan X.4 Juara 3.</p>



<p>* Pionering: Juara 1 dimenangkan X.13, Juara 2 oleh X.1, dan Juara 3 oleh X.17.</p>



<p>* Pentas Seni: Juara 1 diraih X.12, Juara 2 X.15, dan Juara 3 X.2.</p>



<p>Keterampilan Kepramukaan:</p>



<p>* Semaphore PA (Putra): Kelas X.1, X.2, dan X.9 berturut-turut menjadi Juara 1, 2, dan 3.</p>



<p>* Semaphore PI (Putri): Juara 1 X.13, Juara 2 X.14, dan Juara 3 X.15.</p>



<p>* Sandi PA: Kelas X.2, X.4, dan X.9 meraih peringkat 1, 2, dan 3.</p>



<p>* Sandi PI: X.17, X.6, dan X.13 menjadi yang terbaik.</p>



<p>* Morse PA: Juara 1 X.1, Juara 2 X.14, dan Juara 3 X.11.</p>



<p>* Morse PI: Kelas X.2 keluar sebagai Juara 1, disusul X.17 dan X.1.</p>



<p>* Masak PA: Juara 1 diraih oleh Sangga 1 dari kelas X.9, Juara 2 oleh Sangga 1 dari X.10, dan Juara 3 oleh Sangga 2 dari X.5.</p>



<p>* Masak PI: Sangga 2 kelas X.16 meraih Juara 1, disusul Sangga 2 X.3 dan Sangga 1 X.11.</p>



<p>Lomba Fisik:</p>



<p>* Hiking PA: Kelas X.16 meraih Juara 1, X.6 Juara 2, dan X.14 Juara 3.</p>



<p>* Hiking PI: Juara 1 X.9, Juara 2 X.12, dan Juara 3 X.3.</p>



<p>* Yel Yel: Juara 1 diraih X.3, Juara 2 X.5, dan Juara 3 X.14.</p>



<p>Penghargaan Individu dan Kelompok Terbaik:</p>



<ul>
<li>Danton Terbaik PA: Yeremia Joint Pratama dari kelas X.2.</li>



<li>Kelas Terkompak: Kelas X.6.</li>



<li>Mentor Terbaik PI: Tri Alvhini Lam Sari dari kelas X.5.</li>



<li>Mentor Terbaik PA: Jonathan Febriand dari kelas X.10</li>



<li>Mentri Terbaik: Javas dari kelas X.10.</li>
</ul>



<p>(Nat).</p>
', '/storage/images/articles/sma-negeri-1-tanjungpinang-sukses-gelar-ppta-2025-2026-ca486a.png', 'Admin Humas', '2025-10-12 23:42:32', '2026-06-09 02:50:19', '2026-06-09 02:50:19', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('40', 'Api Unggun Hangatkan Semangat Persatuan PPTA SMAN 1 Tanjungpinang', 'api-unggun-hangatkan-semangat-persatuan-ppta-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS – Ratusan siswa kelas X anggota gerakan Pramuka SMA Negeri 1 Tanjungpinang menggelar Upacara Api Unggun yang berlangsung khidmat di lapangan utama sekolah pada Sabtu malam, (11/10/25).<br>Kegiatan ini merupakan bagian dari rangkaian Perkemahan Penerimaan Tamu Ambalan (PPTA) yang bertujuan untuk mengukuhkan nilai-nilai Dasa Dharma Pramuka, menumbuhkan semangat persatuan, dan membentuk karakter murid menjadi pribadi yang bertanggung jawab.</p>



<p>Kak Daman Huri S.Pd., Kim., M.M., selaku Kamabigus SMAN 1 Tanjungpinang yang bertindak sebagai Pembina Upacara, dalam amanatnya menekankan pentingnya mengamalkan Dasa Dharma, khususnya poin &#8220;Cinta alam dan Kasih sayang sesama manusia.&#8221; Ia juga mengajak seluruh peserta upacara untuk melakukan refleksi diri dan bersyukur atas karunia Tuhan Yang Maha Kuasa.</p>



<p>&#8220;Kita sebagai makhluk yang lemah, tetapi karena karunia dari Yang Maha Kuasa maka kita bisa melaksanakan rangkaian kegiatan kita malam ini,&#8221; ujarnya.</p>



<p>Dalam amanatnya beliau juga menyampaikan, terdapat 2 filosofi mendalam yang terkandung dalam nyala api unggun sebagai bekal bagi anggota Pramuka:</p>



<ol>
<li>Lambang Semangat dan Keteguhan: Mencerminkan semangat pantang menyerah dan tekad yang kuat, belajar dari alam.</li>



<li>Simbol Persatuan dan Kebersamaan: Kegiatan ini tidak akan terwujud tanpa persatuan dan kesatuan di antara seluruh peserta, yang juga melambangkan semangat gotong royong sebagai karakter bangsa Indonesia.</li>
</ol>



<p>Beliau juga nambahkan beberapa point penting untuk siswa SMA Negeri 1 Tanjungpinang yaitu, Refleksi Diri dan Renungan: Mendorong siswa untuk merefleksikan diri dan mengambil langkah ke depan yang lebih baik. Dan,<br>Sarana Ekspresi dan Kreativitas: Memberikan ruang bagi siswa untuk mengekspresikan diri dan berkreativitas, selama tidak melanggar norma dan aturan yang berlaku.<br>&#8220;Pramuka mendidik adik-adik menjadi jiwa yang kuat, teguh, dan bertanggung jawab,&#8221; pungkas Kak Daman Huri, S.Pd.Kim., M.M. seraya berpesan kepada para pembina untuk terus membimbing anggotanya agar mencapai kesuksesan di masa depan. (Nat)</p>
', '/storage/images/articles/api-unggun-hangatkan-semangat-persatuan-ppta-sman-1-tanjungpinang-28f50f.png', 'Admin Humas', '2025-10-12 23:28:26', '2026-06-09 02:50:20', '2026-06-09 02:50:20', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('41', 'Pembukaan Perkemahan Penerimaan Tamu Ambalan SMAN 1 Tanjungpinang Tahun Ajaran 2025/2026', 'pembukaan-perkemahan-penerimaan-tamu-ambalan-sman-1-tanjungpinang-tahun-ajaran-2025-2026', 'utama', '
<p>SMANSANEWS &#8211; Lebih dari 600 siswa kelas X SMA Negeri 1 Tanjungpinang memulai fase baru dalam pendidikan karakter melalui kegiatan Perkemahan Penerimaan Tamu Ambalan (PPTA) Gugus Depan 01-001 dan 01-002 tahun 2025. Acara yang dibuka secara resmi di Lapangan SMA Negeri 1 Tanjungpinang, bertujuan melatih kedisiplinan, kepemimpinan, dan kerja sama bagi peserta yang bertransisi dari tingkatan Penggalang menjadi Penegak. Pembukaan perkemahan berjalan khidmat dengan dihadiri Kamabigus Kak Daman Huri, S.Pd.Kim. M.M. serta seluruh guru SMAN 1 Tanjungpinang, Tamu Undangan Forkompimcam Tanjungpinang Barat, Lurah Bukit Cermin, dan Kamabigus dari sekolah lain. Kegiatan ini dibuka langsung oleh Kak Beam selaku perwakilan dari Kwartir Daerah (Kwarda) Kepulauan Riau sebagai Pembina Upacara. Pada Jum&#8217;at (10/10/2025).</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/pembukaan-perkemahan-penerimaan-tamu-ambalan-sman-1-tanjungpinang-tahun-ajaran-2025-2026-inline-1-055eba.jpg" alt="" class="wp-image-1236" data-recalc-dims="1"/></figure>



<p></p>



<p>Dalam amanatnya, Pembina Upacara Pembukaan Kak Beam menekankan bahwa Gerakan Pramuka adalah proses pendidikan moral yang berkelanjutan. Ia menggarisbawahi pentingnya PTA sebagai momen transisi. Transisi Penting untuk Pembentukan Karakter.</p>



<p>&#8220;Adik-adik, Gerakan Pramuka itu adalah suatu proses pendidikan moral. Sore hari ini kita menikmati atau menjalani proses perkemahan Penerimaan Tamu Ambalan. Dalam Pramuka ada prosesnya, adik-adik, dari Siaga menjadi Penggalang, dari Penggalang menjadi Penegak. Jadi, hari ini adik-adik mengalami proses dari Penggalang menjadi Penegak baik putra maupun putri,&#8221; jelas Kak Beam di hadapan peserta.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="383" src="/storage/images/articles/pembukaan-perkemahan-penerimaan-tamu-ambalan-sman-1-tanjungpinang-tahun-ajaran-2025-2026-inline-2-9ad110.png" alt="" class="wp-image-1237" data-recalc-dims="1"/></figure>



<p></p>



<p>Kemudian Kamabigus SMAN 1 Tanjungpinang, Kak Daman Huri, S.Pd.Kim., M.M. menegaskan bahwa kegiatan Perkemahan Pramuka ini identik dengan kesederhanaan dan survival, ia menyebut justru kondisi itulah yang menjadi tempat pendidikan terbaik. &#8220;Perkemahan itu identik dengan serba kekurangan, kesederhaan, survival kita, tapi di dalam kekurangan itulah letak pendidikan dalam Gerakan Pramuka. Ini adalah proses pendidikan disiplin, kepemimpinan, gotong royong, dan kerja sama,&#8221; tegasnya.</p>



<p>Kegiatan PPTA 2025 ini diikuti oleh total 612 siswa kelas X SMAN 1 Tanjungpinang. Selain itu, dukungan penuh terlihat dari kehadiran seluruh guru-guru SMAN 1 Tanjungpinang yang memantau jalannya upacara pembukaan.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="497" src="/storage/images/articles/pembukaan-perkemahan-penerimaan-tamu-ambalan-sman-1-tanjungpinang-tahun-ajaran-2025-2026-inline-3-0f8e6d.png" alt="" class="wp-image-1238" data-recalc-dims="1"/></figure>



<p></p>



<p>Pelaksanaan PPTA ini dibawah Koordinator Pembina Pramuka Kak Linawati, S.Pd. beserta Pembina Pramuka Putri dan Pembina Pramuka Putra yang lain. Teknis kegiatan dilapangan dikoordinasikan oleh Dewan Ambalan yang dibantu oleh 157 orang sebagai Sangga Kerja dan Penanggung Jawab PTA. Selain itu, kelancaran logistik dan keamanan didukung oleh tim dari ekskul PMR dan UKS. Agar informasi kegiatan tersampaikan dengan baik kepada publik, tim Humas sekolah turut mengirimkan dua orang personel yang bertugas sebagai fotografer dan tim rilis berita.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="382" src="https://i2.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/10/PTA-4-1-1.png?resize=790%2C382&#038;ssl=1" alt="" class="wp-image-1240" data-recalc-dims="1"/></figure>



<p></p>



<p>Kegiatan PPTA tahun pelajaran 2025-2026 ini akan berjalan selama 3 hari mulai 10-12 Oktober 2025 (Jum&#8217;at sampai dengan hari Minggu). Semoga dengan pengalaman berharga yang mereka dapatkan dari kegiatan PPTA ini, para siswa baru diharapkan dapat beradaptasi dengan baik di lingkungan sekolah dan menjadi individu yang lebih disiplin, mandiri, serta berjiwa kepemimpinan. (Nat)</p>
', '/storage/images/articles/pembukaan-perkemahan-penerimaan-tamu-ambalan-sman-1-tanjungpinang-tahun-ajaran-2025-2026-ab60d9.png', 'Admin Humas', '2025-10-11 23:37:02', '2026-06-09 02:50:51', '2026-06-09 02:50:51', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('42', 'Hari Kesaktian Pancasila 2025: SMAN 1 Tanjungpinang Kobarkan Semangat Persatuan dan Tanamkan Nilai-Nilai Pancasila', 'hari-kesaktian-pancasila-2025-sman-1-tanjungpinang-kobarkan-semangat-persatuan-dan-tanamkan-nilai-nilai-pancasila', 'utama', '
<p>SMANSANEWS – SMAN 1 Tanjungpinang menggelar upacara peringatan Hari Kesaktian Pancasila dengan penuh khidmat di lapangan sekolah. Kegiatan ini diikuti oleh seluruh warga sekolah terdiri dari murid, guru, serta tenaga kependidikan sebagai bentuk penghormatan terhadap nilai-nilai luhur Pancasila sekaligus mengenang peristiwa bersejarah yang menguji kesetiaan bangsa pada ideologi Negara, pada Rabu (1/10/2025).</p>



<p>Dalam upacara tersebut, Kepala SMAN 1 Tanjungpinang, Daman Huri, S.Pd.Kim., M.M. menyampaikan bahwa Pancasila bukan hanya dasar negara, tetapi juga pedoman moral yang harus dihayati dalam kehidupan sehari-hari. “Hari ini kita tidak hanya mengenang sejarah, tetapi juga meneguhkan kembali komitmen untuk menjadikan Pancasila sebagai sumber inspirasi dalam membangun persatuan, toleransi, dan semangat kebangsaan,” ujarnya.</p>



<p>Selanjutnya, dalam momen penting ini, Kepala Sekolah juga membacakan amanat tertulis dari Ketua DPR RI, Dr. (H.C.) Puan Maharani. Dalam amanat tertulis tersebut, Puan Maharani mengingatkan bahwa sejak diproklamasikan pada 17 Agustus 1945, bangsa Indonesia telah menghadapi berbagai rongrongan baik dari dalam maupun luar negeri terhadap keutuhan Negara Kesatuan Republik Indonesia (NKRI).</p>



<p>&#8220;Rongrongan itu, menurutnya, seringkali dimungkinkan karena kelengahan dan kurangnya kewaspadaan terhadap upaya yang ingin melemahkan Pancasila sebagai ideologi negara. Namun, dengan semangat kebersamaan yang berlandaskan nilai-nilai luhur Pancasila, bangsa Indonesia tetap mampu memperkokoh tegaknya NKRI. Maka di hadapan Tuhan Yang Maha Esa dalam memperingati Hari Kesaktian Pancasila, kami membulatkan tekad untuk tetap mempertahankan dan mengamalkan nilai-nilai Pancasila sebagai sumber kekuatan, menggalang kebersamaan untuk memperjuangkan, menegakkan kebenaran dan keadilan demi keutuhan Negara Kesatuan Republik Indonesia,” demikian bunyi ikrar yang dibacakan oleh Kepala Sekolah.</p>



<p>Upacara ini tidak hanya menjadi seremonial, tetapi juga menjadi pengingat akan pentingnya menjaga persatuan, menegakkan kebenaran, dan mengamalkan nilai-nilai Pancasila di tengah berbagai tantangan kebangsaan. SMAN 1 Tanjungpinang berharap peringatan Hari Kesaktian Pancasila tahun ini dapat menjadi momentum memperkuat jati diri bangsa di tengah tantangan globalisasi. (Ger/Nat/Sar)</p>
', '/storage/images/articles/hari-kesaktian-pancasila-2025-sman-1-tanjungpinang-kobarkan-semangat-persatuan-dan-tanamkan-nilai-nilai-pancasila-bfa28d.png', 'Admin Humas', '2025-10-02 16:21:59', '2026-06-09 02:50:55', '2026-06-09 02:50:55', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('43', 'Pemilihan OSIS SMA Negeri 1 Tanjungpinang Masa Bhakti 2025/2026 Berjalan Demokratis', 'pemilihan-osis-sma-negeri-1-tanjungpinang-masa-bhakti-2025-2026-berjalan-demokratis', 'utama', '
<p>SMANSANEWS – SMA Negeri 1 Tanjungpinang melaksanakan Pemilihan Umum Ketua dan Wakil Ketua OSIS beserta Sekretaris dan Bendahara OSIS untuk periode 2025/2026. Kegiatan ini berlangsung di Aula SMA Negeri 1 Tanjungpinang pada Selasa (30/09/25).</p>



<p>Pemilihan Osis dilakukan di tiga Tempat Pemungutan Suara (TPS). TPS 1 diperuntukkan bagi Pendidik dan Tenaga Kependididikan serta murid kelas XII yang berada di Aula SMA Negeri 1 Tanjungpinang, TPS 2 untuk kelas X di Ruang TRRC, dan TPS 3 untuk kelas XI di Gedung B. Pembukaan Pemilihan Osis di hadiri oleh Perwakilan dari KPU Kota Tanjungpinang dan Perwakilan Komite SMA Negeri 1 Tanjungpinang.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="593" src="/storage/images/articles/pemilihan-osis-sma-negeri-1-tanjungpinang-masa-bhakti-2025-2026-berjalan-demokratis-inline-1-01b79f.jpeg" alt="" class="wp-image-1228" data-recalc-dims="1"/></figure>



<p></p>



<p>Ketua Komite di wakili oleh Abdul Salam menyampaikan dalam sambutannya bahwa OSIS merupakan wadah penting bagi siswa untuk belajar kepemimpinan dan tanggung jawab.<br>“Kepada anak-anak kami, OSIS ini adalah wadah untuk belajar kepemimpinan dan tanggung jawab, supaya bisa menjadi bekal meraih cita-cita di masa depan. Maka dari itu dilakukan pemilihan supaya ada rasa demokratis pada siswa,” ujarnya.</p>



<p>Sementara itu, sambutan Kepala Sekolah Daman Huri, S.Pd., Kim., M.M. menekankan bahwa kegiatan ini merupakan bentuk nyata pembelajaran demokrasi di lingkungan sekolah.</p>



<p>“Pemilihan Osis ini konsepnya sama dengan pemilihan-pemilihan yang ada di Negara kita. Dari bekal ini suatu saat nanti, siapa tahu ada yang menjadi Ketua KPU dan bisa memberikan konstribusi yang luar biasa karena sejak dini sudah belajar tentang konsep demokrasi. Seluruh panitia sudah mempersiapkan dengan baik, dan inilah demokrasi, dari kita, oleh kita, dan untuk kita,” ungkapnya. Ia juga mengapresiasi kerja keras seluruh panitia dalam menyukseskan acara ini.</p>



<p>Sambutan ketiga sekaligus pembukaan pemilihan osis masa bhakti 2025/2026 ini disampaikan oleh William Defri, S.H., M.H. perwakilan dari KPU Kota Tanjungpinang. Beliau menyebut OSIS sebagai miniatur sistem kenegaraan.</p>



<p>“OSIS ini merupakan miniatur dari sistem kenegaraan. Maka dari itu pemilihan osis seperti ini adalah contoh nyata dalam Demokrasi Negara kita. Walaupun ini masih dalam tahap belajar demokrasi, tapi kami melihat sudah sangat luar biasa tahapan dalam proses pemilu sudah sesuai dengan tahapan pemilu di Negara Kita. Pesan saya teruslah belajar berorganisasi dan berkomunikasi karena hal itu adalah bekal penting sebelum terjun ke dunia nyata,” pesannya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="1053" src="/storage/images/articles/pemilihan-osis-sma-negeri-1-tanjungpinang-masa-bhakti-2025-2026-berjalan-demokratis-inline-2-88252a.jpeg" alt="" class="wp-image-1227" data-recalc-dims="1"/></figure>



<p></p>



<p>Semoga dengan pemilihan osis masa bhakti 2025/2026 ini dapat menanamkan nilai-nilai demokrasi kepada seluruh murid SMA Negeri 1 Tanjungpinang. Terimakasih kepada seluruh civitas akademika atas semangat dan antusiasme dalam memberikan suara datang ke TPS yang sudah ditentukan, sekaligus ini menjadi ajang pembelajaran bagi murid dalam menerapkan proses demokrasi secara nyata di lingkungan sekolah. (Ger/Nat)</p>
', '/storage/images/articles/pemilihan-osis-sma-negeri-1-tanjungpinang-masa-bhakti-2025-2026-berjalan-demokratis-99dae4.jpeg', 'Admin Humas', '2025-09-30 10:32:36', '2026-06-09 02:51:08', '2026-06-09 02:51:08', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('44', 'Sukses! Grand Smansa Festival Ditutup, Tumbuhkan Prestasi dan Kemandirian Murid', 'sukses-grand-smansa-festival-ditutup-tumbuhkan-prestasi-dan-kemandirian-murid', 'utama', '
<p>SMANSANEWS &#8211; Grand Smansa Festival (GSF) yang berlangsung di Lapangan Utama SMA Negeri 1 Tanjungpinang hari ini resmi ditutup. Acara yang dihadiri oleh alumni, guru, siswa, serta tokoh penting kota ini, menjadi bukti nyata semangat kemandirian dan kolaborasi lintas generasi, pada Sabtu (27/9/2025).</p>



<p>Dalam sambutannya, Wakil Ketua I IKA SMANSA Tanjungpinang, Raja Rasfiardi, menekankan peran penting alumni sebagai mentor bagi siswa.</p>



<p>“Maka untuk tahun-tahun yang akan datang, anak-anak ini bisa juga menggantikan generasi-generasi dari alumni untuk gantian sebagai mentor adik-adiknya. Jadi ini adalah pendidikan berkelanjutan,&#8221; ujarnya. Beliau juga menyoroti bahwa kegiatan ini adalah wujud nyata dari teori yang diterapkan dalam praktik.</p>



<p>Kepala Sekolah SMAN 1 Tanjungpinang, Daman Huri, S.Pd.Kim., M.M., menambahkan bahwa semangat berkreasi dan mencoba adalah hal utama yang ingin ditanamkan.</p>



<p>&#8220;Lebih bagus kita pernah melakukan kesalahan tapi sudah kita lakukan, daripada kita melakukan kesalahan tetapi kita tidak pernah mencoba,&#8221; pesannya.</p>



<p>Beliau juga memuji karya-karya UMKM yang dihasilkan siswa, bahkan berkelakar bahwa suatu hari nanti mereka bisa menjadi &#8220;penguasa UMKM Kota Tanjungpinang.&#8221; tambahnya.</p>



<p>Acara kemudian ditutup oleh H. Lis Darmansyah, S.H., Walikota Tanjungpinang. Dalam sambutannya, beliau menyampaikan apresiasi mendalam atas keberhasilan penyelenggaraan Grand Smansa Festival dan menegaskan pentingnya keberlanjutan program yang melibatkan kolaborasi siswa, guru, dan alumni.</p>



<p>“Kegiatan ini adalah bukti bahwa SMANSA mampu melahirkan generasi yang mandiri, kreatif, dan penuh semangat. Mari kita jadikan festival ini sebagai tradisi yang terus berkembang untuk membangun karakter siswa sekaligus mempererat tali silaturahmi antarwarga sekolah dan masyarakat,” ungkapnya.</p>



<p>Dengan penutupan ini, Grand Smansa Festival 2025 meninggalkan kesan mendalam dan optimisme baru, bahwa SMAN 1 Tanjungpinang akan terus menjadi pionir dalam melahirkan generasi yang berprestasi, mandiri, dan berdaya saing tinggi. (Sar/Ger)</p>
', '/storage/images/articles/sukses-grand-smansa-festival-ditutup-tumbuhkan-prestasi-dan-kemandirian-murid-33e45b.jpeg', 'Admin Humas', '2025-09-29 11:55:27', '2026-06-09 02:51:11', '2026-06-09 02:51:11', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('45', 'HUT SMAN 1 Tanjungpinang Ke-69: Hadirkan Turnamen Badminton Antar Pelajar SMA/SMK Se-Kota Tanjungpinang dan Bintan', 'hut-sman-1-tanjungpinang-ke-69-hadirkan-turnamen-badminton-antar-pelajar-sma-smk-se-kota-tanjungpinang-dan-bintan', 'utama', '
<p>SMANSANEWS – SMAN 1 Tanjungpinang menyelenggarakan Turnamen Badminton antar pelajar SMA/SMK Se-Kota Tanjungpinang dan Bintan di Sport Hall Gor Bulutangkis Dwikora Koarmada I. Acara ini menjadi bagian dari Grandsa Festival dalam memperingati HUT SMAN 1 Tanjungpinang ke-69. Antusiasme para atlet tingkat SMA/SMK se-kota Tanjungpinang dan Kabupaten Bintan yang menjadi kebanggaan daerah juga hadir memeriahkan kegiatan ini, pada Kamis (25/09/25).</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-hadirkan-turnamen-badminton-antar-pelajar-sma-smk-se-kota-tanjungpinang-dan-bintan-inline-1-904688.jpg" alt="" class="wp-image-1215" data-recalc-dims="1"/></figure>



<p></p>



<p>Ketua Panitia, Gwen menyampaikan terima kasih dan penghargaan setinggi-tingginya. Semoga kegiatan ini berjalan dengan lancar, memberikan manfaat, serta menjadi wadah bagi kita untuk meningkatkan prestasi dalam non akademik dan kebersamaan antar pelajar.</p>



<p>Turnamen Badminton antar Pelajar Se-Kota Tanjungpinang dan Bintan dibuka oleh Kepala Sekolah, Daman Huri, S.Pd., Kim., M.M. dalam sambutannya beliau menegaskan bahwa kegiatan ini menjadi wadah bagi siswa untuk saling menjalin persaudaraan antar pelajar SMA/SMK Se-Kota Tanjungpinang dan Bintan dan menguji kemampuan individu dalam ajang olahraga badminton.</p>



<p>&#8220;Gunakan kesempatan mengikuti turnamen badminton ini untuk menguji kemampuan individu dengan kemampuan yang dimiliki oleh masing-masing dari para peserta. Selamat bertanding dan junjung tinggi nilai sportivitas selama bermain badminton. Berikan yang terbaik pada pertandingan hari ini,&#8221; ujarnya</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-hadirkan-turnamen-badminton-antar-pelajar-sma-smk-se-kota-tanjungpinang-dan-bintan-inline-2-6dbe28.jpg" alt="" class="wp-image-1216" data-recalc-dims="1"/></figure>



<p></p>



<p>Turnamen badminton Grand Smansa Festival mempertandingkan beberapa kategori, mulai dari tunggal putra, tunggal putri, hingga ganda. Antusiasme peserta dan dukungan penonton menambah kemeriahan acara yang akan berlangsung selama 25-27 September 2025. (Sar/Ric)</p>
', '/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-hadirkan-turnamen-badminton-antar-pelajar-sma-smk-se-kota-tanjungpinang-dan-bintan-f6c03d.jpg', 'Admin Humas', '2025-09-25 22:46:00', '2026-06-09 02:51:24', '2026-06-09 02:51:24', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('46', 'HUT SMAN 1 Tanjungpinang Ke-69: Mempersembahkan “GRAND SMANSA FESTIVAL” yang di Buka oleh Wakil Walikota Tanjungpinang', 'hut-sman-1-tanjungpinang-ke-69-mempersembahkan-grand-smansa-festival-yang-di-buka-oleh-wakil-walikota-tanjungpinang', 'utama', '
<p>SMANSANEWS – SMAN 1 Tanjungpinang menggelar Grand Smansa Festival (GRANDSAFEST) di Lapangan Utama SMAN 1 Tanjungpinang. Kegiatan ini diikuti kurang lebih 2000 hadirin yang terdiri dari Siswa SMAN 1 Tanjungpinang serta tamu undangan yang hadir, pada Kamis (25/09/25).</p>



<p>Kegiatan ini diawali dengan tari persembahan, menyanyikan lagu Indonesia Raya dan Sholawat Busro, Kemudian sambutan pertama oleh Ketua Pelaksana Grandsa Festival, Reyvic Athasena Evta, menyampaikan bahwa kegiatan ini terlaksana berkat dukungan penuh dari Kepala Sekolah, Dewan Guru, Alumni, Sponsorship, Siswa serta Dinas Pendidikan Provinsi Kepulauan Riau dalam berkolaborasi demi kesuksesan kegiatan ini. </p>



<p>&#8220;Kami selaku panitia mengucapkan banyak terimakasih kepada Kepala Sekolah, Majelis Guru, Alumni, Sponsorship, Teman-teman panitia serta Dinas Pendidikan Provinsi Kepulauan Riau yang telah memberikan dukungan dan restu sehingga kegiatan ini dapat berjalan dengan lancar sampai selesai. Kegiatan Grandsa Festival ini akan berlangsung mulai tanggal 25-27 September 2025&#8221; ujarnya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-mempersembahkan-grand-smansa-festival-yang-di-buka-oleh-wakil-walikota-tanjungpinang-inline-1-a3e69d.png" alt="" class="wp-image-1211" data-recalc-dims="1"/></figure>



<p></p>



<p>Kemudian sambutan dari Ikatan Alumni SMAN 1 Tanjungpinang (IKASMANSA), yang diwakili oleh Wira, menyampaikan bahwa kami sebagai Alumni SMANSA tentu merasa bangga karena dapat berkolaborasi dengan murid SMAN 1 Tanjungpinang dalam menyambut HUT SMAN 1 Tanjungpinang yang ke-69 dengan mempersembahkan Grandsa Festival ini. </p>



<p>Selanjutnya sambutan Kepala Sekolah SMAN 1 Tanjungpinang, Daman Huri, S.Pd., Kim., M.M. menegaskan bahwa kegiatan ini menjadi wadah bagi siswa untuk belajar kepemimpinan.</p>



<p>“Terlaksananya acara ini menunjukkan bahwasanya murid SMA Negeri 1 Tanjungpinang memiliki jiwa kepemimpinan yang bagus, tentu kami pihak sekolah dalam hal ini mengucapkan banyak terimakasih kepada Kepala Dinas Pendidikan Provinsi Kepulauan Riau yang telah mendukung penuh pelaksaan ini, kepada Koarmada I yang telah memfasilitasi Sport Hall Badminton kepada panitia dalam ajang Turnamen Badminton Pelajar SMA/SMK Se-Kota Tanjungpinang dan Bintan, dan juga seluruh stakeholder yang telah mendukung untuk mensukseskan acara ini bersama-sama, terkhusus kepada Ikatan Alumni (IKA) SMAN 1 Tanjungpinang yang sudah membimbing dan berkolaborasi dengan adik-adik murid SMAN 1 Tanjungpinang,” ujarnya.</p>



<p>Sementara itu, Sambutan Kepala Dinas Pendidikan Provinsi Kepulauan Riau, Dr. Andi Agung, S.E., M.M. menekankan pentingnya sinergi antara Alumni dan Siswa.</p>



<p>“Dengan ulang tahun yang ke-69, kita bisa membuktikan bahwasanya alumni dan siswa menjadi pilar utama segala acara dan agenda yang diadakan. Semoga di usia SMAN 1 Tanjungpinang yang sudah menginjak ke-69 ini dapat terus menjadi salah satu sekolah yang terbaik di Kepulauan Riau sehingga dapat meningkatkan kualitas pendidikan di Provinsi Kepulauan Riau lebih meningkat lagi,” pesannya.</p>



<p>Sambutan terakhir oleh Wakil Walikota Tanjungpinang sekaligus membuka kegiatan, Drs. H. Raja Ariza, M.M., memberikan apresiasi atas terlaksananya GRANDSAFEST. Ia menyampaikan bahwa kepemimpinan tidak hanya lahir dari proses belajar mengajar, tetapi juga melalui kegiatan seperti ini.</p>



<p>“Sekaranglah waktunya mendirikan tonggak utama untuk persiapan ke depan. Masa transisi biasanya menjadi momentum untuk melihat kemampuan siswa,” tegasnya.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-mempersembahkan-grand-smansa-festival-yang-di-buka-oleh-wakil-walikota-tanjungpinang-inline-2-f74b7d.jpg" alt="" class="wp-image-1208" data-recalc-dims="1"/></figure>



<p></p>



<p>GRANDSAFEST tahun ini berlangsung meriah dengan penuh semangat kebersamaan. Acara ini sekaligus menjadi momentum perayaan HUT SMAN 1 Tanjungpinang ke-69, yang tidak hanya menumbuhkan rasa bangga bagi warga sekolah, tetapi juga mempererat hubungan antara Murid, Guru, Alumni, dan Masyarakat. Semoga SMAN 1 Tanjungpinang semakin jaya dan maju lagi. (Ger/Nat)</p>
', '/storage/images/articles/hut-sman-1-tanjungpinang-ke-69-mempersembahkan-grand-smansa-festival-yang-di-buka-oleh-wakil-walikota-tanjungpinang-fdba2e.jpeg', 'Admin Humas', '2025-09-25 21:53:50', '2026-06-09 02:51:40', '2026-06-09 02:51:40', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('47', 'SMAN 1 Tanjungpinang Peringati Hari Jadi Provinsi Kepulauan Riau ke-23 Tahun 2025', 'sman-1-tanjungpinang-peringati-hari-jadi-provinsi-kepulauan-riau-ke-23-tahun-2025', 'utama', '
<p>SMANSANEWS – Seluruh civitas akademika SMAN 1 Tanjungpinang mengikuti upacara bendera dalam rangka memperingati Hari Jadi ke-23 Provinsi Kepulauan Riau Tahun 2025. Upacara ini dimulai pukul 07.00 WIB di Lapangan SMAN 1 Tanjungpinang dan berjalan dengan khidmat hingga selesai, pada Rabu (24/09/25).</p>



<p>Upacara dipimpin oleh Pembina Upacara Linawati, S.Pd., dengan petugas upacara dari perwakilan OSIS dan Paskibra Sekolah (Pasus). Selama kegiatan berlangsung, paduan suara Harmony Voice of Smansa dan drumband Gita Utama Kartika turut memeriahkan suasana, menambah semangat seluruh peserta upacara.</p>



<p>Dalam kesempatan tersebut, Pembina Upacara Linawati, S.Pd. membacakan amanat Gubernur Kepulauan Riau, H. Ansar Ahmad, yang menyampaikan rasa syukur atas perjalanan panjang Provinsi Kepulauan Riau yang kini memasuki usia ke-23 tahun sejak terbentuk melalui Undang-Undang Nomor 25 Tahun 2002 pada tanggal 24 September 2002. Beliau menegaskan bahwa dengan moto “Berpancang Amanah, Bersauh Marwah”, Kepri terus berkomitmen sebagai entitas budaya Melayu yang kokoh dalam bingkai Negara Kesatuan Republik Indonesia.</p>



<p>“Perjalanan sejarah negeri segantang lada ini tidaklah mudah, namun dengan semangat kebersamaan kita dapat menghadapi tantangan yang semakin kompleks, baik di bidang ekonomi, pendidikan, sosial, maupun budaya,” ungkap Gubernur dalam amanatnya.</p>



<p>Gubernur juga memaparkan berbagai capaian pembangunan, antara lain peningkatan konektivitas antar wilayah, penguatan UMKM dengan penyaluran modal usaha berbunga 0%, program elektrifikasi hingga rasio 99,1%, perlindungan nelayan dan petani melalui BPJS Ketenagakerjaan, peningkatan akses pendidikan melalui program beasiswa, serta layanan kesehatan yang lebih merata.</p>



<p>Di tingkat nasional, Kepulauan Riau mencatatkan prestasi membanggakan, seperti pertumbuhan ekonomi tertinggi di Sumatra, indeks pembangunan manusia yang menempati urutan pertama di wilayah Sumatra, penurunan angka kemiskinan menjadi 4,44%, serta konsistensi dalam indeks kerukunan umat beragama. “Capaian ini berkat kerja sama semua pihak: pemerintah daerah, tokoh adat, tokoh agama, masyarakat, hingga dunia usaha. Namun kita tidak boleh cepat berpuas diri, sebab tantangan ke depan akan semakin berat. Mari kita terus berlayar bersama menuju Kepri yang maju, makmur, dan merata,” tegas Gubernur.</p>



<p>Amanat ditutup dengan pesan Gurindam 12 pasal ke-3 yang mengingatkan pentingnya budi pekerti dalam kehidupan sehari-hari. Momentum peringatan Hari Jadi ke-23 Provinsi Kepulauan Riau ini diharapkan dapat memperkuat persatuan, meneguhkan semangat pembangunan berkelanjutan, serta melestarikan budaya Melayu sebagai identitas bangsa. (Ger/Nat)</p>
', '/storage/images/articles/sman-1-tanjungpinang-peringati-hari-jadi-provinsi-kepulauan-riau-ke-23-tahun-2025-65dafe.png', 'Admin Humas', '2025-09-25 14:10:26', '2026-06-09 02:51:45', '2026-06-09 02:51:45', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('48', 'SMAN 1 Tanjungpinang Gelar Orasi Calon Ketua dan Wakil Ketua OSIS Masa Bakti 2025/2026', 'sman-1-tanjungpinang-gelar-orasi-calon-ketua-dan-wakil-ketua-osis-masa-bakti-2025-2026', 'utama', '
<p>SMANSA NEWS – Calon Ketua dan Wakil Ketua OSIS SMAN 1 Tanjungpinang Masa Bakti 2025/2026 menyampaikan visi dan misi mereka dalam kegiatan orasi yang digelar di lapangan sekolah. Kegiatan ini diikuti seluruh siswa dengan tujuan memperkenalkan gagasan kepemimpinan serta program kerja yang akan dijalankan. Kegiatan berlangsung penuh semangat, menghadirkan sambutan dari guru pembina, penyampaian orasi para calon, hingga sesi tanya jawab yang menguji kesiapan mereka dalam memimpin, pada Jum&#8217;at (19/9/2025).</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="443" src="/storage/images/articles/sman-1-tanjungpinang-gelar-orasi-calon-ketua-dan-wakil-ketua-osis-masa-bakti-2025-2026-inline-1-7f3163.jpg" alt="" class="wp-image-1193" data-recalc-dims="1"/></figure>



<p></p>



<p>Acara diawali dengan sambutan Kepala Sekolah, Daman Huri, S.Pd. Kim., M.M. yang menegaskan bahwa OSIS merupakan wadah untuk belajar kepemimpinan. Ia menekankan bahwa menjadi pengurus OSIS bukanlah soal imbalan uang, melainkan kesempatan memperoleh pengalaman, ilmu, dan keikhlasan dalam memimpin.</p>



<p>“OSIS ini adalah alam menjadi pemimpin kalian nantinya. Di sinilah kalian belajar untuk menjadi seorang pemimpin dan belajar ikhlas, dikarenakan tidak ada imbalannya berupa uang, tetapi ada imbalan berupa pengalaman serta ilmu. Satu hal yang harus diingat sebagai pemimpin, kalian tidak akan pernah bisa bekerja sendiri,” ungkapnya.</p>



<p>Dalam orasi, Muhammad Fakhri Al Zaffan menekankan pentingnya pelayanan kepada siswa dan guru dengan membuka ruang aspirasi, kritik, serta saran, sekaligus memperkenalkan slogan “Sampahku, Tanggung Jawabku.”</p>



<p>Muhammad Khalid Hafidz menyampaikan pandangannya bahwa OSIS bukan sekadar wadah kepemimpinan, melainkan juga sarana evaluasi dan perubahan.</p>



<p>Sementara itu, Divani Indah Syahputri mengusung semangat literasi dan sikap anti-bullying, dengan tekad memberantas perundungan melalui budaya membaca dan menulis serta peningkatan bakat jurnalistik.</p>



<p>Kemudian Ibnu Zaqi Al-Ghifari turut menambahkan visi menjadikan OSIS sebagai wadah pencetak talenta berkualitas dengan menghadirkan siswa berprestasi yang mampu melahirkan bibit unggul baru di SMAN 1 Tanjungpinang.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/sman-1-tanjungpinang-gelar-orasi-calon-ketua-dan-wakil-ketua-osis-masa-bakti-2025-2026-inline-2-1feb86.png" alt="" class="wp-image-1194" data-recalc-dims="1"/></figure>



<p></p>



<p>Sesi tanya jawab menjadi bagian menarik dari kegiatan, di mana muncul pertanyaan tentang peran wakil ketua OSIS agar tidak menjadi “<em>shadow leader</em>.” Jawaban yang disampaikan menekankan pentingnya kolaborasi, dukungan penuh kepada ketua, serta kontribusi nyata yang disesuaikan dengan tugas kepemimpinan. “Tugas saya disini bukan mendominasi tapi mendukung. Dan saya akan selalu berdiskusi dengan ketua, membantu mewujudkan program dan hanya akan mengambil alih jika dibutuhkan saja. Dan saya pastinya akan terbuka dengan ketua OSIS tentang apa yang akan saya sarankan atau apa yang akan saya usulkan,” tegas calon wakil ketua.</p>



<p>Melalui kegiatan ini, calon Ketua dan Wakil Ketua OSIS SMAN 1 Tanjungpinang menunjukkan komitmen untuk memimpin dengan integritas, semangat kerja sama, serta fokus pada pelayanan, literasi, kepedulian lingkungan, pemberantasan <em>bullying</em>, dan pengembangan talenta siswa. Semoga seluruh civitas akademika diharapkan dapat mendukung program OSIS ke depan demi terwujudnya sekolah yang lebih maju, berprestasi, dan berkarakter. (Ger)</p>
', '/storage/images/articles/sman-1-tanjungpinang-gelar-orasi-calon-ketua-dan-wakil-ketua-osis-masa-bakti-2025-2026-85a8c5.png', 'Admin Humas', '2025-09-20 18:04:30', '2026-06-09 02:51:53', '2026-06-09 02:51:53', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('49', 'Evan Nicholas, Murid SMA Negeri 1 Tanjungpinang Raih Prestasi Lolos Final OSN Tingkat Nasional 2025', 'evan-nicholas-murid-sma-negeri-1-tanjungpinang-raih-prestasi-lolos-final-osn-tingkat-nasional-2025', 'utama', '
<p>SMANSANEWS &#8211; Prestasi membanggakan kembali diraih oleh murid SMA Negeri 1 Tanjungpinang. Evan Nicholas, murid kelas XI, berhasil lolos ke babak final Olimpiade Sains Nasional (OSN) Tingkat Nasional tahun 2025 sesuai dengan Surat Balai Pengembangan Talenta Indonesia tentang Pengumuman Finalis OSN Nasional Jenjang SMA Sederajat Nomor 0827/J7.1/PN.00/2025. Keberhasilan ini menempatkan Evan sebagai salah satu perwakilan Provinsi Kepulauan Riau yang akan berkompetisi di tingkat nasional bersama siswa-siswa terbaik dari seluruh Indonesia.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="988" src="https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/09/WhatsApp-Image-2025-09-16-at-08.59.02.jpeg?resize=790%2C988&#038;ssl=1" alt="" class="wp-image-1185" data-recalc-dims="1"/></figure>



<p></p>



<p>Evan mengikuti OSN di bidang Kebumian, dan berhasil menyingkirkan puluhan peserta lain di tingkat provinsi melalui seleksi yang ketat. Dengan pencapaian ini, Evan tidak hanya mengharumkan nama sekolah, tetapi juga menjadi inspirasi bagi teman-temannya di SMA Negeri 1 Tanjungpinang.</p>



<p>Kepala SMA Negeri 1 Tanjungpinang, Daman Huri, S.Pd.Kim, M.M., menyampaikan rasa bangga dan apresiasi tinggi atas capaian Evan. “Ini adalah bukti bahwa kerja keras, disiplin, dan semangat belajar yang tinggi akan selalu membuahkan hasil. Kami sangat mendukung penuh Evan dalam menghadapi babak final OSN ditingkat Nasional. Tentu hal ini tidak lepas dari usaha yang panjang dan bimbingan intensif dari para guru yang menjadi salah satu kunci keberhasilannya,” ujarnya.</p>



<p>OSN tingkat nasional dijadwalkan akan berlangsung pada 6-12 Oktober 2025 di Universitas Muhammadiyah Malang (UMM), dan akan mempertemukan para pelajar terbaik dari seluruh Indonesia dalam ajang kompetisi bergengsi di bidang sains. Prestasi Evan merupakan bukti nyata bahwa pelajar dari SMA Negeri 1 Tanjungpinang pun mampu bersaing di level Nasional dan bahkan level Internasional.</p>



<p>Semoga Evan Nicholas dapat terus mengukir prestasi dan menjadi inspirasi bagi generasi muda Indonesia. (Humas)</p>
', '/storage/images/articles/evan-nicholas-murid-sma-negeri-1-tanjungpinang-raih-prestasi-lolos-final-osn-tingkat-nasional-2025-09f158.png', 'Admin Humas', '2025-09-16 08:32:10', '2026-06-09 02:52:00', '2026-06-09 02:52:00', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('50', 'Ikatan Alumni (IKASMANSA) Ajak Murid SMAN 1 Tanjungpinang Terus Belajar dan Kuasai Teknologi', 'ikatan-alumni-ikasmansa-ajak-murid-sman-1-tanjungpinang-terus-belajar-dan-kuasai-teknologi', 'utama', '
<p>SMANSANEWS – Kegiatan silaturahmi dan dialog interaktif antara Ikatan Alumni (IKASMANSA) dengan murid SMAN 1 Tanjungpinang berlangsung hangat dan penuh inspirasi. Acara yang bertajuk &#8220;IKASMANSA Tanjungpinang, Berbagi Kisah, Membangun SMANSA, Menyatukan Generasi&#8221;, menghadirkan perwakilan alumni dari berbagai bidang untuk berbagi pengalaman serta memberikan motivasi kepada generasi penerus, Senin (15/9/2025).</p>



<p>Dalam sambutannya, Drs. Surjadi, M.T., selaku perwakilan Ketua IKASMANSA yang saat ini bertugas di Inspektorat Kota Tanjungpinang, menyampaikan pesan penting kepada para murid agar senantiasa mengikuti perkembangan zaman serta belajar dengan giat.</p>



<p>&#8220;Sekarang sudah zamannya AI, tidak seperti dulu. Jangan berhenti belajar dengan menggali ilmu sedalam-dalamnya serta sungguh-sungguh dan tidak ada kata berhenti sebelum sukses. Terus perdalam ilmu teknologi.” ujarnya.</p>



<p>Pesan tersebut menjadi pengingat bahwa dunia pendidikan harus terus berkembang mengikuti kemajuan zaman, khususnya dalam menghadapi era digital dan teknologi kecerdasan buatan AI.</p>



<p>Sementara itu, sambutan dari pihak sekolah dalam hal ini diwakili oleh Guswandi, S.Pd. mengapresiasi kegiatan ini sebagai bentuk nyata dukungan alumni terhadap perkembangan pendidikan di SMAN 1 Tanjungpinang.</p>



<p>&#8220;Kegiatan ini sangat bagus, kami mengapresiasi kepada para Alumni yang sudah menggagas kegiatan ini, semoga ini menjadi motivasi bagi adik-adik yang masih duduk di sekolah untuk terus belajar dengan sungguh-sungguh dan siap menghadapi perubahan zaman yang semakin canggih.&#8221; terangnya.</p>



<p>Acara kemudian dilanjutkan dengan dialog interaktif, di mana para alumni dari berbagai angkatan berbagi kisah perjuangan, pengalaman kuliah, hingga perjalanan karier mereka kepada para murid. Sesi ini berlangsung penuh antusias, ditandai dengan banyaknya pertanyaan dan interaksi dari peserta.</p>



<p>Melalui kegiatan ini, diharapkan terjalin hubungan yang semakin erat antara alumni dan pihak sekolah. Semoga harapan kita bersama dalam menyatukan generasi melalui kisah dan pengalaman ini dapat memberikan energi positif dalam memajukan SMAN 1 Tanjungpinang menjadi lebih baik lagi di masa depan. (Ger/Tan)</p>
', '/storage/images/articles/ikatan-alumni-ikasmansa-ajak-murid-sman-1-tanjungpinang-terus-belajar-dan-kuasai-teknologi-7f8b08.jpg', 'Admin Humas', '2025-09-15 21:12:33', '2026-06-09 02:52:09', '2026-06-09 02:52:09', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('51', 'Pekan Kreativitas dan Karakter Religius (PKKRS) SMAN 1 Tanjungpinang', 'pekan-kreativitas-dan-karakter-religius-pkkrs-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS &#8211; SMAN 1 Tanjungpinang menggelar Pekan Kreativitas dan Karakter Religius (PKKRS) sebagai wadah untuk menumbuhkan bakat, minat, serta memperkuat karakter pelajar yang berlandaskan nilai-nilai keagamaan dan moral, pada Senin (15/9/2025).</p>



<p>Ketua Pelaksana PKKRS, Denis Adhiwijaya Sutomo, menekankan pentingnya membangun karakter mulia dalam diri siswa. “Dengan berakhlak mulia serta berbudi luhur, PKKRS diharapkan dapat menumbuhkan rasa percaya diri dengan segala bakat yang dimilikinya.” tuturnya.</p>



<p>Selanjutnya sambutan pembina Ramsa, Jaya Putra, S.Pd.I. menitipkan pesan khusus untuk seluruh siswa SMAN 1: “Harapan Bapak dengan adanya kegiatan ini, timbul dan hadirnya pelajar-pelajar yang berkarakter Islami, dengan keilmuan yang mumpuni serta berakhlak Qur’ani.” pesannya.</p>



<p>Kemudian sambutan Kepala Sekolah dalam hal ini diwakili oleh Guswandi, S.Pd., beliau menyampaikan harapan agar kegiatan ini mampu menjadi ruang yang bermanfaat bagi para murid dalam menyalurkan minat dan bakatnya. “Diharapkan dengan acara ini, dapat tersalurkan minat dan bakat peserta didik dengan apa yang diinginkannya, sehingga dapat bermanfaat di kemudian hari.” ujarnya.</p>



<p>Kegiatan PKKRS ini menjadi momentum penting bagi SMAN 1 Tanjungpinang dalam membentuk generasi pelajar yang tidak hanya cerdas secara akademik, tetapi juga berakhlak dan berkarakter sesuai tuntunan nilai religius dengan berbagai ajang perlombaan. (Ger/Tan)</p>
', '/storage/images/articles/pekan-kreativitas-dan-karakter-religius-pkkrs-sman-1-tanjungpinang-27f85e.jpeg', 'Admin Humas', '2025-09-15 20:22:52', '2026-06-09 02:52:11', '2026-06-09 02:52:11', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('52', 'Maulid Nabi di SMA Negeri 1 Tanjungpinang: Momentum Penguatan Pembinaan Karakter dan Keteladanan Akhlak Rasulullah', 'maulid-nabi-di-sma-negeri-1-tanjungpinang-momentum-penguatan-pembinaan-karakter-dan-keteladanan-akhlak-rasulullah-saw', 'utama', '
<p></p>



<p>SMANSANEWS &#8211; SMA Negeri 1 Tanjungpinang melaksanakan kegiatan penguatan pembinaan karakter sekaligus memperingati Maulid Nabi Muhammad SAW di Masjid Ulul Albab pada Jumat (12/09/25). </p>



<p>Kegiatan diawali dengan pembukaan dan pembacaan ayat suci Al-Qur&#8217;an oleh siswi Azzahra Odina Putri dan Fitri Ameliana.</p>



<p>Dilanjutkan dengan sambutan dari Kepala Sekolah SMA Negeri 1 Tanjungpinang, Daman Huri, S.Pd., Kim., M.M.  Beliau berpesan serta mengajak para murid untuk meneladani akhlak Rasulullah Saw. dan menjadikan Maulid Nabi sebagai momentum memperkuat karakter, akhlak, dan semangat belajar.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="658" height="687" src="/storage/images/articles/maulid-nabi-di-sma-negeri-1-tanjungpinang-momentum-penguatan-pembinaan-karakter-dan-keteladanan-akhlak-rasulullah-saw-inline-1-a727c4.png" alt="" class="wp-image-1152" data-recalc-dims="1"/></figure></div>


<p></p>



<p>“Generasi muda harus mengambil pelajaran dari keteladanan Nabi Muhammad SAW, terutama dalam hal kejujuran, disiplin, semangat menuntut ilmu dan kepedulian sosial,” ujarnya.</p>



<p>Kemudian inti acara, yaitu ceramah agama disampaikan oleh Ustaz Letkol Laut Rakhim Hadi Anwar, S.KM., S.Kep., M.Kes., atau yang akrab disapa Ustaz Blangkon Loreng.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="667" height="636" src="/storage/images/articles/maulid-nabi-di-sma-negeri-1-tanjungpinang-momentum-penguatan-pembinaan-karakter-dan-keteladanan-akhlak-rasulullah-saw-inline-2-064ae7.png" alt="" class="wp-image-1153" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Dalam ceramahnya, Ustaz Hadi Anwar menekankan pentingnya meneladani akhlak mulia Nabi Muhammad SAW dalam kehidupan sehari-hari.</p>



<p>&#8220;Kelahiran Nabi adalah lahirnya harapan bagi umat manusia. Di Maulid ini, mari kita isi hati dengan shalawat, lisan dengan rasa syukur, dan hidup dengan teladan akhlak beliau yang indah,&#8221; ujar Ustaz Hadi Anwar, yang juga mengajak para siswa untuk menjadikan setiap perbuatan baik sebagai bentuk ibadah. Serta tidak lupa kita sebagai umat manusia harus senantiasa menguatkan 4K yaitu: Keimanan, Keilmuan, Ketrampilan dan Kesehatan.&#8221; pesannya.</p>



<p>Kegiatan ditutup dengan doa bersama yang dipimpin oleh Ustadz Hadi Anwar, serta ucapan terima kasih dari pembawa acara.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><img decoding="async" loading="lazy" width="790" height="527" src="/storage/images/articles/maulid-nabi-di-sma-negeri-1-tanjungpinang-momentum-penguatan-pembinaan-karakter-dan-keteladanan-akhlak-rasulullah-saw-inline-3-939258.jpg" alt="" class="wp-image-1154" style="aspect-ratio:1.5;width:840px;height:auto" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Melalui kegiatan ini, semoga kita semua dapat meneladani Nabi Muhammad SAW serta terus menumbuhkan kepribadian yang beriman, berakhlak mulia, berilmu, terampil dan peduli terhadap sesama. (Ger/Tan)</p>
', '/storage/images/articles/maulid-nabi-di-sma-negeri-1-tanjungpinang-momentum-penguatan-pembinaan-karakter-dan-keteladanan-akhlak-rasulullah-saw-28850a.png', 'Admin Humas', '2025-09-13 00:01:45', '2026-06-09 02:52:31', '2026-06-09 02:52:31', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('53', 'Pelantikan Pengurus MPK SMAN 1 Tanjungpinang Masa Bakti 2025/2026', 'pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026', 'utama', '
<p>SMANSANEWS &#8211; SMAN 1 Tanjungpinang melaksanakan Pelantikan Majelis Perwakilan Kelas (MPK) Masa Bakti 2025/2026. Kegiatan dilakukan di lapangan sekolah SMAN1 Tanjungpinang, disaksikan oleh seluruh warga SMAN 1 Tanjungpinang, pada Senin (08/09/2025).</p>



<p>Acara ini merupakan momen sakral bagi murid SMAN 1 Tanjungpinang yang akan dilantik, dimana kepemimpinan yang baru akan mengemban peranan penting dalam menjalankan tugas dan tanggungjawab untuk Masa Bakti 2024/2025 di sekolah. Sebelum acara pelantikan, Ketua MPK Masa Bakti 2024/2025 membacakan laporan pertanggung jawaban satu tahun yang telah berlalu.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026-inline-1-8ca8c8.jpg" alt="" class="wp-image-1145" data-recalc-dims="1"/></figure>



<p></p>



<p>Dalam laporannya, Ketua MPK Masa Bakti 2024/2025 SMAN 1 Tanjungpinang, M.Zahran Al-Hafiz Hareka, menyampaikan secara keseluruhan tugas dan tanggung jawab MPK sudah dijalankan dengan baik sesuai dengan tujuan utama MPK.</p>



<p>&#8220;Bahwa MPK berfungsi sebagai pengawas osis dan juga sebagai peningkat kedisiplinan dan tanggungjawab, secara umum kepengurusan MPK kami sudah melaksanakan tugas dan peran tersebut. Kemudian kami berharap pada MPK baru ini dapat lebih kreatif dan inovatif kedepannya&#8221;. tuturnya</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026-inline-2-c55593.jpg" alt="" class="wp-image-1147" data-recalc-dims="1"/></figure>



<p></p>



<p>Pada kesempatan tersebut, diumumkan bahwa sebanyak 4 (empat) murid resmi dilantik menjadi pengurus MPK periode 2025/2026. Prosesi pelantikan dilakukan langsung oleh Kepala Sekolah, Daman Huri, S.Pd.Kim., M.M. dengan prosesi pemasangan selempang, tanya jawab sebelum pelantikan, dan pembacaan ikrar jabatan serta penandatanganan surat berita acara pelantikan yang ditandatangani oleh ketua MPK Masa Bakti 2024/2025 dan ketua MPK Masa Bakti 2025/2026 serta ditandatangani juga oleh Kepala Sekolah SMA Negeri 1 Tanjungpinang dengan didampingi oleh Wakil Kepala Sekolah bidang Kesiswaan.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="487" height="375" src="/storage/images/articles/pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026-inline-3-f47115.png" alt="" class="wp-image-1146" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Ketua MPK masa bakti 2025/2026, Bumi Wahyu Ramadhani, dalam sepatah katanya menyampaikan ucap syukur rasa terimakasih dan bersungguh sungguh untuk menjalankan amanah yang diberikan dengan baik, untuk memberikan SMA Negeri 1 Tanjungpinang masa depan yang lebih indah dan bermanfaat.</p>



<p>&#8220;Kami sangat bersyukur, mudah-mudahan amanah yang diberikan ini dapat kami jalankan dengan sebaik-baiknya, kami akan bersungguh-sungguh dalam mengamban tugas dan tanggung jawab ini. Sehingga dapat memberikan konstribusi yang terbaik untuk SMAN 1 Tanjungpinang&#8221;. tegasnya.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="633" height="547" src="/storage/images/articles/pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026-inline-4-a6b5ed.png" alt="" class="wp-image-1148" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Sementara itu dalam sambutannya, Kepala Sekolah, Daman Huri, S.Pd.Kim.,M.M., turut memberikan apresiasi kepada pengurus MPK yang telah menjalankan tugas dengan baik selama satu tahun penuh. Beliau juga berpesan kepada pengurus MPK yang baru agar dapat menjaga kedisiplinan serta tanggungjawab dalam menjalankan amanah.</p>



<p>&#8220;Terima kasih kepada pengurus MPK Masa Bakti 2024-2025 dan selamat kepada Ananda yang menjadi pengurus MPK Masa Bakti 2025-2026. Mudah-mudahan apa yang Ananda kerjakan, apa yang telah Ananda laksanakan dapat menjadi amal kebaikan dan ananda yang yang diberikan amanah bisa melaksanakan dengan baik&#8221;. katanya.</p>



<p>Pelantikan ini juga bertujuan untuk memberikan wadah kepada murid agar dapat mengembangkan kemampuan kepemimpinan dan kerjasama dalam berorganisasi, sehingga ini bisa menjadi bekal yang positif dikemudian hari. (sar/ric)</p>
', '/storage/images/articles/pelantikan-pengurus-mpk-sman-1-tanjungpinang-masa-bakti-2025-2026-bf1c26.jpg', 'Admin Humas', '2025-09-08 20:49:04', '2026-06-09 02:52:54', '2026-06-09 02:52:54', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('54', 'Pelepasan Mahasiswa PLP UMRAH di SMAN 1 Tanjungpinang', 'pelepasan-mahasiswa-plp-umrah-di-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS – SMAN 1 Tanjungpinang melaksanakan kegiatan pelepasan mahasiswa Pengenalan Lapangan Persekolahan (PLP) dari Universitas Maritim Raja Ali Haji (UMRAH). Acara ini berlangsung dengan khidmat dan penuh kebersamaan di ruang kepala sekolah, pada Rabu (03/09/2025).</p>



<p>Mahasiswa PLP UMRAH telah melaksanakan kegiatan praktik lapangan selama beberapa minggu di SMAN 1 Tanjungpinang. Mereka berperan aktif dalam kegiatan pembelajaran, administrasi, serta berbagai aktivitas sekolah. Kehadiran mereka turut memberikan warna baru dan semangat dalam lingkungan sekolah.</p>



<p>Kepala SMAN 1 Tanjungpinang, Daman Huri, dalam sambutannya menyampaikan apresiasi dan pesan motivasi kepada mahasiswa. “Kunci orang yang berhasil itu satu, ialah kedisiplinan,” ucapnya. Beliau berharap pengalaman PLP ini dapat menjadi bekal penting bagi mahasiswa untuk menjadi pendidik profesional di masa depan.</p>



<p>Sementara itu, perwakilan mahasiswa UMRAH menyampaikan rasa terima kasih atas bimbingan dan kesempatan yang diberikan selama menjalani PLP. Mereka mengaku mendapatkan banyak ilmu, pengalaman, dan inspirasi dari para guru maupun siswa di SMAN 1 Tanjungpinang.</p>



<p>Kegiatan pelepasan ditutup dengan penyerahan cendera mata dari mahasiswa UMRAH kepada pihak sekolah sebagai bentuk kenangan dan penghargaan atas pengalaman berharga yang telah diperoleh. (Ger/Nat)</p>
', '/storage/images/articles/pelepasan-mahasiswa-plp-umrah-di-sman-1-tanjungpinang-1d223b.jpeg', 'Admin Humas', '2025-09-03 21:56:33', '2026-06-09 02:52:56', '2026-06-09 02:52:56', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('55', 'SK ASN Merger Guru SMAN 3 ke SMAN 1 Tanjungpinang Resmi Diserahkan', 'penyerahan-surat-keputusan-sk-asn-merger-guru-sman-3-tanjungpinang-ke-sman-1-tanjungpinang', 'utama', '
<p>SMANSANEWS – Sebanyak 13 guru resmi menerima Surat Keputusan (SK) Merger dari SMAN 3 Tanjungpinang ke SMAN 1 Tanjungpinang. Penyerahan SK ini dilakukan langsung oleh Kabid GTK Dinas Pendidikan Provinsi Kepulauan Riau, Suhono, S.Pd., M.M. didampingi Kepala Sekolah SMA Negeri 1 Tanjungpinang, Daman Huri, S.Pd.Kim., M.M. bertempat di Ruang Pertemuan SMA Negeri 1 Tanjungpinang, Selasa (2/9/2025).</p>



<p>Adapun 13 penerima SK terdiri dari 12 guru pembimbing dan 1 guru Tata Usaha (TU). Penyerahan SK tersebut menjadi langkah penting dalam proses penggabungan (merger) yang telah ditetapkan, sekaligus memberikan kepastian status kepegawaian bagi para guru yang sebelumnya mengabdi di SMAN 3 Tanjungpinang.</p>


<div class="wp-block-image">
<figure class="aligncenter size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/penyerahan-surat-keputusan-sk-asn-merger-guru-sman-3-tanjungpinang-ke-sman-1-tanjungpinang-inline-1-e2822a.jpg" alt="Kepala Sekolah SMA Negeri 1 Tanjungpinang Daman Huri, S.Pd.Kim., M.M. sedang memberikan sambutan." class="wp-image-1134" data-recalc-dims="1"/></figure></div>


<p></p>



<p>Kepala Sekolah SMA Negeri 1 Tanjungpinang dalam sambutannya menyampaikan rasa syukur atas penyerahan SK ini. Menurutnya, kepastian status kepegawaian akan memberikan ketenangan serta semangat baru bagi para guru dalam menjalankan tugas mendidik.</p>



<p>“Dengan guru guru ini mendapat SK, diharapkan dia menjadi lebih tenang karena beliau-beliau ini nanti sudah tidak seperti sebelumnya. Selama ini kan kedudukannya masih belum kuat. Dengan SK ini berarti sudah sah lah dia sebagai guru SMA Negeri 1 Tanjungpinang. Jadi harapannya, kawan-kawan ini bisa mengajar lebih tenang dan lebih baik lagi sehingga menghasilkan anak didik yang hebat dan terbukti,” ungkap Daman Huri S.Pd.Kim., M.M. selaku Kepala Sekolah SMA Negeri 1 Tanjungpinang.</p>



<p>Sementara itu, Kabid GTK Dinas Pendidikan Provinsi Kepulauan Riau, Suhono, S.Pd., M.M. menjelaskan bahwa proses penyerahan SK merupakan bagian dari kebijakan kepegawaian. Pihaknya hanya menerima SK dari Badan Kepegawaian Daerah (BKD) dan Korpri untuk kemudian didistribusikan kepada guru yang bersangkutan.</p>



<p>“Kalau SK itu ranahnya kepegawaian di BKD, kami hanya menerima SK yang sudah kami terima untuk dibagikan ke guru-guru. Saat ini kami baru menerima 13 SK dari BKD, terdiri dari 12 guru dan 1 TU. Sisanya tinggal menunggu informasi lebih lanjut dari BKD,” jelas Suhono, S.Pd., M.M., Kabid GTK Dinas Pendidikan Provinsi Kepulauan Riau.</p>



<figure class="wp-block-image size-full"><img decoding="async" loading="lazy" width="790" height="445" src="/storage/images/articles/penyerahan-surat-keputusan-sk-asn-merger-guru-sman-3-tanjungpinang-ke-sman-1-tanjungpinang-inline-2-f0c2d4.jpg" alt="" class="wp-image-1132" data-recalc-dims="1"/></figure>



<p></p>



<p>Acara penyerahan SK berlangsung dengan khidmat, disertai harapan besar agar para guru yang telah menerima SK dapat lebih fokus mengabdikan diri dalam dunia pendidikan. Dengan status yang jelas, para guru diharapkan tidak hanya mengajar dengan penuh ketenangan, tetapi juga mampu meningkatkan kualitas pembelajaran, inovasi, serta mencetak generasi muda yang unggul di Tanjungpinang.</p>



<p>Kegiatan ini juga menandai komitmen bersama antara Dinas Pendidikan Provinsi Kepulauan Riau dan SMA Negeri 1 Tanjungpinang untuk terus memperkuat mutu pendidikan. Langkah merger guru ini dipandang strategis demi pemerataan tenaga pendidik dan peningkatan kualitas sekolah.(*)</p>
', '/storage/images/articles/penyerahan-surat-keputusan-sk-asn-merger-guru-sman-3-tanjungpinang-ke-sman-1-tanjungpinang-63e381.jpg', 'Admin Humas', '2025-09-02 13:53:28', '2026-06-09 02:53:04', '2026-06-09 02:53:04', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('56', 'KPU Kepri Dorong Generasi Muda Berpartisipasi Demokratis Lewat Sosialisasi Pemilih Pemula', 'kpu-kepri-dorong-generasi-muda-berpartisipasi-demokratis-lewat-sosialisasi-pemilih-pemula', 'utama', '
<p>*Generasi Z Didorong untuk Sadar Hak dan Kewajiban dalam Berdemokrasi</p>



<p>SMANSANEWS – Komisi Pemilihan Umum (KPU) Provinsi Kepulauan Riau mendorong generasi muda untuk aktif berpartisipasi dalam demokrasi melalui kegiatan sosialisasi pemilih pemula. Sosialisasi ini digelar di SMAN 1 Tanjungpinang pada Senin (1/9/2025) bertepatan dengan pelaksanaan upacara bendera.</p>



<p>Ketua KPU Kepri, Priyo Handoko, hadir sebagai pembina upacara sekaligus memberikan amanat tentang pentingnya peran generasi Z dalam menentukan arah demokrasi Indonesia ke depan.</p>



<p>“Sosialisasi ini menjadi langkah nyata KPU Kepri dalam mempersiapkan generasi penerus bangsa agar sadar akan hak dan kewajiban berdemokrasi,” ujar Priyo.</p>



<p>Dalam amanatnya, Priyo juga berpesan agar para siswa tidak bersikap apatis terhadap demokrasi.</p>



<p>“Jangan pernah membenci demokrasi, karena demokrasi adalah jalan terbaik yang telah dipilih oleh para pendiri bangsa,” tegasnya.</p>



<p>Ia menambahkan, kegiatan ini merupakan bentuk komitmen KPU Kepri untuk mencegah tumbuhnya sikap anti-demokrasi di kalangan pelajar SMA/SMK yang tengah memasuki fase menuju usia dewasa.</p>



<p>Di akhir amanatnya, Priyo mengingatkan siswa SMAN 1 Tanjungpinang agar tetap menomorsatukan pendidikan.</p>



<p>“Tetap fokus dengan kegiatan belajar, berikan yang terbaik, dan percayalah bahwa kalianlah yang akan menentukan pemimpin Indonesia di masa depan,” pesannya. (*)</p>
', '/storage/images/articles/kpu-kepri-dorong-generasi-muda-berpartisipasi-demokratis-lewat-sosialisasi-pemilih-pemula-14b835.jpg', 'Admin Humas', '2025-09-01 21:41:25', '2026-06-09 02:53:06', '2026-06-09 02:53:06', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('57', 'SISTEM PENERIMAAN MURID BARU TAHUN PELAJARAN 2025/2026', 'sistem-penerimaan-murid-baru-tahun-pelajaran-2025-2026', 'utama', '
<p><strong>JADWAL PELAKSANAAN SPMB SMA</strong></p>



<ul>
<li>Pendaftaran tanggal 11 s.d. 14 Juni 2025.</li>



<li>Verifikasi dan validasi dokumen tanggal 16 s.d. 25 Juni 2025.</li>



<li>Pengumuman tanggal 28 Juni 2025.</li>



<li>Daftar ulang tanggal 30 Juni s.d. 2 Juli 2025.</li>



<li>Pengenalan Lingkungan Sekolah (PLS) tanggal 21 s.d. 25 Juli 2025.</li>
</ul>



<p><strong>Mekanisme Pendaftaran SPMB secara Online/Daring</strong><br>Melakukan pendaftaran online dengan cara:</p>



<ul>
<li>Membuka situs SPMB Online di https:/sispmb.kepriprov.go.id</li>



<li>Memilih menu pendaftaran Satuan Pendidikan.</li>



<li>Melakukan &#8220;login&#8221; menggunakan akun 10 Digit (Nomor Induk Siswa Nasional) dan &#8220;password&#8221; (tanggal, bulan dan tahun lahir) Contoh:<br>User: 1234567890<br>Password: 18062009 (18 Juni 2009 )</li>



<li>Melengkapi biodata peserta.</li>



<li>Memilih jalur pendaftaran SMA atau SMK dan mengunggah berkas sesuai persyaratan pada jalur pendaftaran.</li>



<li>Menyimpan/mencetak &#8220;Tanda Bukti Pendaftaran Online&#8221; yang memuat nomor pendaftaran.</li>
</ul>



<p><strong>Petunjuk Teknis di bawah ini :</strong></p>



<div class="wp-block-file"><object class="wp-block-file__embed" data="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/JUKNIS-SPMB-20252026.pdf" type="application/pdf" style="width:100%;height:672px" aria-label="Embed of JUKNIS-SPMB-20252026."></object><a id="wp-block-file--media-7a4df147-fc42-4e5d-bc88-33da21b7aea0" href="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/JUKNIS-SPMB-20252026.pdf">JUKNIS-SPMB-20252026</a><a href="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/JUKNIS-SPMB-20252026.pdf" class="wp-block-file__button wp-element-button" download aria-describedby="wp-block-file--media-7a4df147-fc42-4e5d-bc88-33da21b7aea0">Download</a></div>



<p>Brosur SPMB dibawah ini :</p>



<div class="wp-block-file"><object class="wp-block-file__embed" data="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/BROSUR-copy.pdf" type="application/pdf" style="width:100%;height:891px" aria-label="Embed of BROSUR-copy."></object><a id="wp-block-file--media-df826ace-ef20-4734-9e12-31882cf88617" href="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/BROSUR-copy.pdf">BROSUR-copy</a><a href="https://www.sman1-tpi.sch.id/isi-njero/uploads/2025/05/BROSUR-copy.pdf" class="wp-block-file__button wp-element-button" download aria-describedby="wp-block-file--media-df826ace-ef20-4734-9e12-31882cf88617">Download</a></div>
', '/storage/images/articles/sistem-penerimaan-murid-baru-tahun-pelajaran-2025-2026-b5d347.jpg', 'Widodo Aja', '2025-05-24 20:29:17', '2026-06-09 02:53:32', '2026-06-09 02:53:32', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('58', 'PROSEDUR DAFTAR ULANGPESERTA DIDIK BARU SMA NEGERI 1 TANJUNGPINANG TAHUN PELAJARAN 2025/2026', 'prosedur-daftar-ulangpeserta-didik-baru-sma-negeri-1-tanjungpinangtahun-pelajaran-2024-2025', 'utama', '
<figure class="wp-block-image size-large"><img decoding="async" loading="lazy" width="790" height="444" src="/storage/images/articles/prosedur-daftar-ulangpeserta-didik-baru-sma-negeri-1-tanjungpinangtahun-pelajaran-2024-2025-inline-1-e7e5f4.jpg" alt="" class="wp-image-1104" srcset="https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/06/DAFTAR-ULANG.jpg?resize=1024%2C576&amp;ssl=1 1024w, https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/06/DAFTAR-ULANG.jpg?resize=300%2C169&amp;ssl=1 300w, https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/06/DAFTAR-ULANG.jpg?resize=768%2C432&amp;ssl=1 768w, https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2025/06/DAFTAR-ULANG.jpg?w=1280&amp;ssl=1 1280w" sizes="(max-width: 790px) 100vw, 790px" data-recalc-dims="1" /></figure>



<p><strong><u>TATA CARA DAFTAR ULANG</u></strong></p>



<ol type="1">
<li><strong><em>WAJIB </em></strong>Mengisi formulir daftar ulang melalui <strong><em>website : https://sispmb.kepriprov.go.id/</em></strong></li>



<li>Mengisi dan menandatangani Surat Pernyataan kesediaan mengikuti tata tertib sekolah dengan meterai 10000.</li>



<li>Mengisi dan menandatangani Surat Pernyataan kebenaran mengisi data dengan meterai 10000.</li>
</ol>



<p><strong><em>Untuk blanko Surat Pernyataan dapat d<a href="https://lnk.ink/0Fe4z">idownload disini</a></em></strong></p>



<p>Menyerahkan berkas ke Panitia di Posko SPMB SMAN 1 Tanjungpiang berupa :</p>



<h1 class="wp-block-heading">A.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Domisili</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi rapor mulai dari sampul depan, biodata dan semester 1 s.d. 5 sebanyak 1 rangkap (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">B.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Prestasi Nilai Rapor</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi rapor mulai dari sampul depan, biodata dan semester 1 s.d. 5 sebanyak 1 rangkap (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">C.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Prestasi Akademik Individu dan Kelompok</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi sertifikat atau penghargaan yang digunakan saat mendaftar sebanyak 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">D.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Hafidz</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi sertifikat hafidz yang digunakan saat mendaftar sebanyak 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">E.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Prestasi Nonakademik Individu dan Kelompok</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi sertifikat atau penghargaan yang digunakan saat mendaftar sebanyak 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">F.&nbsp;&nbsp;&nbsp;&nbsp; Jalur Afirmasi</h1>



<p>a) Fotokopi Kartu Keluarga 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi kartu KIP, PKH / KKS yang digunakan saat mendaftar sebanyak 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>e) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>f) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">G.&nbsp;&nbsp;&nbsp; Jalur Mutasi</h1>



<p>a) Fotokopi Kartu Keluarga atau surat keterangan domisli 1 lembar yang digunakan pada saat pendaftaran (membawa yang asli untuk ditunjukkan ke panitia).<br>b) Fotokopi Ijazah / SKL 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>c) Fotokopi rapor mulai dari sampul depan, biodata dan semester 1 s.d. 5 sebanyak 1 rangkap (membawa yang asli untuk ditunjukkan ke panitia).<br>d) Fotokopi surat tugas atau surat keterangan anak guru yang diunggah pada saat pendaftaran sebanyak 1 lembar (membawa yang asli untuk ditunjukkan ke panitia).<br>e) Hasil Cetak bukti telah mengisi formulir daftar ulang (poin 1).<br>f) Surat Pernyataan kesediaan mengikuti tata tertib sekolah (poin 2).<br>g) Surat Pernyataan kebenaran mengisi data (poin 3).</p>



<h1 class="wp-block-heading">Semua berkas dimasukkan ke dalam MAP</h1>



<ul>
<li>Laki laki MAP berwarna Biru ditulis nama pendaftar dan jalur pendaftaran di MAP-nya.</li>



<li>Perempuan MAP berwarna Merah ditulis nama pendaftar dan jalur pendaftaran di MAP-nya.</li>



<li></li>
</ul>



<p>Penyerahan berkas daftar ulang tanggal 30 Juni s.d. 2 Juli 2025 , pukul 08.00 &#8211; 15.00 WIB, Bertempat di Aula SMA Negeri 1 Tanjungpinang, berpakaian Seragam OSIS SMP didampingi oleh orang tua atau wali. apabila pada waktu yang ditentukan calon Peserta Didik Baru belum mendaftar ulang maka dinyatakan mengundurkan diri.<br>Apabila ditemukan berkas yang tidak sesuai dengan juknis SPMB Tahun 2025, maka panitia berhak membatalkan kelulusan.</p>



<p>Untuk Calon Peserta Didik Baru Tahun Pelajaran 2025/2026 yang telah selesai mendaftar ulang harap hadir pada :</p>



<p>hari, tanggal&nbsp;&nbsp;&nbsp; : Sabtu, 19 Juli 2025</p>



<p>pukul          : 06.45 s.d. 10.30 WIB</p>



<p>acara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Gladi bersih Masa Pengenalan Lingkungan Sekolah </p>



<p>pakaian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Seragam olahraga SMP Masing-masing</p>



<ul>
<li><strong><em>Calon Peserta Didik Baru dilarang membawa kendaraan sendiri.</em></strong></li>



<li><strong><em>harap hadir 15 menit sebelum waktu yang yang telah ditentukan.</em></strong></li>
</ul>
', NULL, 'Widodo Aja', '2024-06-19 20:01:10', '2026-06-09 02:53:36', '2026-06-09 02:53:36', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('59', 'DAFTAR SISWA ELIGIBLE SELEKSI NASIONAL BERDASARKAN PRESTASI (SNBP) TAHUN 2024', 'daftar-siswa-eligible-seleksi-nasional-berdasarkan-prestasi-snbpdaftar-siswa-eligible-tahun-2024', 'utama', '
<p class="has-text-align-center"><strong>DAFTAR SISWA ELIGIBLE </strong><br><strong>SELEKSI NASIONAL BERDASARKAN PRESTASI (SNBP) </strong><br><strong>TAHUN PELAJARAN 2023/2024</strong></p>



<p>Eligible diambil dari 40% jumlah siswa tiap jurusan dengan perangkingan hasil belajar dari semester 1 s.d. 5, dan yang bersedia mengikuti SNBP berdesarkan angket yang sudah diberikan.</p>



<p><strong>PEMINTAN MIPA</strong></p>



<figure class="wp-block-table"><table><tbody><tr><td><strong>NO</strong></td><td><strong>NISN</strong></td><td><strong>NIS</strong></td><td><strong>NAMA SISWA</strong></td><td><strong>KELAS</strong></td></tr><tr><td>1</td><td>0061790497</td><td>16065</td><td>OKA RAIDANA</td><td>XII MIPA 7</td></tr><tr><td>2</td><td>0059683595</td><td>15849</td><td>CALLULA SADIYA</td><td>XII MIPA 5</td></tr><tr><td>3</td><td>0061117596</td><td>16098</td><td>GISELLA MIRANDA DAWNY SIANTURI</td><td>XII MIPA 1</td></tr><tr><td>4</td><td>0062779088</td><td>16913</td><td>FAHRIZA ARYA UTAMA TARIGAN</td><td>XII MIPA 1</td></tr><tr><td>5</td><td>0068189205</td><td>16023</td><td>MITAH AZIS NURHIDAYAH</td><td>XII MIPA 4</td></tr><tr><td>6</td><td>0061311609</td><td>15998</td><td>RISHKY FRE&#8217;D YUDIANTO</td><td>XII MIPA 4</td></tr><tr><td>7</td><td>0068572107</td><td>16035</td><td>RATU MERRY REHANIEH</td><td>XII MIPA 7</td></tr><tr><td>8</td><td>0061394949</td><td>16123</td><td>ZASKIA JENNY ARMANDA</td><td>XII MIPA 5</td></tr><tr><td>9</td><td>0063248066</td><td>15917</td><td>SLAVINA</td><td>XII MIPA 3</td></tr><tr><td>10</td><td>0066227575</td><td>15984</td><td>MARSANTYA HALEZA MAWA</td><td>XII MIPA 5</td></tr><tr><td>11</td><td>0067662075</td><td>15913</td><td>QUEEN AURELLIE MARLIANIE</td><td>XII MIPA 1</td></tr><tr><td>12</td><td>0065433216</td><td>16000</td><td>SANTANG SAYIDINA IQBAR</td><td>XII MIPA 5</td></tr><tr><td>13</td><td>0061642747</td><td>15901</td><td>KHAYSA NERRY ANDANI</td><td>XII MIPA 2</td></tr><tr><td>14</td><td>0057429131</td><td>15925</td><td>ALEX KHOUW</td><td>XII MIPA 6</td></tr><tr><td>15</td><td>0063787101</td><td>16045</td><td>ANGEL ASAFANY SIAGIAN</td><td>XII MIPA 3</td></tr><tr><td>16</td><td>0066734245</td><td>16034</td><td>RAJA IBNU FADILLAH</td><td>XII MIPA 6</td></tr><tr><td>17</td><td>0062861199</td><td>16122</td><td>ZASKIA FAUZA PUTRI WANDIRA</td><td>XII MIPA 6</td></tr><tr><td>18</td><td>0061274619</td><td>16341</td><td>SAUSAN AALIYAH GHAISANI</td><td>XII MIPA 7</td></tr><tr><td>19</td><td>0062607020</td><td>15851</td><td>CLARA ALVERINA</td><td>XII MIPA 5</td></tr><tr><td>20</td><td>0063647757</td><td>15871</td><td>PASHA AZZIKRA</td><td>XII MIPA 2</td></tr><tr><td>21</td><td>0065857677</td><td>15902</td><td>MARIA TETANIA SIMANJUNTAK</td><td>XII MIPA 5</td></tr><tr><td>22</td><td>0061165129</td><td>16918</td><td>DINDA RIZKI JAYANTI</td><td>XII MIPA 3</td></tr><tr><td>23</td><td>9017266028</td><td>15937</td><td>GUNAEL ALEXANDER SILALAHI</td><td>XII MIPA 3</td></tr><tr><td>24</td><td>0063598928</td><td>16004</td><td>ANGELINA REMO</td><td>XII MIPA 3</td></tr><tr><td>25</td><td>0059882689</td><td>15858</td><td>JANSEN REVANDI DANIEL</td><td>XII MIPA 3</td></tr><tr><td>26</td><td>0062242563</td><td>15893</td><td>COLLIN RIVALDO TAN</td><td>XII MIPA 7</td></tr><tr><td>27</td><td>0075663012</td><td>16010</td><td>BRYAN NICKOLAS SITOMPUL</td><td>XII MIPA 3</td></tr><tr><td>28</td><td>0051801191</td><td>16057</td><td>JUAN FERNANDO PARDEDE</td><td>XII MIPA 1</td></tr><tr><td>29</td><td>0064616771</td><td>16330</td><td>CINDY TINAWAN</td><td>XII MIPA 4</td></tr><tr><td>30</td><td>0069858877</td><td>15872</td><td>RADOTH YESYURUN ULI DOMDOM PAKPAHAN</td><td>XII MIPA 7</td></tr><tr><td>31</td><td>0064917400</td><td>15991</td><td>NAZZARA SHAVILA PUTERI</td><td>XII MIPA 4</td></tr><tr><td>32</td><td>0068952523</td><td>15987</td><td>MUHAMMAD RIDWAN</td><td>XII MIPA 1</td></tr><tr><td>33</td><td>0057421084</td><td>16081</td><td>VENUS AIYRA PUTRI</td><td>XII MIPA 7</td></tr><tr><td>34</td><td>0063467338</td><td>15905</td><td>MUHAMMAD GHIBRAN ADITYA</td><td>XII MIPA 6</td></tr><tr><td>35</td><td>0063777490</td><td>16032</td><td>NUHA MAGHFIRAH MAHAPUTRI</td><td>XII MIPA 1</td></tr><tr><td>36</td><td>0061027274</td><td>15890</td><td>ARZETTY PUTRI SEPTEDDY</td><td>XII MIPA 4</td></tr><tr><td>37</td><td>0069528631</td><td>16109</td><td>MUHAMMAD DAFFAREZEL RAMADHAN</td><td>XII MIPA 5</td></tr><tr><td>38</td><td>0052279788</td><td>15876</td><td>SAKDIAH SEPTIANA PUTRI</td><td>XII MIPA 1</td></tr><tr><td>39</td><td>0063575031</td><td>15918</td><td>STEVANUS RICKY MARTIEN HUTAURUK</td><td>XII MIPA 7</td></tr><tr><td>40</td><td>0074173003</td><td>17558</td><td>FATIMA SYIFA QARIRA</td><td>XII MIPA 3</td></tr><tr><td>41</td><td>0063886441</td><td>15926</td><td>ALYYA SHAKIRA</td><td>XII MIPA 4</td></tr><tr><td>42</td><td>0058920161</td><td>15868</td><td>NATALIA</td><td>XII MIPA 4</td></tr><tr><td>43</td><td>0063553004</td><td>16339</td><td>KHANIYA AULIA SYAHQIRA</td><td>XII MIPA 2</td></tr><tr><td>44</td><td>0062403713</td><td>16088</td><td>ALYSHA MAHDIAH MUFARIHAH</td><td>XII MIPA 7</td></tr><tr><td>45</td><td>0065572395</td><td>15904</td><td>MOCHAMMAD AZIDANE ALQOFARI</td><td>XII MIPA 5</td></tr><tr><td>46</td><td>0068610666</td><td>16013</td><td>FARREL EVANDRA NAINGGOLAN</td><td>XII MIPA 3</td></tr><tr><td>47</td><td>0065616945</td><td>16009</td><td>BENING NUURO GRAHTITAH ANNAYA</td><td>XII MIPA 7</td></tr><tr><td>48</td><td>0057770454</td><td>16285</td><td>FANA FAWAZZA OCTA RAMADA</td><td>XII MIPA 6</td></tr><tr><td>49</td><td>0061555094</td><td>16345</td><td>MUHAMMAD NABIL ALFATIH</td><td>XII MIPA 7</td></tr><tr><td>50</td><td>0057705587</td><td>15910</td><td>NAWILA KEISYA</td><td>XII MIPA 2</td></tr><tr><td>51</td><td>0066099720</td><td>15883</td><td>ZULFAN ASSYDIQY</td><td>XII MIPA 1</td></tr><tr><td>52</td><td>0064512332</td><td>16084</td><td>ABRAHAM LINCOLN VALENTINO</td><td>XII MIPA 5</td></tr><tr><td>53</td><td>0062036330</td><td>16014</td><td>FASYA PUTRI ALBANA</td><td>XII MIPA 3</td></tr><tr><td>54</td><td>0063457987</td><td>16015</td><td>HUGO WAHYU BAGAS PUTRA PRATAMA</td><td>XII MIPA 7</td></tr><tr><td>55</td><td>0055923411</td><td>15950</td><td>NATASYA AULIA ZAHRA DESRIANDA</td><td>XII MIPA 2</td></tr><tr><td>56</td><td>0061224601</td><td>15916</td><td>SITI ANNISA SYALIANA SARI</td><td>XII MIPA 4</td></tr><tr><td>57</td><td>0065264278</td><td>15929</td><td>CALVIN LUI HARIYANTO</td><td>XII MIPA 5</td></tr><tr><td>58</td><td>0052895610</td><td>16117</td><td>RAJA MAHZA KHAIRANI TAUFIK</td><td>XII MIPA 3</td></tr><tr><td>59</td><td>0066513415</td><td>16051</td><td>DZAKY MAHARDIKA FIRDAUS</td><td>XII MIPA 1</td></tr><tr><td>60</td><td>0063357208</td><td>16110</td><td>MUHAMMAD KHAERUL SUKANDAR</td><td>XII MIPA 2</td></tr><tr><td>61</td><td>0068642428</td><td>16106</td><td>MICHELLE HOLLYVIA FELLYA</td><td>XII MIPA 7</td></tr><tr><td>62</td><td>0063420214</td><td>15973</td><td>DANISH AZKA NUGROHO</td><td>XII MIPA 4</td></tr><tr><td>63</td><td>0062186657</td><td>15884</td><td>AISYAH ZAKIYAH RAMADHANI</td><td>XII MIPA 5</td></tr><tr><td>64</td><td>0067487320</td><td>15845</td><td>ALIFA DIANDRA ZIYYAN NUGROHO</td><td>XII MIPA 3</td></tr><tr><td>65</td><td>0065142066</td><td>15870</td><td>NUR ALIA</td><td>XII MIPA 2</td></tr><tr><td>66</td><td>0067740663</td><td>16022</td><td>MEDIANA SRI CENDANI</td><td>XII MIPA 4</td></tr><tr><td>67</td><td>0067458344</td><td>15958</td><td>RIZKY ANANDA PRATAMA</td><td>XII MIPA 4</td></tr><tr><td>68</td><td>0062669148</td><td>15965</td><td>ALDERAFITO BRYANTAMA</td><td>XII MIPA 2</td></tr><tr><td>69</td><td>0057992329</td><td>15907</td><td>MUHAMMAD RAYHAN HEZI FARABY</td><td>XII MIPA 7</td></tr><tr><td>70</td><td>0053569686</td><td>15944</td><td>MUHAMMAD AIDIL</td><td>XII MIPA 7</td></tr><tr><td>71</td><td>0063089526</td><td>15978</td><td>FRANSISCA AMALIA</td><td>XII MIPA 2</td></tr><tr><td>72</td><td>0064162012</td><td>15869</td><td>NAZIRA REVALINA PUTRI</td><td>XII MIPA 4</td></tr><tr><td>73</td><td>0061142623</td><td>15900</td><td>KHALID MUHAMMAD</td><td>XII MIPA 5</td></tr><tr><td>74</td><td>0057945068</td><td>16005</td><td>ANJELINA RINJANI LARASATI MAULANA QASNAUL ALIM</td><td>XII MIPA 3</td></tr><tr><td>75</td><td>0063567174</td><td>15923</td><td>ZULFANI SYFA RAUDHATUL JANNAH</td><td>XII MIPA 6</td></tr><tr><td>76</td><td>0063472487</td><td>15908</td><td>MUHAMMAD SYAH NABIL LUBIS</td><td>XII MIPA 2</td></tr><tr><td>77</td><td>0067035794</td><td>15961</td><td>SINGGIH PUTRA JULIANDRI</td><td>XII MIPA 2</td></tr><tr><td>78</td><td>0067515855</td><td>16036</td><td>RIZKY AHMAD FAUZAN</td><td>XII MIPA 6</td></tr><tr><td>79</td><td>0056255106</td><td>15943</td><td>MUHAMMAD ADIB HARYADI</td><td>XII MIPA 2</td></tr><tr><td>80</td><td>0064015657</td><td>16049</td><td>CAURA CANDIGIA SAHID WANANDI</td><td>XII MIPA 3</td></tr><tr><td>81</td><td>0055289208</td><td>16039</td><td>SATRIA PRATAMA SEFTIRIANDI</td><td>XII MIPA 6</td></tr><tr><td>82</td><td>0069072725</td><td>15878</td><td>SHAKINAH AULIA MECCA</td><td>XII MIPA 6</td></tr><tr><td>83</td><td>0062976766</td><td>16104</td><td>ISAAC VALDEMAR</td><td>XII MIPA 5</td></tr><tr><td>84</td><td>0066706693</td><td>15946</td><td>MUHAMMAD NABIL RISTIKA WIRA PUTRA</td><td>XII MIPA 1</td></tr><tr><td>85</td><td>0062702445</td><td>15957</td><td>RIGEL WICAKSONO</td><td>XII MIPA 4</td></tr><tr><td>86</td><td>0058156388</td><td>15899</td><td>HARIS ABDUL GHANI</td><td>XII MIPA 1</td></tr><tr><td>87</td><td>0068883114</td><td>15912</td><td>PRHAYOGO EKO SUMITRO</td><td>XII MIPA 1</td></tr><tr><td>88</td><td>0064832771</td><td>16003</td><td>SYARIFAH NURSYIFA ZAHRA</td><td>XII MIPA 6</td></tr><tr><td>89</td><td>0063310579</td><td>16048</td><td>BINTANG RAFA AZZAHRA</td><td>XII MIPA 6</td></tr><tr><td>90</td><td>0063584895</td><td>15953</td><td>RACHMAT HIDAYAT</td><td>XII MIPA 2</td></tr><tr><td>91</td><td>0064245292</td><td>15862</td><td>LEONYTA SRI REZEKI ANANDA</td><td>XII MIPA 6</td></tr><tr><td>92</td><td>0067183860</td><td>15924</td><td>ADITHYA RAMADHANI</td><td>XII MIPA 7</td></tr><tr><td>93</td><td>0062568336</td><td>15994</td><td>RAKHA NAUFAL ARSYANDI</td><td>XII MIPA 7</td></tr><tr><td>94</td><td>0068676981</td><td>15959</td><td>SHANIA AMMARA NISA</td><td>XII MIPA 6</td></tr><tr><td>95</td><td>0068126305</td><td>15887</td><td>ANDHIKA DWI PRATAMA</td><td>XII MIPA 4</td></tr><tr><td>96</td><td>0065597049</td><td>16002</td><td>SYARIFAH AIDA FITRI</td><td>XII MIPA 7</td></tr><tr><td>97</td><td>0057107678</td><td>16099</td><td>GRASCELLA CUT PUTRI MAHARANI</td><td>XII MIPA 3</td></tr><tr><td>98</td><td>0062949500</td><td>16066</td><td>OLIVIA PUTRI ANDRIANI</td><td>XII MIPA 1</td></tr><tr><td>99</td><td>0064037412</td><td>15850</td><td>CITRA DWI&nbsp; PUTRI KHAYATI</td><td>XII MIPA 6</td></tr><tr><td>100</td><td>0058943754</td><td>16072</td><td>RAHMAT FIKRI RIYANTO</td><td>XII MIPA 4</td></tr><tr><td>101</td><td>0063311160</td><td>15915</td><td>SENO PUTRA</td><td>XII MIPA 1</td></tr><tr><td>102</td><td>0056309317</td><td>15867</td><td>MUIDA FADHILAH</td><td>XII MIPA 4</td></tr><tr><td>103</td><td>0063440224</td><td>16071</td><td>RAHMA PUTRA PRASETYA</td><td>XII MIPA 6</td></tr><tr><td>104</td><td>0063463118</td><td>16334</td><td>ARFA SARADILLA</td><td>XII MIPA 6</td></tr><tr><td>105</td><td>0061682419</td><td>15972</td><td>CITRA ARIMBIE</td><td>XII MIPA 5</td></tr><tr><td>106</td><td>0069888072</td><td>16324</td><td>SYADZA AZZHARA</td><td>XII MIPA 1</td></tr><tr><td>107</td><td>0063171000</td><td>16121</td><td>SYIFA DWITYA WULANDARI</td><td>XII MIPA 1</td></tr><tr><td>108</td><td>0067023917</td><td>15982</td><td>KHAIRANI</td><td>XII MIPA 1</td></tr><tr><td>109</td><td>0069259841</td><td>15942</td><td>MOCHAMAD SYIFA SOFYAN PUTRA</td><td>XII MIPA 6</td></tr><tr><td>110</td><td>0067312030</td><td>15909</td><td>NABILLAH MAULIDDINA</td><td>XII MIPA 5</td></tr><tr><td>111</td><td>0069555660</td><td>16100</td><td>HABIL AR RAHMAN</td><td>XII MIPA 5</td></tr><tr><td>112</td><td>0058139783</td><td>16077</td><td>SELVY AWALIENA SAWALUDDIN</td><td>XII MIPA 7</td></tr><tr><td>113</td><td>0054226319</td><td>15992</td><td>NOVELIA SITOHANG</td><td>XII MIPA 2</td></tr><tr><td>114</td><td>0064231843</td><td>15935</td><td>ERSYA DWI JASMINE</td><td>XII MIPA 7</td></tr><tr><td>115</td><td>0057686803</td><td>16086</td><td>AISHA ALIDA PUTRI</td><td>XII MIPA 4</td></tr><tr><td>116</td><td>0063645020</td><td>16113</td><td>NABILA TRI ADILAH</td><td>XII MIPA 5</td></tr><tr><td>117</td><td>0063564994</td><td>15996</td><td>REISHA YOVENTYA FIRZACANTIKA</td><td>XII MIPA 7</td></tr><tr><td>118</td><td>0068057707</td><td>15947</td><td>MUSA CHANG LI PANJAITAN</td><td>XII MIPA 2</td></tr><tr><td>119</td><td>0049047484</td><td>15952</td><td>NURUL MENTARI YEO</td><td>XII MIPA 4</td></tr><tr><td>120</td><td>0066948327</td><td>15844</td><td>ALFIAN MASSIMULYANO GALIH</td><td>XII MIPA 2</td></tr><tr><td colspan="5"><strong>PEMINATAN IPS</strong></td></tr><tr><td><strong>NO</strong></td><td><strong>NISN</strong></td><td><strong>NIS</strong></td><td><strong>NAMA SISWA</strong></td><td><strong>KELAS</strong></td></tr><tr><td>1</td><td>0066089891</td><td>16192</td><td>RAISSA ALINE NATASHA</td><td>XII IPS 1</td></tr><tr><td>2</td><td>0069494922</td><td>16156</td><td>TATIA NANDHITA KAMARUDDIN</td><td>XII IPS 4</td></tr><tr><td>3</td><td>0052307011</td><td>16211</td><td>FIKRY ANDEAZ PRAYITNA</td><td>XII IPS 3</td></tr><tr><td>4</td><td>0061447713</td><td>16246</td><td>CANTIKA SALSABILA VENTISYA</td><td>XII IPS 5</td></tr><tr><td>5</td><td>0065842404</td><td>16161</td><td>YUNA</td><td>XII IPS 5</td></tr><tr><td>6</td><td>0064391624</td><td>16270</td><td>PUJA KUSVIANTI</td><td>XII IPS 2</td></tr><tr><td>7</td><td>0062716301</td><td>16304</td><td>NAMIERA PUTRI NUGROHO</td><td>XII IPS 3</td></tr><tr><td>8</td><td>0063738691</td><td>16295</td><td>JOY REBECCA HUTAURUK</td><td>XII IPS 1</td></tr><tr><td>9</td><td>0064446914</td><td>16264</td><td>MUHAMMAD RAZIQ AL AQSHA</td><td>XII IPS 1</td></tr><tr><td>10</td><td>0064988536</td><td>16180</td><td>MELLI CINTA CRISTINA HUTAJULU</td><td>XII IPS 2</td></tr><tr><td>11</td><td>0069750857</td><td>16196</td><td>SWEETY SEPTARIZA</td><td>XII IPS 4</td></tr><tr><td>12</td><td>0068704202</td><td>16269</td><td>PRICILLA SIRAIT</td><td>XII IPS 2</td></tr><tr><td>13</td><td>0065455934</td><td>16162</td><td>AGNES ANGELIKA</td><td>XII IPS 1</td></tr><tr><td>14</td><td>0052709255</td><td>16124</td><td>AGUNG ZAINAL</td><td>XII IPS 4</td></tr><tr><td>15</td><td>0064404827</td><td>16059</td><td>MUHAMMAD ANWAR</td><td>XII IPS 1</td></tr><tr><td>16</td><td>0065416290</td><td>16218</td><td>KURNIATI DWI PUTRI</td><td>XII IPS 1</td></tr><tr><td>17</td><td>0061443324</td><td>16257</td><td>MAHDAFIQIA</td><td>XII IPS 4</td></tr><tr><td>18</td><td>0066072656</td><td>16333</td><td>NATHASYA MEILY PUTRI</td><td>XII IPS 5</td></tr><tr><td>19</td><td>0061632779</td><td>16177</td><td>GILANG MAULANA</td><td>XII IPS 5</td></tr><tr><td>20</td><td>0062330978</td><td>16329</td><td>YULIE ANNISA SYARIFFAH HARAHAP</td><td>XII IPS 1</td></tr><tr><td>21</td><td>0065223445</td><td>16228</td><td>NABILA DWI ARNETA</td><td>XII IPS 2</td></tr><tr><td>22</td><td>0067076697</td><td>16199</td><td>WINDA KHAIRANI</td><td>XII IPS 3</td></tr><tr><td>23</td><td>0063965179</td><td>16313</td><td>YASMIN NURAIFA SARI</td><td>XII IPS 2</td></tr><tr><td>24</td><td>0053895987</td><td>16126</td><td>ANDLUIS ZENDRADEWA SETIAWAN</td><td>XII IPS 3</td></tr><tr><td>25</td><td>0063257301</td><td>16268</td><td>ORIZA SATIFA NURYENZA</td><td>XII IPS 5</td></tr><tr><td>26</td><td>0065568207</td><td>16187</td><td>NEHAN FAHIZA</td><td>XII IPS 1</td></tr><tr><td>27</td><td>0058578596</td><td>16233</td><td>RAHAYU FIRLYAMARADIAN</td><td>XII IPS 1</td></tr><tr><td>28</td><td>0055194741</td><td>16167</td><td>BELLA ANGRIANI PUTRI</td><td>XII IPS 5</td></tr><tr><td>29</td><td>0061290743</td><td>16200</td><td>AINAYA ALFAATIHAH</td><td>XII IPS 1</td></tr><tr><td>30</td><td>0068811305</td><td>16247</td><td>CHELSEA PUSPITA NINGMAS</td><td>XII IPS 5</td></tr><tr><td>31</td><td>0069656764</td><td>16223</td><td>MUHAMAD RIVALDO AGUS SAPUTRA</td><td>XII IPS 3</td></tr><tr><td>32</td><td>0058796482</td><td>16191</td><td>PRAHA RENDRA SUKMO ANGGORO</td><td>XII IPS 2</td></tr><tr><td>33</td><td>0052920394</td><td>16173</td><td>E SING SIN</td><td>XII IPS 2</td></tr><tr><td>34</td><td>0068973202</td><td>16181</td><td>MEYDIRA PUTRI KOESWARA</td><td>XII IPS 2</td></tr><tr><td>35</td><td>0065481543</td><td>15919</td><td>TYARA NOVILLAH TABITHA</td><td>XII IPS 2</td></tr><tr><td>36</td><td>0069771839</td><td>16176</td><td>FATIMAH AZZAHRA</td><td>XII IPS 4</td></tr><tr><td>37</td><td>0059811307</td><td>16328</td><td>LA ODE NOFRI</td><td>XII IPS 5</td></tr><tr><td>38</td><td>0067368395</td><td>16150</td><td>RIRIN DWI SABARINA SEMBIRING KEMBAREN</td><td>XII IPS 4</td></tr><tr><td>39</td><td>0068577285</td><td>16249</td><td>DIMAS RIZKI ADRIANSYAH</td><td>XII IPS 2</td></tr><tr><td>40</td><td>0068067579</td><td>16198</td><td>VITO HENDRIANSYAH</td><td>XII IPS 4</td></tr><tr><td>41</td><td>0063974519</td><td>16206</td><td>BEBY MERRY NATASHA</td><td>XII IPS 1</td></tr><tr><td>42</td><td>0065965749</td><td>16168</td><td>BILLIE JULYANO</td><td>XII IPS 1</td></tr><tr><td>43</td><td>0068720907</td><td>16250</td><td>FAJRA NAKEYSHA HAMZAH</td><td>XII IPS 2</td></tr><tr><td>44</td><td>0068590294</td><td>16318</td><td>NUR AQILA SARSABILLA</td><td>XII IPS 1</td></tr><tr><td>45</td><td>0065293382</td><td>16178</td><td>INDHIRA PRASASTI</td><td>XII IPS 2</td></tr><tr><td>46</td><td>0055586242</td><td>16242</td><td>ARGYA LUNNA KAZZAYARA</td><td>XII IPS 3</td></tr><tr><td>47</td><td>0061232976</td><td>16185</td><td>MUHAMMAD SIRRI AS SUKUTI</td><td>XII IPS 4</td></tr><tr><td>48</td><td>0067559499</td><td>16152</td><td>SALWA KHAIRUNNISA</td><td>XII IPS 1</td></tr><tr><td>49</td><td>0061016173</td><td>16244</td><td>BINTANG ARUM PARADITA</td><td>XII IPS 4</td></tr><tr><td>50</td><td>0064380460</td><td>16209</td><td>DESFANYA AMELLYA VEGA</td><td>XII IPS 5</td></tr><tr><td>51</td><td>0067831245</td><td>16261</td><td>MUHAMAD ILHAM SAPUTRA</td><td>XII IPS 4</td></tr><tr><td>52</td><td>0055144813</td><td>16188</td><td>NIKE ANDRIANI</td><td>XII IPS 2</td></tr><tr><td>53</td><td>0063129921</td><td>16166</td><td>BELINDA HOLIFIANA</td><td>XII IPS 4</td></tr><tr><td>54</td><td>0058237692</td><td>16298</td><td>KHARISMA YOGI FITRIYANI</td><td>XII IPS 5</td></tr><tr><td>55</td><td>0055371810</td><td>16182</td><td>MUHAMMAD ARMAN</td><td>XII IPS 3</td></tr><tr><td>56</td><td>0057542195</td><td>16190</td><td>NUR HANIFAH SABTY</td><td>XII IPS 4</td></tr><tr><td>57</td><td>0063904700</td><td>16160</td><td>YOGA KSATRIA DHARMA PERKASA</td><td>XII IPS 4</td></tr><tr><td>58</td><td>0065565676</td><td>16267</td><td>NURMA SALSABILA</td><td>XII IPS 5</td></tr><tr><td>59</td><td>0067077353</td><td>16281</td><td>CITRA ANNISYA RADINA</td><td>XII IPS 3</td></tr><tr><td>60</td><td>0061383241</td><td>16136</td><td>LAODE ADAM ALMAJID</td><td>XII IPS 5</td></tr><tr><td>61</td><td>0069913764</td><td>16142</td><td>NAYA ASHILAH ZAHRA</td><td>XII IPS 5</td></tr><tr><td>62</td><td>0043364972</td><td>16291</td><td>FITRI SYURANI</td><td>XII IPS 1</td></tr><tr><td>63</td><td>0063170443</td><td>16141</td><td>MUHAMMAD FARIES</td><td>XII IPS 5</td></tr><tr><td>64</td><td>0064842307</td><td>16201</td><td>ALFANDI IQSAN</td><td>XII IPS 2</td></tr><tr><td>65</td><td>3064607612</td><td>16301</td><td>M IKHSAN ZIQRI AULIA</td><td>XII IPS 4</td></tr><tr><td>66</td><td>0063924334</td><td>16294</td><td>JEFRIZAL</td><td>XII IPS 4</td></tr><tr><td>67</td><td>0052150052</td><td>16231</td><td>NOFAN ERZA IRAWAN</td><td>XII IPS 1</td></tr><tr><td>68</td><td>0069055832</td><td>16272</td><td>RAMDHAN BAGAS ALI RAFIF</td><td>XII IPS 1</td></tr><tr><td>69</td><td>0064530120</td><td>16145</td><td>RASSYIFA DARFINIZA</td><td>XII IPS 3</td></tr><tr><td>70</td><td>0066658262</td><td>16307</td><td>PUTRI MAHARANI AISYAH</td><td>XII IPS 3</td></tr><tr><td>71</td><td>0065727953</td><td>16172</td><td>DEWI PUSPITASARI</td><td>XII IPS 4</td></tr><tr><td>72</td><td>3053479859</td><td>16335</td><td>AFNIANTY PURNAMASARI FENDY</td><td>XII IPS 5</td></tr><tr><td>73</td><td>0054818407</td><td>16302</td><td>MUHAMMAD ASH SHIDDIQ</td><td>XII IPS 2</td></tr><tr><td>74</td><td>0069624094</td><td>16154</td><td>SELVI ANJAR WATI</td><td>XII IPS 4</td></tr></tbody></table></figure>
', '/storage/images/articles/daftar-siswa-eligible-seleksi-nasional-berdasarkan-prestasi-snbpdaftar-siswa-eligible-tahun-2024-9a4965.jpg', 'Widodo Aja', '2024-02-03 21:36:04', '2026-06-09 02:53:40', '2026-06-09 02:53:40', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('60', 'TATA CARA MENGIKUTI MASA PENGENALAN LINGKUNGAN SEKOLAH TAHUN PELAJARAN 2021/2022', 'tata-cara-mengikuti-masa-pengenalan-lingkungan-sekolah-tahun-pelajaran-2021-2021', 'utama', '
<p>Untuk informasi kegiatan Masa Pengenalan Lingkungan Sekolah Tahun Pelajaran 2021/2022 melalui Learning Management System (LMS) dengan alamat <a href="https://lms.sman1-tpi.sch.id">https://lms.sman1-tpi.sch.id</a> untuk mendapatkan username dan password melalui whatsapp dengan cara :</p>



<ol type="1"><li>Ketik <strong>NISN</strong> kirim melalui Whatsapps dengan nomor <strong>0882-7948-9884</strong></li><li>Siswa akan menerima balasan.<br>Contoh:&nbsp; apabila NIS kamu 0056111111 cukup ketik 0056111111 (nomornya saja) dan kirim ke <strong>0882-7948-9884</strong></li></ol>



<p>Setelah mendapatkan balasan siswa wajib :</p>



<ol type="1"><li>Login dan pilih *&#8221;MASA PENGENALAN LINGKUNGAN SEKOLAH 2021 KLMPK ..&#8221;*</li><li>Klik link gabung dengan kelompoknya di Group Whatsapp (Wajib) paling lambat hari Sabtu  10 Juli 2021 pukul 24.00 WIB dan untuk informasi kegiatan pada hari senin akan diumumkan pada hari minggu 11 Juli 2021 pukul 10.00 WIB melalui group Whatsapp</li><li>Donwload dan Print *Kartu Peserta MASA PENGENALAN LINGKUNGAN SEKOLAH 2021*,Lengkapi Nama, Asal Sekolah dan Kelompok MPLS</li><li>Kartu tanda peserta di cetak atau di tulis tangan dengan huruf kapital. Dipakai dengan cara menggantungkan dileher selama kegiatan MPLS berlangsung</li><li>Harap baca tata tertib yang ada di LMS SMAN 1 Tanjungpinang</li></ol>



<p>Kegiatan Selama Masa Pengenalan Lingkungan Sekolah secara virtual tanggal 12,14 s/d 17 Juli 2021 :</p>



<ol type="1"><li>Menggunakan aplikasi video conference <strong><em>google meet</em></strong><em>. </em>Bagi yang belum memiliki aplikasi <strong><em>google meet</em></strong> silahkan donwload dulu di playstore atau Appstore untuk pengguna iphone</li><li>Link gabung <strong><em>google meet </em></strong>akan dishare oleh pendamping 15 menit sebelum acara dimulai, dan pendamping melalukan absensi. Peserta wajib mengikuti seluruh rangkaian acara.</li><li>Peserta didik berpakaian :<br>&#8211; Senin, Rabu, Kamis                   : Seragam OSIS SMP/M.Ts. Berdasi<br>&#8211; Kamis, Jumat                              : Seragam Batik SMP/M.Ts.</li></ol>
', '/storage/images/articles/tata-cara-mengikuti-masa-pengenalan-lingkungan-sekolah-tahun-pelajaran-2021-2021-793cff.jpg', 'Widodo Aja', '2021-07-10 20:46:47', '2026-06-09 02:53:41', '2026-06-09 02:53:41', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('61', 'Pengumuman Kelulusan TP 2020/2021', 'pengumuman-kelulusan-tp-2020-2021', 'utama', '', '/storage/images/articles/pengumuman-kelulusan-tp-2020-2021-094ce5.jpeg', 'yanisidi', '2021-04-30 20:13:10', '2026-06-09 02:53:43', '2026-06-09 02:53:43', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('62', 'Hari Pendidikan Nasional', 'hari-pendidikan-nasional', 'utama', '', '/storage/images/articles/hari-pendidikan-nasional-f77417.jpeg', 'yanisidi', '2021-04-30 20:05:24', '2026-06-09 02:53:45', '2026-06-09 02:53:45', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('63', 'Jenga | Film Pendek FLS2N 2020 Prov. Kepri', 'jenga-film-pendek-fls2n-2020-prov-kepri', 'utama', '
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
<span class="embed-youtube" style="text-align:center; display: block;"><iframe class=''youtube-player'' width=''790'' height=''445'' src=''https://www.youtube.com/embed/NKIbM-Yl1VA?version=3&#038;rel=1&#038;showsearch=0&#038;showinfo=1&#038;iv_load_policy=1&#038;fs=1&#038;hl=en-US&#038;autohide=2&#038;wmode=transparent'' allowfullscreen=''true'' style=''border:0;'' sandbox=''allow-scripts allow-same-origin allow-popups allow-presentation''></iframe></span>
</div></figure>



<p>Sinopsis : Jenga (diambil dari bahasa swahili yang memiliki arti &#8220;membangun&#8221;) menceritakan tentang Chela (berasal dari nama latin penyu; Chelonioidea): anak tunggal dari sebuah keluarga berkecukupan yang jarang sekali mendapatkan perhatian dari kedua orang tuanya. Sesuai Namanya, Chela berjuang membangun keharmonisan keluarga nya seorang diri, selayaknya seekor anak penyu yang berjuang kembali ke lautan setelah ditinggal oleh induknya,. Namun semakin ia berjuang hatinya semakin patah dan keharmonisan keluarganya semakin berkurang seiring berjalannya waktu. Seperti permainan Jenga yang utuh dan kokoh namun semakin renggang dan rapuh di setiap tahapan permainannya. Bahkan tepat pada hari ulang tahunnya, Chela tidak menerima apapun selain kekecewaan dari perlakuan kedua orang tuanya, tapi itu tidak membuat Chela menyerah pada keadaan untuk membuat orang tuanya sadar dan peduli kepadanya. Dan benar saja, usaha tidak pernah mengkhianati hasil, Chela mendapatkan apa yang pantas ia dapatkan. Crew List : Director : Rizqullah Ramadhan Panggabean Script Writer : Yusnita Rahman Salhi Director Of Photography : Muhammad Rafi Khairunizham Camera Man : Muhammad Syah Difa Editor : Agil Syatrio Wibowo Artistic and Make Up Artist : Regita Fakhira</p>
', '/storage/images/articles/jenga-film-pendek-fls2n-2020-prov-kepri-063155.png', 'yanisidi', '2020-10-04 23:46:17', '2026-06-09 02:53:46', '2026-06-09 02:53:46', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('64', 'BENTALA | Film Pendek FLS2N 2020 Prov. Kepri', 'bentala-film-pendek-fls2n-2020-prov-kepri', 'utama', '
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
<span class="embed-youtube" style="text-align:center; display: block;"><iframe class=''youtube-player'' width=''790'' height=''445'' src=''https://www.youtube.com/embed/SFleDT8Jzls?version=3&#038;rel=1&#038;showsearch=0&#038;showinfo=1&#038;iv_load_policy=1&#038;fs=1&#038;hl=en-US&#038;autohide=2&#038;wmode=transparent'' allowfullscreen=''true'' style=''border:0;'' sandbox=''allow-scripts allow-same-origin allow-popups allow-presentation''></iframe></span>
</div></figure>



<p>BENTALA | Film Pendek FLS2N 2020 Prov. Kepri | SMAN 1 Tanjungpinang | Rizqullah.R.P &amp; Agil Syatrio W.</p>
', '/storage/images/articles/bentala-film-pendek-fls2n-2020-prov-kepri-fcfd78.png', 'yanisidi', '2020-10-04 23:41:26', '2026-06-09 02:53:49', '2026-06-09 02:53:49', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('65', 'Bakti Sosial Bulan Ramadhan', 'bakti-sosial-bulan-ramadhan', 'utama', '
<p>Alhamdulillah kegiatan bakti sosial yang dilaksanakan dewan Ambalan Gugus depan SMA Negeri 1 Tanjungpinang dapat terlaksana dengan baik.</p>



<p>Kegiatan bakti sosial kali ini, bertempat dibeberapa lokasi yaitu :</p>



<ol><li>Panti asuhan Bina Almutaha bkt cermin, </li><li>Panti asuhan khadimul umah pancur dan</li><li>Panti asuhan Muhammadiah Kamboja.</li></ol>





	<div class=''ngg-imagebrowser''
         id=''ngg-imagebrowser-a40e16a92f103c36d6b9c3f2734c477e-681''
         data-nextgen-gallery-id="a40e16a92f103c36d6b9c3f2734c477e">

        <h3>Galeri Kegiatan Baksos</h3>

        <div id="ngg-image-0" class="pic" >

        <a href=''/storage/images/articles/bakti-sosial-bulan-ramadhan-inline-1-0e91ff.jpeg''
           title='' ''
           data-src="/storage/images/articles/bakti-sosial-bulan-ramadhan-inline-1-0e91ff.jpeg"
           data-thumbnail="https://www.sman1-tpi.sch.id/isi-njero/gallery/baksos2019/thumbs/thumbs_baksos_2019_1.jpeg"
           data-image-id="45"
           data-title="Galeri Kegiatan Baksos"
           data-description=" "
           class="ngg-fancybox" rel="a40e16a92f103c36d6b9c3f2734c477e">
            <img title=''Galeri Kegiatan Baksos''
                 alt=''Galeri Kegiatan Baksos''
                 src=''/storage/images/articles/bakti-sosial-bulan-ramadhan-inline-1-0e91ff.jpeg''/>
        </a>

        </div> 

        <div class=''ngg-imagebrowser-nav''>

            <div class=''back''>
                <a class=''ngg-browser-prev''
                   id=''ngg-prev-53''
                   href=''https://www.sman1-tpi.sch.id/bakti-sosial-bulan-ramadhan/nggallery/image/baksos_2019_9?categories=4&#038;/''>
                    &#9668; Back                </a>
            </div>

            <div class=''next''>
                <a class=''ngg-browser-next''
                   id=''ngg-next-46''
                   href=''https://www.sman1-tpi.sch.id/bakti-sosial-bulan-ramadhan/nggallery/image/baksos_2019_2?categories=4&#038;/''>
                    Next                    &#9658;
                </a>
            </div>

            <div class=''counter''>
                Picture                1                of                9            </div>

            <div class=''ngg-imagebrowser-desc''>
                <p> </p>
            </div>

        </div>
    </div>


', '/storage/images/articles/bakti-sosial-bulan-ramadhan-4a3f37.jpeg', 'yanisidi', '2019-05-17 21:19:45', '2026-06-09 02:53:55', '2026-06-09 02:53:55', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('66', 'UPACARA PEMBUKAAN  AMBALAN GUGUS DEPAN', 'upacara-pembukaan-ambalan-gugus-depan', 'utama', '<p><figure id="attachment_633" aria-describedby="caption-attachment-633" style="width: 790px" class="wp-caption alignleft"><a href="https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?ssl=1"><img decoding="async" loading="lazy" class="wp-image-633 size-large" src="/storage/images/articles/upacara-pembukaan-ambalan-gugus-depan-inline-1-b0e4fc.jpg" alt="Upacara Pembukaan Perkemahan Penerimaan Tamu Ambalan" width="790" height="593" srcset="https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?resize=1024%2C768&amp;ssl=1 1024w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?resize=300%2C225&amp;ssl=1 300w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?resize=768%2C576&amp;ssl=1 768w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?w=2048&amp;ssl=1 2048w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/10/DSCN0264.jpg?w=1580&amp;ssl=1 1580w" sizes="(max-width: 790px) 100vw, 790px" data-recalc-dims="1" /></a><figcaption id="caption-attachment-633" class="wp-caption-text">Selamat Datang Peserta Perkemahan Penerimaan Tamu Ambalan Gugus Depan 01-001 d1n 01-002 SMA Negeri 1 Tanjungpinang</figcaption></figure></p>
', '/storage/images/articles/upacara-pembukaan-ambalan-gugus-depan-46b1d3.jpg', 'Syawal', '2018-10-16 09:13:02', '2026-06-09 02:54:03', '2026-06-09 02:54:03', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('67', 'Kunjungan Gubernur Kepulauan Riau', 'kunjungan-gubernur-kepulauan-riau', 'utama', '<p>Kunjungan Gubernur Kepulauan Riau, Bapak H. Nurdin Basirun, S.Sos, M.Si ke SMA Negeri 1 Tanjungpinang diawali sebagai pembina upacara dan di lanjutkan dengan silaturahmi dan diskusi pendidikan.</p>


	<div class=''ngg-imagebrowser''
         id=''ngg-imagebrowser-5a5bf5df6c39b510ca00a66be61ac985-621''
         data-nextgen-gallery-id="5a5bf5df6c39b510ca00a66be61ac985">

        <h3>Kunjungan Gubernur Kepri</h3>

        <div id="ngg-image-0" class="pic" >

        <a href=''/storage/images/articles/kunjungan-gubernur-kepulauan-riau-inline-1-ac9b77.jpeg''
           title='' ''
           data-src="/storage/images/articles/kunjungan-gubernur-kepulauan-riau-inline-1-ac9b77.jpeg"
           data-thumbnail="https://www.sman1-tpi.sch.id/isi-njero/gallery/kunjungan_gubernur/thumbs/thumbs_WhatsApp-Image-2018-10-09-at-09.19.21.jpeg"
           data-image-id="44"
           data-title="Kunjungan Gubernur Kepri"
           data-description=" "
           class="ngg-fancybox" rel="5a5bf5df6c39b510ca00a66be61ac985">
            <img title=''Kunjungan Gubernur Kepri''
                 alt=''Kunjungan Gubernur Kepri''
                 src=''/storage/images/articles/kunjungan-gubernur-kepulauan-riau-inline-1-ac9b77.jpeg''/>
        </a>

        </div> 

        <div class=''ngg-imagebrowser-nav''>

            <div class=''back''>
                <a class=''ngg-browser-prev''
                   id=''ngg-prev-43''
                   href=''https://www.sman1-tpi.sch.id/kunjungan-gubernur-kepulauan-riau/nggallery/image/whatsapp-image-2018-10-09-at-09-19-22?categories=4&#038;/''>
                    &#9668; Back                </a>
            </div>

            <div class=''next''>
                <a class=''ngg-browser-next''
                   id=''ngg-next-43''
                   href=''https://www.sman1-tpi.sch.id/kunjungan-gubernur-kepulauan-riau/nggallery/image/whatsapp-image-2018-10-09-at-09-19-22?categories=4&#038;/''>
                    Next                    &#9658;
                </a>
            </div>

            <div class=''counter''>
                Picture                1                of                2            </div>

            <div class=''ngg-imagebrowser-desc''>
                <p> </p>
            </div>

        </div>
    </div>


<p>&nbsp;</p>
<p>&nbsp;</p>
', '/storage/images/articles/kunjungan-gubernur-kepulauan-riau-f76fd4.jpeg', 'yanisidi', '2018-09-10 12:55:43', '2026-06-09 02:54:11', '2026-06-09 02:54:11', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('68', 'SMANSA Ber-Qurban', 'smansa-ber-qurban', 'utama', '<p>Smansa Tanjungpinang Berkurban. Terimakasih kami ucapkan kepada seluruh yang berkurban yang menyisihkan rezekinya buat amal kebaikan, semoga Allah Swt melimpahkan rezeki yang banyak lagi berkah..Aamin yaa rabbal alamin.<br />
Dan terimakasih juga kepada segenap panitia yang telah ikut berpartisipasi..</p>
<!-- index.php -->
<div
	class="ngg-galleryoverview ngg-ajax-pagination-none"
	id="ngg-gallery-d3c801c26eb00bc00927fdb7c39ae377-1">

    	<div class="slideshowlink">
        <a href=''https://www.sman1-tpi.sch.id/smansa-ber-qurban/nggallery/slideshow?categories=4''>&#091;Show slideshow&#093;</a>
		
	</div>
			<!-- Thumbnails -->
				<div id="ngg-image-0" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban01.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban01.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-1-0f99ae.jpg"
               data-image-id="25"
               data-title="qurban01"
               data-description=""
               data-image-slug="qurban01-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban01"
                    alt="qurban01"
                    src="/storage/images/articles/smansa-ber-qurban-inline-1-0f99ae.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-1" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban02.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban02.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-2-83bc53.jpg"
               data-image-id="26"
               data-title="qurban02"
               data-description=""
               data-image-slug="qurban02-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban02"
                    alt="qurban02"
                    src="/storage/images/articles/smansa-ber-qurban-inline-2-83bc53.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-2" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban03.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban03.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-3-7d651a.jpg"
               data-image-id="27"
               data-title="qurban03"
               data-description=""
               data-image-slug="qurban03-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban03"
                    alt="qurban03"
                    src="/storage/images/articles/smansa-ber-qurban-inline-3-7d651a.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-3" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban04.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban04.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-4-78d815.jpg"
               data-image-id="28"
               data-title="qurban04"
               data-description=""
               data-image-slug="qurban04-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban04"
                    alt="qurban04"
                    src="/storage/images/articles/smansa-ber-qurban-inline-4-78d815.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-4" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban06.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban06.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-5-ad81db.jpg"
               data-image-id="29"
               data-title="qurban06"
               data-description=""
               data-image-slug="qurban06-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban06"
                    alt="qurban06"
                    src="/storage/images/articles/smansa-ber-qurban-inline-5-ad81db.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-5" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban07.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban07.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-6-099d45.jpg"
               data-image-id="30"
               data-title="qurban07"
               data-description=""
               data-image-slug="qurban07-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban07"
                    alt="qurban07"
                    src="/storage/images/articles/smansa-ber-qurban-inline-6-099d45.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-6" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban09.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban09.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-7-064bcd.jpg"
               data-image-id="31"
               data-title="qurban09"
               data-description=""
               data-image-slug="qurban09-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban09"
                    alt="qurban09"
                    src="/storage/images/articles/smansa-ber-qurban-inline-7-064bcd.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-7" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban10.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban10.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-8-88d593.jpg"
               data-image-id="32"
               data-title="qurban10"
               data-description=""
               data-image-slug="qurban10-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban10"
                    alt="qurban10"
                    src="/storage/images/articles/smansa-ber-qurban-inline-8-88d593.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
				<div id="ngg-image-8" class="ngg-gallery-thumbnail-box" >
				        <div class="ngg-gallery-thumbnail">
            <a href="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban08.jpg"
               title=""
               data-src="https://www.sman1-tpi.sch.id/isi-njero/gallery/qurban2018/qurban08.jpg"
               data-thumbnail="/storage/images/articles/smansa-ber-qurban-inline-9-54defb.jpg"
               data-image-id="33"
               data-title="qurban08"
               data-description=""
               data-image-slug="qurban08-1"
               class="ngg-fancybox" rel="d3c801c26eb00bc00927fdb7c39ae377">
                <img
                    title="qurban08"
                    alt="qurban08"
                    src="/storage/images/articles/smansa-ber-qurban-inline-9-54defb.jpg"
                    width="240"
                    height="160"
                    style="max-width:100%;"
                />
            </a>
        </div>
							</div> 
			
        
		
		<!-- Pagination -->
	<div class=''ngg-clear''></div>	</div>

', '/storage/images/articles/smansa-ber-qurban-ffe89c.jpg', 'yanisidi', '2018-08-24 15:00:59', '2026-06-09 02:54:39', '2026-06-09 02:54:39', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('69', 'HUT SMANSA ke-62', 'hut-smansa-ke-62', 'utama', '<p>isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita <img decoding="async" loading="lazy" class="size-thumbnail wp-image-449 alignleft" src="/storage/images/articles/hut-smansa-ke-62-inline-1-54aa03.jpg" alt="" width="150" height="150" srcset="https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39932498_1936496813080003_6198899901447798784_n.jpg?resize=150%2C150&amp;ssl=1 150w, https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39932498_1936496813080003_6198899901447798784_n.jpg?zoom=2&amp;resize=150%2C150&amp;ssl=1 300w, https://i1.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39932498_1936496813080003_6198899901447798784_n.jpg?zoom=3&amp;resize=150%2C150&amp;ssl=1 450w" sizes="(max-width: 150px) 100vw, 150px" data-recalc-dims="1" />isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita</p>
', '/storage/images/articles/hut-smansa-ke-62-fc76f0.jpg', 'yanisidi', '2018-08-24 08:25:52', '2026-06-09 02:54:44', '2026-06-09 02:54:44', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('70', 'Dirgahayu RI ke-73 di SMANSA', 'dirgahayu-ri-ke-73-di-smansa', 'utama', '<p><img decoding="async" loading="lazy" class="size-thumbnail wp-image-443 alignleft" src="/storage/images/articles/dirgahayu-ri-ke-73-di-smansa-inline-1-56b2d3.jpg" alt="" width="150" height="150" srcset="https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39543465_2072453066121077_6893199279154790400_n.jpg?resize=150%2C150&amp;ssl=1 150w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39543465_2072453066121077_6893199279154790400_n.jpg?zoom=2&amp;resize=150%2C150&amp;ssl=1 300w, https://i0.wp.com/www.sman1-tpi.sch.id/isi-njero/uploads/2018/08/39543465_2072453066121077_6893199279154790400_n.jpg?zoom=3&amp;resize=150%2C150&amp;ssl=1 450w" sizes="(max-width: 150px) 100vw, 150px" data-recalc-dims="1" />Upacara peringatan HUT Republik Indonesia ke 73 diselenggarakan dengan khidmat di SMA Negeri 1 Tanjungpinang. Kepala Sekolah SMA Negeri 1, Bapak Dr. Imam Syafii, S.Pd, M.Si selaku pembina upacara HUT RI-73 menyampaikan beberapa pesan tentang arti pentingnya peringatan HUT RI ini.</p>
<p>&nbsp;</p>
', '/storage/images/articles/dirgahayu-ri-ke-73-di-smansa-ffd2d3.jpg', 'yanisidi', '2018-08-17 15:10:45', '2026-06-09 02:54:49', '2026-06-09 02:54:49', '0');
INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `content`, `image`, `author`, `published_at`, `created_at`, `updated_at`, `is_featured`) VALUES ('71', 'Wajah Baru Website SMANSA Tanjungpinang', 'new-face-smansa-tanjungpinang', 'utama', '<p>Ini adalah isi berita bagian atas / slider. silahkan diganti dan disesuikan dengan berita dan informasi terbaru dari website anda. Tulisan ini hanyalah sebagai contoh. Model penulisan menyesuikan. Untuk menampilkan foto dibagian depan, gunakan featured Image.&nbsp;</p>
', '/storage/images/articles/new-face-smansa-tanjungpinang-0233ed.jpeg', 'yanisidi', '2018-08-15 09:54:00', '2026-06-09 02:54:51', '2026-06-09 02:54:51', '0');

-- Table structure for contact_messages
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE "contact_messages" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "subject" varchar not null, "message" text not null, "is_read" tinyint(1) not null default '0', "created_at" datetime, "updated_at" datetime);

-- Table structure for galleries
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE "galleries" ("id" integer primary key autoincrement not null, "title" varchar not null, "image" varchar not null, "category" varchar not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for galleries
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('1', 'Upacara Hari Pendidikan Nasional 2026', 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=800&auto=format&fit=crop', 'kegiatan', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('2', 'Laboratorium Komputer SMANSA Unggulan', 'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop', 'fasilitas', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('3', 'Rapat Dinas Guru & Staff Kurikulum Merdeka', 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop', 'kegiatan', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('4', 'Kunjungan Studi Banding SMK Seri Kotaputri Malaysia', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop', 'osis', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('5', 'Penyerahan Piala Juara Gitar Solo FLS3N', 'https://images.unsplash.com/photo-1531058020387-3be344559be6?q=80&w=800&auto=format&fit=crop', 'prestasi', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `galleries` (`id`, `title`, `image`, `category`, `created_at`, `updated_at`) VALUES ('6', 'Gedung Utama SMAN 1 Tanjungpinang yang Asri', 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=800&auto=format&fit=crop', 'fasilitas', '2026-06-01 15:35:59', '2026-06-01 15:35:59');

-- Table structure for settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE "settings" ("id" integer primary key autoincrement not null, "key" varchar not null, "value" text, "created_at" datetime, "updated_at" datetime);

-- Dumping data for settings
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('1', 'siswa_aktif', '1250', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('2', 'guru_staff', '84', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('3', 'ruang_kelas', '36', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('4', 'akreditasi', 'A', '2026-06-01 15:35:59', '2026-06-01 15:35:59');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('5', 'kop_header_1', 'PEMERINTAH PROVINSI KEPULAUAN RIAU', '2026-06-26 16:28:10', '2026-06-26 16:30:55');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('6', 'kop_header_2', 'SMA NEGERI 1 TANJUNGPINANG', '2026-06-26 16:28:10', '2026-06-26 16:30:55');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('7', 'kop_address', 'Jalan K.H. Agus Salim No. 1, Tanjungpinang | Telp: (0771) 21112 | Email: info@sman1-tpi.sch.id', '2026-06-26 16:28:10', '2026-06-26 16:30:55');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('8', 'kop_website', 'Website: smansa-tpi.sch.id | Akreditasi A', '2026-06-26 16:28:10', '2026-06-26 16:30:55');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('9', 'kop_logo', '/images/logo.png', '2026-06-26 16:28:10', '2026-06-26 16:28:19');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('10', 'kop_logo_left', '/images/logo.png', '2026-06-26 16:30:48', '2026-06-26 16:30:55');
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES ('11', 'kop_logo_right', '/images/logo.png', '2026-06-26 16:30:48', '2026-06-26 16:30:55');

-- Table structure for new_students
DROP TABLE IF EXISTS `new_students`;
CREATE TABLE "new_students" ("id" integer primary key autoincrement not null, "nisn" varchar not null, "name" varchar not null, "birth_place" varchar, "birth_date" date, "class_recommendation" varchar, "kk_path" varchar, "akta_path" varchar, "photo_path" varchar, "spmb_path" varchar, "statement_path" varchar, "uploaded_at" datetime, "created_at" datetime, "updated_at" datetime, "gender" varchar, "nik" varchar, "religion" varchar, "address" text, "district" varchar, "subdistrict" varchar, "stay_type" varchar, "phone" varchar, "is_kps" varchar, "kps_number" varchar, "father_name" varchar, "father_education" varchar, "father_job" varchar, "father_income" varchar, "mother_name" varchar, "mother_education" varchar, "mother_job" varchar, "mother_income" varchar, "parent_address" text, "guardian_name" varchar, "guardian_education" varchar, "guardian_job" varchar, "guardian_income" varchar, "guardian_address" text, "is_kip" varchar, "kip_number" varchar, "allow_edit" tinyint(1) not null default '0', "queue_number" integer, "verification_status" varchar not null default 'pending', "verification_notes" text, "admin_notes" text, "verified_by" varchar);

-- Dumping data for new_students
INSERT INTO `new_students` (`id`, `nisn`, `name`, `birth_place`, `birth_date`, `class_recommendation`, `kk_path`, `akta_path`, `photo_path`, `spmb_path`, `statement_path`, `uploaded_at`, `created_at`, `updated_at`, `gender`, `nik`, `religion`, `address`, `district`, `subdistrict`, `stay_type`, `phone`, `is_kps`, `kps_number`, `father_name`, `father_education`, `father_job`, `father_income`, `mother_name`, `mother_education`, `mother_job`, `mother_income`, `parent_address`, `guardian_name`, `guardian_education`, `guardian_job`, `guardian_income`, `guardian_address`, `is_kip`, `kip_number`, `allow_edit`, `queue_number`, `verification_status`, `verification_notes`, `admin_notes`, `verified_by`) VALUES ('2', '0092837482', 'Dedy Zhang', 'Tanjungpinang', '2010-05-15 00:00:00', 'X MIPA 1', '/storage/ppdb/0092837482_kk_1782229624.pdf', '/storage/ppdb/0092837482_akta_1782229624.pdf', '/storage/ppdb/0092837482_skl_1782229624.pdf', '/storage/ppdb/0092837482_spmb_1782229624.pdf', '/storage/ppdb/0092837482_statement_1782229624.pdf', '2026-06-23 15:47:04', '2026-06-23 05:30:35', '2026-06-26 16:39:49', 'Laki-laki', '2172040401980001', 'Buddha', 'Jl. Ir. Sutami No. 382', 'Bukit Bestari', 'Tanjungpinang Timur', 'Bersama Orang Tua', '771085668063411', 'Tidak', NULL, 'Suraidi', 'D3', 'Wiraswasta', 'Rp 500.000 – Rp 999.999', 'Sumini', 'SD', 'Ibu Rumah Tangga', 'Rp 500.000 – Rp 999.999', 'Jl. Ir. Sutami No. 38', '-', 'Putus SD', '-', 'Kurang dari Rp 500.000', '-', 'Tidak', NULL, '0', '1', 'verified', NULL, NULL, 'Administrator Humas');
INSERT INTO `new_students` (`id`, `nisn`, `name`, `birth_place`, `birth_date`, `class_recommendation`, `kk_path`, `akta_path`, `photo_path`, `spmb_path`, `statement_path`, `uploaded_at`, `created_at`, `updated_at`, `gender`, `nik`, `religion`, `address`, `district`, `subdistrict`, `stay_type`, `phone`, `is_kps`, `kps_number`, `father_name`, `father_education`, `father_job`, `father_income`, `mother_name`, `mother_education`, `mother_job`, `mother_income`, `parent_address`, `guardian_name`, `guardian_education`, `guardian_job`, `guardian_income`, `guardian_address`, `is_kip`, `kip_number`, `allow_edit`, `queue_number`, `verification_status`, `verification_notes`, `admin_notes`, `verified_by`) VALUES ('3', '0092837483', 'Fellianto', 'Batam', '2010-08-20 00:00:00', 'X IPS 2', '/storage/ppdb/0092837483_kk_1782488506.pdf', '/storage/ppdb/0092837483_akta_1782488506.pdf', '/storage/ppdb/0092837483_skl_1782488506.pdf', '/storage/ppdb/0092837483_spmb_1782488506.pdf', '/storage/ppdb/0092837483_statement_1782488506.pdf', '2026-06-26 15:41:46', '2026-06-23 05:30:35', '2026-06-26 15:47:52', 'Laki-laki', '2172040401980001', 'Islam', 'Jl. Ir. Sutami No. 38', 'Bukit Bestari', 'Tanjungpinang Timur', 'Bersama Orang Tua', '771085668063411', 'Tidak', NULL, 'Suraidi', 'SD', 'Wiraswasta', 'Rp 5.000.000 – Rp 20.000.000', 'Sumini', 'SD', 'Ibu Rumah Tangga', 'Rp 500.000 – Rp 999.999', 'Jl. Ir. Sutami No. 38', '-', 'Putus SD', '-', 'Tidak Berpenghasilan', '-', 'Tidak', NULL, '0', '2', 'verified', NULL, NULL, 'Administrator Humas');

-- Table structure for verification_schedules
DROP TABLE IF EXISTS `verification_schedules`;
CREATE TABLE "verification_schedules" ("id" integer primary key autoincrement not null, "start_queue" integer not null, "end_queue" integer not null, "date" date not null, "time" varchar not null, "created_at" datetime, "updated_at" datetime, "location" varchar);

-- Dumping data for verification_schedules
INSERT INTO `verification_schedules` (`id`, `start_queue`, `end_queue`, `date`, `time`, `created_at`, `updated_at`, `location`) VALUES ('1', '1', '10', '2026-07-01 00:00:00', '08:00', '2026-06-26 15:38:34', '2026-06-26 15:38:34', NULL);

COMMIT;
