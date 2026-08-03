const fs = require('fs');
global.window = {
  location: { pathname: '/index.html', search: '' },
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
      global.domReady = cb;
    }
  },
  getElementById: () => ({ classList: { add: ()=>{}, remove: ()=>{} }, style: {}, dataset: {}, addEventListener: ()=>{} }),
  body: { style: {}, classList: { toggle: ()=>{} } }
};
global.URLSearchParams = class { constructor() {} get() { return null; } };
global.localStorage = { getItem: () => null, setItem: () => {} };
global.Intl = { NumberFormat: class { format() { return ''; } } };
global.fetch = async () => ({ ok: true, json: async () => ([]) });

try {
  const code = fs.readFileSync('main-script.js', 'utf8');
  eval(code);
  console.log('Script evaluated successfully');
  if (global.domReady) {
    global.domReady();
    console.log('DOMContentLoaded executed successfully');
  }
} catch (e) {
  console.error('Error during execution:', e);
}
