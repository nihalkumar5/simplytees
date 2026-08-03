<?php
/**
 * WooCommerce Archive Product / Category Template
 */
get_header();
?>

<main id="main" class="shop-page">
  <div class="category-layout" style="background: #ffffff; padding-top: 40px; min-height: 80vh; width: 100%; overflow-x: hidden;">
    
    <div class="category-header" style="padding: 3rem 2rem 1.5rem 2rem; display: flex; flex-direction: column; background: #ffffff; max-width: 1400px; margin: 0 auto;">
      <h1 id="collection-title" data-dynamic-title style="font-size: 2rem; text-align: center; font-weight: 800; letter-spacing: -0.02em; margin: 0; text-transform: uppercase;">
        <?php 
        if ( is_shop() ) {
            echo 'All Objects';
        } else {
            single_term_title();
        }
        ?>
      </h1>
      
      <div class="subcat-scroll-wrapper" data-filters></div>

      <div class="shop-utility-toolbar" style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-top: 5rem; flex-wrap: wrap; width: 100%;">
        <a href="#" style="background: #f0f0f0; padding: 0.5rem 0.8rem; border-radius: 6px; font-size: 0.7rem; font-weight: 600; color: #333; display: flex; align-items: center; gap: 0.3rem; text-decoration: none; text-transform: uppercase; letter-spacing: 0.02em; flex-shrink: 0;">
            EXPLORE <span data-dynamic-text>COLLECTION</span> <span style="color: #111; font-size: 1rem; line-height: 0.5;">›</span>
        </a>
        
        <div class="product-search-container" style="flex: 1; min-width: 260px; max-width: 480px; margin: 0 auto;">
          <div style="position: relative; display: flex; align-items: center; border: 1px solid #ddd; border-radius: 30px; padding: 0.5rem 1.2rem; background: #fff;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" data-search placeholder="Discover the collection..." style="border: none; outline: none; width: 100%; font-size: 0.95rem; color: #333; background: transparent;">
          </div>
        </div>

        <div style="display: flex; align-items: center; gap: 0.8rem; flex-shrink: 0;">
          <div style="position: relative;" class="sort-wrapper">
            <button type="button" class="circle-btn" onclick="toggleSortDrawer()" style="width: 2.2rem; height: 2.2rem; cursor: pointer; border-radius: 50%; border: 1px solid #eaeaea; background: #fff; display: flex; align-items: center; justify-content: center; color: #111;">
              <span style="font-size: 1rem; line-height: 1;">↓</span>
            </button>
          </div>
          <button type="button" class="button-outline-dark" onclick="openFilterDrawer()" style="background: #fff; color: #555; padding: 0.5rem 1.2rem; border-radius: 30px; display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; font-weight: 600; border: 1px solid #ddd; letter-spacing: 0.05em;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
            FILTERS
          </button>
        </div>
      </div>

      <div class="results-count-container" style="text-align: right; border-bottom: 1px solid #111; padding-bottom: 0.2rem; margin-top: 1.5rem;">
        <p data-results style="font-size: 0.65rem; color: #111; font-weight: 400; text-transform: uppercase; font-family: 'DM Mono', monospace; letter-spacing: 0.02em; margin: 0;">0 OBJECTS IN VIEW</p>
      </div>
    </div>
    
    <!-- CONTENT GRID -->
    <div style="padding: 0 2rem 2rem 2rem; background: #ffffff; max-width: 1400px; margin: 0 auto;">
      <div class="product-grid" data-products>
        <?php
        if ( woocommerce_product_loop() ) {
            woocommerce_product_loop_start();
            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );
                    wc_get_template_part( 'content', 'product' );
                }
            }
            woocommerce_product_loop_end();
        }
        ?>
      </div>
      
      <div data-empty hidden style="text-align: left; padding: 4rem 0;">
        <h3 style="font-size: 1.5rem; font-weight: 400; margin-bottom: 1.5rem;">Nothing sits there yet.</h3>
        <p><a href="#" style="color: #111; font-weight: 500; font-size: 0.75rem; text-transform: uppercase; font-family: 'DM Mono', monospace; text-decoration: none;" onclick="setCategory('All objects'); return false;">SHOW EVERY OBJECT</a></p>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
