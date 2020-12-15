<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Write_Blog
 */

get_header();

global $post;
$wrapper_start = $wrapper_end = '';
if (is_front_page()):
    if( $post->post_content != '') {
        $wrapper_start = '<section class="section-block section-static-enable"><div class="container">';
        $wrapper_end   = '</div></section>';
    }
endif;

?>
<?php echo $wrapper_start; ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php
            while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'page');


            endwhile; // End of the loop.
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php

echo $wrapper_end;
get_footer();
