<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'SMA Negeri 1 Tanjungpinang – Situs Resmi SMAN 1 Tanjungpinang')</title>
    <meta name="description" content="@yield('meta_description', 'Situs Resmi SMA Negeri 1 Tanjungpinang. Informasi profil, akademik, kegiatan, fasilitas, penerimaan siswa baru (PPDB), dan berita terbaru.')">
    
    <!-- Favicon (Official SMAN 1 Tanjungpinang School Logo) -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- CSS Assets (Pure CSS loaded from public directory, bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- KaTeX CDN for Academic Mathematical Equations Rendering -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.css">
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.js"></script>
    
    <!-- Dynamic Asset Preloading for High Performance -->
    @yield('preload')
</head>
<body>

    <!-- Header Section -->
    @include('partials.header')

    <!-- Main Content Wrapper -->
    <main id="site-content-contain">
        @yield('content')
    </main>

    <!-- Footer Section -->
    @include('partials.footer')

    <!-- Article Reader Modal -->
    <div id="article-modal" class="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close">&times;</button>
            <div class="modal-article-scroll">
                <div class="modal-article-header">
                    <span class="badge badge-info modal-article-category">KATEGORI</span>
                    <h2 class="modal-article-title">Judul Artikel</h2>
                    <div class="blog-meta">
                        <span><i class="fa-solid fa-user text-gold"></i> <span class="modal-article-author">Penulis</span></span>
                        <span><i class="fa-solid fa-calendar-days text-gold"></i> <span class="modal-article-date">Tanggal</span></span>
                    </div>
                </div>
                <div class="modal-article-image-box">
                    <img class="modal-article-img" src="" alt="">
                </div>
                <div class="modal-article-body">
                    Isi artikel...
                </div>
            </div>
        </div>
    </div>

    <!-- Vanilla Javascript Assets -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
