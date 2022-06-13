<?php
    get_header();
?>

<div class="col-12 p-0 main" style="transition: .5s all ease-in-out;">
    <div class="col-12 p-0">
        <div style="width:650px;max-width: 100%;text-align: justify;" class="mx-auto p-3 font-2 optimize-fonts">
            <h4 class="py-3 text-center fw-bold"><?php the_title();?></h4>
            <?php echo the_content();?>
        </div>
    </div>
</div>



<?php
    get_footer();
?>