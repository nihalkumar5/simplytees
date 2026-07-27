
// Water Fill Brand Preloader Animation
(function initWaterFillPreloader() {
  const preloader = document.getElementById('preloader');
  const countEl = document.getElementById('loader-count');
  const fillEl = document.getElementById('water-fill-el');

  if (!preloader) return;

  let count = 0;
  const interval = setInterval(() => {
    count += Math.floor(Math.random() * 7) + 3;
    if (count >= 100) {
      count = 100;
      clearInterval(interval);
      if (countEl) countEl.textContent = '100%';
      if (fillEl) fillEl.style.height = '100%';
      
      setTimeout(() => {
        preloader.classList.add('fade-out');
        setTimeout(() => {
          preloader.style.display = 'none';
        }, 600);
      }, 300);
    } else {
      if (countEl) countEl.textContent = count + '%';
      if (fillEl) fillEl.style.height = count + '%';
    }
  }, 35);
})();

const subcategoryMap = {
  'All objects': ['All'],
  'New Products': ['All', 'T-Shirts', 'Hoodies', 'Accessories'],
  'T-Shirts': ['All', 'Classic Crew', 'Oversized', 'Baby Tee & Crop', 'Polo & V-Neck', 'Supima & Stretch', 'Acid Wash & Tie Dye'],
  'Hoodies & Jackets': ['All', 'Pullover Hoodies', 'Zip Hoodies', 'Sweatshirts', 'Bomber Jackets', 'Varsity Jackets'],
  'AOP Apparel': ['All', 'AOP T-Shirts', 'AOP Tops & Dresses', 'AOP Bottoms', 'AOP Jackets & Sweats'],
  'Bottomwear': ['All', 'Sweatpants & Joggers', 'Shorts', 'Skirts', 'Leggings'],
  'Kids Clothing': ['All', 'Boys T-Shirts', 'Girls T-Shirts', 'Hoodies & Sweats', 'Rompers', 'Sports Gear'],
  'Headwear': ['All', 'Caps & Hats', 'Balaclavas & Bandanas', 'Headbands'],
  'Drinkware': ['All', 'Coffee Mugs', 'Enamel Mugs', 'Water Bottles', 'Tumblers'],
  'Accessories': ['All', 'Phone Cases & Grips', 'Jewelry & Pendants', 'Keychains & Badges', 'Scrunchies & Sleeves', 'Stationery & Patches'],
  'Home & Living': ['All', 'Posters & Frames', 'Coasters & Magnets', 'Cushions & Pillows', 'Table & Kitchen'],
  'Pet-Wear': ['All', 'Dog T-Shirts', 'Pet Tags'],
  'Bags': ['All', 'Tote Bags', 'Drawstring Bags', 'Pouches']
};

let products = [];

const categories = ['All objects', 'New Products', 'T-Shirts', 'Hoodies & Jackets', 'AOP Apparel', 'Bottomwear', 'Kids Clothing', 'Headwear', 'Drinkware', 'Accessories', 'Home & Living', 'Pet-Wear', 'Bags'];
const filename = window.location.pathname.split('/').pop();
let initialCategory = 'All objects';
const mapping = {
  'apparel.html': 'Apparel',
  'living.html': 'Home & Living',
  'men.html': 'Men',
  'women.html': 'Women',
  'men-upperwear.html': 'Men Upper Wear',
  'men-bottomwear.html': 'Men Bottomwear',
  'women-upperwear.html': 'Women Upper Wear',
  'women-bottomwear.html': 'Women Bottomwear',
  'new-products.html': 'New Products',
  't-shirts.html': 'T-Shirts',
  'hoodies-jackets.html': 'Hoodies & Jackets',
  'aop-apparel.html': 'AOP Apparel',
  'bottomwear.html': 'Bottomwear',
  'kids-clothing.html': 'Kids Clothing',
  'headwear.html': 'Headwear',
  'drinkware.html': 'Drinkware',
  'accessories.html': 'Accessories',
  'home-living.html': 'Home & Living',
  'pet-wear.html': 'Pet-Wear',
  'bags.html': 'Bags'
};
if (mapping[filename]) { initialCategory = mapping[filename]; }
const urlParams = new URLSearchParams(window.location.search);
const initialSubcategory = urlParams.get('filter') || 'All';
const state = {
  category: initialCategory, subcategory: initialSubcategory, query: '',
  sortBy: 'default', cart: JSON.parse(localStorage.getItem('asterra-cart') || '[]'),
  wishlist: JSON.parse(localStorage.getItem('asterra-wishlist') || '[]')
};
const $ = (selector) => document.querySelector(selector);
const money = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });
const productGrid = $('[data-products]');
const cartDrawer = $('[data-drawer]');
const overlay = $('[data-overlay]');
const dialog = $('[data-product-dialog]');
let activeProduct;
let toastTimer;

