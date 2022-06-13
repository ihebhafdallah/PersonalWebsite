<?php
    get_header();
?>

<div class="col-12 p-0 main" style="transition: .5s all ease-in-out;">
    <div class="col-12 p-0">
        <div style="max-width: 100%;text-align: justify;" class="mx-auto p-3 font-2 optimize-fonts">
            <div class="col-12 row p-2 d-flex justify-content-center">

                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            $post_id = get_the_ID();
                            $post_link = get_the_permalink();
                            $post_title = get_the_title();
                            ?>
                            <div class="col-12 col-12 col-md-6 col-lg-3">
                                <a href="<?php echo $post_link?>" class="d-block">
                                    <div class="col-12 p-0 ">
                                        <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" style="width:100%;">
                                        <div class="col-12 p-2 text-center ">
                                            <h2 style="font-size:15px;line-height: 1.8;"><?php echo $post_title?></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            

                            
                <?php
                        }
                    echo '<div class="pagination m-auto"> ' . paginate_links() . ' </div>';
                    }
                ?>
                
            </div>
                        
        </div>
    </div>
</div>


<?php
    get_footer();
?>