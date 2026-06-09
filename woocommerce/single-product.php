<?php
/**
 * Full Product Page Template - Builtin Commerce
 * Displays product with elegant 2-column layout
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
echo get_the_password_form();
get_footer();
return;
}

global $product;
if ( empty( $product ) || ! is_a( $product, 'WC_Product' ) ) {
$product = wc_get_product( get_the_ID() );
}

$product_id = $product ? $product->get_id() : 0;
$featured_image = $product ? wp_get_attachment_url( $product->get_image_id() ) : '';
$gallery_ids = $product ? $product->get_gallery_image_ids() : array();
?>

<div class="page-content full-width">
<div class="section-wrap">

<!-- 2-COLUMN PRODUCT LAYOUT -->
<div class="product-main-grid">

<!-- LEFT COLUMN: PRODUCT GALLERY -->
<div class="product-images-section">
<div class="product-gallery-container">
<!-- Main Image -->
<div class="product-main-image">
<?php
if ( $product && $featured_image ) {
echo '<img src="' . esc_url( $featured_image ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="product-main-img" />';
} elseif ( $product ) {
echo wc_placeholder_img( 'woocommerce_single' );
}
?>
</div>

<!-- Gallery Thumbnails -->
<?php if ( ! empty( $gallery_ids ) ) : ?>
<div class="product-gallery-thumbs">
<?php foreach ( $gallery_ids as $gallery_id ) : ?>
<div class="thumb-item">
<?php echo wp_get_attachment_image( $gallery_id, 'woocommerce_gallery_thumbnail' ); ?>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Wishlist Button -->
<div class="wishlist-button">
<button class="btn-wishlist" title="Add to Wishlist">♡</button>
</div>
</div>
</div>

<!-- RIGHT COLUMN: PRODUCT INFO -->
<div class="product-info-section">

<!-- Category Badge -->
<?php 
if ( $product ) {
$categories = $product->get_category_ids();
if ( ! empty( $categories ) ) {
$category = get_term( $categories[0], 'product_cat' );
if ( $category ) {
echo '<div class="product-category-badge">' . esc_html( strtoupper( $category->name ) ) . '</div>';
}
}
}
?>

<!-- Product Title & Variant -->
<div class="product-title-section">
<h1 class="product-title"><?php echo $product ? esc_html( $product->get_name() ) : 'Product'; ?></h1>
<?php
if ( $product ) {
$attributes = $product->get_attributes();
if ( ! empty( $attributes ) ) {
foreach ( $attributes as $attribute ) {
if ( $attribute ) {
echo '<p class="product-variant-info">' . esc_html( $attribute->get_name() ) . '</p>';
}
}
}
}
?>
</div>

<!-- Rating -->
<div class="product-rating-section">
<div class="product-stars">
<?php echo $product ? wc_get_rating_html( $product->get_average_rating() ) : ''; ?>
</div>
</div>

<!-- Price -->
<div class="product-price-section">
<span class="price-label">PRICE:</span>
<span class="product-price"><?php echo $product ? $product->get_price_html() : ''; ?></span>
</div>

<!-- Add to Cart (WooCommerce default) -->
<?php if ( $product ) woocommerce_template_single_add_to_cart(); ?>

<!-- SKU & Materials -->
<div class="product-details-info">
<?php if ( $product && $product->get_sku() ) : ?>
<div class="detail-row">
<span class="detail-label">SKU:</span>
<span class="detail-value"><?php echo esc_html( $product->get_sku() ); ?></span>
</div>
<?php endif; ?>

<?php if ( $product ) {
foreach ( wc_get_product_terms( $product_id, 'pa_material', array( 'fields' => 'names' ) ) as $material ) : ?>
<div class="detail-row">
<span class="detail-label">MATERIAL:</span>
<span class="detail-value"><?php echo esc_html( $material ); ?></span>
</div>
<?php endforeach;
} ?>

<?php 
if ( $product ) {
$weight = $product->get_weight();
if ( $weight ) :
?>
<div class="detail-row">
<span class="detail-label">WEIGHT:</span>
<span class="detail-value"><?php echo esc_html( $weight . ' ' . get_option( 'woocommerce_weight_unit' ) ); ?></span>
</div>
<?php 
endif;
}
?>
</div>

<!-- Total Price Summary -->
<div class="product-total-section">
<span class="total-label">TOTAL PRICE:</span>
<span class="total-price"><?php echo $product ? $product->get_price_html() : ''; ?></span>
</div>

</div>
</div>

<!-- TABS: DESCRIPTION & DETAILS -->
<div class="product-tabs-section">
<div class="tabs-header">
<button class="tab-button active" data-tab="description">DESCRIPTION</button>
<button class="tab-button" data-tab="details">DETAILS</button>
</div>

<div class="tabs-content">
<div id="description" class="tab-pane active">
<?php echo $product ? wp_kses_post( $product->get_description() ) : ''; ?>
</div>

<div id="details" class="tab-pane">
<?php echo $product ? wp_kses_post( $product->get_short_description() ) : ''; ?>
<?php
if ( $product && $product->has_attributes() ) {
echo '<table class="attributes-table">';
foreach ( $product->get_attributes() as $attribute ) {
if ( $attribute ) {
echo '<tr><td>' . esc_html( $attribute->get_name() ) . ':</td><td>' . esc_html( implode( ', ', $attribute->get_options() ) ) . '</td></tr>';
}
}
echo '</table>';
}
?>
</div>
</div>
</div>

<!-- RELATED PRODUCTS -->
<?php if ( $product ) woocommerce_output_related_products(); ?>

</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
const tabButtons = document.querySelectorAll('.tab-button');
tabButtons.forEach(btn => {
btn.addEventListener('click', function() {
const tabId = this.dataset.tab;

document.querySelectorAll('.tab-pane').forEach(pane => {
pane.classList.remove('active');
});

tabButtons.forEach(b => b.classList.remove('active'));

document.getElementById(tabId)?.classList.add('active');
this.classList.add('active');
});
});
});
</script>

<?php
do_action( 'woocommerce_after_single_product' );
get_footer();