function showToast(message) { const toast = $('[data-toast]'); toast.textContent = message; toast.classList.add('is-visible'); clearTimeout(toastTimer); toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 2800); }
function visibleProducts() {
  const isWishlistPage = window.location.pathname.includes('wishlist.html');
  let filtered = products.filter((product) => {
    const categoryMatch = state.category === 'All objects' || product.category === state.category;
    const subcategoryMatch = state.subcategory === 'All' || product.subcategory === state.subcategory;
    const queryMatch = product.name.toLowerCase().includes(state.query.toLowerCase());
    return categoryMatch && subcategoryMatch && queryMatch;
  });
  if (state.sortBy === 'price-low') {
    filtered.sort((a, b) => a.price - b.price);
  } else if (state.sortBy === 'price-high') {
    filtered.sort((a, b) => b.price - a.price);
  } else if (state.sortBy === 'newest') {
    filtered.sort((a, b) => parseInt(b.id) - parseInt(a.id));
  }
  if (isWishlistPage) { return filtered.filter(p => state.wishlist.includes(p.id)); }
  return filtered;
}
function productCard(product) {
  const origPrice = product.price + 300;
  return `<article class="product" style="display: flex; flex-direction: column; height: 100%;">
    <div class="product-image-container" onclick="window.location.href='product-detail.html?id=${product.id}'" style="cursor: pointer; position: relative; overflow: hidden; padding-top: 125%; background: #f7f7f7;">
      <div class="heart-icon" data-wishlist-btn="${product.id}" onclick="toggleProductWishlist('${product.id}', event)" style="position: absolute; top: 10px; right: 10px; z-index: 2; color: #111; font-size: 1.4rem; cursor: pointer;">${state.wishlist.includes(product.id) ? '&#9829;' : '&#9825;'}</div>
      <img src="${product.img || 'tshirt_black.png'}" alt="${product.name}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
    </div>
    <div class="product-meta" style="text-align: center; display: flex; flex-direction: column; flex: 1; justify-content: space-between; padding-top: 1rem;">
      <div style="flex: 1;">
        <p class="category-label">${product.category}</p>
        <h3 onclick="window.location.href='product-detail.html?id=${product.id}'" style="cursor: pointer;">${product.name}</h3>
      </div>
      <div style="margin-top: auto;">
        <div class="price-row" style="margin-bottom: 1rem; display: flex; justify-content: center; align-items: center;">
          <span class="current-price">${money.format(product.price)}</span>
          <span class="original-price" style="text-decoration: line-through; color: #999; margin-left: 0.5rem;"><del>${money.format(origPrice)}</del></span>
        </div>
        <button class="add-button full-width-add" type="button" data-view="${product.id}" aria-label="Add ${product.name} to bag">
          ADD TO BAG
        </button>
      </div>
  </article>`;
}
function renderFilters() {
  const filtersEl = document.querySelector('[data-filters]');
  if (filtersEl) {
    const subs = subcategoryMap[state.category] || ['All'];
    filtersEl.innerHTML = subs.map((sub, index) => {
      const isActive = state.subcategory === sub ? 'is-active' : '';

      let imgUrl = 'tshirt_black.png';
      if (index === 1) imgUrl = 'tshirt_white.png';
      if (index === 2) imgUrl = 'tshirt_olive.png';
      if (index === 3) imgUrl = 'tshirt_beige.png';

      const innerContent = sub === 'All'
        ? `<span class="inner-text">ALL</span>`
        : `<div class="inner-image" style="background-image: url('${imgUrl}'); background-size: cover; background-position: center;"></div>`;

      return `<button type="button" data-subfilter="${sub}" class="circular-filter ${isActive}">
        <div class="circle-icon ${sub === 'All' ? 'bg-solid-green' : 'bg-gray'}">
          ${innerContent}
        </div>
        <span class="outer-text">${sub}</span>
      </button>`;
    }).join('');
  }

  const titleEl = document.querySelector('[data-dynamic-title]');
  if (titleEl) {
    titleEl.textContent = (state.category === 'All objects' ? 'ALL PRODUCTS' : state.category).toUpperCase();
  }
  const modelEl = document.querySelector('[data-dynamic-model]');
  if (modelEl) {
    const currentView = state.subcategory === 'All' ? (state.category === 'All objects' ? 'Our Collection' : state.category) : state.subcategory;
    modelEl.textContent = 'Explore ' + currentView;
  }
}
function renderProducts() { if (!productGrid) return; const result = visibleProducts(); productGrid.innerHTML = result.map(productCard).join(''); if ($('[data-results]')) $('[data-results]').textContent = `${result.length} object${result.length === 1 ? '' : 's'} in view`; if ($('[data-empty]')) $('[data-empty]').hidden = result.length > 0; }
function saveCart() { localStorage.setItem('asterra-cart', JSON.stringify(state.cart)); }
function updateBagCount() { const total = state.cart.reduce((sum, item) => sum + item.quantity, 0); document.querySelectorAll('[data-bag-count]').forEach(el => el.textContent = String(total).padStart(2, '0')); document.querySelectorAll('[data-bag]').forEach(el => el.setAttribute('aria-label', `Shopping bag, ${total} item${total === 1 ? '' : 's'}`)); }
function renderCart() {
  const items = state.cart.map((item) => ({ ...item, product: products.find((product) => product.id === item.id) })).filter((item) => item.product);
  const subtotal = items.reduce((sum, item) => sum + item.product.price * item.quantity, 0);

  const bagTitle = document.getElementById('bagTitle');
  if (bagTitle) bagTitle.textContent = `BAG ( ${items.length} )`;

  const threshold = 1999;
  const progressContainer = document.getElementById('shippingProgressContainer');
  if (progressContainer) {
    if (subtotal >= threshold) {
      progressContainer.innerHTML = `
        <div class="shipping-progress">
          <div class="shipping-progress-text">CONGRATULATIONS! YOU GET FREE SHIPPING</div>
          <div class="shipping-progress-bar"><div class="shipping-progress-fill" style="width: 100%;"></div></div>
        </div>`;
    } else {
      const remaining = threshold - subtotal;
      const pct = Math.min((subtotal / threshold) * 100, 100);
      progressContainer.innerHTML = `
        <div class="shipping-progress">
          <div class="shipping-progress-text">SHOP FOR <strong>${money.format(remaining)}</strong> TO GET FREE SHIPPING</div>
          <div class="shipping-progress-bar">
            <div class="shipping-progress-fill" style="width: ${pct}%;"></div>
            <div class="shipping-progress-steps">
              <div class="shipping-progress-step active" style="left: 0%;"></div>
              <div class="shipping-progress-step ${subtotal >= 1999 ? 'active' : ''}" style="left: 100%;"></div>
            </div>
          </div>
          <div class="shipping-progress-labels">
            <span style="position: absolute; left: 0%; transform: translateX(0%);">₹0</span>
            <span style="position: absolute; left: 100%; transform: translateX(-100%);">₹1999</span>
          </div>
        </div>`;
    }
  }

  const recommendationsHTML = `
    <div class="bag-recommendations">
      <div class="bag-recommendations-title">YOU MAY ALSO LIKE</div>
      <div class="bag-recommendations-scroll">
        ${products.slice(0, 4).map(p => `
          <div class="bag-recommendation-card">
            <div class="bag-recommendation-img">
              <img src="${p.img || 'tshirt_black.png'}" alt="${p.name}" />
            </div>
            <div class="bag-recommendation-info">
              <div class="bag-recommendation-title">${p.name}</div>
              <div class="bag-recommendation-price">${money.format(p.price)}</div>
              ${p.sizes && p.sizes.length > 0 ? `
              <select class="bag-recommendation-size" id="rec-size-${p.id}">
                ${p.sizes.map(s => `<option value="${s}">${s}</option>`).join('')}
              </select>
              ` : ''}
            </div>
            <button class="bag-recommendation-btn" onclick="addToCart('${p.id}', document.getElementById('rec-size-${p.id}') ? document.getElementById('rec-size-${p.id}').value : 'One size'); return false;">ADD TO BAG</button>
          </div>
        `).join('')}
      </div>
    </div>

  `;

  $('[data-cart-items]').innerHTML = items.map(({ product, quantity, size }) => `
    <div class="premium-cart-item">
      <div class="premium-cart-img">
        <img src="${product.img || 'tshirt_black.png'}" alt="${product.name}" />
      </div>
      <div class="premium-cart-details">
        <div class="premium-cart-title-row">
          <div class="premium-cart-title">${product.name}</div>
          <div class="premium-cart-price">${money.format(product.price * quantity)}</div>
        </div>
        <div class="premium-cart-size">SIZE : 
          <select class="premium-cart-size-select" onchange="updateCartItemSize('${product.id}', '${size}', this.value)">
            ${['XS-36', 'S-38', 'M-40', 'L-42', 'XL-44', 'XXL-46', 'One size'].filter(s => s === 'One size' ? size === 'One size' : size !== 'One size').map(s => 
              `<option value="${s}" ${s === size ? 'selected' : ''}>${s}</option>`
            ).join('')}
          </select>
        </div>
        <div class="premium-cart-controls">
          <div class="premium-cart-quantity">
            <button type="button" data-quantity="${product.id}" data-delta="-1">&#8722;</button>
            <span>${quantity}</span>
            <button type="button" data-quantity="${product.id}" data-delta="1">+</button>
          </div>
        </div>
        <button type="button" class="premium-cart-remove" data-remove="${product.id}" onclick="removeFromCart('${product.id}', '${size}')">✕</button>
      </div>
    </div>`).join('') + recommendationsHTML;

  const checkoutBtn = document.getElementById('checkoutBtn');
  const finalTotal = Math.max(0, subtotal - (window._appliedCouponDiscount || 0));
  if (checkoutBtn) checkoutBtn.textContent = `CHECKOUT / ${money.format(finalTotal)}`;
  
  const couponDisplays = document.querySelectorAll('#couponDisplay');
  couponDisplays.forEach(el => {
    if (window._appliedCouponCode) {
      el.textContent = `Coupon Applied: ${window._appliedCouponCode}`;
    } else {
      el.textContent = 'Apply Coupons';
    }
  });
  $('[data-cart-empty]').hidden = items.length > 0;
  $('[data-cart-footer]').hidden = items.length === 0;
  updateBagCount();
  saveCart();
}

