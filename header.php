<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>

<head>
    <meta charset="<?php echo get_bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <style>
        .menu-link.active .menu-div {
            background: <?php echo esc_html(get_theme_mod('web_color')); ?> !important;
            color: #fff !important;
        }
        .optimize-fonts a {
            color: <?php echo esc_html(get_theme_mod('web_color')); ?>;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="col-12 p-0">
        <div class="container px-2 py-5 p-md-5 my-0 my-md-5">
            <?php get_template_part('template-parts/avatar-part') ?>
            <div class="col-12 py-3">
                <?php get_template_part('template-parts/social-media-part'); ?>
                <?php get_template_part('template-parts/menu-part') ?>
                <div class="col-12 p-0" style="overflow:hidden;position: relative;">
                    <div style="position:absolute;width: 100%;height: 40vh;z-index: 1;transition: .5s all ease-in-out;display: flex;"
                        class="justify-content-center align-items-center loading-overlay">
                        <div class="spinner-grow" role="status" style="color:<?php echo esc_html(get_theme_mod('web_color')); ?>">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>