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
    // GALLERY LIGHTBOX
    // ===========================
    var lightbox     = document.getElementById('galleryLightbox');
    var lbImg        = document.getElementById('lightboxImg');
    var lbSpinner    = document.getElementById('lightboxSpinner');
    var lbCounter    = document.getElementById('lightboxCounter');
    var lbClose      = document.getElementById('lightboxClose');
    var lbPrev       = document.getElementById('lightboxPrev');
    var lbNext       = document.getElementById('lightboxNext');
    var lbBackdrop   = lightbox && lightbox.querySelector('.lightbox-backdrop');

    var galleryItems = Array.from(document.querySelectorAll('#galleryGrid .gallery-item'));
    var currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        lightbox.hidden = false;
        document.body.style.overflow = 'hidden';
        showImage(currentIndex);
        lbClose && lbClose.focus();
    }

    function closeLightbox() {
        lightbox.hidden = true;
        document.body.style.overflow = '';
        // return focus to the triggering item
        if (galleryItems[currentIndex]) galleryItems[currentIndex].focus();
    }

    function showImage(index) {
        var src = galleryItems[index].getAttribute('data-src');
        var total = galleryItems.length;
        lbCounter.textContent = (index + 1) + ' / ' + total;

        // Show spinner, hide image while loading
        lbImg.classList.add('loading');
        lbSpinner.classList.remove('hidden');

        var tmpImg = new Image();
        tmpImg.onload = function () {
            lbImg.src = src;
            lbImg.classList.remove('loading');
            lbSpinner.classList.add('hidden');
        };
        tmpImg.onerror = function () {
            lbImg.src = src;
            lbImg.classList.remove('loading');
            lbSpinner.classList.add('hidden');
        };
        tmpImg.src = src;

        // Show/hide nav arrows
        lbPrev.style.display = total > 1 ? '' : 'none';
        lbNext.style.display = total > 1 ? '' : 'none';
    }

    function goPrev() {
        currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        showImage(currentIndex);
    }

    function goNext() {
        currentIndex = (currentIndex + 1) % galleryItems.length;
        showImage(currentIndex);
    }

    // Open on click / Enter / Space
    galleryItems.forEach(function (item, i) {
        item.addEventListener('click', function () { openLightbox(i); });
        item.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLightbox(i); }
        });
    });

    if (lbClose)   lbClose.addEventListener('click', closeLightbox);
    if (lbPrev)    lbPrev.addEventListener('click', goPrev);
    if (lbNext)    lbNext.addEventListener('click', goNext);
    if (lbBackdrop) lbBackdrop.addEventListener('click', closeLightbox);

    // Keyboard navigation
    document.addEventListener('keydown', function (e) {
        if (!lightbox || lightbox.hidden) return;
        if (e.key === 'Escape')      closeLightbox();
        if (e.key === 'ArrowLeft')   goPrev();
        if (e.key === 'ArrowRight')  goNext();
    });

    // Touch swipe support
    var touchStartX = 0;
    if (lightbox) {
        lightbox.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        lightbox.addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 40) {
                if (diff > 0) goNext(); else goPrev();
            }
        }, { passive: true });
    }

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
