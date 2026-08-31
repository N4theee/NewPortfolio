/* =========================================================
   Nathan Orias — Portfolio
   Vanilla JS: theme toggle, mobile nav, scroll spy, reveal
   animations, project modal, contact form.
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    var THEME_KEY = 'portfolio-theme';
    var root = document.documentElement;
    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* -----------------------------------------------------
       1. THEME TOGGLE (dark / light)
       - Persists the choice in localStorage.
       - Also drives the profile-dark.png / profile-light.png
         cross-fade purely through CSS ([data-theme] selectors
         in style.css) — no image swapping logic needed here.
       ----------------------------------------------------- */
    var themeToggle = document.getElementById('themeToggle');

    function applyTheme(theme) {
        root.setAttribute('data-theme', theme);
        localStorage.setItem(THEME_KEY, theme);
        if (themeToggle) {
            var isLight = theme === 'light';
            themeToggle.setAttribute('aria-pressed', String(isLight));
            themeToggle.setAttribute('aria-label', isLight ? 'Switch to dark mode' : 'Switch to light mode');
        }
    }

    // Theme was already set pre-paint by the inline script in index.php;
    // this just wires up the toggle button going forward.
    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var current = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            applyTheme(current);
        });
        applyTheme(root.getAttribute('data-theme') || 'dark');
    }

    /* -----------------------------------------------------
       2. MOBILE NAVIGATION
       ----------------------------------------------------- */
    var hamburger = document.getElementById('hamburger');
    var mobileNav = document.getElementById('mobileNav');

    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', function () {
            var isOpen = mobileNav.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', String(isOpen));
            hamburger.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
        });

        mobileNav.querySelectorAll('.mobile-nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileNav.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                hamburger.setAttribute('aria-label', 'Open menu');
            });
        });
    }

    /* -----------------------------------------------------
       3. SCROLL SPY — highlight active nav link
       ----------------------------------------------------- */
    var sections = Array.prototype.slice.call(document.querySelectorAll('main section[id]'));
    var navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

    function setActiveLink(id) {
        navLinks.forEach(function (link) {
            link.classList.toggle('active', link.dataset.section === id);
        });
    }

    if ('IntersectionObserver' in window && sections.length) {
        var spyObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    setActiveLink(entry.target.id);
                }
            });
        }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });

        sections.forEach(function (section) { spyObserver.observe(section); });
    }

    /* -----------------------------------------------------
       4. SCROLL REVEAL ANIMATIONS
       ----------------------------------------------------- */
    var revealEls = document.querySelectorAll('.reveal');

    if (reducedMotion) {
        revealEls.forEach(function (el) { el.classList.add('in-view'); });
    } else if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

        revealEls.forEach(function (el) { revealObserver.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('in-view'); });
    }

    /* -----------------------------------------------------
       5. BACK TO TOP
       ----------------------------------------------------- */
    var backToTop = document.getElementById('backToTop');
    if (backToTop) {
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' });
        });
    }

    /* -----------------------------------------------------
       6. PROJECT MODAL
       Project data is read straight from data-* rendered by
       PHP in index.php, so the modal automatically works for
       any project you add to $projects in includes/data.php.
       ----------------------------------------------------- */
    var modal = document.getElementById('projectModal');
    var modalClose = document.getElementById('modalClose');
    var modalImage = document.getElementById('modalImage');
    var modalTitle = document.getElementById('modalTitle');
    var modalDescription = document.getElementById('modalDescription');
    var modalTech = document.getElementById('modalTech');
    var modalFeatures = document.getElementById('modalFeatures');
    var modalDemo = document.getElementById('modalDemo');
    var modalGithub = document.getElementById('modalGithub');

    // Project details are embedded as a JSON script tag-free approach:
    // we simply re-read what's already rendered in each .project-card.
    var projectCards = document.querySelectorAll('.project-card');
    var lastFocusedEl = null;

    function openModal(card) {
        var image = card.querySelector('.project-image');
        var title = card.querySelector('.project-title');
        var desc = card.querySelector('.project-description');
        var techBadges = card.querySelectorAll('.tech-badge');
        var githubLink = card.querySelector('.project-actions a');

        modalImage.src = image ? image.src : '';
        modalImage.alt = image ? image.alt : '';
        modalTitle.textContent = title ? title.textContent : '';
        modalDescription.textContent = desc ? desc.textContent : '';

        modalTech.innerHTML = '';
        techBadges.forEach(function (badge) {
            var span = document.createElement('span');
            span.className = 'tech-badge';
            span.textContent = badge.textContent;
            modalTech.appendChild(span);
        });

        // Features aren't in the DOM card (kept compact), so pull them from
        // a matching PROJECT_FEATURES map built once from PHP-rendered data.
        var index = card.getAttribute('data-project-index');
        var features = (window.PROJECT_FEATURES && window.PROJECT_FEATURES[index]) || [];
        modalFeatures.innerHTML = '';
        features.forEach(function (feature) {
            var li = document.createElement('li');
            li.textContent = feature;
            modalFeatures.appendChild(li);
        });

        if (githubLink) {
            modalGithub.href = githubLink.href;
            modalGithub.style.display = '';
        } else {
            modalGithub.style.display = 'none';
        }
        modalDemo.href = (window.PROJECT_DEMOS && window.PROJECT_DEMOS[index]) || '#';

        lastFocusedEl = document.activeElement;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        modalClose.focus();
    }

    function closeModal() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        if (lastFocusedEl) lastFocusedEl.focus();
    }

    projectCards.forEach(function (card) {
        card.addEventListener('click', function () { openModal(card); });
        card.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openModal(card);
            }
        });
        var viewBtn = card.querySelector('.project-view-btn');
        if (viewBtn) {
            viewBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                openModal(card);
            });
        }
    });

    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('open')) {
            closeModal();
        }
    });

    /* -----------------------------------------------------
       7. CONTACT FORM (AJAX submit to contact-handler.php)
       ----------------------------------------------------- */
    var contactForm = document.getElementById('contactForm');
    var formStatus = document.getElementById('formStatus');
    var submitBtn = document.getElementById('contactSubmit');

    function showStatus(message, type) {
        formStatus.textContent = message;
        formStatus.className = 'form-status visible ' + type;
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Honeypot: if filled, silently pretend to succeed (likely a bot)
            var honeypot = contactForm.querySelector('#cf-website');
            if (honeypot && honeypot.value.trim() !== '') {
                contactForm.reset();
                showStatus('Thanks! Your message has been sent.', 'success');
                return;
            }

            var name = contactForm.querySelector('#cf-name').value.trim();
            var email = contactForm.querySelector('#cf-email').value.trim();
            var subject = contactForm.querySelector('#cf-subject').value.trim();
            var message = contactForm.querySelector('#cf-message').value.trim();
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!name || !email || !subject || !message) {
                showStatus('Please fill in all fields before sending.', 'error');
                return;
            }
            if (!emailPattern.test(email)) {
                showStatus('Please enter a valid email address.', 'error');
                return;
            }

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            fetch(contactForm.action, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams(new FormData(contactForm))
            })
                .then(function (res) { return res.json().catch(function () { return { success: false }; }); })
                .then(function (data) {
                    if (data.success) {
                        showStatus(data.message || 'Thanks! Your message has been sent.', 'success');
                        contactForm.reset();
                    } else {
                        showStatus(data.message || 'Something went wrong. Please try again or email me directly.', 'error');
                    }
                })
                .catch(function () {
                    showStatus('Could not reach the server. Please email me directly instead.', 'error');
                })
                .finally(function () {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Send Message <i class="bi bi-send-fill" aria-hidden="true"></i>';
                });
        });
    }

});
