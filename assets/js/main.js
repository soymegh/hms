/* HMS Denver — progressive enhancements. The site works fully without JS. */
(() => {
    'use strict';

    const root = document.documentElement;

    // Theme toggle (persisted per visitor).
    document.querySelector('[data-theme-toggle]')?.addEventListener('click', () => {
        const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const current = root.dataset.theme || (systemDark ? 'dark' : 'light');
        const next = current === 'dark' ? 'light' : 'dark';
        root.dataset.theme = next;
        try { localStorage.setItem('theme', next); } catch (e) { /* storage unavailable */ }
    });

    // Mobile navigation.
    const toggle = document.querySelector('[data-nav-toggle]');
    const nav = document.querySelector('[data-nav]');
    const desktop = window.matchMedia('(min-width: 1080px)');

    const header = document.querySelector('[data-header]');
    const placeNav = () => {
        if (header) root.style.setProperty('--nav-top', Math.max(0, header.getBoundingClientRect().bottom) + 'px');
    };
    const setNav = (open) => {
        toggle?.setAttribute('aria-expanded', String(open));
        nav?.classList.toggle('is-open', open);
        document.body.classList.toggle('nav-open', open);
        // Measure after the scroll lock has applied so the panel sits flush under the header.
        if (open) { placeNav(); requestAnimationFrame(placeNav); }
    };
    window.addEventListener('resize', () => { if (nav?.classList.contains('is-open')) placeNav(); });

    toggle?.addEventListener('click', () => setNav(toggle.getAttribute('aria-expanded') !== 'true'));
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') setNav(false); });
    desktop.addEventListener('change', () => setNav(false));

    // On mobile, the first tap on a menu parent expands its submenu.
    document.querySelectorAll('.has-menu > .nav__link').forEach((link) => {
        link.addEventListener('click', (e) => {
            if (desktop.matches) return;
            const item = link.parentElement;
            if (!item.classList.contains('is-open')) {
                e.preventDefault();
                item.classList.add('is-open');
            }
        });
    });

    // Reveal-on-scroll for cards and section heads.
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const targets = document.querySelectorAll('.card, .timeline li, .section__head, .feature-list li, .stat-tile');
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -40px 0px' });
        targets.forEach((el) => { el.classList.add('reveal'); io.observe(el); });
    }

    // Conversion events for GA4 / GTM.
    const track = (name, params = {}) => {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: name, ...params });
    };
    document.addEventListener('click', (e) => {
        const a = e.target.closest('a[href^="tel:"], a[href^="mailto:"]');
        if (a) track(a.href.startsWith('tel:') ? 'phone_click' : 'email_click', { link_url: a.href });
    });
    document.querySelector('form[action="/contact/"]')?.addEventListener('submit', () => track('generate_lead'));
})();