window.removeFromCart = function (id, size) {
  state.cart = state.cart.filter(item => !(item.id === id && item.size === size));
  renderCart();
};
window.updateCartItemSize = function(id, oldSize, newSize) {
  if (oldSize === newSize) return;
  const oldItemIndex = state.cart.findIndex(i => i.id === id && i.size === oldSize);
  if (oldItemIndex !== -1) {
    const oldQuantity = state.cart[oldItemIndex].quantity;
    state.cart.splice(oldItemIndex, 1);
    const existingItem = state.cart.find(i => i.id === id && i.size === newSize);
    if (existingItem) {
      existingItem.quantity += oldQuantity;
    } else {
      state.cart.push({ id, size: newSize, quantity: oldQuantity });
    }
    renderCart();
  }
};
function addToCart(id, size = 'One size') { const item = state.cart.find((cartItem) => cartItem.id === id && cartItem.size === size); if (item) item.quantity += 1; else state.cart.push({ id, size, quantity: 1 }); renderCart(); showToast(`${products.find((product) => product.id === id).name} added to bag`); }
function openDrawer() { cartDrawer.classList.add('is-open'); overlay.classList.add('is-open'); cartDrawer.setAttribute('aria-hidden', 'false'); }
function closeDrawer() { cartDrawer.classList.remove('is-open'); overlay.classList.remove('is-open'); cartDrawer.setAttribute('aria-hidden', 'true'); }
function openFilterDrawer() { const fd = document.querySelector('[data-filter-drawer]'); if (fd) { fd.classList.add('is-open'); overlay.classList.add('is-open'); fd.setAttribute('aria-hidden', 'false'); } }
function closeFilterDrawer() { const fd = document.querySelector('[data-filter-drawer]'); if (fd) { fd.classList.remove('is-open'); overlay.classList.remove('is-open'); fd.setAttribute('aria-hidden', 'true'); } }
function toggleFilterDrawer() { const fd = document.querySelector('[data-filter-drawer]'); if (fd && fd.classList.contains('is-open')) closeFilterDrawer(); else openFilterDrawer(); }
function openProduct(id) { activeProduct = products.find((product) => product.id === id); const dialogArt = $('[data-dialog-art]'); if (dialogArt) { dialogArt.className = 'dialog-art'; dialogArt.style.background = '#f7f7f7'; dialogArt.style.overflow = 'hidden'; dialogArt.innerHTML = `<img src="${activeProduct.img || 'tshirt_black.png'}" alt="${activeProduct.name}" style="width:100%; height:100%; object-fit:cover;" />`; } $('[data-dialog-category]').textContent = activeProduct.category; $('[data-dialog-title]').textContent = activeProduct.name; $('[data-dialog-description]').textContent = activeProduct.description; $('[data-dialog-price]').textContent = money.format(activeProduct.price); $('[data-dialog-size]').innerHTML = activeProduct.sizes.map((size) => `<option>${size}</option>`).join(''); const addBtn = document.getElementById('dialog-add-to-bag'); if (addBtn) addBtn.dataset.add = id; dialog.showModal(); }

