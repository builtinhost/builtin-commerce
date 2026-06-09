<?php
/**
 * Front Page Template - Builtin Commerce
 * Beautiful gradient hero with dynamic featured products
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

get_header();
?>

<style>
.commerce-hero { 
background: linear-gradient(
135deg,
#F8F5F2 0%,
#F1E8E3 100%
); 
color: #1A1A1A; 
padding: 80px 20px 100px; 
text-align: center;
position: relative;
overflow: hidden;
}
.commerce-hero::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: radial-gradient(circle at 20% 50%, rgba(215, 38, 56, 0.05) 0%, transparent 50%);
pointer-events: none;
}
.hero-badge {
display: inline-block;
background: rgba(215, 38, 56, 0.1);
color: #D72638;
padding: 8px 18px;
border-radius: 50px;
font-size: 12px;
font-weight: 700;
margin-bottom: 20px;
letter-spacing: 1px;
text-transform: uppercase;
position: relative;
z-index: 1;
}
.commerce-hero h1 { 
font-family: 'Playfair Display', serif;
font-size: 68px; 
font-weight: 800; 
margin: 0 0 20px; 
letter-spacing: -2px;
text-shadow: 0 2px 10px rgba(0,0,0,0.05);
position: relative;
z-index: 1;
line-height: 1.1;
color: #1A1A1A;
}
.hero-highlight {
color: #D72638;
display: inline;
}
.commerce-hero .hero-subtitle {
font-size: 22px;
margin-bottom: 15px;
color: #4a4a4a;
font-weight: 500;
position: relative;
z-index: 1;
letter-spacing: 0.5px;
}
.commerce-hero .hero-description {
font-size: 16px;
margin-bottom: 40px;
color: #666666;
max-width: 600px;
margin-left: auto;
margin-right: auto;
position: relative;
z-index: 1;
line-height: 1.6;
}
.hero-cta-group {
display: flex;
gap: 15px;
justify-content: center;
flex-wrap: wrap;
position: relative;
z-index: 1;
}
.cta-btn { 
display: inline-block; 
background: #D72638; 
color: white; 
padding: 16px 40px; 
border-radius: 50px; 
text-decoration: none; 
font-weight: 700; 
transition: all 0.4s ease;
font-size: 14px;
letter-spacing: 0.8px;
text-transform: uppercase;
box-shadow: 0 8px 25px rgba(215, 38, 56, 0.2);
}
.cta-btn:hover {
transform: translateY(-3px);
box-shadow: 0 12px 35px rgba(215, 38, 56, 0.3);
background: #b71f2e;
}
.cta-btn-secondary {
background: transparent;
color: #D72638;
border: 2px solid #D72638;
}
.cta-btn-secondary:hover {
background: #D72638;
color: white;
box-shadow: 0 12px 35px rgba(215, 38, 56, 0.3);
}

.featured-section { 
padding: 80px 20px; 
background: white; 
}
.featured-section h2 {
font-family: 'Playfair Display', serif;
}
.products-grid { 
display: grid; 
grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
gap: 25px; 
max-width: 1200px; 
margin: 30px auto; 
}
.product-card { 
background: white; 
border-radius: 10px; 
overflow: hidden; 
box-shadow: 0 5px 20px rgba(0,0,0,0.08); 
transition: 0.3s; 
display: flex;
flex-direction: column;
}
.product-card:hover { 
transform: translateY(-10px);
box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}
.product-image { 
width: 100%; 
height: 220px; 
background: linear-gradient(135deg, #f093fb, #f5576c); 
display: flex; 
align-items: center; 
justify-content: center; 
font-size: 60px; 
overflow: hidden;
position: relative;
}
.product-image img {
width: 100%;
height: 100%;
object-fit: cover;
transition: 0.3s;
}
.product-card:hover .product-image img {
transform: scale(1.08);
}
.product-content { 
padding: 25px; 
flex-grow: 1;
display: flex;
flex-direction: column;
}
.price-tag { 
font-size: 24px; 
font-weight: 700; 
color: #f5576c; 
margin-bottom: 8px; 
}
.product-card h3 { 
font-size: 18px; 
margin: 10px 0; 
font-weight: 700;
color: #333;
line-height: 1.3;
}
.product-card p { 
color: #666; 
font-size: 13px; 
margin-bottom: 15px;
flex-grow: 1;
}
.product-category {
display: inline-block;
background: #fff3cd;
color: #f5576c;
padding: 4px 10px;
border-radius: 3px;
font-size: 11px;
font-weight: 700;
text-transform: uppercase;
margin-bottom: 8px;
width: fit-content;
}
.add-cart { 
background: #f5576c; 
color: white; 
padding: 10px 20px; 
border-radius: 5px; 
text-decoration: none; 
font-weight: 600; 
font-size: 13px; 
display: inline-block; 
transition: 0.3s; 
margin-top: auto;
}
.add-cart:hover { 
background: #f093fb;
transform: translateY(-2px);
}

.categories-section { 
padding: 60px 20px; 
background: #f8f9fa; 
}
.categories-section h2 {
font-family: 'Playfair Display', serif;
}
.categories-grid { 
display: grid; 
grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); 
gap: 20px; 
max-width: 1200px; 
margin: 30px auto; 
}
.cat-card { 
background: white; 
padding: 30px; 
border-radius: 8px; 
text-align: center; 
transition: 0.3s; 
cursor: pointer;
}
.cat-card:hover { 
transform: translateY(-5px);
box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}
.cat-card strong { 
display: block; 
font-size: 16px; 
color: #333; 
margin-bottom: 5px; 
}
.cat-card small { 
color: #999; 
}

.trust-section { 
padding: 60px 20px; 
background: white; 
}
.trust-section h2 {
font-family: 'Playfair Display', serif;
}
.trust-grid { 
display: grid; 
grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
gap: 25px; 
max-width: 1200px; 
margin: 30px auto; 
}
.trust-box { 
text-align: center; 
padding: 20px; 
}
.trust-icon { 
font-size: 40px; 
margin-bottom: 15px; 
}
.trust-box h4 { 
color: #333; 
margin: 10px 0 5px; 
font-size: 16px; 
font-weight: 700;
}
.trust-box p { 
color: #666; 
font-size: 13px; 
}

.section-title { 
text-align: center; 
font-size: 32px; 
font-weight: 700; 
margin-bottom: 40px; 
color: #333; 
}

@media (max-width: 768px) { 
.commerce-hero h1 { 
font-size: 32px; 
}
.products-grid {
grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
gap: 15px;
}
}
</style>

<main id="primary" class="site-main">
<section class="commerce-hero">
<div class="hero-badge">🌍 WORLDWIDE SHIPPING • FREE RETURNS</div>

<h1>
Discover Premium Products<br>
<span class="hero-highlight">From Around the Globe</span>
</h1>

<p class="hero-subtitle">Exclusive Collection of Authentic & Trending Items</p>

<p class="hero-description">
Shop our carefully curated selection of premium products from international brands. 
Fast shipping, secure checkout, and 100% guaranteed authentic items. 
Join thousands of satisfied customers worldwide!
</p>

<div class="hero-cta-group">
<a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="cta-btn">🛍️ Shop Now</a>
<a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="cta-btn cta-btn-secondary">View All Collections</a>
</div>
</section>

<section class="featured-section" id="featured">
<div style="max-width: 1200px; margin: 0 auto;">
<h2 class="section-title">Featured Products</h2>
<div class="products-grid">
<?php
$args = array(
	'status'   => 'publish',
	'featured' => true,
	'limit'    => 8,
	'orderby'  => 'date',
	'order'    => 'DESC',
	'return'   => 'objects'
);

$featured_products = wc_get_products( $args );

if ( ! empty( $featured_products ) ) {
foreach ( $featured_products as $product ) {
$product_url = get_permalink( $product->get_id() );
$product_title = $product->get_name();
$product_image = wp_get_attachment_image( $product->get_image_id(), 'woocommerce_thumbnail' );
$product_desc = wp_trim_words( $product->get_description(), 10 );
$categories = wp_get_post_terms( $product->get_id(), 'product_cat', array( 'fields' => 'names' ) );
?>

<div class="product-card">
<a href="<?php echo esc_url( $product_url ); ?>" style="text-decoration: none; color: inherit; display: contents;">
<div class="product-image">
<?php 
if ( ! empty( $product_image ) ) {
echo wp_kses_post( $product_image );
} else {
echo wc_placeholder_img( 'woocommerce_thumbnail' );
}
?>
</div>
</a>

<div class="product-content">
<?php if ( ! empty( $categories ) ) : ?>
<div class="product-category"><?php echo esc_html( $categories[0] ); ?></div>
<?php endif; ?>

<?php if ( $product ) : ?>
<div class="price-tag"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
<?php endif; ?>

<h3>
<a href="<?php echo esc_url( $product_url ); ?>" style="color: inherit; text-decoration: none;">
<?php echo esc_html( $product_title ); ?>
</a>
</h3>

<p><?php echo esc_html( $product_desc ); ?></p>

<a href="<?php echo esc_url( $product_url ); ?>" class="add-cart">View Details</a>
</div>
</div>

<?php 
}
} else {
echo '<p style="text-align: center; grid-column: 1 / -1; background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; border-left: 4px solid #ffc107;">⭐ No featured products yet. <a href="' . esc_url( home_url( '/shop' ) ) . '">View all products</a></p>';
}
?>
</div>
</div>
</section>

<section class="categories-section">
<div style="max-width: 1200px; margin: 0 auto;">
<h2 class="section-title">Shop by Category</h2>
<div class="categories-grid">
<?php
$categories = get_terms( array(
'taxonomy' => 'product_cat',
'hide_empty' => true,
'number' => 6
) );

if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
foreach ( $categories as $cat ) {
$cat_link = get_term_link( $cat );
$product_count = $cat->count;
?>
<div class="cat-card">
<a href="<?php echo esc_url( $cat_link ); ?>" style="text-decoration: none; color: inherit;">
<strong><?php echo esc_html( $cat->name ); ?></strong>
<small><?php echo esc_html( $product_count . ' items' ); ?></small>
</a>
</div>
<?php 
}
}
?>
</div>
</div>
</section>

<section class="trust-section">
<div style="max-width: 1200px; margin: 0 auto;">
<h2 class="section-title">Why Choose Us</h2>
<div class="trust-grid">
<div class="trust-box">
<div class="trust-icon">✓</div>
<h4>100% Authentic</h4>
<p>All products are genuine and verified</p>
</div>
<div class="trust-box">
<div class="trust-icon">🚚</div>
<h4>Fast Shipping</h4>
<p>Quick delivery with tracking</p>
</div>
<div class="trust-box">
<div class="trust-icon">💰</div>
<h4>Best Prices</h4>
<p>Competitive pricing with discounts</p>
</div>
<div class="trust-box">
<div class="trust-icon">🔒</div>
<h4>Secure Checkout</h4>
<p>Safe payment with multiple options</p>
</div>
</div>
</div>
</section>
</main>

<?php get_footer();



