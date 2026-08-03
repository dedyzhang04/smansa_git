@extends('layouts.app')

@section('title', 'Kumpulan Berita & Pengumuman – SMAN 1 Tanjungpinang')

@section('content')

    <!-- Hero Header -->
    <section class="profile-hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
        <div class="container">
            <h1>Kumpulan Berita & Artikel</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Semua Berita</span>
            </div>
        </div>
    </section>

    <!-- News List Content Section -->
    <section class="container" style="padding: 5rem 2rem;">
        
        <!-- Category Filter Tabs -->
        <div class="filter-tabs" style="margin-bottom: 4rem;">
            <button class="filter-tab active" data-filter="all">Semua Kategori</button>
            <button class="filter-tab" data-filter="utama">Utama</button>
            <button class="filter-tab" data-filter="umum">Umum</button>
            <button class="filter-tab" data-filter="pendidikan">Pendidikan</button>
            <button class="filter-tab" data-filter="iptek">IPTEK</button>
        </div>

        <!-- News Grid List -->
        <div class="blog-grid">
            @forelse($articles as $article)
                <article class="blog-card" data-category="{{ $article->category }}">
                    <div class="blog-img-box">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}">
                        <span class="blog-tag">{{ $article->category }}</span>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-solid fa-user"></i> {{ $article->author }}</span>
                            <span><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3 class="blog-title"><a href="#" class="blog-modal-trigger">{{ $article->title }}</a></h3>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                        <button class="blog-readmore blog-modal-trigger" style="background: none; border: none; padding: 0; cursor: pointer; text-align: left;">Selengkapnya <i class="fa-solid fa-arrow-right-long"></i></button>
                        
                        <!-- Hidden Full Content for Modal -->
                        <div class="hidden-full-article" style="display: none;">
                            <div class="full-title">{{ $article->title }}</div>
                            <div class="full-author">{{ $article->author }}</div>
                            <div class="full-date">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M Y') }}</div>
                            <div class="full-category">{{ $article->category }}</div>
                            <div class="full-image">{{ $article->image }}</div>
                            <div class="full-body">{!! $article->content !!}</div>
                        </div>
                    </div>
                </article>
            @empty
                <div style="grid-column: span 3; text-align: center; padding: 5rem; color: var(--text-muted);">
                    <i class="fa-solid fa-newspaper" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                    <p style="font-size: 1.1rem;">Belum ada berita atau artikel yang diterbitkan.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="pagination-wrapper" style="margin-top: 4rem; display: flex; justify-content: center;">
            {{ $articles->links() }}
        </div>
        
    </section>

@endsection
