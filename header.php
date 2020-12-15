<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Write_Blog
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>
<?php
$enable_preloader = write_blog_get_option('enable_preloader', true);
$style = 'style="display:none"';
if ($enable_preloader) {
    $style = '';
}
?>
    <div class="preloader" <?php echo $style; ?>>
        <div class="loader-wrapper">
            <div class="blobs">
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"/>
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"/>
                        <feBlend in="SourceGraphic" in2="goo"/>
                    </filter>
                </defs>
            </svg>
        </div>
    </div>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'write-blog'); ?></a>
    <header id="thememattic-header" class="site-header">
        <?php
        $enable_header_image_class = '';
        if (has_header_image()) {
            $enable_header_image_class = "header-image-enabled";
        } else {
            $enable_header_image_class = "header-image-disabled";
        }
        ?>

        <?php $header_image = write_blog_get_option('enable_header_overlay', false);
        $header_image_class = "";
        if ($header_image = false) {
            $header_image_class = "header-overlay-disabled";
        } else {
            $header_image_class = "header-overlay-enabled";
        }
        ?>
        <div class="thememattic-midnav data-bg <?php echo esc_attr($enable_header_image_class); ?> <?php echo esc_attr($header_image_class); ?>"
             data-background="<?php echo(get_header_image()); ?>">
            <div class="container-fluid">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                 rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;

                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <h1 class="site-description primary-font">
                            <?php echo $description; ?>
                        </h1>
                    <?php
                    endif;
                    ?>
                </div>
            </div>

            <?php $enable_header_images = write_blog_get_option('enable_header_overlay', false);
            if ($enable_header_images == true) { ?>
                <div class="header-image-overlay"></div>
            <?php }
            ?>
        </div>

    </header><!-- #masthead -->

<?php
if (is_front_page()) {
    /**
     * Hook - write_blog_home_section.
     *
     * @hooked write_blog_banner_content - 10
     * @hooked write_blog_featured_categories - 20
     * @hooked write_blog_home_full_grid_cat - 30
     * @hooked write_blog_home_panel_grid_cat - 40
     */
    do_action('write_blog_home_section');
} else {
    /**
     * Hook - write_blog_inner_header.
     *
     * @hooked write_blog_display_inner_header - 10
     */
    do_action('write_blog_inner_header');
    ?>
    <div id="content" class="site-content">
    <?php
}