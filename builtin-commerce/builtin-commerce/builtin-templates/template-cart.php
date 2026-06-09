<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<style>
.cart-container { max-width: 1300px; margin: 0 auto; }
.cart-empty { text-align: center; padding: 60px 25px; }
.cart-empty h2 { font-family: 'Playfair Display', serif; font-size: 32px; margin-bottom: 20px; }
</style>

<div class="page-content">
<h1><?php the_title(); ?></h1>

<!-- WooCommerce Cart Shortcode -->
<?php echo do_shortcode( '[woocommerce_cart]' ); ?>
</div>

<?php get_footer(); ?>