// Handles main category clicks from menu/header
function setCategory(category) {
  const target = mapping[category] || 'products.html';
  if (window.location.pathname.endsWith(target)) {
    state.category = category;
    state.subcategory = 'All'; // Reset subcategory when changing main category
    state.query = '';
    const searchEl = document.querySelector('[data-search]'); if (searchEl) searchEl.value = '';
    renderFilters(); renderProducts();
    const nav = document.querySelector('.nav');
    if (nav) nav.classList.remove('is-open');
    const menuBtn = document.querySelector('[data-menu]');
    if (menuBtn) menuBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('menu-open');
    if (document.querySelector('#shop')) { document.querySelector('#shop').scrollIntoView({ behavior: 'smooth', block: 'start' }); }
  } else {
    window.location.href = target;
  }
}

// Handles subcategory clicks from circular filters
function setSubcategory(sub) {
  state.subcategory = sub;
  renderFilters();
  renderProducts();
}

document.addEventListener('click', (event) => {
  const filter = event.target.closest('[data-filter]'); if (filter) setCategory(filter.dataset.filter);
  const subfilter = event.target.closest('[data-subfilter]'); if (subfilter) setSubcategory(subfilter.dataset.subfilter);
  const add = event.target.closest('[data-add]'); if (add) { if (window.innerWidth <= 768 && add.id !== 'sizeSheetConfirm') { window._sheetProductId = add.dataset.add; openGlobalSizeSheet(); } else { let size = 'One size'; if (add.id === 'dialog-add-to-bag') { const sizeSelect = document.getElementById('product-size'); if (sizeSelect) size = sizeSelect.value; dialog.close(); } addToCart(add.dataset.add, size); } }
  const view = event.target.closest('[data-view]'); if (view) { if (window.innerWidth <= 768) { window._sheetProductId = view.dataset.view; openGlobalSizeSheet(); } else { openProduct(view.dataset.view); } }
  const quantity = event.target.closest('[data-quantity]'); if (quantity) { const item = state.cart.find((cartItem) => cartItem.id === quantity.dataset.quantity); item.quantity += Number(quantity.dataset.delta); if (item.quantity < 1) state.cart = state.cart.filter((cartItem) => cartItem !== item); renderCart(); }
  const filterToggle = event.target.closest('[data-filter-toggle]'); if (filterToggle) openFilterDrawer();
  const closeFilter = event.target.closest('[data-close-filter]'); if (closeFilter) closeFilterDrawer();
  const applyFilter = event.target.closest('[data-apply-filters]'); if (applyFilter) { showToast('Filters applied successfully'); closeFilterDrawer(); }
  if (event.target.closest('[data-close-drawer]') || event.target === overlay) { closeDrawer(); closeFilterDrawer(); }
});
document.querySelectorAll('[data-bag]').forEach(btn => btn.addEventListener('click', openDrawer));
$('[data-close-dialog]')?.addEventListener('click', () => dialog.close());
$('[data-checkout]')?.addEventListener('click', () => showToast('Checkout will connect to your WordPress store.'));
$('[data-search]')?.addEventListener('input', (event) => { state.query = event.target.value.trim(); renderProducts(); });
$('[data-reset]')?.addEventListener('click', () => setCategory('All objects'));

/* ── Global Size Bottom Sheet (Listing Pages) ── */
function openGlobalSizeSheet() {
  const sheet = document.getElementById('sizeSheet');
  const overlay = document.getElementById('sizeSheetOverlay');
  if (!sheet || !overlay) return;
  // Reset selection
  document.querySelectorAll('#sizeSheetGrid .size-sheet-btn').forEach(b => b.classList.remove('selected'));
  window._sheetSelectedSize = '';
  sheet.classList.add('is-open');
  overlay.classList.add('is-visible');
  document.body.style.overflow = 'hidden';
}
function closeGlobalSizeSheet() {
  const sheet = document.getElementById('sizeSheet');
  const overlay = document.getElementById('sizeSheetOverlay');
  if (sheet) sheet.classList.remove('is-open');
  if (overlay) overlay.classList.remove('is-visible');
  document.body.style.overflow = '';
}

// Size list clicks (Auto-add and close)
document.addEventListener('click', (e) => {
  const sizeBtn = e.target.closest('#sizeSheetGrid .size-sheet-btn');
  if (sizeBtn) {
    document.querySelectorAll('#sizeSheetGrid .size-sheet-btn').forEach(b => b.classList.remove('selected'));
    sizeBtn.classList.add('selected');
    window._sheetSelectedSize = sizeBtn.dataset.size;

    // Auto add and close
    closeGlobalSizeSheet();
    if (window._sheetProductId) {
      if (window._oldSize) {
        const oldItemIndex = state.cart.findIndex(i => i.id === window._sheetProductId && i.size === window._oldSize);
        if (oldItemIndex !== -1) {
          const oldQuantity = state.cart[oldItemIndex].quantity;
          state.cart.splice(oldItemIndex, 1);
          const existingItem = state.cart.find(i => i.id === window._sheetProductId && i.size === window._sheetSelectedSize);
          if (existingItem) {
            existingItem.quantity += oldQuantity;
          } else {
            state.cart.push({ id: window._sheetProductId, size: window._sheetSelectedSize, quantity: oldQuantity });
          }
        }
        window._oldSize = null;
        renderCart();
        showToast(`Size updated to ${window._sheetSelectedSize}`);
      } else {
        addToCart(window._sheetProductId, window._sheetSelectedSize);
      }
      openDrawer();
    }
  }
});

// Close sheet
document.getElementById('sizeSheetClose')?.addEventListener('click', closeGlobalSizeSheet);
document.getElementById('sizeSheetOverlay')?.addEventListener('click', closeGlobalSizeSheet);

