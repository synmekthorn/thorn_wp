const fs = require('fs-extra');
const path = require('path');

const targetFile = path.resolve(__dirname, '../../assets/styles/main.scss');
const imports = `
// 🚨 AUTO-INJECTED VENDOR IMPORTS — DO NOT EDIT BELOW
@import "../../node_modules/bootstrap/scss/bootstrap.scss";
@import "../../node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss";
@import "../../node_modules/@fortawesome/fontawesome-free/scss/brands.scss";
@import "../../node_modules/@fortawesome/fontawesome-free/scss/solid.scss";
// 🚨 END AUTO-INJECT
`;


(async () => {
  try {
    const original = await fs.readFile(targetFile, 'utf8');

    const clean = original.replace(/\/\/ 🚨 AUTO-INJECTED[\s\S]*?\/\/ 🚨 END AUTO-INJECT\n*/g, '');

    const updated = `${imports}\n${clean.trim()}\n`;

    await fs.writeFile(targetFile, updated);

    console.log('✅ Vendor SCSS imports injected into main.scss');
  } catch (err) {
    console.error('❌ Failed to inject SCSS imports:', err);
  }
})();