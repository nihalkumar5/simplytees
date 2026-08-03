<?php
/**
 * Asterra Theme Footer Template
 */
?>
    <!-- Mega Footer Styles & Component -->
    <footer class="mega-footer">
      <div class="footer-inner" style="max-width: 1400px; margin: 0 auto; padding: 4rem 2rem 2rem;">
        <div class="footer-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 3rem; margin-bottom: 4rem;">
          <div class="footer-col">
            <h4 style="font-size: 0.9rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.5rem; color: #111;"><?php bloginfo('name'); ?></h4>
            <p style="font-size: 0.85rem; color: #666; line-height: 1.6;"><?php bloginfo('description'); ?></p>
          </div>
          <div class="footer-col">
            <h4 style="font-size: 0.9rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.5rem; color: #111;">HELP</h4>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.85rem;">
              <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Customer Support</a></li>
              <li><a href="#">Shipping & Returns</a></li>
              <li><a href="#">Size Guide</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4 style="font-size: 0.9rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.5rem; color: #111;">LEGAL</h4>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.85rem;">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom" style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.75rem; color: #888;">
          <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Shopping Bag Drawer -->
    <div class="bag-drawer-backdrop" data-cart-backdrop="" onclick="closeDrawer()"></div>
    <aside class="bag-drawer" data-cart-drawer="" aria-label="Shopping bag">
      <div class="drawer-header">
        <h2>YOUR BAG (<span data-cart-count="">0</span>)</h2>
        <button type="button" class="drawer-close" data-cart-close="" aria-label="Close bag" onclick="closeDrawer()">×</button>
      </div>

      <div class="drawer-shipping-bar" style="padding: 0.8rem 1.25rem; background: #f9f9f9; border-bottom: 1px solid rgba(24,25,23,0.08); font-size: 0.7rem; font-family: var(--mono); text-transform: uppercase;">
        <span id="freeShippingMsg">Add ₹2,800 more for FREE shipping</span>
        <div style="height: 3px; background: #e0e0e0; margin-top: 0.4rem; border-radius: 2px; overflow: hidden;">
          <div id="freeShippingProgress" style="height: 100%; width: 0%; background: var(--ink); transition: width 0.3s ease;"></div>
        </div>
      </div>

      <div class="drawer-items" data-cart-items=""></div>

      <div class="drawer-empty" data-cart-empty="" hidden="">
        <p style="padding:2rem;text-align:center;">Your bag is empty.</p>
      </div>

      <div class="premium-drawer-footer" data-cart-footer="">
        <button type="button" data-checkout="" id="checkoutBtn">CHECKOUT / ₹0</button>
      </div>
    </aside>

    <!-- Mobile Size Bottom Sheet -->
    <div class="size-sheet-overlay" id="sizeSheetOverlay"></div>
    <div class="size-sheet" id="sizeSheet">
      <div class="size-sheet-handle"></div>
      <div class="size-sheet-header">
        <h3>SELECT SIZE</h3>
        <button type="button" class="size-sheet-close" id="sizeSheetClose">✕</button>
      </div>
      <div class="size-sheet-grid" id="sizeSheetGrid">
        <button type="button" class="size-sheet-btn" data-size="XS-36">XS-36</button>
        <button type="button" class="size-sheet-btn" data-size="S-38">S-38</button>
        <button type="button" class="size-sheet-btn" data-size="M-40">M-40</button>
        <button type="button" class="size-sheet-btn" data-size="L-42">L-42</button>
        <button type="button" class="size-sheet-btn" data-size="XL-44">XL-44</button>
        <button type="button" class="size-sheet-btn" data-size="XXL-46">XXL-46</button>
      </div>
      <div class="size-sheet-confirm">
        <button type="button" id="sizeSheetConfirm">ADD TO BAG</button>
      </div>
    </div>

    <div class="overlay" data-overlay=""></div>
    <dialog class="product-dialog" data-product-dialog="" aria-labelledby="dialog-title">
      <button type="button" class="dialog-close" data-close-dialog="" aria-label="Close product details">×</button>
      <div class="dialog-art" data-dialog-art=""></div>
      <div class="dialog-copy">
        <p class="eyebrow" data-dialog-category=""></p>
        <h2 id="dialog-title" data-dialog-title=""></h2>
        <p data-dialog-description=""></p>
        <strong data-dialog-price=""></strong>
        <button type="button" id="dialog-add-to-bag" data-add="" class="button-primary-dark" style="width: 100%; margin-top: 1.5rem; padding: 0.8rem;">ADD TO BAG</button>
      </div>
    </dialog>
    <div class="toast" role="status" aria-live="polite" data-toast=""></div>

    <nav class="mobile-bottom-nav">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mb-nav-item" aria-label="Home">
        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
      </a>
      <button type="button" class="mb-nav-item" onclick="document.querySelector('[data-search]') &amp;&amp; document.querySelector('[data-search]').focus()" aria-label="Search">
        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </button>
      <button type="button" class="mb-nav-item mb-nav-text" onclick="toggleNav(true)">MENU</button>
      <button type="button" class="mb-nav-item" aria-label="Profile" onclick="alert('User Profile Coming Soon')">
        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
      </button>
      <button type="button" class="mb-nav-item" data-bag="" aria-label="Bag" onclick="openDrawer()">
        <div style="position:relative;">
          <svg viewBox="0 0 24 24" stroke="currentColor" fill="none"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
          <span class="mb-bag-badge" data-bag-count="">0</span>
        </div>
      </button>
    </nav>

<?php wp_footer(); ?>
</body>
</html>
