<?php
/**
 * Comments Template
 * 
 * @package Builtin_Commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( 1 === $comment_count ) {
                esc_html_e( 'One comment', 'builtinhost-commerce' );
            } else {
                echo esc_html(
                    sprintf(
                        _n( '%s comment', '%s comments', $comment_count, 'builtinhost-commerce' ),
                        $comment_count
                    )
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                )
            );
            ?>
        </ol>

        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="comment-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comment pagination', 'builtinhost-commerce' ); ?>">
                <div class="nav-previous">
                    <?php previous_comments_link( esc_html__( '&larr; Older comments', 'builtinhost-commerce' ) ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'builtinhost-commerce' ) ); ?>
                </div>
            </nav>
            <?php
        endif;
    endif;

    if ( comments_open() ) :
        comment_form();
    endif;
    ?>
</div>