function toggleNav(openState) {
  const menu = document.querySelector('.nav');
  const menuBtn = document.querySelector('[data-menu]');
  if (!menu) return;

  const shouldOpen = (typeof openState === 'boolean') ? openState : !menu.classList.contains('is-open');
  menu.classList.toggle('is-open', shouldOpen);
  document.body.classList.toggle('menu-open', shouldOpen);

  if (menuBtn) {
    menuBtn.setAttribute('aria-expanded', shouldOpen);
  }
}

$('[data-menu]')?.addEventListener('click', (event) => {
  toggleNav();
});
$('[data-signup]')?.addEventListener('submit', (event) => { event.preventDefault(); const email = event.currentTarget.email; const message = event.currentTarget.querySelector('.form-message'); if (!email.validity.valid) { message.textContent = 'Enter a valid email address to stay close.'; email.focus(); return; } message.textContent = 'You are on the list. We will write when there is something worth seeing.'; event.currentTarget.reset(); });
renderFilters(); renderProducts(); renderCart();

// Sticky Shrinking Header
const header = document.querySelector('.site-header');
if (header) {
  let isScrolling = false;
  window.addEventListener('scroll', () => {
    if (!isScrolling) {
      window.requestAnimationFrame(() => {
        if (window.scrollY > 25) {
          header.classList.add('is-scrolled');
        } else {
          header.classList.remove('is-scrolled');
        }
        isScrolling = false;
      });
      isScrolling = true;
    }
  }, { passive: true });
}
// Sort Popup Logic
function toggleSortPopup(event, btn) {
  event.stopPropagation();
  const popup = btn.nextElementSibling;

  // Close all other popups
  document.querySelectorAll('.sort-popup').forEach(p => {
    if (p !== popup) p.style.display = 'none';
  });

  if (popup.style.display === 'flex') {
    popup.style.display = 'none';
  } else {
    popup.style.display = 'flex';
  }
}

function applySortPopup(applyBtn) {
  const popup = applyBtn.closest('.sort-popup');
  const selected = popup.querySelector('input[name="sort"]:checked');
  if (selected) {
    state.sortBy = selected.value;

    // Sync the other popups' radio buttons so they match
    document.querySelectorAll(`input[name="sort"][value="${selected.value}"]`).forEach(radio => {
      radio.checked = true;
    });

    renderProducts();
    popup.style.display = 'none';
  }
}

// Close popup when clicking outside
document.addEventListener('click', () => {
  document.querySelectorAll('.sort-popup').forEach(p => p.style.display = 'none');
});

function toggleSortDrawer() {
  const drawer = document.getElementById('sort-drawer');
  const backdrop = document.querySelector('.sort-backdrop');
  if (drawer && backdrop) {
    if (drawer.classList.contains('is-open')) {
      drawer.classList.remove('is-open');
      backdrop.classList.remove('is-visible');
    } else {
      drawer.classList.add('is-open');
      backdrop.classList.add('is-visible');
    }
  }
}

function applySortDrawer(sortValue, element) {
  state.sortBy = sortValue;
  renderProducts();

  // Update active states
  document.querySelectorAll('.sort-drawer-item').forEach(el => el.classList.remove('active'));
  if (element) element.classList.add('active');

  toggleSortDrawer();
}

function switchFilterCategory(category, element) {
  // Update sidebar active state
  document.querySelectorAll('.filter-sidebar-item').forEach(el => el.classList.remove('active'));
  if (element) element.classList.add('active');

  // Show corresponding pane
  document.querySelectorAll('.filter-pane-group').forEach(el => el.classList.remove('active'));
  const pane = document.getElementById('filter-group-' + category);
  if (pane) pane.classList.add('active');
}

function clearAllFilters() {
  document.querySelectorAll('.filter-content-pane input[type="checkbox"]').forEach(cb => cb.checked = false);
}

