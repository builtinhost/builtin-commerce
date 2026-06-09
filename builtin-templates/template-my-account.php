<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<style>
.my-account-wrapper { max-width: 1300px; margin: 0 auto; }
</style>

<div class="page-content">
<h1><?php the_title(); ?></h1>

<!-- WooCommerce My Account Shortcode -->
<?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
</div>

<?php get_footer(); ?>
