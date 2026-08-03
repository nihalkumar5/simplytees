const fs = require('fs');

// Mock browser environment
global.window = {
  location: { pathname: '/drinkware.html', search: '?filter=All' },
  addEventListener: () => {},
  scrollY: 0,
  innerWidth: 1024,
  requestAnimationFrame: () => {}
};
global.document = {
  querySelector: () => ({ classList: { add: ()=>{}, remove: ()=>{} }, addEventListener: ()=>{}, style: {}, dataset: {}, setAttribute: ()=>{} }),
  querySelectorAll: () => ({ forEach: () => {} }),
  addEventListener: (e, cb) => {
    if (e === 'DOMContentLoaded') {
      // we'll call it later
      global.domReady = cb;
    }
  },
  getElementById: () => ({ classList: { add: ()=>{}, remove: ()=>{} }, style: {}, dataset: {}, addEventListener: ()=>{} }),
  body: { style: {}, classList: { toggle: ()=>{} } }
};
global.URLSearchParams = class {
  constructor() {}
  get() { return null; }
};
global.localStorage = { getItem: () => null, setItem: () => {} };
global.Intl = { NumberFormat: class { format() { return ''; } } };
global.fetch = async () => ({ ok: true, json: async () => ([]) });

try {
  const code = fs.readFileSync('main-script.js', 'utf8');
  eval(code);
  console.log('Script evaluated successfully without global errors');
  if (global.domReady) {
    global.domReady();
    console.log('DOMContentLoaded executed successfully');
  }
} catch (e) {
  console.error('Error during execution:', e);
}