/* Rare Rabbit Style Mobile Menu Accordion Data (Desktop Subcategories 1:1) */
var rareMenuData = {
  apparel: {
    banner: 'assets/menu_banner_apparel.png',
    groups: [
      {
        title: 'T-SHIRTS',
        url: 't-shirts.html',
        subs: [
          { text: 'Classic Crew', url: 't-shirts.html?filter=Classic%20Crew' },
          { text: 'Oversized', url: 't-shirts.html?filter=Oversized' },
          { text: 'Baby Tee & Crop', url: 't-shirts.html?filter=Baby%20Tee%20%26%20Crop' },
          { text: 'Polo & V-Neck', url: 't-shirts.html?filter=Polo%20%26%20V-Neck' },
          { text: 'Supima & Stretch', url: 't-shirts.html?filter=Supima%20%26%20Stretch' },
          { text: 'Acid Wash & Tie Dye', url: 't-shirts.html?filter=Acid%20Wash%20%26%20Tie%20Dye' }
        ]
      },
      {
        title: 'HOODIES & JACKETS',
        url: 'hoodies-jackets.html',
        subs: [
          { text: 'Pullover Hoodies', url: 'hoodies-jackets.html?filter=Pullover%20Hoodies' },
          { text: 'Zip Hoodies', url: 'hoodies-jackets.html?filter=Zip%20Hoodies' },
          { text: 'Sweatshirts', url: 'hoodies-jackets.html?filter=Sweatshirts' },
          { text: 'Bomber Jackets', url: 'hoodies-jackets.html?filter=Bomber%20Jackets' },
          { text: 'Varsity Jackets', url: 'hoodies-jackets.html?filter=Varsity%20Jackets' }
        ]
      },
      {
        title: 'BOTTOMWEAR',
        url: 'bottomwear.html',
        subs: [
          { text: 'Sweatpants & Joggers', url: 'bottomwear.html?filter=Sweatpants%20%26%20Joggers' },
          { text: 'Shorts', url: 'bottomwear.html?filter=Shorts' },
          { text: 'Skirts', url: 'bottomwear.html?filter=Skirts' },
          { text: 'Leggings', url: 'bottomwear.html?filter=Leggings' }
        ]
      },
      {
        title: 'AOP APPAREL',
        url: 'aop-apparel.html',
        subs: [
          { text: 'AOP T-Shirts', url: 'aop-apparel.html?filter=AOP%20T-Shirts' },
          { text: 'AOP Tops & Dresses', url: 'aop-apparel.html?filter=AOP%20Tops%20%26%20Dresses' },
          { text: 'AOP Bottoms', url: 'aop-apparel.html?filter=AOP%20Bottoms' },
          { text: 'AOP Jackets & Sweats', url: 'aop-apparel.html?filter=AOP%20Jackets%20%26%20Sweats' }
        ]
      }
    ]
  },
  kids: {
    banner: 'assets/asterra-hero.png',
    groups: [
      {
        title: 'KIDS CLOTHING',
        url: 'kids-clothing.html',
        subs: [
          { text: 'Boys T-Shirts', url: 'kids-clothing.html?filter=Boys%20T-Shirts' },
          { text: 'Girls T-Shirts', url: 'kids-clothing.html?filter=Girls%20T-Shirts' },
          { text: 'Hoodies & Sweats', url: 'kids-clothing.html?filter=Hoodies%20%26%20Sweats' },
          { text: 'Rompers', url: 'kids-clothing.html?filter=Rompers' },
          { text: 'Sports Gear', url: 'kids-clothing.html?filter=Sports%20Gear' }
        ]
      }
    ]
  },
  accessories: {
    banner: 'assets/menu_banner_accessories.png',
    groups: [
      {
        title: 'HEADWEAR',
        url: 'headwear.html',
        subs: [
          { text: 'Caps & Hats', url: 'headwear.html?filter=Caps%20%26%20Hats' },
          { text: 'Balaclavas & Bandanas', url: 'headwear.html?filter=Balaclavas%20%26%20Bandanas' },
          { text: 'Headbands', url: 'headwear.html?filter=Headbands' }
        ]
      },
      {
        title: 'BAGS',
        url: 'bags.html',
        subs: [
          { text: 'Tote Bags', url: 'bags.html?filter=Tote%20Bags' },
          { text: 'Drawstring Bags', url: 'bags.html?filter=Drawstring%20Bags' },
          { text: 'Pouches', url: 'bags.html?filter=Pouches' }
        ]
      },
      {
        title: 'DRINKWARE',
        url: 'drinkware.html',
        subs: [
          { text: 'Coffee Mugs', url: 'drinkware.html?filter=Coffee%20Mugs' },
          { text: 'Enamel Mugs', url: 'drinkware.html?filter=Enamel%20Mugs' },
          { text: 'Water Bottles', url: 'drinkware.html?filter=Water%20Bottles' },
          { text: 'Tumblers', url: 'drinkware.html?filter=Tumblers' }
        ]
      },
      {
        title: 'ACCESSORIES',
        url: 'accessories.html',
        subs: [
          { text: 'Phone Cases & Grips', url: 'accessories.html?filter=Phone%20Cases%20%26%20Grips' },
          { text: 'Jewelry & Pendants', url: 'accessories.html?filter=Jewelry%20%26%20Pendants' },
          { text: 'Keychains & Badges', url: 'accessories.html?filter=Keychains%20%26%20Badges' },
          { text: 'Scrunchies & Sleeves', url: 'accessories.html?filter=Scrunchies%20%26%20Sleeves' },
          { text: 'Stationery & Patches', url: 'accessories.html?filter=Stationery%20%26%20Patches' }
        ]
      }
    ]
  },
  living: {
    banner: 'tshirt_olive.png',
    groups: [
      {
        title: 'HOME & DECOR',
        url: 'home-living.html',
        subs: [
          { text: 'Posters & Frames', url: 'home-living.html?filter=Posters%20%26%20Frames' },
          { text: 'Coasters & Magnets', url: 'home-living.html?filter=Coasters%20%26%20Magnets' },
          { text: 'Cushions & Pillows', url: 'home-living.html?filter=Cushions%20%26%20Pillows' },
          { text: 'Table & Kitchen', url: 'home-living.html?filter=Table%20%26%20Kitchen' }
        ]
      }
    ]
  },
  petwear: {
    banner: 'tshirt_moss.png',
    groups: [
      {
        title: 'PET-WEAR',
        url: 'pet-wear.html',
        subs: [
          { text: 'Dog T-Shirts', url: 'pet-wear.html?filter=Dog%20T-Shirts' },
          { text: 'Pet Tags', url: 'pet-wear.html?filter=Pet%20Tags' }
        ]
      }
    ]
  },
  new: {
    banner: 'tshirt_green.png',
    groups: [
      {
        title: 'NEW ARRIVALS',
        url: 'new-products.html',
        subs: []
      }
    ]
  }
};

function toggleRareAccordion(element) {
  const group = element.closest('.rare-accordion-group');
  if (group) {
    group.classList.toggle('is-open');
  }
}

function switchRareTab(tabKey) {
  const data = rareMenuData[tabKey];
  if (!data) return;

  // Update tabs active state
  document.querySelectorAll('.rare-menu-tab').forEach(tab => {
    if (tab.getAttribute('data-rare-tab') === tabKey) {
      tab.classList.add('is-active');
    } else {
      tab.classList.remove('is-active');
    }
  });

  // Update banner image
  const img = document.getElementById('rare-menu-banner-img');
  if (img && data.banner) img.src = data.banner;

  // Update list items with accordion subcategories
  const container = document.getElementById('rare-menu-list-container');
  if (container) {
    container.innerHTML = data.groups.map(group => `
      <div class="rare-accordion-group ${group.subs.length > 0 ? 'is-open' : ''}">
        <div class="rare-accordion-header" onclick="toggleRareAccordion(this)">
          <span style="font-weight: 700;">${group.title}</span>
          ${group.subs.length > 0 ? '<span class="chevron">›</span>' : ''}
        </div>
        ${group.subs.length > 0 ? `
          <div class="rare-sub-list">
            <a href="${group.url}" class="rare-sub-item" style="font-weight: 700; color: #121311 !important;">→ View All ${group.title}</a>
            ${group.subs.map(sub => `<a href="${sub.url}" class="rare-sub-item">• ${sub.text}</a>`).join('')}
          </div>
        ` : `<div class="rare-sub-list" style="display:flex;"><a href="${group.url}" class="rare-sub-item" style="font-weight: 700; color: #121311 !important;">→ View All ${group.title}</a></div>`}
      </div>
    `).join('');
  }
}

