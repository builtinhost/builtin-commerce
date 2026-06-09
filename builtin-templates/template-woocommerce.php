<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/woocommerce.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header( 'shop' );

// Start output buffering to catch WooCommerce content
ob_start();

if ( is_checkout() ) {
// Checkout page
do_action( 'woocommerce_before_checkout_form', null );
if ( is_user_logged_in() || 'yes' === get_option( 'woocommerce_enable_guest_checkout' ) ) {
woocommerce_checkout();
}
do_action( 'woocommerce_after_checkout_form', null );
} else {
// Shop and product pages
do_action( 'woocommerce_before_main_content' );

if ( is_product() ) {
// Single product
wc_get_template_part( 'single-product' );
} elseif ( is_product_category() || is_product_tag() ) {
// Category/Tag page
wc_get_template_part( 'archive', 'product' );
} else {
// Shop archive page
wc_get_template_part( 'archive', 'product' );
}

do_action( 'woocommerce_after_main_content' );
}

ob_end_flush();

get_footer( 'shop' );
?>
