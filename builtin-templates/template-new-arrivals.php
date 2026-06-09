<?php get_header(); ?>

<style>
.page-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 60px 25px; text-align: center; }
.page-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.page-header p { font-size: 16px; opacity: 0.9; }
.page-content { max-width: 1300px; margin: 0 auto; padding: 80px 25px; }
.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; }
.product-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; }
.product-card:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(0,0,0,0.12); }
.product-image { width: 100%; height: 280px; background: linear-gradient(135deg, #e63946, #ff6b6b); display: flex; align-items: center; justify-content: center; font-size: 70px; overflow: hidden; }
.product-image img { width: 100%; height: 100%; object-fit: cover; }
.product-info { padding: 25px; }
.product-name { font-size: 16px; font-weight: 700; color: #1a1a1a; margin-bottom: 10px; }
.product-name a { color: #1a1a1a; text-decoration: none; }
.product-name a:hover { color: #e63946; }
.product-price { font-size: 18px; font-weight: 800; color: #e63946; margin-bottom: 15px; }
.product-link { display: block; width: 100%; background: #1a1a1a; color: white; padding: 11px; border: none; border-radius: 5px; cursor: pointer; font-weight: 700; font-size: 13px; text-decoration: none; text-align: center; transition: all 0.3s ease; }
.product-link:hover { background: #e63946; }
.no-products { text-align: center; padding: 60px 25px; color: #666; }
@media (max-width: 768px) { .products-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; } }
</style>

<header class="page-header">
<h1>New Arrivals</h1>
<p>Check out our latest products</p>
</header>

<div class="page-content">
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
            'terms' => 'exclude-from-catalog',
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
                    the_post_thumbnail( 'woocommerce_thumbnail' );
                } else {
                    echo '??';
                }
                ?>
            </div>
            <div class="product-info">
                <h3 class="product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                <a href="<?php the_permalink(); ?>" class="product-link">View Product</a>
            </div>
        </div>
        <?php
    }
    echo '</div>';
    wp_reset_postdata();
} else {
    echo '<div class="no-products"><p>No products found. Check back soon for new arrivals!</p></div>';
}
?>
</div>

<?php get_footer(); ?>
