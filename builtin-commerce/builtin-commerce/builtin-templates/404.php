<?php
/**
 * Template: 404
 * Theme: Commerce
 * Builder: Vanilla PHP
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
do_action( 'builtin-commerce_template_before' );
?>
<main class="builtin-commerce-404">
    <div class="container">
        <section class="error-section">
            <h2>404 Error</h2>
            {{ error_content }}
        </section>
    </div>
</main>
<?php
do_action( '{}_template_after' );
get_footer();
?>