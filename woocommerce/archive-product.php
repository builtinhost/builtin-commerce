<?php
/**
 * Shop Archive Template - Simplified
 * Fresh approach with inline styles to eliminate gaps
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
?>

<div style="background: #1a1a1a; color: white; padding: 80px 25px; text-align: center; margin: 0; margin-top: -30px; position: relative; z-index: 1;">
<div style="max-width: 1300px; margin: 0 auto;">
<h1 style="font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 15px; letter-spacing: -1px;">
<?php woocommerce_page_title(); ?>
</h1>
<p style="font-size: 16px; opacity: 0.9; margin: 0;">Browse our complete collection of products</p>
</div>
</div>

<?php if ( woocommerce_product_loop() ) : ?>

<div style="background: white; max-width: 1300px; margin: 0 auto; padding: 40px 25px;">
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 20px; flex-wrap: wrap;">
<div style="font-size: 14px; color: #666; font-weight: 600;">
<?php woocommerce_result_count(); ?>
</div>
<div style="display: flex; align-items: center;">
<?php woocommerce_catalog_ordering(); ?>
</div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; margin-bottom: 40px;">
<?php 
if ( wc_get_loop_prop( 'total' ) ) {
while ( have_posts() ) {
the_post();
global $product;

$product_url = get_the_permalink();
$product_title = get_the_title();
$product_price = $product->get_price_html();
$product_image = get_the_post_thumbnail( $product->get_id(), 'woocommerce_thumbnail' );
$product_rating = wc_get_rating_html( $product->get_average_rating() );
$product_cat = wp_get_post_terms( $product->get_id(), 'product_cat', array( 'fields' => 'names' ) );
?>

<div style="background: white; border-radius: 8px; overflow: hidden; transition: all 0.4s; border: 1px solid #f0f0f0; box-shadow: 0 2px 10px rgba(0,0,0,0.04); display: flex; flex-direction: column;">
<div style="width: 100%; height: 240px; background: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden;">
<?php echo wp_kses_post( $product_image ); ?>
</div>

<?php if ( ! empty( $product_cat ) ) : ?>
<span style="display: inline-block; background: #ffe8ec; color: #e63946; padding: 4px 10px; border-radius: 3px; font-size: 10px; font-weight: 700; margin: 12px 12px 0; letter-spacing: 0.3px; text-transform: uppercase;">
<?php echo esc_html( $product_cat[0] ); ?>
</span>
<?php endif; ?>

<div style="padding: 16px 12px; flex-grow: 1; display: flex; flex-direction: column;">
<h2 style="font-size: 15px; font-weight: 700; color: #1a1a1a; margin: 6px 0; line-height: 1.4;">
<a href="<?php echo esc_url( $product_url ); ?>" style="color: inherit; text-decoration: none;">
<?php echo esc_html( $product_title ); ?>
</a>
</h2>

<?php if ( $product_rating ) : ?>
<div style="font-size: 12px; color: #ffc107; margin: 4px 0;">
<?php echo wp_kses_post( $product_rating ); ?>
</div>
<?php endif; ?>

<div style="font-size: 18px; font-weight: 800; color: #e63946; margin: 8px 0;">
<?php echo wp_kses_post( $product_price ); ?>
</div>

<a href="<?php echo esc_url( $product_url ); ?>" style="display: inline-block; background: #1a1a1a; color: white; padding: 10px 14px; border-radius: 4px; font-size: 12px; font-weight: 700; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px; transition: all 0.3s; margin-top: auto; border: none; cursor: pointer;">
View Details
</a>
</div>
</div>

<?php 
}
}
?>
</div>

<div style="display: flex; justify-content: center; gap: 8px; margin-bottom: 40px;">
<?php echo wp_kses_post( woocommerce_pagination() ); ?>
</div>
</div>

<?php else : ?>
<div style="text-align: center; padding: 80px 25px; background: white;">
<h2 style="font-family: 'Playfair Display', serif; font-size: 36px; color: #1a1a1a; margin-bottom: 20px;">No Products Found</h2>
<p style="color: #666; font-size: 15px; margin-bottom: 30px;">We're sorry, but no products matched your search criteria.</p>
<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" style="display: inline-block; background: #e63946; color: white; padding: 12px 32px; border-radius: 5px; text-decoration: none; font-weight: 700; font-size: 13px; letter-spacing: 0.6px; text-transform: uppercase; transition: all 0.3s;">
Back to Shop
</a>
</div>
<?php endif; ?>

<?php get_footer();


