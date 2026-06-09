<?php
/**
 * Template: Archive
 * Theme: Commerce
 * Builder: Vanilla PHP
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
do_action( 'builtin-commerce_template_before' );
?>
<main class="builtin-commerce-archive">
    <div class="container">
        <section class="header-section">
            <h2>Archive Header</h2>
            {{ archive_title }}
        </section>
        <section class="loop-section">
            <h2>Posts Loop</h2>
            {{ posts_loop }}
        </section>
    </div>
</main>
<?php
do_action( '{}_template_after' );
get_footer();
?>