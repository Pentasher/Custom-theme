<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Write_Blog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                <?php
                if ( have_posts() ) :

                    $class = 'write-blog-posts-lists';

                    /*Check for masonry settings*/
                    $enable_masonry_post_archive = write_blog_get_option( 'enable_masonry_post_archive', true );
                    if( $enable_masonry_post_archive ){
                        $class = 'masonry-grid masonry-col';
                    }
                    /**/

                    echo '<div class="'.esc_attr($class).'">';
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile;
                    echo '</div>';
                    /**
                     * Hook - write_blog_posts_navigation.
                     *
                     * @hooked: write_blog_display_posts_navigation - 10
                     */
                    do_action( 'write_blog_posts_navigation' );

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
