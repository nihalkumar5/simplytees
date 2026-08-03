<?php
/**
 * Front Page Template (Homepage)
 */
get_header();
?>

        <main id="main">
      <!-- 1. STUDIO LOOKBOOK HERO SECTION -->
      <section id="top" class="hero studio-lookbook-hero" aria-labelledby="hero-title">
        <div class="studio-hero-container">
          <!-- Left Model Display -->
          <div class="studio-hero-image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_hero.png" alt="ASTERra Studio Lookbook Model" class="studio-hero-img">
          </div>

          <!-- Right Content Block -->
          <div class="studio-hero-content">
            <h1 id="hero-title" class="studio-title">THREE OF A KIND</h1>
            <p class="studio-subtitle">Smart edgy corporate guy is ready to be seen!</p>
            <p class="studio-description">Tincto Edgy inner Shirt styled with Half and half color blocked Tenun Vest.</p>
            
            <div class="studio-hero-cta">
              <a href="new-products.html" class="button-primary-dark">Explore Collection <span aria-hidden="true">→</span></a>
              <a href="apparel.html" class="button-outline-dark">View Lookbook</a>
            </div>
          </div>
        </div>
      </section>
      <!-- 1.5 NEW ARRIVALS LARGE CARDS SECTION -->
      <section class="large-product-showcase" style="width: 100%; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-bottom: 2rem;">
        <div class="showcase-header" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem; border-bottom: 1px solid #ddd;">
          <h2 style="font-size: 1.25rem; font-weight: 800; letter-spacing: 0.1em; margin: 0; text-transform: uppercase;">New Arrivals</h2>
          <div class="showcase-tabs" style="display: flex; border: 1px solid #111;">
            <button onclick="filterNewArrivals('all', this)" style="padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 700; background: #ddd; border: none; border-right: 1px solid #111; cursor: pointer;">ALL</button>
            <button onclick="filterNewArrivals('men', this)" style="padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 700; background: #fff; border: none; border-right: 1px solid #111; cursor: pointer;">MEN'S</button>
            <button onclick="filterNewArrivals('women', this)" style="padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 700; background: #fff; border: none; cursor: pointer;">WOMEN'S</button>
          </div>
        </div>
        
        <div class="showcase-scroll" style="display: flex; overflow-x: auto; width: 100%; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; border-top: 1px solid #111;">
          
          <!-- Card 1 -->
          <div class="showcase-card" data-category="men" style="position: relative; border-right: 1px solid #111; display: flex; flex-direction: column; flex: 0 0 35%; min-width: 320px; scroll-snap-align: start;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">NEW</span>
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8); color: #fff; background-color: #111;">PRE-ORDER</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png" style="width: 100%; height: 65vh; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">MARINE QUARTER CANVAS JACKET - NAVY</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 1,600</span>
                </div>
                <button data-view="45" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="showcase-card" data-category="men" style="position: relative; border-right: 1px solid #111; display: flex; flex-direction: column; flex: 0 0 35%; min-width: 320px; scroll-snap-align: start;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">NEW</span>
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_white.png" style="width: 100%; height: 65vh; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">SAILING CLUB EMBROIDERED BOXY JERSEY - OFF WHITE</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 2,499</span>
                </div>
                <button data-view="44" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="showcase-card" data-category="women" style="position: relative; border-right: 1px solid #111; display: flex; flex-direction: column; flex: 0 0 35%; min-width: 320px; scroll-snap-align: start;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">NEW</span>
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_beige.png" style="width: 100%; height: 65vh; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">JOSHUA DENIM JEAN - WASHED ECRU</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <div style="display: flex; gap: 0.3rem;">
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #223a5e; border: 1px solid #111; display: inline-block;"></span>
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #f0ebd8; border: 1px solid #111; display: inline-block;"></span>
                  </div>
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 2,990</span>
                </div>
                <button data-view="43" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>
          
          <!-- Card 4 -->
          <div class="showcase-card" data-category="women" style="position: relative; border-right: 1px solid #111; display: flex; flex-direction: column; flex: 0 0 35%; min-width: 320px; scroll-snap-align: start;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">NEW</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_olive.png" style="width: 100%; height: 65vh; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">NOMAD PANT - VINTAGE WASH</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <div style="display: flex; gap: 0.3rem;">
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #223a5e; border: 1px solid #111; display: inline-block;"></span>
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #ccc; border: 1px solid #111; display: inline-block;"></span>
                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #e0d8c8; border: 1px solid #111; display: inline-block;"></span>
                  </div>
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 2,190</span>
                </div>
                <button data-view="42" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- 2. QUICK CATEGORY STORY HIGHLIGHTS -->
      <section class="home-categories-bar">
        <h3>DISCOVER BY CATEGORY</h3>
        <div class="circular-filters" style="justify-content: flex-start; padding-left: 1rem; padding-right: 1rem; margin-bottom: 0; padding-bottom: 0.5rem;">
          <button type="button" class="circular-filter" onclick="window.location.href='apparel.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text">Apparel</span>
          </button>
          <button type="button" class="circular-filter" onclick="window.location.href='kids-clothing.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_white.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text">Kids</span>
          </button>
          <button type="button" class="circular-filter" onclick="window.location.href='accessories.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_beige.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text">Accessories</span>
          </button>
          <button type="button" class="circular-filter" onclick="window.location.href='home-living.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_olive.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text">Living</span>
          </button>
          <button type="button" class="circular-filter" onclick="window.location.href='pet-wear.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text">Pet-Wear</span>
          </button>
          <button type="button" class="circular-filter" onclick="window.location.href='new-products.html'">
            <div class="circle-icon bg-gray"><div class="inner-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_white.png'); background-size: cover; background-position: center;"></div></div>
            <span class="outer-text" style="color: #2e7d32; font-weight: 700;">New In</span>
          </button>
        </div>
      </section>

      <!-- 3. BRAND MANIFESTO SECTION -->
      <section class="manifesto section-pad" id="world" aria-labelledby="manifesto-title">
        <p class="eyebrow">A study in restraint</p>
        <div class="manifesto-grid">
          <h2 id="manifesto-title">Not louder.<br>Closer.</h2>
          <div>
            <p>ASTERra makes daily uniforms from weight, texture and a little friction. Pieces that become more themselves after every wash and wear.</p>
            <a class="text-link" href="#lookbook">Read our material notes <span aria-hidden="true">→</span></a>
          </div>
        </div>
        <div class="material-strip" aria-label="Brand materials">
          <span>280 GSM Organic Cotton</span><span>Vegetable Tanned Leather</span><span>Recast Sterling Silver</span><span>Low-Volume Runs</span>
        </div>
      </section>

      <!-- 4. TRENDING BEST SELLERS GRID -->
      <section class="trending-section" id="trending">
        <div class="section-header-flex">
          <div>
            <p class="eyebrow" style="margin-bottom: 0.3rem;">Curated Selection</p>
            <h2>Trending Editions</h2>
          </div>
          <a href="new-products.html" class="view-all-link">View All Products <span aria-hidden="true">→</span></a>
        </div>
        
        <div class="product-grid" style="grid-template-columns: repeat(4, 1fr); gap: 1.5rem;">
          <div class="showcase-card" style="position: relative; border: 1px solid #111; display: flex; flex-direction: column; width: 100%;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png" style="width: 100%; height: 350px; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">CLASSIC OVERSIZED TEE</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 1,539</span>
                </div>
                <button data-view="45" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>
          
          <div class="showcase-card" style="position: relative; border: 1px solid #111; display: flex; flex-direction: column; width: 100%;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_olive.png" style="width: 100%; height: 350px; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">HEAVYWEIGHT PULLOVER HOODIE</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 1,599</span>
                </div>
                <button data-view="44" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>
          
          <div class="showcase-card" style="position: relative; border: 1px solid #111; display: flex; flex-direction: column; width: 100%;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_beige.png" style="width: 100%; height: 350px; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">CANVAS UTILITY TOTE</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 1,529</span>
                </div>
                <button data-view="43" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>

          <div class="showcase-card" style="position: relative; border: 1px solid #111; display: flex; flex-direction: column; width: 100%;">
            <div class="card-image-wrap" style="position: relative; overflow: hidden; border-bottom: 1px solid #111;">
              <div class="card-badges" style="position: absolute; top: 1rem; left: 1rem; z-index: 2; display: flex; gap: 0.5rem;">
                <span style="font-size: 0.65rem; font-weight: 700; border: 1px solid #111; padding: 0.2rem 0.5rem; background: rgba(255,255,255,0.8);">TRENDING</span>
              </div>
              <button style="position: absolute; top: 1rem; right: 1rem; z-index: 2; background: #fff; border: 1px solid #111; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path></svg>
              </button>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_white.png" style="width: 100%; height: 350px; object-fit: cover; display: block; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="Product">
            </div>
            <div class="card-info" style="padding: 1rem; display: flex; flex-direction: column; gap: 1rem; background: #fff; flex-grow: 1;">
              <h3 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; margin: 0; text-transform: uppercase; text-align: left;">SOFT ORGANIC CREW TEE</h3>
              <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-start;">
                  <span style="font-weight: 600; font-size: 0.9rem;">₹ 1,299</span>
                </div>
                <button data-view="42" style="background: none; border: none; font-size: 0.85rem; font-weight: 700; cursor: pointer; text-decoration: underline; padding: 0;">+ ADD</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 5. SHOP BY CATEGORY GRID CARDS -->
      <section class="shop-categories section-pad" id="shop" aria-labelledby="collection-title">
        <div class="section-heading">
          <p class="eyebrow">The complete arrangement</p>
          <h2 id="collection-title">Shop by<br>Category.</h2>
        </div>
        <div class="category-cards">
          <a href="new-products.html" class="cat-card">
            <div class="cat-card-img"><i class="shirt-art product-bone"></i></div>
            <div class="cat-card-text">
              <h3>New Products</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="t-shirts.html" class="cat-card">
            <div class="cat-card-img"><i class="tee-art product-olive"></i></div>
            <div class="cat-card-text">
              <h3>T-Shirts</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="hoodies-jackets.html" class="cat-card">
            <div class="cat-card-img"><i class="shirt-art product-rust"></i></div>
            <div class="cat-card-text">
              <h3>Hoodies &amp; Jackets</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="aop-apparel.html" class="cat-card">
            <div class="cat-card-img"><i class="tee-art product-moss"></i></div>
            <div class="cat-card-text">
              <h3>AOP Apparel</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="bottomwear.html" class="cat-card">
            <div class="cat-card-img"><i class="trouser-art product-ink"></i></div>
            <div class="cat-card-text">
              <h3>Bottomwear</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="kids-clothing.html" class="cat-card">
            <div class="cat-card-img"><i class="tee-art product-bone"></i></div>
            <div class="cat-card-text">
              <h3>Kids Clothing</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="headwear.html" class="cat-card">
            <div class="cat-card-img"><i class="beanie-art product-olive"></i></div>
            <div class="cat-card-text">
              <h3>Headwear</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="drinkware.html" class="cat-card">
            <div class="cat-card-img"><i class="bag-art product-rust"></i></div>
            <div class="cat-card-text">
              <h3>Drinkware</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="accessories.html" class="cat-card">
            <div class="cat-card-img"><i class="key-art product-moss"></i></div>
            <div class="cat-card-text">
              <h3>Accessories</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="home-living.html" class="cat-card">
            <div class="cat-card-img"><i class="bag-art product-ink"></i></div>
            <div class="cat-card-text">
              <h3>Home &amp; Living</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="pet-wear.html" class="cat-card">
            <div class="cat-card-img"><i class="shirt-art product-bone"></i></div>
            <div class="cat-card-text">
              <h3>Pet-Wear</h3>
              <span>Shop now! →</span>
            </div>
          </a>
          <a href="bags.html" class="cat-card">
            <div class="cat-card-img"><i class="bag-art product-olive"></i></div>
            <div class="cat-card-text">
              <h3>Bags</h3>
              <span>Shop now! →</span>
            </div>
          </a>
        </div>
      </section>

      <!-- 6. EDITORIAL LOOKBOOK SECTION -->
      <section class="lookbook-section" id="lookbook">
        <div class="lookbook-container">
          <div class="lookbook-header">
            <p class="eyebrow">Material Study</p>
            <h2>Craft &amp; Texture</h2>
            <p>Designed with intentional weight, structural cuts, and organic finishes built for everyday wear.</p>
          </div>
          <div class="lookbook-grid">
            <div class="lookbook-card">
              <div class="lookbook-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png');"></div>
              <div class="lookbook-content">
                <h3>280 GSM Heavy Cotton</h3>
                <p>Spun from long-staple organic cotton. Structured drop-shoulders with ribbed collars engineered to maintain shape over time.</p>
              </div>
            </div>
            <div class="lookbook-card">
              <div class="lookbook-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_olive.png');"></div>
              <div class="lookbook-content">
                <h3>Vegetable Tanned Leather</h3>
                <p>Aged with natural tree bark tannins. Unsealed surfaces develop a distinct patina unique to how you carry your objects.</p>
              </div>
            </div>
            <div class="lookbook-card">
              <div class="lookbook-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_beige.png');"></div>
              <div class="lookbook-content">
                <h3>Recast Silver Hardware</h3>
                <p>Solid 925 sterling silver cast in small batches. Matte brushed finishes with clean geometric silhouettes.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 7. CUSTOMER TESTIMONIALS SECTION -->
      <section class="testimonials-section">
        <div class="testimonials-container">
          <div style="text-align: center;">
            <p class="eyebrow">Community Notes</p>
            <h2 style="font-size: clamp(2rem, 3.5vw, 2.8rem); font-weight: 800; letter-spacing: -0.03em; margin: 0.5rem 0 0;">Trusted by Designers &amp; Creators</h2>
          </div>
          <div class="testimonials-grid">
            <div class="testimonial-card">
              <div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"The weight of the classic crew tee is unlike anything else. It holds its boxy structure even after multiple washes."</p>
              </div>
              <div class="testimonial-user">
                <div class="user-avatar">AK</div>
                <div class="user-info">
                  <h4>Aarav K.</h4>
                  <span>✔ Verified Buyer</span>
                </div>
              </div>
            </div>
            <div class="testimonial-card">
              <div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Minimalist branding, heavy fabric, and flawless stitching. Asterra has become my go-to daily uniform."</p>
              </div>
              <div class="testimonial-user">
                <div class="user-avatar">MP</div>
                <div class="user-info">
                  <h4>Meera P.</h4>
                  <span>✔ Verified Buyer</span>
                </div>
              </div>
            </div>
            <div class="testimonial-card">
              <div>
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Fast dispatch, premium packaging, and the tote bag is built like a tank. Exceeded expectations!"</p>
              </div>
              <div class="testimonial-user">
                <div class="user-avatar">RS</div>
                <div class="user-info">
                  <h4>Rohan S.</h4>
                  <span>✔ Verified Buyer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 8. FAQ ACCORDION SECTION -->
      <section class="faq-section">
        <div class="faq-header">
          <p class="eyebrow">Everything You Need to Know</p>
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-accordion-container">
          <details class="faq-item" open="">
            <summary>What materials do you use for your apparel?</summary>
            <div class="faq-answer">
              We construct our apparel using 100% heavyweight organic Supima cotton (280–320 GSM). All dyes are low-impact and AZO-free, resulting in rich muted tones that age gracefully.
            </div>
          </details>
          <details class="faq-item">
            <summary>How long does dispatch and delivery take?</summary>
            <div class="faq-answer">
              All orders are dispatched from our central hub within 48 hours. Standard domestic delivery takes 3–5 business days, with complimentary express shipping on orders over ₹2,800.
            </div>
          </details>
          <details class="faq-item">
            <summary>What is your return and exchange policy?</summary>
            <div class="faq-answer">
              We offer a hassle-free 14-day return and exchange policy. Items must be unworn, unwashed, and in their original packaging with tags intact.
            </div>
          </details>
          <details class="faq-item">
            <summary>How should I care for my Asterra garments?</summary>
            <div class="faq-answer">
              We recommend cold machine wash with mild detergent, washed inside out. Line dry in the shade to preserve garment shape and color intensity.
            </div>
          </details>
        </div>
      </section>

      <!-- 9. NEWSLETTER SIGNUP -->
      <section class="signup" aria-labelledby="signup-title">
        <p class="eyebrow">Letters from ASTERRA</p>
        <h2 id="signup-title">First sight of what<br>is coming next.</h2>
        <form data-signup="" novalidate="">
          <label class="sr-only" for="email">Email address</label>
          <input id="email" name="email" type="email" autocomplete="email" placeholder="Your email address" required="">
          <button type="submit">Stay close <span aria-hidden="true">→</span></button>
          <p class="form-message" aria-live="polite"></p>
        </form>
      </section>

      <!-- 10. FEATURED IN PRESS BAR -->
      <section class="featured-in" aria-labelledby="featured-title">
        <h2 id="featured-title">FEATURED IN</h2>
        <div class="featured-logos">
          <span class="featured-logo">THE HINDU</span>
          <span class="featured-logo modern" style="text-transform: lowercase;">traveller</span>
          <span class="featured-logo" style="letter-spacing: 0.2em; font-weight: normal;">GRAZIA</span>
          <span class="featured-logo">THE ECONOMIC TIMES</span>
          <span class="featured-logo" style="font-weight: normal;">FEMINA</span>
          <span class="featured-logo modern">INDIA TODAY</span>
          <span class="featured-logo">Hindustan Times</span>
          <span class="featured-logo modern" style="color: #88b79d;">mint</span>
          <span class="featured-logo">The Indian EXPRESS</span>
          <span class="featured-logo modern" style="border: 2px solid #555; padding: 2px 8px; border-radius: 8px;">CNN</span>
        </div>
        <button type="button" class="featured-btn">SEE MORE FEATURES</button>
      </section>
    </main>

    
    
    <footer class="serotoninn-editorial-footer">
      <!-- Top Torn Paper Edge -->
      <div class="footer-torn-paper-edge" aria-hidden="true">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
          <path d="M0,0 L0,45 L35,38 L70,52 L105,32 L140,58 L175,40 L210,55 L245,35 L280,50 L315,38 L350,56 L385,42 L420,58 L455,36 L490,52 L525,40 L560,56 L595,34 L630,50 L665,38 L700,54 L735,36 L770,52 L805,38 L840,58 L875,40 L910,54 L945,36 L980,52 L1015,40 L1050,56 L1085,34 L1120,50 L1155,38 L1190,56 L1225,40 L1260,55 L1295,36 L1330,52 L1365,38 L1400,56 L1440,42 L1440,0 Z" fill="#FAF8F4"></path>
          <path d="M0,45 L35,38 L70,52 L105,32 L140,58 L175,40 L210,55 L245,35 L280,50 L315,38 L350,56 L385,42 L420,58 L455,36 L490,52 L525,40 L560,56 L595,34 L630,50 L665,38 L700,54 L735,36 L770,52 L805,38 L840,58 L875,40 L910,54 L945,36 L980,52 L1015,40 L1050,56 L1085,34 L1120,50 L1155,38 L1190,56 L1225,40 L1260,55 L1295,36 L1330,52 L1365,38 L1400,56 L1440,42" fill="none" stroke="rgba(0,0,0,0.12)" stroke-width="2.5"></path>
        </svg>
      </div>

      <div class="footer-inner-container">
        <!-- Top Nav Links Grid -->
        <div class="footer-links-grid">
          <!-- Left Links Column 1 -->
          <div class="footer-col">
            <a href="apparel.html">SHOP ALL</a>
            <a href="contact.html">CONTACT</a>
          </div>
          <!-- Left Links Column 2 -->
          <div class="footer-col">
            <a href="t-shirts.html">CATEGORIES</a>
            <a href="new-products.html">COLLECTIONS</a>
          </div>
          <!-- Left Links Column 3 -->
          <div class="footer-col">
            <a href="index.html#world">WHO WE ARE</a>
            <a href="new-products.html">SALE</a>
          </div>
          <!-- Left Links Column 4 -->
          <div class="footer-col">
            <a href="apparel.html">CAMPAIGN</a>
            <span class="footer-tag">[ SS26 ]</span>
          </div>

          <!-- Right Links Grid -->
          <div class="footer-col-right-group">
            <a href="contact.html">RETURN</a>
            <a href="contact.html">IMPRESSUM</a>
            <a href="contact.html">SHIPPING AND PAYMENT</a>
            <a href="contact.html">FAQ</a>
          </div>
        </div>

        <!-- Center Showcase Area -->
        <div class="footer-center-showcase">
          <!-- Giant Background Brand Title -->
          <div class="footer-giant-title">ASTERRA</div>

          <!-- Central Model Image -->
          <div class="footer-model-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_hero.png" alt="ASTERra Editorial Fashion" class="footer-model-img">
          </div>

          <!-- Torn Painted Discount Badge on Right -->
          <div class="footer-discount-badge">
            <span class="badge-text">DISCOUNT</span>
          </div>
        </div>

        <!-- Bottom Newsletter Subscribe Bar -->
        <div class="footer-subscribe-row">
          <div class="subscribe-left-copy">
            <h3 class="subscribe-main-title">SUBSCRIBE <span class="sub-tag">(LATEST NEWS)</span></h3>
          </div>

          <form class="subscribe-form" onsubmit="event.preventDefault(); alert('Subscribed to newsletter!');">
            <div class="input-wrap">
              <label for="footer-email">EMAIL</label>
              <input type="email" id="footer-email" placeholder="" required>
            </div>
            <button type="submit" class="subscribe-trigger-btn">SUBSCRIBE</button>
          </form>
        </div>

        <!-- Bottom Copyright / Legal Bar -->
        <div class="footer-legal-bar">
          <span class="copyright-text">©2026_ASTERRA</span>
          <div class="legal-links">
            <a href="#">PRIVACY POLICY (DSGVO)</a>
            <a href="#">CREDITS</a>
            <a href="https://instagram.com" target="_blank" rel="noopener">IG</a>
          </div>
        </div>
      </div>
    </footer>


    
    <aside class="filter-drawer" aria-label="Filters" aria-hidden="true" data-filter-drawer>
  <div class="filter-drawer-header">
    <h2>SHOP FILTERS</h2>
    <button class="filter-btn-close-top" data-close-filter onclick="closeFilterDrawer()">&times;</button>
  </div>
  <div class="filter-drawer-body">
    <div class="filter-sidebar">
      <div class="filter-sidebar-item active" onclick="switchFilterCategory('category', this)">CATEGORY</div>
      <div class="filter-sidebar-item" onclick="switchFilterCategory('size', this)">SIZE</div>
      <div class="filter-sidebar-item" onclick="switchFilterCategory('color', this)">COLOR</div>
      <div class="filter-sidebar-item" onclick="switchFilterCategory('price', this)">PRICE</div>
      <div class="filter-sidebar-item" onclick="switchFilterCategory('occasion', this)">OCCASION</div>
    </div>
    <div class="filter-content-pane">
      <div class="filter-pane-group active" id="filter-group-category">
        <label class="filter-checkbox-label">
          <input type="checkbox">
          <div class="checkbox-info">
            <span class="checkbox-name">Topwear</span>
            <span class="checkbox-desc">Premium Tees & Polos</span>
            <span class="checkbox-count">124 Products</span>
          </div>
        </label>
        <label class="filter-checkbox-label">
          <input type="checkbox">
          <div class="checkbox-info">
            <span class="checkbox-name">Bottomwear</span>
            <span class="checkbox-desc">Joggers & Shorts</span>
            <span class="checkbox-count">82 Products</span>
          </div>
        </label>
        <label class="filter-checkbox-label">
          <input type="checkbox">
          <div class="checkbox-info">
            <span class="checkbox-name">Accessories</span>
            <span class="checkbox-desc">Caps & Socks</span>
            <span class="checkbox-count">35 Products</span>
          </div>
        </label>
      </div>
      <div class="filter-pane-group" id="filter-group-size">
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">S</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">M</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">L</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">XL</span></div></label>
      </div>
      <div class="filter-pane-group" id="filter-group-color">
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">Black</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">White</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">Olive</span></div></label>
        <label class="filter-checkbox-label"><input type="checkbox"> <div class="checkbox-info"><span class="checkbox-name">Beige</span></div></label>
      </div>
      <div class="filter-pane-group" id="filter-group-price">


<?php
get_footer();
