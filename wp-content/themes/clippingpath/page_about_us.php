<?php
/**
 * Template Name: About Us
 */
get_header();
while (have_posts()) : the_post();
    ?>
    <!-- Extra Resources-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tabs.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/testimonials.css" />

    <script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.tab.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.tab.js"></script>

    <!-- End Extra Resources -->


    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <?php include('inner_header.php'); ?>
    <!-- - - - - - - - - - END SECTION - - - - - - - - - -->


    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <main class="inner_page">
        <div class="pi-section-w pi-section-white pi-slider-enabled">
            <div class="pi-section pi-padding-top-bottom-80">
                <div class="pi-row pi-padding-bottom-20">
                    <div class="pi-col-sm-6 pi-padding-bottom-40">
                        <!-- Slider -->
                        <div class="pi-slider-wrapper pi-slider-arrows-inside pi-slider-show-arrow-hover">
                            <div class="pi-slider pi-slider-animate-opacity">
                                <div class="pi-slide">
                                    <div class="pi-img-w pi-img-round-corners pi-img-shadow pi-img-with-overlay">
                                        <a href="javascript:void(0)"><?php the_post_thumbnail(); ?></a>
                                    </div>
                                </div>
                                <?php
                                if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.     
                                    $image_id = get_post_thumbnail_id($post->ID);
                                    $image_thumb_url = wp_get_attachment_image_src($image_id, 'small-thumb');
                                    $attr = array(
                                        'class' => "page",
                                    );
                                }
                                if (class_exists('MultiPostThumbnails')) {
                                    $i = 1;
                                    while ($i <= 5) {
                                        $image_name = 'feature-image-' . $i;  // sets image name as feature-image-1, feature-image-2 etc.
                                        if (MultiPostThumbnails::has_post_thumbnail('page', $image_name)) {
                                            $image_id = MultiPostThumbnails::get_post_thumbnail_id('page', $image_name, $post->ID);  // use the MultiPostThumbnails to get the image ID
                                            $image_thumb_url = wp_get_attachment_image_src($image_id, 'small-thumb');  // define thumb src based on image ID
                                            $image_feature_url = wp_get_attachment_image_src($image_id, 'feature-image'); // define full size src based on image ID
                                            $attr = array(
                                                'class' => "", // set custom class
                                                'rel' => $image_thumb_url[0], // sets the url for the image thumbnails size
                                                'src' => $image_feature_url[0], // sets the url for the full image size 
                                            );
                                            $image = wp_get_attachment_image($image_id, 'feature-image', false, $attr);
                                            ?>
                                            <!-- Slide -->
                                            <div class="pi-slide">
                                                <div class="pi-img-w pi-img-round-corners pi-img-shadow pi-img-with-overlay">
                                                    <a href="javascript:void(0)"><?= $image ?></a>
                                                </div>
                                            </div>
                                            <!-- End slide -->
                                            <?php
                                        }
                                        $i++;
                                    }
                                }; // end if MultiPostThumbnails 
                                ?>
                            </div>
                        </div>
                        <!-- End slider -->

                    </div>
                    <div class="pi-col-sm-6 pi-padding-bottom-40">
                        <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-20 pi-margin-top-minus-5">
                            <?php the_title(); ?>
                        </h2>
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="pi-row">
                    <div class="pi-col-sm-6">

                        <!-- Tabs -->
                        <ul class="pi-tabs-navigation pi-tabs-navigation-justified pi-tabs-navigation-transparent pi-responsive-sm" id="myTabs1">
                            <li class="pi-active"><a href="#history"><i class="icon-book-open"></i>History</a></li>
                            <li><a href="#vision"><i class="icon-eye"></i>Vision</a></li>
                            <li><a href="#phylosophy"><i class="icon-flash"></i>Phylosophy</a></li>
                        </ul>
                        <!-- End tabs -->

                        <!-- Tabs content -->
                        <div class="pi-tabs-content pi-tabs-content-transparent">
                            <!-- Tab content item -->
                            <div class="pi-tab-pane pi-active" id="history">
                                <?php dynamic_sidebar('history'); ?>
                            </div>
                            <!-- End tab content item -->
                            <!-- Tab content item -->
                            <div class="pi-tab-pane" id="vision">
                                <?php dynamic_sidebar('vision'); ?>
                            </div>
                            <!-- End tab content item -->
                            <!-- Tab content item -->
                            <div class="pi-tab-pane" id="phylosophy">
                                <?php dynamic_sidebar('phyloshopy'); ?>
                            </div>
                            <!-- End tab content item -->
                        </div>
                        <!-- End tabs content -->
                    </div>
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
                </div>
                <hr class="pi-divider-gap-60">
                <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
                    Core Values
                </h2>

                <!-- Values -->
                <div class="pi-row values">

                    <?php
                    $args = array(
                        'post_type' => 'core_values',
                        'posts_per_page' => -1
                    );
                    $sr = 0;
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        $sr++;
                        ?>
                        <!-- Value item -->
                        <div class="pi-col-sm-4">
                            <div class="pi-icon-box">
                                <div class="pi-icon-box-icon pi-icon-box-icon-square pi-icon-box-icon-base" style="background: <?= get_post_meta($post->ID, 'color_code', true) ?>;">
                                    <i class="<?= get_post_meta($post->ID, 'class_name', true) ?>"></i>
                                </div>
                                <div class="pi-icon-box-content-2">
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_content(); ?>
                                    <hr class="pi-divider-gap-10">
                                </div>
                            </div>
                        </div>
                        <!-- End value item -->

                        <?php
                    endwhile;
                    ?>
                </div>
                <!-- End values --> 

                <hr class="pi-divider-gap-60">
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

                <hr class="pi-divider-gap-30"> 

                <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
                    Some of Our <a href="javascript:void(0)">Clients</a>
                </h2>

                <!-- Logos gallery -->
                <div class="our_clients pi-row pi-liquid-col-2xs-2 pi-liquid-col-sm-5 pi-gallery pi-gallery-small-margins">

                    <?php
                    $args = array(
                        'post_type' => 'our_clients',
                        'posts_per_page' => -1
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <!-- Logo -->
                        <div class="item pi-gallery-item">
                            <div class="pi-img-w pi-tooltip" data-placement="top" title="" data-original-title="Amazon">
                                <a href="<?php the_permalink(); ?>">
                                    <span class="pi-img-border-double pi-img-opacity-30" style="background: #f8fafa;">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- End logo -->
                        <?php
                    endwhile;
                    ?>

                </div>
                <!-- End logos gallery -->

                <hr class="pi-divider-gap-60">

                <h2 class="h4 pi-weight-700 pi-uppercase pi-letter-spacing pi-has-bg pi-margin-bottom-30">
                    What People <a href="javascript:void(0)">Say</a>
                </h2>

                <!-- Testimonials -->
                <div class="pi-row">
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
                        <div class="pi-col-sm-4">
                            <!-- Testimonial -->
                            <div class="pi-testimonial pi-testimonial-author-with-photo">
                                <div class="pi-testimonial-content pi-border pi-round pi-shadow pi-testimonial-content-quotes">
                                    <?php the_content(); ?>
                                </div>
                                <div class="pi-testimonial-author pi-clearfix">
                                    <span class="pi-testimonial-author-photo pi-img-round"><?php the_post_thumbnail('thumbnail'); ?></span>

                                    <div>
                                        <span class="pi-testimonial-author-name"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span> <br>
                                        <span class="pi-testimonial-author-company"><?= $designation; ?> <a href="javascript:void(0)"><?= $company_name; ?></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End testimonial -->
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <!-- End testimonials -->
            </div>
        </div>
    </main>
    <?php
    if (has_excerpt($post->ID)) {
        the_excerpt();
    }
endwhile;
get_footer();
?>