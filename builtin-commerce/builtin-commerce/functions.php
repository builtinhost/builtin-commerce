<?php
/**
 * BuiltinHost Commerce Theme Functions
 * 
 * IMPORTANT: All new pages MUST use get_header() and get_footer()
 * See THEME-GUIDELINES.md for development standards
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

if ( file_exists( get_template_directory() . '/inc/elementor-loader.php' ) ) {
require_once get_template_directory() . '/inc/elementor-loader.php';
}

/**
 * Theme Setup
 * Adds theme support for WordPress features
 */
function builtin_commerce_theme_setup() {
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'woocommerce', array(
'product_grid' => array(
'default_columns' => 4,
'default_rows' => 3,
),
) );
}
add_action( 'after_setup_theme', 'builtin_commerce_theme_setup' );

/**
 * Enqueue Stylesheets
 * - elegant-global.css: Global header, footer, responsive design (ALL pages)
 * - style.css: Main theme stylesheet
 * - Dequeue WooCommerce default styles to prevent conflicts
 */
function builtin_commerce_scripts() {
if ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::instance()->preview->is_preview_mode() ) {
return;
}

// Global stylesheet for all pages (header, footer, max-width, padding)
wp_enqueue_style( 'elegant-global', get_template_directory_uri() . '/elegant-global.css', array(), '1.0' );

// Main theme stylesheet
wp_register_style( 'builtin-commerce-style', get_stylesheet_uri() );
wp_enqueue_style( 'builtin-commerce-style' );

// Dequeue conflicting WooCommerce styles
wp_dequeue_style( 'woocommerce-general' );
wp_dequeue_style( 'woocommerce-layout' );
wp_dequeue_style( 'woocommerce-smallscreen' );
}
add_action( 'wp_enqueue_scripts', 'builtin_commerce_scripts', 99 );

/**
 * AUTO-LOAD CUSTOM PAGE TEMPLATES
 * 
 * NEW PAGES: Add entries to $page_templates array below
 * Format: 'template-slug' => 'template-file.php'
 * 
 * When a page is created with matching slug, the template file auto-loads
 */
add_filter( 'template_include', 'builtin_commerce_load_custom_pages', 99 );
function builtin_commerce_load_custom_pages( $template ) {
if ( is_page() ) {
$page_slug = get_post_field( 'post_name', get_post() );

// ========================================
// ADD NEW PAGES HERE (keep slug lowercase)
// ========================================
$page_templates = array(
'shop'         => 'builtin-templates/template-shop.php',
'cart'         => 'builtin-templates/template-cart.php',
'contact'      => 'builtin-templates/template-contact.php',
'about'        => 'builtin-templates/template-about.php',
'shipping'     => 'builtin-templates/template-shipping.php',
'returns'      => 'builtin-templates/template-returns.php',
'privacy'      => 'builtin-templates/template-privacy.php',
'terms'        => 'builtin-templates/template-terms.php',
'checkout'     => 'builtin-templates/template-checkout.php',
'my-account'   => 'builtin-templates/template-my-account.php',
'new-arrivals' => 'builtin-templates/template-new-arrivals.php',
// 'new-page'   => 'builtin-templates/template-new-page.php',  // Add like this
);

if ( isset( $page_templates[ $page_slug ] ) ) {
$custom = get_template_directory() . '/' . $page_templates[ $page_slug ];
if ( file_exists( $custom ) ) {
return $custom;
}
}
}
return $template;
}

/**
 * Initialize Default Payment Methods
 * Automatically enables default payment gateways on first theme activation
 */
function builtin_commerce_setup_default_payment_methods() {
if ( ! class_exists( 'WooCommerce' ) ) {
return;
}

// Check if payment methods have already been initialized
if ( get_option( 'builtin_commerce_payment_methods_initialized' ) ) {
return;
}

// Enable COD (Cash on Delivery) payment method
update_option( 'woocommerce_cod_settings', array(
'enabled'      => 'yes',
'title'        => 'Cash on Delivery',
'description'  => 'Pay with cash upon delivery.',
'instructions' => 'Please remember to make payment when our driver comes to your place.',
) );

// Enable Bank Transfer (BACS) payment method
update_option( 'woocommerce_bacs_settings', array(
'enabled'      => 'yes',
'title'        => 'Direct Bank Transfer',
'description'  => 'Make your payment directly into our bank account. Please use your Order ID as the payment reference.',
'instructions' => 'Instructions about your bank transfer will be emailed to you after checkout.',
'account_details' => array(
array(
'account_name'   => 'Builtin Commerce',
'bank_name'      => 'Your Bank Name',
'sort_code'      => 'Your Sort Code',
'account_number' => 'Your Account Number',
'iban'           => 'Your IBAN (if applicable)',
'bic'            => 'Your BIC (if applicable)',
),
),
) );

// Enable Cheque payment method
update_option( 'woocommerce_cheque_settings', array(
'enabled'      => 'yes',
'title'        => 'Cheque Payment',
'description'  => 'Please send your cheque to our store.',
'instructions' => 'Cheque instructions will be provided via email after checkout.',
) );

// Mark as initialized so this only runs once
update_option( 'builtin_commerce_payment_methods_initialized', true );
}

// Run on theme activation or when WordPress loads with WooCommerce
add_action( 'after_setup_theme', 'builtin_commerce_setup_default_payment_methods' );
add_action( 'woocommerce_loaded', 'builtin_commerce_setup_default_payment_methods' );


/**
 * WooCommerce Product Listing Styles
 * Overrides default WooCommerce styling for theme consistency
 */
function builtin_commerce_custom_styles() {
?>
<style>
.woocommerce-breadcrumb { display: none; }
.woocommerce ul.products { list-style: none; }
.woocommerce ul.products li { display: inline-block; }
.woocommerce .product-name, .woocommerce .woocommerce-loop-product-title {
font-family: 'Poppins', sans-serif;
font-weight: 700;
color: #1a1a1a;
}
.woocommerce .button, .woocommerce button.button {
background: #1a1a1a;
color: white;
border: none;
padding: 11px 20px;
border-radius: 5px;
font-weight: 700;
transition: all 0.3s ease;
}
.woocommerce .button:hover, .woocommerce button.button:hover {
background: #e63946;
}
</style>
<?php
}
add_action( 'wp_head', 'builtin_commerce_custom_styles' );


