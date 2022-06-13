<div class="col-12 p-0 justify-content-center d-flex row py-4">
    <?php
        $menus = wp_get_nav_menu_items('Top Menu');
        if(!empty($menus))
        {
            foreach ($menus as $menu) {
                $menu_item_icon = get_post_meta( $menu->ID, '_menu_item_icon', true );
                echo '<div class="p-1 text-center font-1 d-inline-block" style="width: 90px;">
                <a href="'. $menu->url .'" class="d-block menu-link"
                    style="border-radius: 7px;color: #232323;">
                    <div class="col-12 p-2 text-center main-box-styles menu-div d-flex align-items-center"
                        style="height: 80px;border-radius: 7px;overflow: hidden;">
                        <div class="col-12 p-0 text-center">
                            <i class="'. $menu_item_icon .' d-inline-block font-3" aria-hidden="true"></i>
                            <div class="col-12 px-0 text-center title">
                                '. $menu->title .'
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
            }
        }
    ?>
</div>