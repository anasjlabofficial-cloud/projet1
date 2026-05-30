/**
 * Quran School Management Platform — UI interactions
 */
(function () {
    'use strict';

    const THEME_KEY = 'qsm-theme';
    const prefersLight = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;

    function initTheme() {
        const saved = localStorage.getItem(THEME_KEY);
        const initial = saved || (prefersLight ? 'light' : 'light');
        setTheme(initial);

        document.querySelectorAll('[data-theme-toggle]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const current = document.documentElement.dataset.theme || 'light';
                setTheme(current === 'dark' ? 'light' : 'dark');
            });
        });
    }

    function setTheme(theme) {
        document.documentElement.dataset.theme = theme;
        localStorage.setItem(THEME_KEY, theme);
        document.querySelectorAll('[data-theme-toggle]').forEach(function (btn) {
            btn.innerHTML = theme === 'dark'
                ? '<i class="bi bi-sun-fill"></i>'
                : '<i class="bi bi-moon-stars"></i>';
        });
    }

    function initSidebar() {
        const shell = document.querySelector('.dashboard-shell');
        const toggle = document.querySelector('[data-sidebar-toggle]');
        const collapseBtn = document.querySelector('[data-sidebar-collapse]');
        let backdrop = document.querySelector('.sidebar-backdrop');

        if (shell && !backdrop) {
            backdrop = document.createElement('div');
            backdrop.className = 'sidebar-backdrop';
            backdrop.setAttribute('aria-hidden', 'true');
            shell.prepend(backdrop);
            backdrop.addEventListener('click', function () {
                shell.classList.remove('sidebar-open');
            });
        }

        if (toggle && shell) {
            toggle.addEventListener('click', function () {
                shell.classList.toggle('sidebar-open');
            });
        }

        if (collapseBtn && shell) {
            collapseBtn.addEventListener('click', function () {
                shell.classList.toggle('sidebar-collapsed');
                localStorage.setItem('qsm-sidebar-collapsed', shell.classList.contains('sidebar-collapsed') ? '1' : '0');
            });
            if (localStorage.getItem('qsm-sidebar-collapsed') === '1' && window.innerWidth >= 992) {
                shell.classList.add('sidebar-collapsed');
            }
        }
    }

    function initReveal() {
        const items = document.querySelectorAll('[data-reveal], .reveal');
        if (!items.length) return;

        const reveal = function () {
            items.forEach(function (item) {
                const rect = item.getBoundingClientRect();
                if (rect.top <= window.innerHeight * 0.9) {
                    item.classList.add('is-visible');
                    item.setAttribute('data-revealed', 'true');
                }
            });
        };

        reveal();
        window.addEventListener('scroll', reveal, { passive: true });
    }

    function initSmoothNav() {
        document.querySelectorAll('.site-nav .nav-link').forEach(function (link) {
            link.addEventListener('click', function (event) {
                const href = this.getAttribute('href');
                if (href && href.startsWith('#')) {
                    event.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });
    }

    function initForms() {
        document.querySelectorAll('form[data-validate]').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });

        document.querySelectorAll('input, select, textarea').forEach(function (input) {
            input.addEventListener('invalid', function () {
                this.classList.add('is-invalid');
            });
            input.addEventListener('input', function () {
                if (this.validity.valid) {
                    this.classList.remove('is-invalid');
                }
            });
        });

        document.querySelectorAll('form[data-loading]').forEach(function (form) {
            form.addEventListener('submit', function () {
                const btn = form.querySelector('[type="submit"]');
                if (btn && !btn.classList.contains('btn-loading')) {
                    btn.classList.add('btn-loading');
                    btn.disabled = true;
                }
            });
        });
    }

    function initReducedMotion() {
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.documentElement.dataset.reducedMotion = 'reduce';
        }
    }

    function initServiceWorker() {
        if ('serviceWorker' in navigator) {
            const base = document.querySelector('base')?.href || '/';
            navigator.serviceWorker.register(base + 'service-worker.js').catch(function () {});
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initReducedMotion();
        initTheme();
        initSidebar();
        initReveal();
        initSmoothNav();
        initForms();
        initServiceWorker();
    });
})();
