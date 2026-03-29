document.addEventListener('DOMContentLoaded', function () {

    // ===========================
    // NAVBAR SCROLL EFFECT
    // ===========================
    const navbar = document.querySelector('.navbar');

    if (navbar) {
        function handleNavbarScroll() {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        }
        window.addEventListener('scroll', handleNavbarScroll, { passive: true });
        handleNavbarScroll();
    }

    // ===========================
    // SMOOTH SCROLL FOR ANCHORS
    // ===========================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var href = this.getAttribute('href');
            if (!href || href.length <= 1) return;
            var target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ===========================
    // SCROLL REVEAL (Intersection Observer)
    // Replaces animate.css dependency
    // ===========================
    var revealEls = document.querySelectorAll('[data-reveal]');

    if (revealEls.length > 0) {
        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealEls.forEach(function (el) {
                // Apply custom delay if specified via data attribute
                var delay = el.getAttribute('data-reveal-delay');
                if (delay) {
                    el.style.transitionDelay = delay + 'ms';
                }
                revealObserver.observe(el);
            });
        } else {
            // Fallback: show all immediately if browser lacks IntersectionObserver
            revealEls.forEach(function (el) {
                el.classList.add('revealed');
            });
        }
    }

    // ===========================
    // GALLERY ITEM CLICK LIGHTBOX (simple zoom feedback)
    // ===========================
    document.querySelectorAll('.gallery-item').forEach(function (item) {
        item.style.cursor = 'pointer';
    });

    // ===========================
    // MOBILE FULLSCREEN NAV DRAWER
    // ===========================
    var toggler = document.getElementById('mobileNavToggler');
    var drawer  = document.getElementById('mobileNavDrawer');
    var overlay = document.getElementById('mobileNavOverlay');
    var closeBtn = document.getElementById('mobileNavClose');

    function openDrawer() {
        drawer.classList.add('open');
        overlay.classList.add('open');
        document.body.classList.add('mobile-nav-open');
    }

    function closeDrawer() {
        drawer.classList.remove('open');
        overlay.classList.remove('open');
        document.body.classList.remove('mobile-nav-open');
    }

    if (toggler)  toggler.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);

    if (drawer) {
        drawer.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeDrawer);
        });
    }

});
