document.addEventListener('DOMContentLoaded', () => {
          const heroSlider = document.querySelector('.custom-modern-slider');
          const slides = document.querySelectorAll('.slider-slide');
          const dots = document.querySelectorAll('.hero-dot');
          if (slides.length === 0) return;
          
          let current = 0;
          let isAnimating = false;
          let slideTimer = null;
          const slideDuration = 6000;

          function updateDots(index) {
            dots.forEach((dot, idx) => {
              dot.classList.remove('active', 'animating');
              if (idx === index) {
                // Force reflow to restart CSS stroke countdown animation
                void dot.offsetWidth;
                dot.classList.add('active', 'animating');
              }
            });
          }

          function goToSlide(index) {
            if (isAnimating || index === current) return;
            isAnimating = true;

            const next = index;
            const currentSlide = slides[current];
            const nextSlide = slides[next];

            slides.forEach(s => {
              s.classList.remove('prev-slide');
              s.style.zIndex = 1;
            });
            
            currentSlide.classList.add('prev-slide');
            nextSlide.style.zIndex = 3;
            nextSlide.classList.add('active-slide');
            
            // Trigger animation resets on content inside nextSlide
            const nextImg = nextSlide.querySelector('img');
            if (nextImg) {
              nextImg.style.animation = 'none';
              void nextImg.offsetWidth;
              nextImg.style.animation = '';
            }

            updateDots(next);

            setTimeout(() => {
              currentSlide.classList.remove('active-slide', 'prev-slide');
              current = next;
              isAnimating = false;
            }, 1000);

            resetTimer();
          }

          function nextSlide() {
            goToSlide((current + 1) % slides.length);
          }

          function prevSlide() {
            goToSlide((current - 1 + slides.length) % slides.length);
          }

          function resetTimer() {
            if (slideTimer) clearInterval(slideTimer);
            slideTimer = setInterval(nextSlide, slideDuration);
          }

          // Dot click listeners
          dots.forEach((dot, idx) => {
            dot.addEventListener('click', (e) => {
              e.preventDefault();
              goToSlide(idx);
            });
          });

          // Touch swipe support for mobile
          let touchStartX = 0;
          let touchStartY = 0;
          let touchEndX = 0;
          let touchEndY = 0;

          if (heroSlider) {
            heroSlider.addEventListener('touchstart', (e) => {
              touchStartX = e.changedTouches[0].screenX;
              touchStartY = e.changedTouches[0].screenY;
            }, { passive: true });

            heroSlider.addEventListener('touchend', (e) => {
              touchEndX = e.changedTouches[0].screenX;
              touchEndY = e.changedTouches[0].screenY;
              handleSwipe();
            }, { passive: true });
          }

          function handleSwipe() {
            const diffX = touchEndX - touchStartX;
            const diffY = touchEndY - touchStartY;
            // Only trigger if horizontal swipe is greater than vertical movement and exceeds 40px
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 40) {
              if (diffX < 0) {
                nextSlide();
              } else {
                prevSlide();
              }
            }
          }

          // Initial start
          updateDots(0);
          resetTimer();
        });
