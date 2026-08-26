// Kinetic Scroll & Spotlight Animation for Manifesto Section (rAF Throttled for 60/120fps)
        (function() {
          const section = document.getElementById('manifestoSection');
          const heading = document.getElementById('manifestoHeading');
          const aura = document.getElementById('manifestoAura');
          if (!section || !heading) return;

          const words = heading.querySelectorAll('.m-word');

          // 1. Intersection Observer for trigger
          let isIntersecting = false;
          let hasTriggered = false;
          const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
              isIntersecting = entry.isIntersecting;
              if (entry.isIntersecting) {
                section.classList.add('is-visible');
                if (!hasTriggered) {
                  words.forEach((word, index) => {
                    setTimeout(() => {
                      word.classList.add('is-lit');
                    }, index * 45);
                  });
                  hasTriggered = true;
                }
              }
            });
          }, { threshold: 0.15 });

          observer.observe(section);

          // 2. Interactive Scroll-driven Illumination Scrubbing (rAF Throttled)
          let scrollTicking = false;
          function onScroll() {
            if (!isIntersecting || scrollTicking) return;
            scrollTicking = true;
            requestAnimationFrame(() => {
              const rect = section.getBoundingClientRect();
              const windowHeight = window.innerHeight;
              const startY = windowHeight * 0.85;
              const endY = windowHeight * 0.2;
              const progress = Math.min(Math.max((startY - rect.top) / (startY - endY), 0), 1);

              if (progress > 0) {
                const activeCount = Math.floor(progress * (words.length + 2));
                words.forEach((word, idx) => {
                  if (idx <= activeCount) {
                    word.classList.add('is-lit');
                  } else if (progress < 0.15) {
                    word.classList.remove('is-lit');
                  }
                });
              }
              scrollTicking = false;
            });
          }

          window.addEventListener('scroll', onScroll, { passive: true });

          // 3. Interactive Mouse Movement & Spotlight (rAF Throttled)
          let mouseRaf = null;
          section.addEventListener('mousemove', (e) => {
            if (mouseRaf) cancelAnimationFrame(mouseRaf);
            mouseRaf = requestAnimationFrame(() => {
              const rect = section.getBoundingClientRect();
              const x = e.clientX - rect.left;
              const y = e.clientY - rect.top;

              section.style.setProperty('--mouse-x', `${x}px`);
              section.style.setProperty('--mouse-y', `${y}px`);

              if (aura) {
                const auraX = (x / rect.width - 0.5) * 40;
                const auraY = (y / rect.height - 0.5) * 40;
                aura.style.transform = `translate3d(calc(-50% + ${auraX}px), calc(-50% + ${auraY}px), 0)`;
              }
            });
          }, { passive: true });

          section.addEventListener('mouseleave', () => {
            if (mouseRaf) cancelAnimationFrame(mouseRaf);
            if (aura) {
              aura.style.transform = 'translate3d(-50%, -50%, 0)';
            }
          });
        })();
