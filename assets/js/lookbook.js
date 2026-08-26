// Lookbook Model Slider Script
        document.addEventListener('DOMContentLoaded', () => {
          const lbSlider = document.querySelector('.lookbook-hero-slider');
          if (!lbSlider) return;

          const lbSlides = lbSlider.querySelectorAll('.lookbook-slide');
          const lbDots = lbSlider.querySelectorAll('.lb-dot');
          if (lbSlides.length === 0) return;

          let lbCurrent = 0;
          let lbInterval = null;

          function showLBSlide(index) {
            lbSlides.forEach((slide, idx) => {
              slide.classList.toggle('active', idx === index);
            });
            lbDots.forEach((dot, idx) => {
              dot.classList.toggle('active', idx === index);
            });
            lbCurrent = index;
          }

          function nextLBSlide() {
            showLBSlide((lbCurrent + 1) % lbSlides.length);
          }

          function prevLBSlide() {
            showLBSlide((lbCurrent - 1 + lbSlides.length) % lbSlides.length);
          }

          function startLBTimer() {
            if (lbInterval) clearInterval(lbInterval);
            lbInterval = setInterval(nextLBSlide, 5500);
          }

          lbDots.forEach((dot, idx) => {
            dot.addEventListener('click', (e) => {
              e.preventDefault();
              showLBSlide(idx);
              startLBTimer();
            });
          });

          // Touch swipe support
          let lbTouchStartX = 0;
          let lbTouchEndX = 0;

          lbSlider.addEventListener('touchstart', (e) => {
            lbTouchStartX = e.changedTouches[0].screenX;
          }, { passive: true });

          lbSlider.addEventListener('touchend', (e) => {
            lbTouchEndX = e.changedTouches[0].screenX;
            const diff = lbTouchEndX - lbTouchStartX;
            if (Math.abs(diff) > 40) {
              if (diff < 0) nextLBSlide();
              else prevLBSlide();
              startLBTimer();
            }
          }, { passive: true });

          startLBTimer();
        });
