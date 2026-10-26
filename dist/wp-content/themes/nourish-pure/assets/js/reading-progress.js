/**
 * Nourish & Pure - Lightweight Article Reading Progress Bar
 *
 * @package NourishPure
 */
(function() {
    'use strict';

    // Respect reduced motion preference.
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Find article content container.
        var content = document.querySelector('.wp-block-post-content, .entry-content, main');
        if (!content) {
            return;
        }

        // Create the progress indicator bar.
        var progressBar = document.createElement('div');
        progressBar.className = 'np-reading-progress';
        progressBar.setAttribute('aria-hidden', 'true');
        document.body.appendChild(progressBar);

        var ticking = false;

        function updateProgress() {
            var rect = content.getBoundingClientRect();
            var contentTop = rect.top + window.scrollY;
            var contentHeight = rect.height;
            var windowHeight = window.innerHeight;
            var scrollY = window.scrollY;

            // If we are above content start, progress is 0.
            if (scrollY < contentTop) {
                progressBar.style.width = '0%';
                ticking = false;
                return;
            }

            // Calculation based on distance through content.
            var scrolled = scrollY - contentTop;
            var scrollableRange = contentHeight - windowHeight;

            if (scrollableRange <= 0) {
                progressBar.style.width = '100%';
                ticking = false;
                return;
            }

            var progress = Math.min(100, Math.max(0, (scrolled / scrollableRange) * 100));
            progressBar.style.width = progress.toFixed(1) + '%';
            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(updateProgress);
                ticking = true;
            }
        }, { passive: true });

        window.addEventListener('resize', function() {
            if (!ticking) {
                window.requestAnimationFrame(updateProgress);
                ticking = true;
            }
        }, { passive: true });
    });
})();
