document.addEventListener('DOMContentLoaded', () => {
    /* ==========================================================================
       DYNAMIC MOBILE SIDEBAR TOGGLE & OVERLAY INJECTION
       ========================================================================== */
    const headerBar = document.querySelector('.admin-header-bar');
    const sidebar = document.querySelector('.admin-sidebar');
    
    if (headerBar && sidebar) {
        // 1. Create and inject the overlay backdrop dynamically if not exists
        let overlay = document.querySelector('.admin-sidebar-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'admin-sidebar-overlay';
            document.body.appendChild(overlay);
        }

        // 2. Create the toggle button
        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.className = 'admin-sidebar-toggle';
        toggleBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
        
        // Prepend toggle button to header bar
        headerBar.insertBefore(toggleBtn, headerBar.firstChild);
        
        // Helper function to toggle sidebar status
        const toggleSidebar = (forceState = null) => {
            const isActive = forceState !== null ? forceState : !sidebar.classList.contains('active');
            if (isActive) {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent main page scrolling when sidebar is open on mobile
            } else {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        };

        // 3. Add click handler to toggle button
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleSidebar();
        });
        
        // 4. Close when clicking overlay
        overlay.addEventListener('click', () => {
            toggleSidebar(false);
        });

        // 5. Close when clicking sidebar nav links
        const navLinks = sidebar.querySelectorAll('.admin-nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                toggleSidebar(false);
            });
        });
    }
});
