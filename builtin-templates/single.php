<?php
/**
 * Template: Single
 * Theme: Commerce
 * Builder: Builtin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
do_action( 'builtin-commerce_template_before' );
?>
<main class="builtin-commerce-single">
    <div class="container">
        <section class="post-section">
            <h2>Post Content</h2>
            {{ post_content }}
        </section>
    </div>
</main>
<?php
do_action( '{}_template_after' );
get_footer();
?>