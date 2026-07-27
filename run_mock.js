const { JSDOM } = require('jsdom');
const fs = require('fs');
const html = fs.readFileSync('t-shirts.html', 'utf-8');
const dom = new JSDOM(html, { runScripts: "dangerously", url: "http://localhost:8000/t-shirts.html?filter=Classic%20Crew" });