window._appliedCouponDiscount = 0;
window._appliedCouponCode = null;

window.toggleCouponInput = function() {
  if (window._appliedCouponCode) {
    if (confirm(`Coupon ${window._appliedCouponCode} is already applied. Do you want to remove it?`)) {
      window._appliedCouponCode = null;
      window._appliedCouponDiscount = 0;
      renderCart();
      showToast("Coupon removed");
    }
    return;
  }
  document.querySelectorAll('#couponInputContainer').forEach(el => {
    if (el.style.display === 'none' || el.style.display === '') {
      el.style.display = 'block';
    } else {
      el.style.display = 'none';
    }
  });
};

window.applyCouponInput = function() {
  const inputs = document.querySelectorAll('.coupon-input-field');
  let code = '';
  inputs.forEach(input => {
    if (input.value) code = input.value.toUpperCase().trim();
  });
  
  if (!code) return;

  if (code === 'FREE50') {
    window._appliedCouponCode = code;
    window._appliedCouponDiscount = 50;
    showToast("Coupon Applied! ₹50 OFF");
    document.querySelectorAll('#couponInputContainer').forEach(el => el.style.display = 'none');
    inputs.forEach(input => input.value = '');
  } else if (code === 'SAVE100') {
    window._appliedCouponCode = code;
    window._appliedCouponDiscount = 100;
    showToast("Coupon Applied! ₹100 OFF");
    document.querySelectorAll('#couponInputContainer').forEach(el => el.style.display = 'none');
    inputs.forEach(input => input.value = '');
  } else {
    showToast("Invalid Coupon Code");
  }
  renderCart();
};

window.toggleWishlist = function(el) {
  const isFilled = el.getAttribute('fill') === 'currentColor';
  if (isFilled) {
    el.setAttribute('fill', 'none');
    showToast("Removed from wishlist");
  } else {
    el.setAttribute('fill', 'currentColor');
    showToast("Added to wishlist");
  }
};

window.shareCart = function() {
  if (navigator.share) {
    navigator.share({
      title: 'My Cart',
      url: window.location.href
    }).catch((err) => {
      console.log('Share error', err);
      navigator.clipboard.writeText(window.location.href);
      showToast("Link copied to clipboard!");
    });
  } else {
    navigator.clipboard.writeText(window.location.href);
    showToast("Link copied to clipboard!");
  }
};


function saveWishlist() {
  localStorage.setItem('tshirt_wishlist', JSON.stringify(state.wishlist));
}

window.toggleProductWishlist = function(id, event) {
  if(event) {
    event.preventDefault();
    event.stopPropagation();
  }
  const index = state.wishlist.indexOf(id);
  if (index === -1) {
    state.wishlist.push(id);
    showToast("Added to wishlist");
  } else {
    state.wishlist.splice(index, 1);
    showToast("Removed from wishlist");
  }
  saveWishlist();
  
  // Re-render grid if on wishlist page, else just update the icons visually
  if (window.location.pathname.includes('wishlist.html')) {
    renderProducts();
  } else {
    const btns = document.querySelectorAll(`[data-wishlist-btn="${id}"]`);
    btns.forEach(btn => {
      if (index === -1) {
        // Was added, so make it solid
        btn.innerHTML = '&#9829;'; // Solid heart
      } else {
        // Was removed, make it outline
        btn.innerHTML = '&#9825;'; // Outline heart
      }
    });
  }
};

// --- Headless WordPress WooCommerce Integration via Vercel Serverless Function ---
async function fetchWooCommerceProducts() {
  try {
    let response = await fetch('/api/products');
    if (!response.ok) {
      if (response.status === 404) {
        // Fallback for localhost python server testing
        response = await fetch('/products.json');
        if (!response.ok) {
          throw new Error(`Fallback HTTP error! status: ${response.status}`);
        }
      } else {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
    }
    const fetchedProducts = await response.json();
    
    // Update the global products array so addToCart and visibleProducts work
    products = fetchedProducts;
    
    // Call the existing renderProducts function which handles filtering and layout
    renderProducts();
    
    document.dispatchEvent(new CustomEvent('productsLoaded'));
  } catch (error) {
    console.error('Error fetching WooCommerce products:', error);
    const container = document.querySelector('.product-grid');
    if (container) {
       container.innerHTML = '<p>Error loading products.</p>';
    }
  }
}

// Fetch products when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  // Check if we are on a page that needs products (like index.html)
  if (document.querySelector('.product-grid')) {
     fetchWooCommerceProducts();
  }
});



