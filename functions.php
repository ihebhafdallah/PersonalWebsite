<?php

/**
 * Register and Enqueue Styles.
 *
 * @since Personal Website 1.0
 */
if (!function_exists('PersonalWebsite_register_styles')) {
    function PersonalWebsite_register_styles() {
        $base = get_template_directory_uri();
        if (is_rtl()) {
            wp_enqueue_style( 'Bootstrap V5', $base . '/assets/css/bootstrap.rtl.min.css');
        }
        else {
            wp_enqueue_style( 'Bootstrap V5', $base . '/assets/css/bootstrap.min.css');
        }
        wp_enqueue_style( 'Font Awesome Free', $base . '/assets/css/all.css');
        wp_enqueue_style( 'Responsive Font v1.0', $base . '/assets/css/responsive-font.css');
        wp_enqueue_style( 'Main Style v1.0', $base . '/assets/css/style.css');
    
    }
    add_action( 'wp_enqueue_scripts', 'PersonalWebsite_register_styles' );
}


/**
 * Register and Enqueue Scripts.
 *
 * @since Personal Website 1.0
 */
if (!function_exists('PersonalWebsite_register_scripts')){
    function PersonalWebsite_register_scripts() {
        $base = get_template_directory_uri();
        wp_enqueue_script( 'jQuery v3.5.1', $base . '/assets/js/jquery.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'Bootstrap v5 JS', $base . '/assets/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'Main JS v1.0', $base . '/assets/js/main.js', array(), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'PersonalWebsite_register_scripts' );
}

/**
 * Register and Enqueue Styles and Scripts For Admin Panel
 *
 * @since Personal Website 1.0
 */

add_action('admin_enqueue_scripts', function(){
    $base = get_template_directory_uri();
    wp_enqueue_style( 'Font Awesome Free', $base . '/assets/css/all.css');
    wp_enqueue_style('iconpicker-style', $base . '/assets/css/fontawesome-iconpicker.min.css');
    wp_enqueue_script('iconpicker-scripts', $base . '/assets/js/fontawesome-iconpicker.min.js', array(), '1.0.0', true );
    wp_enqueue_script('Admin JS v1.0', $base . '/assets/js/admin.js', array(), '1.0.0', true );
});


/**
 * Theme Support.
 *
 * @since Personal Website 1.0
 */
if (!function_exists('PersonalWebsite_setup')) {
    function PersonalWebsite_setup () {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-logo', [
            'width' => 512,
            'height' => 512,
        ]);
        register_nav_menus([
            'TopMenu' => 'Top Menu',
        ]);
        load_theme_textdomain( 'pw', get_stylesheet_directory(). '/languages' );
    }
    add_action('after_setup_theme', 'PersonalWebsite_setup');
}

/**
 * icon fields menu.
 *
 * @since Personal Website 1.0
 */
if (!function_exists('menu_item_icon')) {
    function menu_item_icon( $item_id, $item ) {
        $menu_item_icon = get_post_meta( $item_id, '_menu_item_icon', true );
        ?>
        <div style="clear: both;">
            <span class="icon"><?php _e('The icon', 'pw'); ?></span><br />
            <input type="hidden" class="nav-menu-id" value="<?php echo $item_id ;?>" />
            <div class="logged-input-holder" style ="direction:ltr;">
                <input class="widefat iconpicker" type="text" name="menu_item_icon[<?php echo $item_id ;?>]" id="menu-item-icon-<?php echo $item_id ;?>" value="<?php echo esc_attr( $menu_item_icon ); ?>" />
            </div>
        </div>
        <?php
    }
    add_action( 'wp_nav_menu_item_custom_fields', 'menu_item_icon', 10, 2 );
}

if (!function_exists('save_menu_item_icon')) {
    function save_menu_item_icon( $menu_id, $menu_item_db_id ) {
        if ( isset( $_POST['menu_item_icon'][$menu_item_db_id]  ) ) {
            $sanitized_data = sanitize_text_field( $_POST['menu_item_icon'][$menu_item_db_id] );
            update_post_meta( $menu_item_db_id, '_menu_item_icon', $sanitized_data );
        } else {
            delete_post_meta( $menu_item_db_id, '_menu_item_icon' );
        }
    }
    add_action( 'wp_update_nav_menu_item', 'save_menu_item_icon', 10, 2 );
}

if (!function_exists('show_menu_item_icon')) {
    function show_menu_item_icon( $title, $item ) {
        if( is_object( $item ) && isset( $item->ID ) ) {
            $menu_item_icon = get_post_meta( $item->ID, '_menu_item_icon', true );
            if ( ! empty( $menu_item_icon ) ) {
                $title .= '<p class="menu-item-icon">' . $menu_item_icon . '</p>';
            }
        }
        return $title;
    }
    add_filter( 'nav_menu_item_title', 'show_menu_item_icon', 10, 2 );
}

/**
 * Social Media Icons.
 *
 * @since Personal Website 1.0
 */
add_action('admin_menu', function() {
    add_menu_page(
        'SocialMedia',
        __('Social Media', 'pw'),
        'manage_options',
        'PersonalWebsite_social_media_options',
        'PersonalWebsite_social_media_options',
        'dashicons-share',
        25
    );
});

if (!function_exists('PersonalWebsite_social_media_options')) {
    function PersonalWebsite_social_media_options() {
        $networks = ['facebook', 'youtube', 'instagram', 'github', 'linkedin', 'twitter', 'whatsapp'];
        if (isset($_POST['_wpnonce'])) {
            if (!wp_verify_nonce($_POST['_wpnonce'], 'PersonalWebsite_social_options')) {
                wp_die();
            }
            $links = [];
            foreach ($networks as $network) {
                if (isset($_POST[$network])) {
                    $links[$network] = esc_url_raw($_POST[$network]);
                }
            }
            update_option('PersonalWebsite_social_options', $links, false);
        }
    ?>
    <div class="warp">
        <h1><?php _e('Social Media Link', 'pw')?></h1>
        <form action="" method="post">
            <table class="form-table">
                <?php
                    $links = get_option('PersonalWebsite_social_options');
                    foreach ($networks as $network) {
                        $link = isset($links[$network]) ? $links[$network] : '';
                        ?>
                            <tr>
                                <th><?php echo $network ?></th>
                                <td>
                                    <input type="url" name="<?php echo $network ?>" value="<?php echo $link ?>">
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
            <p class="submit">
                <input type="submit" value="<?php _e('Save Social Media', 'pw')?>" class="button button-primary">
            </p>
            <?php wp_nonce_field('PersonalWebsite_social_options'); ?>
        </form>
    </div> 
        
    <?php
    }
}

require_once (get_template_directory() . '/inc/customizer.php');

// TGM Plugin Activation Class
require_once (get_template_directory() . '/inc/lib/tgm-activation.php');