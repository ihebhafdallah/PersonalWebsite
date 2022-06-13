<div class="col-12 p-0 text-center">
    <?php
        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo '<img src="'.$image[0].'" style="width:150px;border-radius:50%;" class="d-inline-block">';
        }
    ?>
</div>