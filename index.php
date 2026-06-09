<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * 
 * @package Builtin
 * @subpackage BuiltinStarterTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

get_header();
?>

<div id="primary" class="content-area">
<main id="main" class="site-main">
<?php
if ( have_posts() ) :
while ( have_posts() ) :
the_post();

if ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::instance()->documents->get( get_the_ID() ) ) :
// If Elementor is active and this page is built with Elementor
the_content();
else :
// Default post display
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="entry-header">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>

<div class="entry-content">
<?php
the_content(
	sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'builtinhost-commerce' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		wp_kses_post( get_the_title() )
	)
);

// Post pagination for single pages
if ( is_singular() ) {
	wp_link_pages(
		array(
			'before'      => '<nav class="pagination-nav">' . esc_html__( 'Pages:', 'builtinhost-commerce' ),
			'after'       => '</nav>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		)
	);
}
?>
</div>

<footer class="entry-footer">
<?php
if ( is_single() ) {
the_tags( '<span class="tag-links">', ', ', '</span>' );
}
?>
</footer>
</article>
<?php
endif;

endwhile;

// Post archive pagination
if ( ! is_singular() ) {
	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_text'          => esc_html__( '&larr; Previous', 'builtinhost-commerce' ),
			'next_text'          => esc_html__( 'Next &rarr;', 'builtinhost-commerce' ),
			'screen_reader_text' => esc_html__( 'Posts pagination', 'builtinhost-commerce' ),
		)
	);
}

if ( is_singular() ) :
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post', 'builtinhost-commerce' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'builtinhost-commerce' ) . '</span> <span class="nav-title">%title</span>',
		)
	);
	
	// Load comments template
	comments_template();
endif;
else :
?>
<article class="no-results">
<header class="entry-header">
<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'builtinhost-commerce' ); ?></h1>
</header>

<div class="entry-content">
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'builtinhost-commerce' ); ?></p>
</div>
</article>
<?php
endif;
?>
</main>
</div>

<?php
get_footer();
