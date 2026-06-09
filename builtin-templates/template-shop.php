<?php get_header(); ?>

<style>
.shop-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 100px 25px; text-align: center; }
.shop-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.shop-header p { font-size: 16px; opacity: 0.9; }
.shop-content { max-width: 1300px; margin: 0 auto; padding: 80px 25px; }
.products-grid { display: grid !important; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)) !important; gap: 30px !important; list-style: none !important; padding: 0 !important; margin: 0 !important; }
.product-card, .products-grid li { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; display: block !important; margin: 0 !important; }
.product-card:hover, .products-grid li:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.12); }
.product-image { width: 100%; height: 280px; background: linear-gradient(135deg, #e63946, #ff6b6b); display: flex; align-items: center; justify-content: center; font-size: 70px; overflow: hidden; }
.product-image img { width: 100%; height: 100%; object-fit: cover; }
.product-info { padding: 25px; }
.product-name { font-size: 16px; font-weight: 700; color: #1a1a1a; margin-bottom: 10px; }
.product-price { font-size: 18px; font-weight: 800; color: #e63946; margin-bottom: 15px; }
.product-link, .woocommerce a.button { display: block !important; width: 100%; background: #1a1a1a; color: white !important; padding: 11px; border: none; border-radius: 5px; text-align: center; font-weight: 700; text-decoration: none !important; cursor: pointer; }
.product-link:hover, .woocommerce a.button:hover { background: #e63946; }
@media (max-width: 768px) { .products-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)) !important; gap: 20px !important; } }
</style>

<header class="shop-header">
<h1>Shop</h1>
<p>Explore our premium collections</p>
</header>

<div class="shop-content">
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'slug',
            'terms' => array( 'exclude-from-catalog' ),
            'operator' => 'NOT IN',
        ),
    ),
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) {
    echo '<div class="products-grid">';
    while ( $products->have_posts() ) {
        $products->the_post();
        global $product;
        ?>
        <div class="product-card">
            <div class="product-image">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'woocommerce_thumbnail', array( 'style' => 'width: 100%; height: 100%;' ) );
                } else {
                    echo '📦';
                }
                ?>
            </div>
            <div class="product-info">
                <h3 class="product-name"><?php the_title(); ?></h3>
                <div class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
                <a href="<?php the_permalink(); ?>" class="product-link">View Product</a>
            </div>
        </div>
        <?php
    }
    echo '</div>';
    wp_reset_postdata();
} else {
    echo '<div style="text-align: center; padding: 100px 25px; color: #666;">';
    echo '<p>No products found. Start adding products to display them here!</p>';
    echo '</div>';
}
?>
</div>

<?php get_footer(); ?>

