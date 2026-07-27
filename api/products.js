export default async function handler(req, res) {
  // Hardcoded for testing since user provided them in populate_wp.py
  // For production, move these to Vercel Environment Variables!
  const WC_STORE_URL = process.env.WC_STORE_URL || "https://lavenderblush-crocodile-478499.hostingersite.com";
  const WC_CONSUMER_KEY = process.env.WC_CONSUMER_KEY || "ck_984874efa25d893a8abb237d7546db37ccd4c91c";
  const WC_CONSUMER_SECRET = process.env.WC_CONSUMER_SECRET || "cs_682ca0991aa7492a91485fdde59eacecbb85fa28";

  const baseUrl = WC_STORE_URL.replace(/\/$/, '');
  const url = new URL(`${baseUrl}/wp-json/wc/v3/products`);
  
  if (req.query.per_page) url.searchParams.append('per_page', req.query.per_page);
  else url.searchParams.append('per_page', '100'); 
  
  if (req.query.category) url.searchParams.append('category', req.query.category);
  url.searchParams.append('status', 'publish');

  try {
    const response = await fetch(url.toString(), {
      method: 'GET',
      headers: {
        'Authorization': 'Basic ' + Buffer.from(`${WC_CONSUMER_KEY}:${WC_CONSUMER_SECRET}`).toString('base64'),
        'Content-Type': 'application/json'
      }
    });

    if (!response.ok) {
      const errorText = await response.text();
      console.error("Failed to fetch from WooCommerce", errorText);
      return res.status(response.status).json({ error: 'Failed to fetch from WooCommerce', details: errorText });
    }

    const wcProducts = await response.json();

    const mappedProducts = wcProducts.map(wp => {
      const mainImage = wp.images && wp.images.length > 0 ? wp.images[0].src : 'tshirt_white.png';
      let categoryNames = wp.categories ? wp.categories.map(c => c.name) : [];
      if (categoryNames.length === 0 || categoryNames[0] === 'Uncategorized') {
        const nameLower = wp.name.toLowerCase();
        if (nameLower.includes('hoodie') || nameLower.includes('jacket') || nameLower.includes('sweatshirt')) {
          categoryNames = ['Hoodies & Jackets'];
        } else if (nameLower.includes('t-shirt') || nameLower.includes('tee') || nameLower.includes('crew') || nameLower.includes('raglan') || nameLower.includes('shirt')) {
          categoryNames = ['T-Shirts'];
        } else if (nameLower.includes('bottom') || nameLower.includes('pant') || nameLower.includes('short')) {
          categoryNames = ['Bottomwear'];
        } else if (nameLower.includes('bag') || nameLower.includes('backpack')) {
          categoryNames = ['Bags'];
        } else {
          categoryNames = ['Uncategorized'];
        }
      }
      const mainCategory = categoryNames[0];
      
      let sizes = [];
      if (wp.attributes) {
        const sizeAttr = wp.attributes.find(attr => attr.name.toLowerCase() === 'size');
        if (sizeAttr && sizeAttr.options) {
          sizes = sizeAttr.options;
        }
      }
      if (sizes.length === 0) sizes = ['S', 'M', 'L']; 
      
      let subCategory = categoryNames.length > 1 ? categoryNames[1] : mainCategory;
      if (categoryNames.length === 0 || categoryNames[0] === 'Uncategorized' || subCategory === mainCategory) {
          const nameLower = wp.name.toLowerCase();
          if (mainCategory === 'Hoodies & Jackets') {
              if (nameLower.includes('zip')) subCategory = 'Zip Hoodies';
              else if (nameLower.includes('sweatshirt')) subCategory = 'Sweatshirts';
              else if (nameLower.includes('bomber')) subCategory = 'Bomber Jackets';
              else if (nameLower.includes('varsity')) subCategory = 'Varsity Jackets';
              else subCategory = 'Pullover Hoodies';
          } else if (mainCategory === 'T-Shirts') {
              if (nameLower.includes('oversized')) subCategory = 'Oversized';
              else if (nameLower.includes('baby') || nameLower.includes('crop')) subCategory = 'Baby Tee & Crop';
              else subCategory = 'Classic Crew';
          }
      }

      return {
        id: wp.id.toString(),
        name: wp.name,
        price: parseFloat(wp.price || wp.regular_price || 0),
        img: mainImage,
        description: wp.short_description ? wp.short_description.replace(/(<([^>]+)>)/gi, "") : 'Premium WooCommerce Product',
        category: mainCategory,
        subcategory: subCategory,
        sizes: sizes,
        tone: 'bone', 
        art: 'tee-art', 
        permalink: wp.permalink
      };
    });

    return res.status(200).json(mappedProducts);

  } catch (error) {
    console.error("API Error:", error);
    return res.status(500).json({ error: 'Internal server error while fetching products.' });
  }
}
