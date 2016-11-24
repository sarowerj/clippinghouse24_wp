<?php
/**
 * Template Name: Gallery
 * The template for displaying Gallery Page
 *
 * @package WordPress
 * @subpackage Clipping Path
 * @since Clipping Path 1.0
 */
get_header();
?>
<!-- Extra Resources-->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/3dParty/colorbox/colorbox.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/portfolio.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/page-nav.css"/>

<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.isotope.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/isotope/isotope.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/colorbox/jquery.colorbox-min.js"></script>

<!-- End Extra Resources -->
<?php
while (have_posts()) : the_post();
    include('inner_header.php');
    ?>
    <!-- Extra Resources-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pricing-tables.css" />
    <!-- End Extra Resources -->
    <main class="inner_page">
        <div class="pi-section-w pi-section-white piCounter">
            <div class="pi-section pi-padding-bottom-30">
                <!-- Filter -->
                <div class="pi-pagenav pi-big pi-text-center pi-padding-bottom-30" data-isotope-nav="isotope">
                    <ul>
                        <li><a href="#" class="pi-active" data-filter="*">All</a></li>
                        <?php
                        $args = array(
                            'post_type' => 'gallery',
                            'posts_per_page' => -1
                        );
                        $loop_filter = new WP_Query($args);
                        while ($loop_filter->have_posts()) : $loop_filter->the_post();
                            ?>
                            <li>
                                <a href="#" data-filter=".<?php echo $post->post_name ?>"><?php the_title(); ?></a>
                            </li>
                            <?php
                        endwhile;
                        ?>
                    </ul>
                </div>
                <!-- End filter -->

                <div id="isotope" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">
                    <?php
                    $args = array(
                        'post_type' => 'gallery',
                        'posts_per_page' => -1
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <div class="<?php echo $post->post_name; ?> pi-col-sm-4 pi-col-xs-6 isotope-item">
                            <div class="pi-img-w pi-img-hover-zoom">
                                <?php the_post_thumbnail('medium'); ?>
                                <div class="pi-img-overlay pi-img-overlay-darker">
                                    <div class="pi-caption-centered">
                                        <div>
                                            <a href="<?php the_post_thumbnail_url(); ?>" class="pi-colorbox">
                                                <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                            </a>
                                            <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Butcher Baker</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (has_post_thumbnail()) { // checks if post has a featured image and then outputs it.     
                            $image_id = get_post_thumbnail_id($post->ID);
                            $image_thumb_url = wp_get_attachment_image_src($image_id, 'small-thumb');
                            $attr = array(
                                'class' => "gallery",
                            );
                        }
                        if (class_exists('MultiPostThumbnails')) {
                            $i = 1;
                            while ($i <= 5) {
                                $image_name = 'feature-image-' . $i;  // sets image name as feature-image-1, feature-image-2 etc.
                                if (MultiPostThumbnails::has_post_thumbnail('gallery', $image_name)) {
                                    $image_id = MultiPostThumbnails::get_post_thumbnail_id('gallery', $image_name, $post->ID);  // use the MultiPostThumbnails to get the image ID
                                    $image_thumb_url = wp_get_attachment_image_src($image_id, 'small-thumb');  // define thumb src based on image ID
                                    $image_feature_url = wp_get_attachment_image_src($image_id, 'feature-image'); // define full size src based on image ID
                                    $attr = array(
                                        'class' => "", // set custom class
                                        'rel' => $image_thumb_url[0], // sets the url for the image thumbnails size
                                        'src' => $image_feature_url[0], // sets the url for the full image size 
                                    );
                                    $image = wp_get_attachment_image($image_id, 'feature-image', false, $attr);
                                    ?>
                                    <div class="<?php echo $post->post_name; ?> pi-col-sm-4 pi-col-xs-6 isotope-item">
                                        <div class="pi-img-w pi-img-hover-zoom">
                                            <?= $image ?>
                                            <div class="pi-img-overlay pi-img-overlay-darker">
                                                <div class="pi-caption-centered">
                                                    <div>
                                                        <a href="<?= $image_feature_url[0]; ?>" class="pi-colorbox">
                                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                                        </a>
                                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white"><?php the_title() ?></a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                $i++;
                            }
                        }; // end if MultiPostThumbnails 
                        ?>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php
    if (has_excerpt($post->ID)) {
        the_excerpt();
    }
endwhile;
?>    
<?php get_footer(); ?>