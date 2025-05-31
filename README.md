
# 🌿 Thorn – A Modern WordPress Starter Theme by Synmek

![License](https://img.shields.io/badge/license-MIT-green)
![Build](https://img.shields.io/badge/build-passing-brightgreen)
![Maintained](https://img.shields.io/badge/maintained-yes-blue)

**Thorn** is a modular, developer-first WordPress starter framework built for modern development workflows. Inspired by Roots’ Sage but rewritten for 2025 standards, it uses Webpack 5, Yarn, Babel, and SCSS modules, making it easy to scale, extend, and maintain.

---

## 📦 Features

- 🛠 Modern toolchain with Webpack 5 + Yarn
- ⚡ SCSS Modules & Utility-based architecture
- 🔄 DOM-based JavaScript routing with ES6
- 🔃 Live reload with BrowserSync
- 🎯 Automatic vendor injection (Bootstrap, FontAwesome, etc.)
- 📂 Clean separation of concerns for styles, scripts, and views
- 🧠 Designed for teams & scalable projects

---

## 🚀 Getting Started

### Requirements

- Node.js `>= 16`
- Yarn `>= 1.22`
- WordPress installed locally
- HTTPS-enabled local dev URL (for BrowserSync)

### Installation

1. Clone the repo into your `wp-content/themes/` folder:

   ```bash
   git clone https://github.com/yourusername/thorn-theme.git thorn
   cd thorn
   ```

2. Install dependencies:

   ```bash
   yarn install
   ```

3. Start development mode:

   ```bash
   yarn dev
   ```

4. Or build for production:

   ```bash
   yarn build
   ```

---

## 🧱 Project Structure

```
thorn/
├── assets/
│   ├── fonts/
│   ├── images/
│   ├── scripts/
│   ├── styles/
│   └── index.js
│
├── dist/
├── lib/
├── templates/
├── functions.php
├── style.css
├── screenshot.png
├── package.json
└── webpack.config.js
```

---

## 🎨 SCSS Structure (`assets/styles/`)

```
styles/
├── abstracts/
│   ├── _variables.scss
│   ├── _mixins.scss
│   ├── _functions.scss
│   ├── _typography.scss
│   └── _breakpoints.scss
│
├── base/
│   ├── _reset.scss
│   ├── _typography.scss
│   ├── _forms.scss
│   └── _links.scss
│
├── layout/
│   ├── _header.scss
│   ├── _footer.scss
│   ├── _grid.scss
│   └── _containers.scss
│
├── components/
│   ├── _buttons.scss
│   ├── _forms.scss
│   ├── _cards.scss
│   ├── _modal.scss
│   └── _navigation.scss
│
├── pages/
│   ├── _home.scss
│   └── _about.scss
│
├── themes/
│   └── _dark.scss
│
├── utilities/
│   ├── _helpers.scss
│   ├── _animations.scss
│   └── _accessibility.scss
│
├── wordpress/
│   ├── _gutenberg.scss
│   └── _wp-classes.scss
│
└── main.scss
```

➡ To add a new file:
- Create it in the appropriate folder.
- Add `@use "folder/filename";` in `main.scss`.

---

## 📜 JavaScript Routing (`assets/scripts/main.js`)

Thorn uses DOM-based routing to execute scripts conditionally by page.

```js
const Thorn = {
  common: {
    init() {},
    finalize() {}
  },
  about_us: {
    init() {},
  }
};
```

Body classes become route keys, e.g., `about-us` ➝ `about_us`.

---

## ⚙️ Scripts

| Command       | Description                                 |
|---------------|---------------------------------------------|
| `yarn dev`    | Starts development server with BrowserSync  |
| `yarn build`  | Builds production-ready minified assets     |
| `yarn lint`   | Runs SCSS linter (optional)                 |

---

## 🗂 PHP Namespace & Structure

All theme functions are namespaced under `Synmek\Thorn`.

Loaded in `/functions.php` from:
- `lib/assets.php`
- `lib/setup.php`
- `lib/extras.php`
- `lib/wrapper.php`
- `lib/titles.php`

---

## 📜 License

**MIT License**  
You may use Thorn for personal or commercial projects without attribution.  
You may **not** sell it as a standalone theme or framework.

See [`LICENSE.md`](./LICENSE.md) for details.

---

## ✨ Credits

- Framework by [Synmek](https://synmek.com)
- Inspired by [Roots Sage](https://roots.io/sage/)
- Built with ❤️ for modern WordPress devs

---
