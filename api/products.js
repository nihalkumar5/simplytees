export default async function handler(req, res) {
  const WP_API_URL = process.env.WP_API_URL;
  const WP_CONSUMER_KEY = process.env.WP_CONSUMER_KEY;
  const WP_CONSUMER_SECRET = process.env.WP_CONSUMER_SECRET;

  if (!WP_API_URL || !WP_CONSUMER_KEY || !WP_CONSUMER_SECRET) {
    return res.status(500).json({ error: 'Missing WooCommerce API credentials in environment variables.' });
  }

  try {
    const url = new URL(WP_API_URL);
    url.searchParams.append('consumer_key', WP_CONSUMER_KEY);
    url.searchParams.append('consumer_secret', WP_CONSUMER_SECRET);

    const response = await fetch(url.toString());
    
    if (!response.ok) {
      console.error('WooCommerce API Error:', response.status);
      return res.status(response.status).json({ error: 'Failed to fetch products from WooCommerce.' });
    }

    const products = await response.json();
    res.setHeader('Cache-Control', 's-maxage=60, stale-while-revalidate');
    return res.status(200).json(products);
  } catch (error) {
    console.error('Serverless Function Error:', error);
    return res.status(500).json({ error: 'Internal Server Error fetching products.' });
  }
}