// NEW ROBUST MOBILE MENU LOGIC
var newMobileMenuData = {
  apparel: {
    banner: 'assets/menu_banner_apparel.png',
    groups: [
      {
        title: 'T-SHIRTS',
        links: [
          { text: '→ VIEW ALL T-SHIRTS', href: 't-shirts.html' },
          { text: 'CLASSIC CREW', href: 't-shirts.html?filter=Classic%20Crew' },
          { text: 'OVERSIZED', href: 't-shirts.html?filter=Oversized' },
          { text: 'BABY TEE & CROP', href: 't-shirts.html?filter=Baby%20Tee%20%26%20Crop' },
          { text: 'POLO & V-NECK', href: 't-shirts.html?filter=Polo%20%26%20V-Neck' },
          { text: 'SUPIMA & STRETCH', href: 't-shirts.html?filter=Supima%20%26%20Stretch' },
          { text: 'ACID WASH & TIE DYE', href: 't-shirts.html?filter=Acid%20Wash%20%26%20Tie%20Dye' }
        ]
      },
      {
        title: 'HOODIES & JACKETS',
        links: [
          { text: '→ VIEW ALL HOODIES & JACKETS', href: 'hoodies-jackets.html' },
          { text: 'PULLOVER HOODIES', href: 'hoodies-jackets.html?filter=Pullover%20Hoodies' },
          { text: 'ZIP-UP HOODIES', href: 'hoodies-jackets.html?filter=Zip-Up%20Hoodies' },
          { text: 'BOMBER JACKETS', href: 'hoodies-jackets.html?filter=Bomber%20Jackets' },
          { text: 'DENIM JACKETS', href: 'hoodies-jackets.html?filter=Denim%20Jackets' },
          { text: 'PUFFER JACKETS', href: 'hoodies-jackets.html?filter=Puffer%20Jackets' },
          { text: 'WINDBREAKERS', href: 'hoodies-jackets.html?filter=Windbreakers' }
        ]
      },
      {
        title: 'BOTTOMWEAR',
        links: [
          { text: '→ VIEW ALL BOTTOMWEAR', href: 'bottomwear.html' },
          { text: 'JOGGERS & SWEATPANTS', href: 'bottomwear.html?filter=Joggers%20%26%20Sweatpants' },
          { text: 'CARGO PANTS', href: 'bottomwear.html?filter=Cargo%20Pants' },
          { text: 'SHORTS', href: 'bottomwear.html?filter=Shorts' },
          { text: 'JEANS', href: 'bottomwear.html?filter=Jeans' },
          { text: 'CHINOS', href: 'bottomwear.html?filter=Chinos' }
        ]
      },
      {
        title: 'AOP APPAREL',
        links: [
          { text: '→ VIEW ALL AOP APPAREL', href: 'aop-apparel.html' },
          { text: 'AOP T-SHIRTS', href: 'aop-apparel.html?filter=AOP%20T-Shirts' },
          { text: 'AOP HOODIES', href: 'aop-apparel.html?filter=AOP%20Hoodies' },
          { text: 'AOP BOTTOMWEAR', href: 'aop-apparel.html?filter=AOP%20Bottomwear' },
          { text: 'AOP SETS', href: 'aop-apparel.html?filter=AOP%20Sets' }
        ]
      }
    ]
  },
  kids: {
    banner: 'assets/menu_banner_kids.png',
    groups: [
      {
        title: 'KIDS CLOTHING',
        links: [
          { text: '→ VIEW ALL KIDS CLOTHING', href: 'kids-clothing.html' },
          { text: 'T-SHIRTS', href: 'kids-clothing.html?filter=T-Shirts' },
          { text: 'HOODIES', href: 'kids-clothing.html?filter=Hoodies' },
          { text: 'BOTTOMWEAR', href: 'kids-clothing.html?filter=Bottomwear' },
          { text: 'SETS', href: 'kids-clothing.html?filter=Sets' }
        ]
      }
    ]
  },
  accessories: {
    banner: 'assets/menu_banner_accessories.png',
    groups: [
      {
        title: 'ACCESSORIES',
        links: [
          { text: '→ VIEW ALL ACCESSORIES', href: 'accessories.html' },
          { text: 'CAPS & HATS', href: 'accessories.html?filter=Caps%20%26%20Hats' },
          { text: 'BAGS & BACKPACKS', href: 'accessories.html?filter=Bags%20%26%20Backpacks' },
          { text: 'SOCKS', href: 'accessories.html?filter=Socks' },
          { text: 'MASKS', href: 'accessories.html?filter=Masks' }
        ]
      }
    ]
  },
  living: {
    banner: 'assets/menu_banner_living.png',
    groups: [
      {
        title: 'LIVING',
        links: [
          { text: '→ VIEW ALL LIVING', href: 'living.html' },
          { text: 'MUGS & DRINKWARE', href: 'drinkware.html' },
          { text: 'NOTEBOOKS', href: 'notebooks.html' },
          { text: 'POSTERS', href: 'posters.html' }
        ]
      }
    ]
  },
  petwear: {
    banner: 'assets/menu_banner_petwear.png',
    groups: [
      {
        title: 'PET-WEAR',
        links: [
          { text: '→ VIEW ALL PET-WEAR', href: 'petwear.html' },
          { text: 'PET T-SHIRTS', href: 'petwear.html?filter=Pet%20T-Shirts' },
          { text: 'PET HOODIES', href: 'petwear.html?filter=Pet%20Hoodies' },
          { text: 'BANDANAS', href: 'petwear.html?filter=Bandanas' }
        ]
      }
    ]
  }
};

window.switchNewMobileTab = function(tabKey) {
  try {
    const data = newMobileMenuData[tabKey];
    if (!data) return;

    // Update active tab styles
    const tabs = document.querySelectorAll('.rare-menu-tab');
    tabs.forEach(tab => tab.classList.remove('is-active'));
    
    const activeTab = document.querySelector(`.rare-menu-tab[data-rare-tab="${tabKey}"]`);
    if (activeTab) activeTab.classList.add('is-active');

    // Build the new HTML content
    const contentHtml = data.groups.map(group => {
      const linksHtml = group.links.map(link => 
        `<li><a href="${link.href}">${link.text}</a></li>`
      ).join('');
      
      return `
        <div class="rare-accordion-item">
          <button type="button" class="rare-accordion-btn" onclick="this.parentElement.classList.toggle('is-open')">
            ${group.title} <span class="icon">+</span>
          </button>
          <div class="rare-accordion-content">
            <ul class="rare-menu-links">
              ${linksHtml}
            </ul>
          </div>
        </div>
      `;
    }).join('');

    // Update the DOM container
    const detailsContainer = document.getElementById('rareMenuDetails');
    if (detailsContainer) {
      detailsContainer.innerHTML = contentHtml;
    }
  } catch (e) {
    console.error("Error in switchNewMobileTab:", e);
  }
};
