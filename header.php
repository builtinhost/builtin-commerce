<?php
/**
 * Header template for builtin-commerce theme
 * @package builtin-commerce
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }
body { font-family: 'Poppins', sans-serif; color: #1a1a1a; background: #fafafa; }
.commerce-header { background: white; border-bottom: 2px solid #e63946; padding: 14px 25px; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 10px rgba(230,57,70,0.06); }
.header-wrap { max-width: 1300px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
.store-logo { font-size: 19px; font-weight: 800; color: #e63946; text-decoration: none; letter-spacing: -0.5px; }
.header-actions { display: flex; gap: 28px; align-items: center; }
.header-nav { display: flex; gap: 30px; list-style: none; }
.header-nav a { color: #555; text-decoration: none; font-weight: 500; font-size: 12px; letter-spacing: 0.5px; transition: 0.3s ease; text-transform: uppercase; }
.header-nav a:hover { color: #e63946; }
.cart-btn { background: #e63946; color: white; padding: 9px 18px; border-radius: 5px; text-decoration: none; font-weight: 600; font-size: 12px; letter-spacing: 0.3px; transition: all 0.3s ease; position: relative; }
.cart-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(230,57,70,0.3); }
.cart-count { position: absolute; top: -8px; right: -8px; background: white; color: #e63946; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 11px; border: 2px solid #e63946; }
.page-header { background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; padding: 60px 25px; text-align: center; }
.page-header h1 { font-family: 'Playfair Display', serif; font-size: 48px; font-weight: 700; margin-bottom: 12px; }
.page-header p { font-size: 16px; opacity: 0.9; }
</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="commerce-header">
<div class="header-wrap">
<a href="<?php echo home_url(); ?>" class="store-logo"><?php bloginfo("name"); ?></a>
<div class="header-actions">
<nav><ul class="header-nav">
<li><a href="<?php echo home_url("/shop"); ?>">Shop</a></li>
<li><a href="<?php echo home_url("/about"); ?>">About</a></li>
<li><a href="<?php echo home_url("/contact"); ?>">Contact</a></li>
</ul></nav>
<a href="<?php echo wc_get_cart_url(); ?>" class="cart-btn">
Cart
<?php
if ( class_exists( 'WooCommerce' ) && WC()->cart ) {
$count = WC()->cart->get_cart_contents_count();
if ( $count > 0 ) {
echo '<span class="cart-count">' . intval( $count ) . '</span>';
}
}
?>
</a>
</div>
</div>
</header>

<main id="primary">
