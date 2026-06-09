<?php
/**
 * Elegant Checkout Page Template
 * Uses WooCommerce shortcode for maximum compatibility
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
?>

<div class="page-content">
<div class="section-wrap">
<h1 style="font-family: Playfair Display, serif; font-size: 42px; font-weight: 700; margin-bottom: 40px; color: #1a1a1a;">
<?php echo esc_html( get_the_title() ); ?>
</h1>

<?php
// Check if WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
// Display checkout using shortcode for maximum compatibility
echo do_shortcode( '[woocommerce_checkout]' );
} else {
echo '<div style="background: #fff3cd; border: 1px solid #ffc107; color: #856404; padding: 20px; border-radius: 6px; margin: 30px 0;">';
echo '<strong>Error:</strong> WooCommerce is not properly activated. Please ensure WooCommerce plugin is enabled.';
echo '</div>';
}
?>
</div>
</div>

<?php
get_footer();
?>
