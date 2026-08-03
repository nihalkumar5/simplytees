<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>



    <a class="skip-link" href="#main">Skip to collection</a>
    <div class="dispatch-bar">Complimentary delivery over INR 2,800 - Dispatches in 48 hours</div>
    
    <header id="master-header" class="site-header" data-header="">
      <div class="header-inner">
        <!-- Mobile menu toggle (hidden on desktop) -->
        <button class="menu-button mobile-only" type="button" aria-expanded="false" aria-controls="nav" data-menu="">
          <span></span><span></span><span></span><span class="sr-only">Open menu</span>
        </button>

        <!-- Brand Logo -->
        <a class="wordmark wordmark-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Asterra home">
          <span aria-hidden="true"></span><b class="sr-only"><?php bloginfo( 'name' ); ?></b>
        </a>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
          <?php
          if ( has_nav_menu( 'primary' ) ) {
              wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container'      => false,
                  'menu_class'     => 'desktop-nav-list',
              ) );
          } else {
          ?>
          <ul class="desktop-nav-list">
            <li class="has-dropdown">
              <a href="<?php echo esc_url( home_url( '/apparel' ) ); ?>">APPAREL</a>
              <div class="mega-menu">
                <div class="mega-image-row">
                  <div class="mega-image-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png" alt="T-Shirts">
                    <span>T-SHIRTS</span>
                  </div>
                  <div class="mega-image-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_olive.png" alt="Hoodies & Jackets">
                    <span>HOODIES & JACKETS</span>
                  </div>
                  <div class="mega-image-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_beige.png" alt="Bottomwear">
                    <span>BOTTOMWEAR</span>
                  </div>
                  <div class="mega-image-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_white.png" alt="AOP Apparel">
                    <span>AOP APPAREL</span>
                  </div>
                </div>
                <div class="mega-content text-columns">
                  <div class="mega-col-text">
                    <h4 style="margin-bottom: 0.5rem; color: #111;"><a href="<?php echo esc_url( home_url( '/t-shirts' ) ); ?>" style="color: inherit; text-decoration: none; padding: 0;">T-SHIRTS</a></h4>
                    <a href="<?php echo esc_url( home_url( '/t-shirts?filter=Classic%20Crew' ) ); ?>">Classic Crew</a>
                    <a href="<?php echo esc_url( home_url( '/t-shirts?filter=Oversized' ) ); ?>">Oversized</a>
                    <a href="<?php echo esc_url( home_url( '/t-shirts?filter=Baby%20Tee%20%26%20Crop' ) ); ?>">Baby Tee &amp; Crop</a>
                  </div>
                  <div class="mega-col-text">
                    <h4 style="margin-bottom: 0.5rem; color: #111;"><a href="<?php echo esc_url( home_url( '/hoodies-jackets' ) ); ?>" style="color: inherit; text-decoration: none; padding: 0;">HOODIES &amp; JACKETS</a></h4>
                    <a href="<?php echo esc_url( home_url( '/hoodies-jackets?filter=Pullover%20Hoodies' ) ); ?>">Pullover Hoodies</a>
                    <a href="<?php echo esc_url( home_url( '/hoodies-jackets?filter=Zip%20Hoodies' ) ); ?>">Zip Hoodies</a>
                  </div>
                </div>
              </div>
            </li>
            <li><a href="<?php echo esc_url( home_url( '/new-products' ) ); ?>" class="nav-highlight">NEW ARRIVALS</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">CONTACT</a></li>
          </ul>
          <?php } ?>
        </nav>

        <!-- Right Icons -->
        <div class="header-icons">
          <button class="icon-btn search-btn" aria-label="Search" onclick="document.querySelector('[data-search]') &amp;&amp; document.querySelector('[data-search]').focus()">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </button>
          <button class="icon-btn user-btn" aria-label="User profile" onclick="alert('User Profile Coming Soon')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          </button>
          <button class="icon-btn bag-btn" type="button" data-bag="" aria-label="Shopping bag">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
            <span class="bag-badge" data-bag-count="">00</span>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation Drawer -->
      <nav id="nav" class="nav mobile-only" aria-label="Primary navigation">
        <div class="rare-mobile-menu-v2">
          <button type="button" class="rare-menu-close-btn-v2" onclick="toggleNav(false)" aria-label="Close Menu">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L13 13M1 13L13 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          </button>
          
          <div class="rare-menu-banner-v2">
            <img id="rare-menu-banner-img-v2" src="<?php echo get_template_directory_uri(); ?>/assets/images/tshirt_black.png" alt="Menu Banner">
          </div>

          <div class="rare-menu-tabs-v2">
            <div class="rare-menu-tab-v2 active" onclick="switchMobileTabV2('apparel', this)">APPAREL</div>
            <div class="rare-menu-tab-v2" onclick="switchMobileTabV2('kids', this)">KIDS</div>
            <div class="rare-menu-tab-v2" onclick="switchMobileTabV2('accessories', this)">ACCESSORIES</div>
          </div>
        </div>
      </nav>
    </header>
