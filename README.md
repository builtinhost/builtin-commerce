# Builtin Commerce Theme

A professional, mobile-responsive WooCommerce WordPress theme designed for online stores, e-commerce businesses, and product showcases. Built with clean code, accessibility standards, and modern web practices.

## Features

### Core WooCommerce Features

- **Full WooCommerce Integration** - Native support for products, cart, checkout, and account pages
- **8 Featured Products** - Automatic display of featured items on homepage
- **Product Grid System** - Responsive 4-column product layout (adjusts to 2-column on tablet, 1-column on mobile)
- **Advanced Product Filtering** - Category navigation, price filters, sorting options
- **Seamless Checkout** - Optimized checkout experience with progress indicators
- **Customer Accounts** - My Account dashboard, order history, wishlist integration

### Design & UX

- **Elementor Builder Compatible** - Create custom pages with Elementor drag-and-drop editor
- **Mobile-First Responsive** - Perfect rendering on desktop, tablet, and mobile devices
- **Professional Color Palette** - Primary red (#ff6b6b), accent teal (#00d4aa), neutral grays
- **Typography System** - Poppins (headings), Open Sans (body) - Google Fonts integrated
- **Consistent Layout** - Global header/footer design across all pages

### Performance & Security

- **Optimized CSS** - Minified stylesheets, critical CSS inlined
- **WooCommerce API Integration** - Modern `wc_get_products()` for product queries
- **Security Best Practices** - Proper escaping (esc_url, esc_html), nonces for forms
- **Code Standards Compliance** - WordPress Coding Standards followed throughout
- **Accessibility** - ARIA labels, semantic HTML, keyboard navigation support

## Installation

### From WordPress Theme Directory

1. In WordPress admin, go to **Appearance > Themes**
2. Click **Add New**
3. Search for "Builtin Commerce"
4. Click **Install** then **Activate**

### Manual Installation

1. Download theme from releases
2. Upload to `/wp-content/themes/builtin-commerce/`
3. Go to **Appearance > Themes** in admin
4. Click **Activate**

## Requirements

- WordPress 5.9 or higher
- PHP 7.4 or higher
- WooCommerce 7.0 or higher

## Configuration

### Initial Setup

1. Go to WooCommerce Settings
2. Set Shop, Cart, and Checkout pages
3. Configure product images
4. Customize colors via **Appearance > Customize**

## File Structure
builtinhost-commerce/
├── front-page.php # Homepage template
├── header.php # Global header
├── footer.php # Global footer
├── functions.php # Theme setup & hooks
├── style.css # Main stylesheet
├── elegant-global.css # Global styles
├── template-*.php # Page templates
├── woocommerce/ # WooCommerce overrides
├── inc/ # Theme includes
└── elementor-templates/ # Elementor templates


## Development

### Code Standards

- ✅ WordPress Coding Standards (WPCS)
- ✅ PSR-12 PHP Standards
- ✅ Security best practices (escaping, sanitization)
- ✅ WCAG 2.1 AA accessibility
- ✅ Mobile-first responsive design

### Adding New Pages

1. Create `page-slug.php`
2. Add to `$page_templates` array in functions.php
3. Create page in WordPress with matching slug

### Custom CSS Variables

```css
--color-primary: #ff6b6b
--color-secondary: #ee5a6f
--color-accent: #00d4aa
--color-dark: #1a1a1a
--font-heading: 'Poppins'
--font-body: 'Open Sans'

## Development

### Code Standards

- ✅ WordPress Coding Standards (WPCS)
- ✅ PSR-12 PHP Standards
- ✅ Security best practices (escaping, sanitization)
- ✅ WCAG 2.1 AA accessibility
- ✅ Mobile-first responsive design

### Adding New Pages

1. Create `page-slug.php`
2. Add to `$page_templates` array in functions.php
3. Create page in WordPress with matching slug

### Custom CSS Variables

```css
--color-primary: #ff6b6b
--color-secondary: #ee5a6f
--color-accent: #00d4aa
--color-dark: #1a1a1a
--font-heading: 'Poppins'
--font-body: 'Open Sans'

## Development

### Code Standards

- ✅ WordPress Coding Standards (WPCS)
- ✅ PSR-12 PHP Standards
- ✅ Security best practices (escaping, sanitization)
- ✅ WCAG 2.1 AA accessibility
- ✅ Mobile-first responsive design

### Adding New Pages

1. Create `page-slug.php`
2. Add to `$page_templates` array in functions.php
3. Create page in WordPress with matching slug

### Custom CSS Variables

```css
--color-primary: #ff6b6b
--color-secondary: #ee5a6f
--color-accent: #00d4aa
--color-dark: #1a1a1a
--font-heading: 'Poppins'
--font-body: 'Open Sans'
Browser Support
Chrome 90+
Firefox 88+
Safari 14+
Edge 90+
Mobile browsers (iOS/Android latest)
Troubleshooting
Featured Products Not Showing?
Mark products as featured in WooCommerce admin

WooCommerce Pages 404?
Go to Settings > Permalinks and click Save

Styling Issues?
Clear cache, hard refresh (Ctrl+Shift+R), check for plugin conflicts

Support
GitHub Issues: https://github.com/builtinhost/builtin-commerce/issues
Email: support@builtinhost.com
Documentation: https://builtinhost.com/theme/builtin-commerce/docs
Contributing
See CONTRIBUTING.md for guidelines on:

Code standards
Pull requests
Testing requirements
License
GPL-2.0-or-later. See LICENSE for details.

Made with ❤️ by BuiltinHost
