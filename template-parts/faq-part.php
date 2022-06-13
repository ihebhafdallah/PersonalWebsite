<div class="col-12 p-0">
    <div style="width:650px;max-width: 100%;text-align: justify;" class="mx-auto p-3 font-2">
        <div class="col-12 px-0 faq" style="transition: .5s all ease-in-out;">
            <!-- 1 -->
            <?php
            if (get_theme_mod('question-1', '') != NULL){
            ?>
            <div class="card px-1 mb-2">
                <div class="card-header border-0 btn px-2 py-1" id="headingOne3" data-bs-toggle="collapse"
                    href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                    <h5 class="mb-0">
                        <span class="row d-flex col-12 font-lg-2 font-1 p-2">
                            <div class="col px-0 text-start" style="line-height:1.8">
                                <strong><?php echo esc_html(get_theme_mod('question-1', '')); ?></strong>
                            </div>
                            <div class="col-1 px-0 d-flex align-items-center justify-content-end">
                                <i class="fa fa-angle-down font-3" aria-hidden="true"></i>
                            </div>
                        </span>
                    </h5>
                </div>
                <div id="collapseExample1" class="collapse" aria-labelledby="headingOne3">
                    <div class="card-body border-top border-0 font-2 optimize-fonts" style="line-height:1.8;text-align:justify;">
                    <?php echo wpautop( get_theme_mod( 'answer-1', '' ) ); ?>
                    </div>
                </div>
                
            </div>
            <?php
                }
            ?>
            <!-- 2 -->
            <?php
            if (get_theme_mod('question-2', '') != NULL){
            ?>
            <div class="card px-1 mb-2">
                <div class="card-header border-0 btn px-2 py-1" id="headingOne3" data-bs-toggle="collapse"
                    href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                    <h5 class="mb-0">
                        <span class="row d-flex col-12 font-lg-2 font-1 p-2">
                            <div class="col px-0 text-start" style="line-height:1.8">
                            <strong><?php echo esc_html(get_theme_mod('question-2', '')); ?></strong>
                            </div>
                            <div class="col-1 px-0 d-flex align-items-center justify-content-end">
                                <i class="fa fa-angle-down font-3" aria-hidden="true"></i>
                            </div>
                        </span>
                    </h5>
                </div>
                <div id="collapseExample2" class="collapse" aria-labelledby="headingOne3">
                    <div class="card-body border-top border-0 font-2 optimize-fonts" style="line-height:1.8;text-align:justify;">
                    <?php echo wpautop( get_theme_mod( 'answer-2', '' ) ); ?>
                    </div>
                </div>
                
            </div>
            <?php
                }
            ?>
            <!-- 3 -->
            <?php
            if (get_theme_mod('question-3', '') != NULL){
            ?>
            <div class="card px-1 mb-2">
                <div class="card-header border-0 btn px-2 py-1" id="headingOne3" data-bs-toggle="collapse"
                    href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                    <h5 class="mb-0">
                        <span class="row d-flex col-12 font-lg-2 font-1 p-2">
                            <div class="col px-0 text-start" style="line-height:1.8">
                            <strong><?php echo esc_html(get_theme_mod('question-3', '')); ?></strong>
                            </div>
                            <div class="col-1 px-0 d-flex align-items-center justify-content-end">
                                <i class="fa fa-angle-down font-3" aria-hidden="true"></i>
                            </div>
                        </span>
                    </h5>
                </div>
                <div id="collapseExample3" class="collapse" aria-labelledby="headingOne3">
                    <div class="card-body border-top border-0 font-2 optimize-fonts" style="line-height:1.8;text-align:justify;">
                        <?php echo wpautop( get_theme_mod( 'answer-3', '' ) ); ?>
                    </div>
                </div>
                
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>