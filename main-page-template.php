<?php 
/**  
 * 
 * Template Name: Main Post Page
 * 
 */

 get_header(); ?>

<main>
    <section class="main-blog-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="post-image">
                    <ul id="slider-id" class="slider-class">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 1,
                            'post_status' => 'publish'
                        ));
                        foreach($recent_posts as $post) : ?>
                            <li>
                                <a href="<?php echo get_permalink($post['ID']) ?>">
                                    <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                                    <p class="slider-caption-class"><?php echo $post['post_title'] ?></p>
                                </a>
                            </li>
                        <?php endforeach; wp_reset_query(); ?>
                    </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col">
                            <div class="new-post">
                                <h2>New</h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="all-post">
                                <a href=""><h4>view all new</h4></a>
                            </div>
                        </div>
                    </div>
                    <ul id="slider-id" class="slider-class">
                        <?php
                        $categories = get_the_category();
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 4,
                            'post_status' => 'publish'
                        ));
                        foreach($recent_posts as $post) : ?>
                            <li>
                                <a href="<?php echo get_permalink($post['ID']) ?>">
                                    <div class="row">
                                        <div class="col">
                                            <span class="entry-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                        <div class="col">
                                            <span><?php
                                                if ( ! empty( $categories ) ) {
                                                    echo esc_html( $categories[0]->name );   
                                                }
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="slider-caption-class"><?php echo $post['post_title'] ?></p>
                                </a>
                            </li>
                        <?php endforeach; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>