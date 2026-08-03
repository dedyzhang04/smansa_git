<!-- Footer Section -->
<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: About Us -->
            <div class="footer-column footer-about">
                <h3>Tentang SMANSA</h3>
                <p>
                    SMA Negeri 1 Tanjungpinang merupakan salah satu sekolah menengah atas tertua dan terkemuka di Kepulauan Riau yang didirikan sejak tahun 1956. Berkomitmen melahirkan generasi unggul yang berkarakter Pancasila, berprestasi tinggi secara akademik dan non-akademik, serta inovatif.
                </p>
                <div class="footer-socials">
                    <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://youtube.com" target="_blank" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Column 2: Quick Links & Contact -->
            <div class="footer-column">
                <h3>Hubungi Kami</h3>
                <ul class="footer-links" style="margin-bottom: 1.5rem;">
                    <li><a href="https://maps.app.goo.gl/iMBVRtmfdW1nLEzS8" target="_blank"><i class="fa-solid fa-location-dot text-gold"></i> Jl. Dr. Sutomo, Tanjungpinang, Kepulauan Riau, 29100</a></li>
                    <li><a href="tel:+6277121616"><i class="fa-solid fa-phone text-gold"></i> +62-0771-21216</a></li>
                    <li><a href="mailto:info@smansa-tpi.sch.id"><i class="fa-solid fa-envelope text-gold"></i> info@smansa-tpi.sch.id</a></li>
                </ul>
                <h3>Tautan Cepat</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('profile', ['tab' => 'visimisi']) }}"><i class="fa-solid fa-chevron-right text-gold" style="font-size: 0.7rem;"></i> Visi & Misi</a></li>
                    <li><a href="{{ route('academics') }}"><i class="fa-solid fa-chevron-right text-gold" style="font-size: 0.7rem;"></i> Kurikulum Akademik</a></li>
                    <li><a href="{{ route('facilities') }}"><i class="fa-solid fa-chevron-right text-gold" style="font-size: 0.7rem;"></i> Sarana Prasarana</a></li>
                </ul>
            </div>

            <!-- Column 3: Peta Lokasi (Google Maps Embed) -->
            <div class="footer-column">
                <h3>Peta Lokasi SMANSA</h3>
                <div class="footer-map-container">
                    <!-- Google Maps Embed pointed to Jl. Dr. Sutomo, Tanjungpinang -->
                    <iframe 
                        title="Peta Lokasi SMA Negeri 1 Tanjungpinang"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0519391090336!2d104.4451453!3d0.9195593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9725de20344a9%3A0x931c7418aa71af8c!2sSMA%20Negeri%201%20Tanjungpinang!5e0!3m2!1sid!2sid!4v1780000000000!5m2!1sid!2sid" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SMA Negeri 1 Tanjungpinang. Semua Hak Dilindungi. Dikembangkan kembali dengan Laravel.</p>
            <div class="footer-bottom-links">
                <a href="{{ route('admin.login') }}">Admin Login</a>
                <span style="opacity: 0.3;">|</span>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
