/**
 * Nourish & Pure - Theme Frontend Interactions
 *
 * @package NourishPure
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initWebShare();
        initRecipePrint();
        initSmoothHeadingLinks();
    });

    /**
     * Mobile Off-Canvas Drawer Navigation
     */
    function initMobileMenu() {
        var toggleBtn = document.querySelector('.np-mobile-menu-toggle');
        var drawer = document.getElementById('np-mobile-drawer');
        if (!toggleBtn || !drawer) return;

        var closeBtn = drawer.querySelector('.np-drawer-close');
        var backdrop = drawer.querySelector('.np-drawer-backdrop');
        var searchTrigger = document.querySelector('.np-mobile-search-trigger');
        var searchInput = document.getElementById('np-mobile-search-input');
        var drawerLinks = drawer.querySelectorAll('a');

        function openMenu(focusSearch) {
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            toggleBtn.setAttribute('aria-expanded', 'true');
            document.body.classList.add('np-menu-open');

            if (focusSearch && searchInput) {
                setTimeout(function() {
                    searchInput.focus();
                }, 200);
            } else if (closeBtn) {
                closeBtn.focus();
            }
        }

        function closeMenu() {
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            toggleBtn.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('np-menu-open');
            toggleBtn.focus();
        }

        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var isOpen = drawer.classList.contains('is-open');
            if (isOpen) {
                closeMenu();
            } else {
                openMenu(false);
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closeMenu();
            });
        }

        if (backdrop) {
            backdrop.addEventListener('click', function() {
                closeMenu();
            });
        }

        if (searchTrigger) {
            searchTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                openMenu(true);
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                closeMenu();
            }
        });

        drawerLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Smooth close when navigating to another anchor/page
                setTimeout(closeMenu, 150);
            });
        });
    }

    /**
     * Web Share API and Clipboard Copy Fallback
     */
    function initWebShare() {
        var shareButtons = document.querySelectorAll('.np-share-native');

        shareButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                var shareUrl = btn.getAttribute('data-url') || window.location.href;
                var shareTitle = btn.getAttribute('data-title') || document.title;

                if (navigator.share) {
                    navigator.share({
                        title: shareTitle,
                        url: shareUrl
                    }).catch(function(err) {
                        // User cancelled or share failed, fallback silently.
                    });
                } else if (navigator.clipboard) {
                    navigator.clipboard.writeText(shareUrl).then(function() {
                        var textSpan = btn.querySelector('.np-share-text');
                        var originalText = textSpan ? textSpan.textContent : '';

                        if (textSpan && window.nourishPureData && window.nourishPureData.copiedText) {
                            textSpan.textContent = window.nourishPureData.copiedText;
                            setTimeout(function() {
                                textSpan.textContent = originalText;
                            }, 2500);
                        } else {
                            alert(window.nourishPureData ? window.nourishPureData.copiedText : 'Link copied!');
                        }
                    }).catch(function() {
                        window.prompt('Copy article link:', shareUrl);
                    });
                } else {
                    window.prompt('Copy article link:', shareUrl);
                }
            });
        });
    }

    /**
     * Recipe Print Functionality
     */
    function initRecipePrint() {
        var printButtons = document.querySelectorAll('.np-recipe-print-btn');
        printButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                window.print();
            });
        });
    }

    /**
     * Smooth Scrolling for Table of Contents / Heading Anchors
     */
    function initSmoothHeadingLinks() {
        var tocLinks = document.querySelectorAll('.np-toc a[href^="#"]');
        tocLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var targetId = link.getAttribute('href').substring(1);
                var targetElement = document.getElementById(targetId);

                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Set focus for accessibility without layout jumping.
                    targetElement.setAttribute('tabindex', '-1');
                    targetElement.focus();
                }
            });
        });
    }
})();
