// ── Navbar: add .scrolled class on scroll ──
const navbar = document.getElementById('navbar');
if (navbar) {
    window.addEventListener('scroll', function () {
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

// ── Mobile nav toggle ──
const navToggle = document.getElementById('navToggle');
const navLinks  = document.getElementById('navLinks');
if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
        navLinks.classList.toggle('open');
        navToggle.setAttribute('aria-expanded', navLinks.classList.contains('open'));
    });
    // Close menu when a link is clicked
    navLinks.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navLinks.classList.remove('open');
        });
    });
}

// ── Animate skill bars on scroll ──
(function () {
    var fills = document.querySelectorAll('.skill-fill');
    if (!fills.length) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                el.style.width = el.dataset.width;
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.3 });

    fills.forEach(function (fill) {
        // Prefer inline style set by PHP; fall back to computed style
        var targetWidth = fill.style.width || getComputedStyle(fill).width;
        fill.dataset.width = targetWidth;
        fill.style.width = '0';
        observer.observe(fill);
    });
}());

// ── Active nav link highlight ──
(function () {
    var sections = document.querySelectorAll('section[id]');
    var links    = document.querySelectorAll('.nav-links a');
    if (!sections.length || !links.length) return;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                links.forEach(function (link) { link.classList.remove('active'); });
                var active = document.querySelector('.nav-links a[href="#' + entry.target.id + '"]');
                if (active) active.classList.add('active');
            }
        });
    }, { rootMargin: '-40% 0px -55% 0px' });

    sections.forEach(function (s) { observer.observe(s); });
}());
