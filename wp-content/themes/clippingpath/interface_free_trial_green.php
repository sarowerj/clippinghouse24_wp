<?php
$free_trial_title = get_option('free_trial_title');
$free_trial_text = get_option('free_trial_text');
$free_trial_link = get_option('free_trial_link');
?>
<div class="pi-section-w pi-shadow-inside-top pi-section-base">
    <div class="pi-texture" style="background: url(<?php echo get_template_directory_uri(); ?>/img/hexagon.png) repeat;"></div>
    <div class="pi-section pi-padding-top-50 pi-padding-bottom-30">

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 9 -->
            <div class="pi-col-sm-9 pi-center-text-xs">
                <h3 class="pi-weight-300 pi-text-white"><?= $free_trial_title ?></h3>

                <p class="lead-16"><?= $free_trial_text ?></p>
            </div>
            <!-- End col 9 -->

            <div class="pi-clearfix pi-visible-xs"></div>

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-text-right pi-center-text-xs">
                <p class="pi-margin-top-5">
                    <a href="<?= $free_trial_link ?>" class="btn pi-btn-base-2 pi-btn-big">
                        Free Trial
                    </a>
                </p>
            </div>
            <!-- End col 3 -->
        </div>
        <!-- End row -->
    </div>
</div>