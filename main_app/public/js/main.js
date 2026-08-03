document.addEventListener('DOMContentLoaded', () => {

    /* ==========================================================================
       STICKY HEADER SCROLL EFFECT
       ========================================================================== */
    const header = document.querySelector('.main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    /* ==========================================================================
       MOBILE MENU TOGGLING & RESPONSIVE NAV
       ========================================================================== */
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            
            // Toggle hamburger animation
            const spans = menuToggle.querySelectorAll('span');
            spans[0].style.transform = navMenu.classList.contains('active') ? 'rotate(45deg) translate(6px, 6px)' : 'none';
            spans[1].style.opacity = navMenu.classList.contains('active') ? '0' : '1';
            spans[2].style.transform = navMenu.classList.contains('active') ? 'rotate(-45deg) translate(6px, -6px)' : 'none';
        });

        // Mobile dropdown click toggle
        const dropdownItems = document.querySelectorAll('.nav-item');
        dropdownItems.forEach(item => {
            const link = item.querySelector('.nav-link');
            const dropdown = item.querySelector('.dropdown-menu');
            
            if (dropdown && link) {
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        item.classList.toggle('open');
                    }
                });
            }
        });
    }

    /* ==========================================================================
       HERO CAROUSEL / SLIDER AUTO-PLAY & MANUAL CONTROLS
       ========================================================================== */
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.slider-arrow-prev');
    const nextBtn = document.querySelector('.slider-arrow-next');
    const dotsContainer = document.querySelector('.slider-dots');
    
    if (slides.length > 0) {
        let currentSlide = 0;
        let slideInterval;

        // Generate slide dots
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                goToSlide(index);
                resetInterval();
            });
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.slider-dot');

        function goToSlide(n) {
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetInterval(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetInterval(); });

        function startInterval() {
            slideInterval = setInterval(nextSlide, 6000);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
        }

        startInterval();

        // Add has-transition class after a tiny tick to prevent initial paint fade-in delay
        const sliderContainer = document.querySelector('.hero-slider');
        if (sliderContainer) {
            setTimeout(() => {
                sliderContainer.classList.add('has-transition');
            }, 50);
        }
    }

    /* ==========================================================================
       BLOG / BERITA CATEGORY GRID FILTER (VANILLA JS - NO PAGE RELOAD)
       ========================================================================== */
    const filterTabs = document.querySelectorAll('.filter-tab');
    const blogCards = document.querySelectorAll('.blog-card');
    
    if (filterTabs.length > 0 && blogCards.length > 0) {
        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));
                // Add active to current tab
                tab.classList.add('active');
                
                const category = tab.getAttribute('data-filter');
                
                blogCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (category === 'all' || cardCategory === category || (category === 'utama' && cardCategory === 'utama')) {
                        card.style.display = 'flex';
                        card.style.animation = 'fadeIn 0.5s ease forwards';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    /* ==========================================================================
       STATISTICS SCROLL COUNTER ANIMATION
       ========================================================================== */
    const statsNumbers = document.querySelectorAll('.stat-number');
    let animated = false;

    function animateCounters() {
        statsNumbers.forEach(stat => {
            const targetAttr = stat.getAttribute('data-target');
            if (!targetAttr) return;
            const target = parseInt(targetAttr);
            let current = 0;
            const increment = Math.ceil(target / 50);
            const interval = setInterval(() => {
                current += increment;
                if (current >= target) {
                    stat.textContent = target + (stat.textContent.includes('+') ? '+' : '');
                    clearInterval(interval);
                } else {
                    stat.textContent = current + (stat.textContent.includes('+') ? '+' : '');
                }
            }, 30);
        });
    }

    // Scroll trigger for stats
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        window.addEventListener('scroll', () => {
            const sectionPos = statsSection.getBoundingClientRect().top;
            const screenPos = window.innerHeight / 1.2;
            
            if (sectionPos < screenPos && !animated) {
                animateCounters();
                animated = true;
            }
        });
    }

    /* ==========================================================================
       GALLERY LIGHTBOX MODAL (PHOTO VIEWER)
       ========================================================================== */
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.createElement('div');
    lightbox.classList.add('lightbox');
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <button class="lightbox-close">&times;</button>
            <img class="lightbox-img" src="" alt="">
            <p class="lightbox-caption"></p>
        </div>
    `;
    document.body.appendChild(lightbox);

    const lightboxImg = lightbox.querySelector('.lightbox-img');
    const lightboxCaption = lightbox.querySelector('.lightbox-caption');
    const lightboxClose = lightbox.querySelector('.lightbox-close');

    if (galleryItems.length > 0) {
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const img = item.querySelector('img');
                const caption = item.querySelector('h4').textContent;
                
                lightboxImg.src = img.src;
                lightboxCaption.textContent = caption;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden'; // Lock scrolling
            });
        });

        lightboxClose.addEventListener('click', () => {
            lightbox.classList.remove('active');
            document.body.style.overflow = ''; // Unlock scrolling
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    /* ==========================================================================
       ARTICLE READ MORE MODAL (LIGHTBOX READER)
       ========================================================================== */
    const articleModal = document.getElementById('article-modal');
    const articleTriggers = document.querySelectorAll('.blog-modal-trigger');
    
    if (articleModal && articleTriggers.length > 0) {
        const modalTitle = articleModal.querySelector('.modal-article-title');
        const modalAuthor = articleModal.querySelector('.modal-article-author');
        const modalDate = articleModal.querySelector('.modal-article-date');
        const modalCategory = articleModal.querySelector('.modal-article-category');
        const modalImg = articleModal.querySelector('.modal-article-img');
        const modalBody = articleModal.querySelector('.modal-article-body');
        const modalClose = articleModal.querySelector('.lightbox-close');

        articleTriggers.forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                // Find parent card
                const card = trigger.closest('.blog-card');
                if (card) {
                    const hiddenData = card.querySelector('.hidden-full-article');
                    if (hiddenData) {
                        modalTitle.textContent = hiddenData.querySelector('.full-title').textContent;
                        modalAuthor.textContent = hiddenData.querySelector('.full-author').textContent;
                        modalDate.textContent = hiddenData.querySelector('.full-date').textContent;
                        modalCategory.textContent = hiddenData.querySelector('.full-category').textContent.toUpperCase();
                        modalImg.src = hiddenData.querySelector('.full-image').textContent;
                        modalBody.innerHTML = hiddenData.querySelector('.full-body').innerHTML;
                        
                        // Dynamically render KaTeX mathematical equations inside the modal
                        if (window.katex) {
                            modalBody.querySelectorAll('.ql-formula').forEach(function(el) {
                                var formula = el.getAttribute('data-value');
                                if (formula) {
                                    window.katex.render(formula, el, {
                                        throwOnError: false,
                                        displayMode: false
                                    });
                                }
                            });
                        }
                        
                        articleModal.classList.add('active');
                        document.body.style.overflow = 'hidden'; // Lock scrolling
                    }
                }
            });
        });

        modalClose.addEventListener('click', () => {
            articleModal.classList.remove('active');
            document.body.style.overflow = ''; // Unlock scrolling
        });

        articleModal.addEventListener('click', (e) => {
            if (e.target === articleModal) {
                articleModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    /* ==========================================================================
       PROFILE PAGE VIEW TAB SWITCHER
       ========================================================================== */
    const profileTabs = document.querySelectorAll('.profile-tab-btn');
    const profileContents = document.querySelectorAll('.profile-tab-content');

    if (profileTabs.length > 0 && profileContents.length > 0) {
        profileTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Deactivate all tabs
                profileTabs.forEach(t => t.classList.remove('active'));
                profileContents.forEach(c => c.classList.remove('active'));
                
                // Activate current tab
                tab.classList.add('active');
                
                const tabId = tab.getAttribute('data-tab');
                const targetContent = document.getElementById(tabId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
                
                // Breadcrumbs update
                const breadcrumbSpan = document.querySelector('.profile-breadcrumbs span');
                if (breadcrumbSpan) {
                    breadcrumbSpan.textContent = tab.textContent.trim();
                }
            });
        });
    }

    /* Render KaTeX formulas globally on page load */
    if (window.katex) {
        document.querySelectorAll('.ql-formula').forEach(function(el) {
            var formula = el.getAttribute('data-value');
            if (formula) {
                window.katex.render(formula, el, {
                    throwOnError: false,
                    displayMode: false
                });
            }
        });
    }
});
