<?php
/**
 * Template Name: Services
 */
get_header();
while (have_posts()) : the_post();
    ?>
    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <?php include('inner_header.php'); ?>
    <!-- - - - - - - - - - END SECTION - - - - - - - - - -->




    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <main class="inner_page">
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
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
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
            </div>
        </div>
        <?php
        $args = array(
            'posts_per_page' => 1,
            'offset' => 0,
            'category' => '',
            'category_name' => 'Work with us',
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'post',
            'post_mime_type' => '',
            'post_parent' => '',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => true
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <!-- - - - - - - - - - SECTION - - - - - - - - - -->
            <div class="pi-section-w pi-shadow-inside-top pi-section-parallax" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                <div class="pi-texture" style="background: rgba(31, 37, 44, 0.85);"></div>
                <div class="pi-section pi-padding-top-110 pi-padding-bottom-100 pi-text-center">
                    <h3 class="pi-uppercase pi-weight-700 pi-letter-spacing pi-margin-bottom-20">
                        <?php the_title(); ?>
                    </h3>
                    <?php the_content();?>
                </div>
            </div>
            <!-- - - - - - - - - - END SECTION - - - - - - - - - -->
            <?php
        endwhile;
        ?>

    </main>
    <?php
endwhile;
get_footer();
?>