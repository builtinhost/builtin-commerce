<?php
get_header(); ?>

<style>
.category-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 60px 25px; text-align: center; }
.category-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.category-header p { font-size: 16px; opacity: 0.9; }
.filters { max-width: 1300px; margin: 0 auto; padding: 30px 25px 0; display: flex; gap: 15px; flex-wrap: wrap; }
.filter-btn { background: white; padding: 10px 18px; border: 1px solid #e0e0e0; border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease; }
.filter-btn.active { background: #e63946; color: white; border-color: #e63946; }
.filter-btn:hover { border-color: #e63946; }
.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; margin-bottom: 60px; }
.product-item { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; }
.product-item:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.12); }
.product-image { width: 100%; height: 280px; background: linear-gradient(135deg, #e63946, #ff6b6b); display: flex; align-items: center; justify-content: center; font-size: 70px; }
.product-info { padding: 25px; }
.product-name { font-size: 16px; font-weight: 700; color: #1a1a1a; margin-bottom: 10px; }
.product-price { font-size: 18px; font-weight: 800; color: #e63946; margin-bottom: 15px; }
.product-btn { display: block; width: 100%; background: #1a1a1a; color: white; padding: 11px; border: none; border-radius: 5px; cursor: pointer; font-weight: 700; font-size: 13px; transition: all 0.3s ease; }
.product-btn:hover { background: #e63946; }
@media (max-width: 768px) { .filters { flex-direction: column; } .products-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; } }
</style>

<header class="category-header">
<h1><?php single_term_title(); ?></h1>
<p><?php echo term_description(); ?></p>
</header>

<div class="filters">
<?php
$categories = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
) );

foreach( $categories as $cat ) {
    $class = ( is_tax( 'product_cat', $cat->term_id ) ) ? 'active' : '';
    echo '<a href="' . get_term_link( $cat ) . '" class="filter-btn ' . $class . '">' . $cat->name . '</a>';
}
?>
</div>

<div class="woo-content">
<div class="products-grid">
<?php
if ( woocommerce_product_loop() ) {
    while ( have_posts() ) {
        the_post();
        global $product;
        ?>
        <div class="product-item">
            <div class="product-image">??</div>
            <div class="product-info">
                <h3 class="product-name"><?php the_title(); ?></h3>
                <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                <a href="<?php the_permalink(); ?>" class="product-btn">View Product</a>
            </div>
        </div>
        <?php
    }
    woocommerce_pagination();
}
?>
</div>
</div>

<?php get_footer(); ?>
