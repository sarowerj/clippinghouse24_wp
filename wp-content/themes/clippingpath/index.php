<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-shadow-inside-top pi-section-dark">
    <div class="pi-texture" style="background: url(<?php echo get_template_directory_uri(); ?>/img/hexagon.png) repeat;"></div>
    <div class="pi-section pi-padding-top-50 pi-padding-bottom-30">

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 9 -->
            <div class="pi-col-sm-9 pi-center-text-xs">
                <h3 class="pi-weight-300">
                    Want to know our performance? 
                </h3>

                <p class="lead-16">
                    Don't feel hesitate to try us for free. We are alway ready to work. We will do maximum 5 trial images.
                </p>
            </div>
            <!-- End col 9 -->

            <div class="pi-clearfix pi-visible-xs"></div>

            <!-- Col 3 -->
            <div class="pi-col-sm-3 pi-text-right pi-center-text-xs">
                <p class="pi-margin-top-5">
                    <a href="#" class="btn pi-btn-base pi-btn-no-border pi-btn-big">
                        Free Trial
                    </a>
                </p>
            </div>
            <!-- End col 3 -->

        </div>
        <!-- End row -->

    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->





<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piCounter">
    <div class="pi-section pi-padding-bottom-30">

        <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
            What We Offer
        </h2>

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
                            <i class="<?=($icon!='')?$icon:'icon-clock'; ?>"></i>
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
                                    <?= the_title(); ?>
                                </p>
                                <p class="pi-italic">
                                    Executive Director <a href="#">Company Inc.</a>
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

                <!-- Progress bar -->
                <div class="pi-counter pi-counter-line pi-slave" data-counter-type="line" data-count-from="0" data-count-to="85" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                    <div class="pi-counter-count">
                        <p><i class="icon-globe pi-icon-left"></i>Global Communication</p>
                        <div class="pi-counter-progress pi-bar-four"></div>
                    </div>

                </div>
                <!-- End progress bar -->

                <!-- Progress bar -->
                <div class="pi-counter pi-counter-line" data-counter-type="line" data-count-from="0" data-count-to="85" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                    <div class="pi-counter-count">
                        <p><i class="icon-pencil pi-icon-left"></i>Clipping Path</p>
                        <div class="pi-counter-progress pi-bar-one"></div>
                    </div>

                </div>
                <!-- End progress bar -->

                <!-- Progress bar -->
                <div class="pi-counter pi-counter-line" data-counter-type="line" data-count-from="0" data-count-to="95" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                    <div class="pi-counter-count">
                        <p><i class="icon-pencil pi-icon-left"></i>Retouch</p>
                        <div class="pi-counter-progress pi-bar-two"></div>
                    </div>

                </div>
                <!-- End progress bar -->

                <!-- Progress bar -->
                <div class="pi-counter pi-counter-line pi-slave" data-counter-type="line" data-count-from="0" data-count-to="98" data-easing="easeInCirc" data-duration="2000" data-frames-per-second="10">

                    <div class="pi-counter-count">
                        <p><i class="icon-air pi-icon-left"></i>Layer and Hair Masking</p>
                        <div class="pi-counter-progress pi-bar-three"></div>
                    </div>

                </div>
                <!-- End progress bar -->

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
                        <?php the_post_thumbnail(); ?>
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


<?php get_footer(); ?>
