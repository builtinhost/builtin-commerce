<?php
/**
 * BuiltinHost Commerce Theme Functions
 * 
 * @package builtinhost-commerce
 * @author BuiltinHost
 * @copyright 2024 BuiltinHost
 * @license GPL-2.0-or-later
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
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	) );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-header', array(
		'default-image' => '',
		'width'         => 1920,
		'height'        => 600,
		'flex-width'    => true,
		'flex-height'   => true,
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'fafafa',
		'default-image' => '',
	) );
	register_nav_menu( 'primary', 'Primary Menu' );
	add_theme_support( 'woocommerce', array(
		'product_grid' => array(
			'default_columns' => 4,
			'default_rows'    => 3,
		),
	) );
}
add_action( 'after_setup_theme', 'builtin_commerce_theme_setup' );

/**
 * Register Widget Areas
 */
function builtin_commerce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'builtinhost-commerce' ),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__( 'Main sidebar for pages and posts', 'builtinhost-commerce' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'builtinhost-commerce' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Widgets for footer area', 'builtinhost-commerce' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'builtin_commerce_widgets_init' );

/**
 * Register Block Styles
 */
function builtin_commerce_register_block_styles() {
	if ( function_exists( 'register_block_style' ) ) {
		register_block_style(
			'core/button',
			array(
				'name'         => 'gradient-button',
				'label'        => esc_html__( 'Gradient', 'builtinhost-commerce' ),
				'inline_style' => 'background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); border: none;',
			)
		);

		register_block_style(
			'core/heading',
			array(
				'name'  => 'accent-border',
				'label' => esc_html__( 'With Bottom Border', 'builtinhost-commerce' ),
			)
		);
	}
}
add_action( 'init', 'builtin_commerce_register_block_styles' );

/**
 * Register Block Patterns
 */
function builtin_commerce_register_block_patterns() {
	if ( function_exists( 'register_block_pattern' ) ) {
		register_block_pattern(
			'builtinhost-commerce/hero-section',
			array(
				'title'       => esc_html__( 'Hero Section', 'builtinhost-commerce' ),
				'description' => esc_html__( 'Full width hero section with heading and CTA button', 'builtinhost-commerce' ),
				'categories'  => array( 'builtinhost-commerce', 'hero' ),
				'content'     => '<!-- wp:cover {"url":"","minHeight":400,"isDark":false} -->
<div class="wp-block-cover"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Welcome to Our Store</h2>
<!-- /wp:heading -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Shop Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->',
			)
		);
	}
}
add_action( 'init', 'builtin_commerce_register_block_patterns' );

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

// Enqueue comment-reply script if comments are open
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
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

/**
 * Add Recommended WordPress CSS Classes
 * Adds styles for WordPress-recommended classes
 */
function builtin_commerce_add_wordpress_css() {
	?>
	<style>
	.wp-caption {
		border: 1px solid #ddd;
		border-radius: 4px;
		padding: 5px;
		background: #f5f5f5;
	}
	.wp-caption-text {
		font-size: 0.9em;
		color: #666;
		padding: 5px 0;
		text-align: center;
	}
	.sticky {
		background: #fafafa;
		border-left: 4px solid #e63946;
		padding-left: 15px;
	}
	.gallery-caption {
		font-size: 0.9em;
		color: #666;
		margin-top: 5px;
	}
	.bypostauthor {
		background: #e6f2ff;
		padding: 10px;
		border-radius: 4px;
	}
	.alignright {
		float: right;
		margin: 0 0 1em 1em;
		max-width: 50%;
	}
	.alignleft {
		float: left;
		margin: 0 1em 1em 0;
		max-width: 50%;
	}
	.aligncenter {
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'builtin_commerce_add_wordpress_css' );

/**
 * Add Editor Styles
 */
if ( ! has_action( 'admin_init' ) ) {
	add_action( 'after_setup_theme', function() {
		add_editor_style( array(
			'/elegant-global.css',
		) );
	});
}

/**
 * Navigation Menu Fallback
 * Displays default navigation if no menu is assigned
 */
function builtin_commerce_nav_fallback() {
	echo '<ul class="header-nav">';
	echo '<li><a href="' . esc_url( home_url( '/shop' ) ) . '">Shop</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '">About</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">Contact</a></li>';
	echo '</ul>';
}