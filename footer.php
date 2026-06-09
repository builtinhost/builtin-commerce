<?php
/**
 * Footer template for builtin-commerce theme
 * @package Builtin
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
</main>

<footer class="commerce-footer">
<div class="footer-wrap">
<div class="footer-col">
<h4><?php bloginfo("name"); ?></h4>
<p><?php bloginfo("description"); ?></p>
</div>
<div class="footer-col">
<h4>Customer Service</h4>
<ul>
<li><a href="<?php echo home_url("/contact"); ?>">Contact Us</a></li>
<li><a href="<?php echo home_url("/shipping"); ?>">Shipping</a></li>
<li><a href="<?php echo home_url("/returns"); ?>">Returns</a></li>
</ul>
</div>
<div class="footer-col">
<h4>Company</h4>
<ul>
<li><a href="<?php echo home_url("/about"); ?>">About</a></li>
<li><a href="<?php echo home_url("/privacy"); ?>">Privacy</a></li>
<li><a href="<?php echo home_url("/terms"); ?>">Terms</a></li>
</ul>
</div>
<div class="footer-col">
<h4>Follow</h4>
<ul>
<li><a href="#">Facebook</a></li>
<li><a href="#">Instagram</a></li>
<li><a href="#">Twitter</a></li>
</ul>
</div>
</div>
<div class="footer-bottom">
<p>&copy; <?php echo date("Y"); ?> <?php bloginfo("name"); ?>. All rights reserved.</p>
<p class="powered-by">Powered by <a href="https://builtinhost.com" target="_blank">BuiltinHost</a></p>
</div>
</footer>

<style>
.commerce-footer { background: #1a1a1a; color: white; padding: 80px 25px 30px; }
.footer-wrap { max-width: 1300px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 50px; margin-bottom: 50px; }
.footer-col h4 { font-size: 13px; font-weight: 700; margin-bottom: 16px; color: white; letter-spacing: 0.5px; text-transform: uppercase; }
.footer-col ul { list-style: none; }
.footer-col ul li { margin-bottom: 10px; }
.footer-col p { font-size: 13px; line-height: 1.7; opacity: 0.8; }
.footer-col a { color: #ff9999; text-decoration: none; font-size: 13px; transition: 0.3s; }
.footer-col a:hover { color: #e63946; }
.footer-bottom { border-top: 1px solid rgba(255,255,255,0.12); padding-top: 25px; text-align: center; color: #888; font-size: 12px; }
.powered-by { margin-top: 10px; }
.powered-by a { color: #ff9999; text-decoration: none; }
</style>

<?php wp_footer(); ?>
</body>
</html>
