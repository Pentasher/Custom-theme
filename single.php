<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Write_Blog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="container">
                <?php
                while ( have_posts() ) : the_post();

                    $format = get_post_format();
                    $format = (false === $format) ? 'single' : $format;

                    get_template_part( 'template-parts/content', $format );			


                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
