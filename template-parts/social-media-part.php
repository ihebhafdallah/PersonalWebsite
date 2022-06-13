<h1 class="font-5 text-center" style="direction: ltr;flex-wrap: wrap;"><strong><?php echo get_bloginfo('name'); ?></strong></h1>
<div class="col-12 px-0 d-flex justify-content-center pt-2 pb-2" style="flex-wrap: wrap;">
    <?php
        $links = get_option('PersonalWebsite_social_options');
        if (is_array($links)) {
            foreach ($links as $network => $link) {
                if (!empty($link)) {
                    ?>
                        <a href="<?php echo esc_url($link); ?>" class="d-inline-block mx-1" style="color:<?php echo esc_html(get_theme_mod('web_color')); ?>" target="_blank">
                            <i class="fab fa-<?php echo esc_attr($network) ?>" aria-hidden="true"></i>
                        </a>
                    <?php
                }
            }
        }
    ?>
</div>