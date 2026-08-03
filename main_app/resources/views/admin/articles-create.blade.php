<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Berita Baru – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- KaTeX CDN (Required for Quill formula module) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.css">
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.js"></script>

    <!-- Quill Editor CDN -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <!-- MathLive CDN for Visual Math Editor (MathType-Style) -->
    <script src="https://unpkg.com/mathlive"></script>

    <style>
        :root {
            --keyboard-zindex: 20000;
            --suggestion-zindex: 20000;
        }
        .ql-editor {
            min-height: 380px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            line-height: 1.7;
            background-color: var(--bg-white);
            color: var(--text-dark);
        }
        .ql-toolbar.ql-snow {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-color: rgba(11, 99, 197, 0.15);
            background-color: rgba(11, 99, 197, 0.02);
            padding: 0.75rem;
        }
        .ql-container.ql-snow {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            border-color: rgba(11, 99, 197, 0.15);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.01);
        }
    </style>
</head>
<body>

    <div class="admin-layout">
        
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <h2>SMANSA</h2>
                <span>Portal SMANSA Admin</span>
            </div>
            
                                    <nav class="admin-nav">
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ route('admin.profile') }}" class="admin-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fa-solid fa-graduation-cap"></i> Profil Sekolah
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin' || Session::get('admin_role') === 'writer')
                <a href="{{ route('admin.articles') }}" class="admin-nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i> Kelola Berita
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.galleries') }}" class="admin-nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images"></i> Kelola Galeri
                </a>
                <a href="{{ route('admin.messages') }}" class="admin-nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i> Pesan Masuk
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin' || Session::get('admin_role') === 'ppdb')
                <a href="{{ route('admin.ppdb') }}" class="admin-nav-link {{ request()->routeIs('admin.ppdb*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-viewfinder"></i> Kelola PPDB
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.users') }}" class="admin-nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear"></i> Kelola User
                </a>
                <a href="{{ route('admin.settings') }}" class="admin-nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gears"></i> Pengaturan
                </a>
                @endif
                
                <div style="border-top: 1px solid rgba(255,255,255,0.05); margin: 2rem 0; padding-top: 2rem;"></div>
                
                <a href="{{ route('home') }}" class="admin-nav-link" target="_blank">
                    <i class="fa-solid fa-globe"></i> Lihat Website
                </a>
                <a href="{{ route('admin.logout') }}" class="admin-nav-link logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
                </a>
            </nav>
        </aside>

        <!-- Main Workspace -->
        <main class="admin-main">
            <!-- Header Bar -->
            <div class="admin-header-bar">
                <div>
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Buat Artikel / Berita Baru</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Terbitkan liputan kegiatan, pengumuman, atau artikel pembelajaran.</p>
                </div>
                
                <div>
                    <a href="{{ route('admin.articles') }}" class="btn-primary" style="background-color: var(--text-muted); border-color: var(--text-muted);"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="admin-content">
                
                <div class="admin-card" style="max-width: 800px; margin: 0 auto;">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="title">Judul Berita *</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul berita menarik..." value="{{ old('title') }}" required>
                            @error('title')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="admin-grid-2">
                            <div class="form-group">
                                <label for="category">Kategori Berita *</label>
                                <select id="category" name="category" class="form-control" required style="-webkit-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill=%22%23044a27%22 height=%2224%22 viewBox=%220 0 24 24%22 width=%2224%22 xmlns=%22http://www.w3.org/2000/svg%22><path d=%22M7 10l5 5 5-5z%22/><path d=%22M0 0h24v24H0z%22 fill=%22none%22/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;">
                                    <option value="utama" {{ old('category') === 'utama' ? 'selected' : '' }}>Utama / Berita Utama</option>
                                    <option value="umum" {{ old('category') === 'umum' ? 'selected' : '' }}>Umum / Berita Umum</option>
                                    <option value="pendidikan" {{ old('category') === 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                    <option value="iptek" {{ old('category') === 'iptek' ? 'selected' : '' }}>IPTEK (Sains/Teknologi)</option>
                                </select>
                                @error('category')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="author">Penulis (Author) *</label>
                                <input type="text" id="author" name="author" class="form-control" placeholder="Nama penulis/humas" value="{{ old('author', 'Admin Humas') }}" required>
                                @error('author')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image inputs -->
                        <div class="form-group" style="border: 1px dashed rgba(4, 74, 39, 0.2); padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; background-color: rgba(4, 74, 39, 0.01);">
                            <h4 style="font-size: 0.95rem; color: var(--primary-color); margin-bottom: 1rem;"><i class="fa-solid fa-image"></i> Gambar Sampul Berita</h4>
                            
                            <div class="form-group">
                                <label for="image_file">Pilihan 1: Unggah File Gambar (Disarankan)</label>
                                <input type="file" id="image_file" name="image_file" class="form-control" accept="image/*" style="padding: 0.5rem 1rem; border-color: rgba(100, 116, 139, 0.15); background-color: transparent;">
                                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Format didukung: PNG, JPG, JPEG, WEBP. Maks 2MB.</p>
                                @error('image_file')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div style="text-align: center; margin: 1rem 0; font-weight: bold; color: var(--text-muted); font-size: 0.85rem;">— ATAU —</div>

                            <div class="form-group" style="margin-bottom: 0;">
                                <label for="image_url">Pilihan 2: Gunakan URL Gambar Kustom</label>
                                <input type="url" id="image_url" name="image_url" class="form-control" placeholder="https://example.com/gambar-berita.jpg" value="{{ old('image_url') }}">
                                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Jika tidak diisi dan tidak mengunggah file, gambar placeholder profesional acak akan dibuat otomatis.</p>
                                @error('image_url')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 2rem;">
                            <label for="content" style="display: block; margin-bottom: 0.5rem; font-weight: 700; color: var(--primary-dark);">Isi Lengkap Berita *</label>
                            
                            <!-- Hidden textarea to store the HTML content sent to server -->
                            <textarea id="content" name="content" style="display: none;">{{ old('content') }}</textarea>
                            
                            <!-- Quill editor container -->
                            <div id="editor">{!! old('content') !!}</div>
                            
                            @error('content')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slider Activation Toggle -->
                        <div class="form-group" style="display: flex; align-items: center; gap: 1rem; margin-top: 1rem; margin-bottom: 2.5rem; background: rgba(11, 99, 197, 0.03); padding: 1.25rem; border-radius: 10px; border: 1px solid rgba(11, 99, 197, 0.08);">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer; accent-color: var(--primary-color);">
                            <div>
                                <label for="is_featured" style="margin-bottom: 0.15rem; cursor: pointer; font-weight: 700; color: var(--primary-dark); font-size: 0.95rem; display: block;">Tampilkan di Slider Utama Beranda</label>
                                <span style="font-size: 0.75rem; color: var(--text-muted); display: block; font-weight: 500;">Centang untuk menampilkan berita ini di carousel beranda situs secara otomatis.</span>
                            </div>
                        </div>

                        <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; font-size: 1rem; padding: 0.85rem;">
                            Terbitkan Artikel Sekarang <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

            </div>
        </main>

    <!-- Visual Math Editor Modal (MathType-Style) -->
    <div id="math-modal" class="lightbox" style="z-index: 10000; display: none; align-items: center; justify-content: center; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);">
        <div class="lightbox-content" style="max-width: 600px; padding: 2.5rem; border-radius: 16px; border: 1px solid rgba(11, 99, 197, 0.15); background-color: var(--bg-white); position: relative; margin: auto; box-shadow: 0 15px 40px rgba(0,0,0,0.2);">
            <button type="button" onclick="closeMathModal()" style="font-size: 2rem; position: absolute; top: 1rem; right: 1.5rem; background: none; border: none; cursor: pointer; color: var(--text-muted); font-weight: 700;">&times;</button>
            <h3 style="color: var(--primary-color); margin-top: 0; margin-bottom: 0.75rem; font-family: var(--font-heading); font-weight: 700; display: flex; align-items: center; gap: 0.5rem; font-size: 1.25rem;">
                <i class="fa-solid fa-calculator text-gold"></i> Editor Rumus Visual (MathType-Style)
            </h3>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem; line-height: 1.5;">
                Susun rumus matematika Anda secara visual di bawah. Klik kolom input, lalu **klik ikon keyboard kecil di bagian kanan kolom** untuk memilih template pecahan, pangkat, akar, dll., lalu cukup ketikkan angkanya.
            </p>
            
            <div style="margin-bottom: 2rem;">
                <math-field id="mathfield" style="width: 100%; font-size: 1.6rem; padding: 0.75rem 1rem; border-radius: 8px; border: 2px solid rgba(11, 99, 197, 0.15); background: #fff; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02); min-height: 70px; display: block;"></math-field>
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                <button type="button" class="btn-primary" onclick="closeMathModal()" style="background-color: var(--text-muted); border-color: var(--text-muted); padding: 0.65rem 1.25rem; font-size: 0.9rem; border-radius: 6px;">Batal</button>
                <button type="button" class="btn-accent" onclick="insertFormula()" style="padding: 0.65rem 1.5rem; font-size: 0.9rem; border-radius: 6px; display: inline-flex; align-items: center; gap: 0.5rem;"><i class="fa-solid fa-square-plus"></i> Sisipkan Rumus</button>
            </div>
        </div>
    </div>

    <script>
        // Initialize Quill
        var quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video', 'formula'],
                    ['clean']
                ]
            },
            theme: 'snow',
            placeholder: 'Tuliskan isi berita sekolah dengan detail di sini...'
        });

        // Intercept formula toolbar handler with visual MathLive editor
        var toolbar = quill.getModule('toolbar');
        toolbar.addHandler('formula', function() {
            openMathModal();
        });

        // Visual Math Modal methods
        function openMathModal() {
            const modal = document.getElementById('math-modal');
            modal.style.display = 'flex';
            modal.classList.add('active');
            
            const mf = document.getElementById('mathfield');
            mf.value = '';
            
            // Auto focus and expand keyboard
            setTimeout(() => {
                mf.focus();
            }, 200);
        }

        function closeMathModal() {
            const modal = document.getElementById('math-modal');
            modal.style.display = 'none';
            modal.classList.remove('active');
        }

        function insertFormula() {
            const mf = document.getElementById('mathfield');
            const latex = mf.value;
            
            if (latex && latex.trim() !== '') {
                // Get the current cursor selection
                const range = quill.getSelection();
                if (range) {
                    quill.insertEmbed(range.index, 'formula', latex, Quill.sources.USER);
                    quill.setSelection(range.index + 1, Quill.sources.SILENT);
                } else {
                    quill.insertEmbed(quill.getLength() - 1, 'formula', latex, Quill.sources.USER);
                }
            }
            closeMathModal();
        }

        // Sync Quill HTML content to the hidden textarea before submitting
        var form = document.querySelector('form');
        form.onsubmit = function() {
            var contentInput = document.querySelector('#content');
            // Store HTML content in the textarea
            contentInput.value = quill.root.innerHTML;
        };
    </script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
