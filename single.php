<?php
    get_header();
    if (have_posts()) {
        while(have_posts()) {
            the_post();
?>

<div class="col-12 p-0 main" style="transition: .5s all ease-in-out;">
    <div class="col-12 p-0">
        <div style="width:650px;max-width: 100%;text-align: justify;" class="mx-auto p-3 font-2 optimize-fonts">
            <h4 class="py-3 text-center fw-bold"><?php echo get_the_title();?></h4>
            <?php
                if(has_post_thumbnail())
                {
                    ?>
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" style="max-width: 100%;" data-fancybox="gallery" class="d-inline-block">
                    <?php
                }
            ?>
            <?php echo get_the_content();?>
        </div>
    </div>
</div>

<?php
        }
    }
    get_footer();
?>