<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();

echo do_shortcode('[rev_slider main_slider]');
?>


<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<?php echo do_shortcode('[FreeTrial color="black"]'); ?>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->


<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piCounter">
    <div class="pi-section pi-padding-bottom-30">
        <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">What We Offer</h2>
        <!-- Row -->
        <div class="pi-row">
            <?php
            $args = array(
                'post_type' => 'what_we_offer',
                'posts_per_page' => 6
            );
            $sr = 0;
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                $sr++;
                ?>
                <!-- Col 4 -->
                <div class="pi-col-xs-6 pi-col-sm-4 pi-padding-bottom-10">

                    <div class="pi-icon-box pi-icon-box-hover">
                        <div class="pi-icon-box-icon pi-icon-box-icon-base">
                            <?php
                            $icon = get_post_meta($post->ID, 'class_name', true);
                            ?>
                            <i class="<?= ($icon != '') ? $icon : 'icon-clock'; ?>"></i>
                        </div>

                        <div class="pi-icon-box-content">
                            <h4><a href="<?= the_permalink(); ?>" class="pi-link-dark"><?= the_title(); ?></a></h4>
                            <p class="pi-margin-bottom-10">
                                Our payment system is secure and hassle free. Payment can be completed via PayPal or by using a bank account or check (for US).
                            </p>
                            <p>
                                <a href="<?= the_permalink(); ?>">More info<i class="icon-right-open-mini pi-icon-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End col 4 -->

                <?php
                if ($sr % 3 == 0) {
                    ?>
                    <div class="pi-clearfix pi-visible-xs"></div>
                    <?php
                }
            endwhile;
            ?>
        </div>
        <!-- End row -->


        <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-25">
            Recent Work
        </h2>

        <!-- Portfolio gallery -->
        <div class="recent_work pi-row pi-liquid-col-xs-3 pi-gallery pi-padding-bottom-20">
            <?php
            $args = array(
                'post_type' => 'recent_work',
                'posts_per_page' => 4
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                ?>
                <!-- Portfolio item -->
                <div class="item pi-gallery-item pi-padding-bottom-40">
                    <div class="pi-img-w pi-img-round-corners pi-img-shadow">
                        <a href="<?= wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" class="pi-colorbox">
                            <?php echo get_the_post_thumbnail($post_id, 'medium'); ?>
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <h3 class="h6 pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-5"><a href="<?php the_permalink(); ?>" class="pi-link-dark">Bread and spikes</a></h3>
                </div>
                <!-- End portfolio item -->
                <?php
            endwhile;
            ?>
        </div>
        <!-- End portfolio gallery -->
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->



<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-parallax pi-slider-enabled" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/parallax_bg.jpg);">
    <div class="pi-texture" style="background: rgba(30, 35, 41, 0.7);"></div>
    <div class="pi-section pi-padding-top-100 pi-padding-bottom-80">

        <!-- Slider -->
        <div class="pi-slider-wrapper pi-slider-arrows-inside pi-slider-show-arrow-hover pi-text-center">
            <div class="pi-slider pi-slider-animate-opacity">

                <!-- Row -->
                <div class="pi-row">

                    <!-- Col 8 -->
                    <div class="pi-col-sm-8 pi-col-sm-offset-2">

                        <?php
                        $args = array(
                            'post_type' => 'testimonial',
                            'posts_per_page' => -1
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            $designation = get_post_meta($post->ID, 'designation', true);
                            $company_name = get_post_meta($post->ID, 'company_name', true);
                            ?>
                            <!-- Slide -->
                            <div class="pi-slide">	
                                <p class="lead-30 pi-margin-bottom-20 pi-text-white pi-text-shadow">
                                    <?= the_content(); ?>
                                </p>
                                <p class="pi-text-base">
                                    <i class="icon-star">
                                    </i>
                                    <i class="icon-star">
                                    </i>
                                    <i class="icon-star">
                                    </i>
                                </p>
                                <p class="lead-18 pi-weight-700 pi-text-white pi-uppercase pi-letter-spacing pi-margin-bottom-5">
                                    <a href="<?php the_permalink(); ?>"><?= the_title(); ?></a>
                                </p>
                                <p class="pi-italic">
                                    <?=$designation ?> <a href="#"><?=$company_name?></a>
                                </p>
                            </div>
                            <!-- End slide -->

                            <?php
                        endwhile;
                        ?> 

                    </div>
                    <!-- End col 8 -->

                </div>
                <!-- End row -->

            </div>
        </div>
        <!-- End slider -->

    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->




<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white">
    <div class="pi-section pi-padding-bottom-30">

        <!-- Row -->
        <div class="pi-row pi-padding-bottom-10">	

            <!-- Col 6 -->
            <div class="pi-col-sm-6 pi-padding-bottom-40">

                <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-20">
                    Who We Are
                </h2>

                <p class="lead-24 pi-weight-300">
                    <em>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus autem</em>
                </p>

                <p>
                    Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                    eligendi optio cumque nihil impedit quo facilis est et expedita distinctio minus id quod maxime placeat facere possimus, omnis voluptas
                    assumenda est, <a href="#">omnis dolor repellendus</a>. Temporibus autem cum soluta nobis est
                    eligendi quibusdam et aut officiis debitis autem cum soluta nobis est aut optio cumque nihil.
                </p>

            </div>
            <!-- End col 6 -->

            <!-- Col 6 -->
            <div class="pi-col-sm-6 pi-padding-bottom-40">

                <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
                    We Are Good At
                </h2>

                <?php
                $fld_name_1 = get_option('fld_name_1');
                $fld_value_1 = get_option('fld_value_1');
                $fld_name_2 = get_option('fld_name_2');
                $fld_value_2 = get_option('fld_value_2');
                $fld_name_3 = get_option('fld_name_3');
                $fld_value_3 = get_option('fld_value_3');
                $fld_name_4 = get_option('fld_name_4');
                $fld_value_4 = get_option('fld_value_4');
                ?>

                <?php
                if (!empty($fld_name_1)) {
                    ?>
                    <!-- Progress bar -->
                    <div class="pi-counter pi-counter-line pi-slave" data-counter-type="line" data-count-from="0" data-count-to="<?= $fld_value_1 ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                        <div class="pi-counter-count">
                            <p><i class="icon-globe pi-icon-left"></i><?= $fld_name_1 ?></p>
                            <div class="pi-counter-progress pi-bar-four"></div>
                        </div>

                    </div>
                    <!-- End progress bar -->
                    <?php
                }
                if (!empty($fld_name_2)) {
                    ?>

                    <!-- Progress bar -->
                    <div class="pi-counter pi-counter-line" data-counter-type="line" data-count-from="0" data-count-to="<?= $fld_value_2 ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                        <div class="pi-counter-count">
                            <p><i class="icon-pencil pi-icon-left"></i><?= $fld_name_2 ?></p>
                            <div class="pi-counter-progress pi-bar-one"></div>
                        </div>

                    </div>
                    <!-- End progress bar -->
                    <?php
                }
                if (!empty($fld_name_3)) {
                    ?>

                    <!-- Progress bar -->
                    <div class="pi-counter pi-counter-line" data-counter-type="line" data-count-from="0" data-count-to="<?= $fld_value_3 ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                        <div class="pi-counter-count">
                            <p><i class="icon-pencil pi-icon-left"></i><?= $fld_name_3 ?></p>
                            <div class="pi-counter-progress pi-bar-two"></div>
                        </div>

                    </div>
                    <!-- End progress bar -->
                    <?php
                }
                if (!empty($fld_name_4)) {
                    ?>

                    <!-- Progress bar -->
                    <div class="pi-counter pi-counter-line pi-slave" data-counter-type="line" data-count-from="0" data-count-to="<?= $fld_value_4 ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                        <div class="pi-counter-count">
                            <p><i class="icon-air pi-icon-left"></i><?= $fld_name_4 ?></p>
                            <div class="pi-counter-progress pi-bar-three"></div>
                        </div>

                    </div>
                    <!-- End progress bar -->
                    <?php
                }
                ?>

            </div>
            <!-- End col 6 -->

        </div>
        <!-- End row -->

        <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
            Meet The Team
        </h2>

        <!-- Row -->
        <div class="pi-row team_members">



            <?php
            $args = array(
                'post_type' => 'our_team',
                'posts_per_page' => 4
            );
            $sr = 0;
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                $sr++;
                ?>

                <!-- Col 3 -->
                <div class="pi-col-xs-6 pi-col-sm-3 pi-padding-bottom-20 item">

                    <!-- Team member -->
                    <div class="pi-img-w pi-img-round-corners pi-img-shadow">
                        <?php echo get_the_post_thumbnail($post_id, 'medium'); ?>
                        <div class="pi-img-overlay pi-img-overlay-darker">
                            <div class="pi-caption-centered">
                                <div>
                                    <?php
                                    $facebook = get_post_meta($post->ID, 'facebook', true);
                                    if (!empty($facebook)) {
                                        ?>
                                        <a target="_blank" href="https://www.facebook.com/<?= $facebook ?>">
                                            <span class="pi-caption-icon pi-caption-icon-small pi-caption-scale icon-facebook"></span>
                                        </a>
                                        <?php
                                    }
                                    $twitter = get_post_meta($post->ID, 'twitter', true);
                                    if (!empty($twitter)) {
                                        ?>
                                        <a href="https://twitter.com/<?= $twitter ?>">
                                            <span class="pi-caption-icon pi-caption-icon-small pi-caption-scale icon-twitter"></span>
                                        </a>
                                        <?php
                                    }
                                    $linked_in_social_id = get_post_meta($post->ID, 'linked_in', true);
                                    if (!empty($linked_in_social_id)) {
                                        ?>
                                        <a href="https://www.linkedin.com/in/<?= $linked_in_social_id ?>">
                                            <span class="pi-caption-icon pi-caption-icon-small pi-caption-scale icon-linkedin"></span>
                                        </a>
                                        <?php
                                    }
                                    $instagram_social_id = get_post_meta($post->ID, 'instagram', true);
                                    if (!empty($instagram_social_id)) {
                                        ?>
                                        <a href="https://www.instagram.com/<?= $instagram_social_id ?>">
                                            <span class="pi-caption-icon pi-caption-icon-small pi-caption-scale icon-instagram"></span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <?php the_content(); ?>
                                    <p><a href="<?php the_permalink(); ?>" class="btn pi-btn-base">Read More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="pi-weight-700 pi-uppercase pi-letter-spacing"><?php the_title(); ?></h6>	
                    <p class="pi-italic pi-text-base">
                        <?php echo get_post_meta($post->ID, 'designation', true); ?>
                    </p>
                    <!-- End team member -->

                </div>
                <!-- End col 3 -->

                <?php
                if ($sr % 2 == 0) {
                    ?>
                    <div class="pi-clearfix pi-visible-xs"></div>
                    <?php
                }
            endwhile;
            ?>

        </div>
        <!-- End row -->

    </div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<?php
$total_employees = get_option('total_employees');
$image_per_hour = get_option('image_per_hour');
$hours_per_day = get_option('hours_per_day');
$image_done = get_option('image_done');
?>
<div class="pi-section-w pi-section-parallax" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/parallax_bg.jpg);">
    <div class="pi-texture pi-section-overlay-base"></div>
    <div class="pi-section pi-padding-bottom-30">

        <!-- Row -->
        <div class="pi-row pi-grid-small-margins pi-text-center">

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-col-2xs-6 pi-padding-bottom-20">
                <div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="<?= $total_employees ?>" data-easing="easeInCirc" data-duration="1000" data-frames-per-second="0">
                    <div class="pi-counter-count pi-counter-count-big pi-text-white pi-weight-300">

                        <p>
                            <i class="icon-users pi-icon pi-icon-big pi-text-white"></i>
                        </p>

                        <div class="pi-counter-number"><?= $total_employees ?></div>

                    </div>
                    <p>Total Employees</p>
                </div>
            </div>
            <!-- End col 3 -->

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-col-2xs-6 pi-padding-bottom-20">
                <div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="<?= $image_per_hour ?>" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">
                    <div class="pi-counter-count pi-counter-count-big pi-text-white pi-weight-300">

                        <p>
                            <i class="icon-leaf pi-icon pi-icon-big pi-text-white"></i>
                        </p>

                        <span class="pi-counter-number"><?= $image_per_hour ?></span>

                    </div>
                    <p>Images per hour</p>
                </div>
            </div>
            <!-- End col 3 -->

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-col-2xs-6 pi-padding-bottom-20">
                <div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="<?= $hours_per_day ?>" data-easing="easeInCirc" data-duration="3000" data-frames-per-second="10">
                    <div class="pi-counter-count pi-counter-count-big pi-text-white pi-weight-300">

                        <p>
                            <i class="icon-clock pi-icon pi-icon-big pi-text-white"></i>
                        </p>

                        <span class="pi-counter-number"><?= $hours_per_day ?></span>

                    </div>
                    <p>Hours per day</p>
                </div>
            </div>
            <!-- End col 3 -->

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-col-2xs-6 pi-padding-bottom-20">
                <div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="<?= $image_done ?>" data-easing="easeInCirc" data-duration="4000" data-frames-per-second="10">
                    <div class="pi-counter-count pi-counter-count-big pi-text-white pi-weight-300">

                        <p>
                            <i class="icon-paper-plane pi-icon pi-icon-big pi-text-white"></i>
                        </p>

                        <span class="pi-counter-number"><?= $image_done ?></span>

                    </div>
                    <p>Image done</p>
                </div>
            </div>
            <!-- End col 3 -->

        </div>
        <!-- End row -->

    </div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<?php get_footer(); ?>
