                    <?php 
                        if (is_front_page()) {
                            get_template_part('template-parts/faq-part');
                        }
                    ?>
                    <div class="col-12 py-2">
                        <div style="width:650px;max-width: 100%;text-align: justify;"
                            class="mx-auto p-3 font-2 border-top justify-content-center">
                            <div class="mx-auto px-0 pt-3 text-center" style="width:180px ;font-size: 12px;">
                                <?php _e('All rights reserved', 'pw'); echo (" "); echo date("Y"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
    </body>
</html>