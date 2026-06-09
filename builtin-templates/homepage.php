<?php
/**
 * Template: Homepage
 * Theme: Commerce
 * Builder: Vanilla PHP
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
do_action( 'builtin-commerce_template_before' );
?>
<main class="builtin-commerce-homepage">
    <div class="container">
        <section class="hero-section">
            <h2>Hero Section</h2>
            {{ hero_content }}
        </section>
        <section class="main-section">
            <h2>Main Content</h2>
            {{ main_content }}
        </section>
    </div>
</main>
<?php
do_action( '{}_template_after' );
get_footer();
?>