<?php
/**
 * Template Name: Gallery
 * The template for displaying Gallery Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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
                                            <?=$image ?>
                                            <div class="pi-img-overlay pi-img-overlay-darker">
                                                <div class="pi-caption-centered">
                                                    <div>
                                                        <a href="<?=$image_feature_url[0];?>" class="pi-colorbox">
                                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                                        </a>
                                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white"><?php the_title()?></a></h3>
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
                    ?>
                    <!--<div class="Illustration pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-2.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-2.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Butcher Baker</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Illustration</a></li>
                                            <li><i class="icon-user"></i><a href="http://nicklein.wordpress.com/page/3/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Photography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-3.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-3.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">exlporedddddd = ]</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Photography</a></li>
                                            <li><i class="icon-user"></i><a href="http://www.flickr.com/photos/glenncoco-vc/4292434778/in/faves-emoemolay/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Illustration pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-4.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-4.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">The flower fairy</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Printing</a></li>
                                            <li><i class="icon-user"></i><a href="http://engkit.deviantart.com/art/The-flower-fairy-463955391">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Illustration pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-5.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-5.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Sinnes Junkie</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Illustration</a></li>
                                            <li><i class="icon-user"></i><a href="http://sinnesjunkie.tumblr.com/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Print pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-6.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-6.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Cavin Spacey</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Print</a></li>
                                            <li><i class="icon-user"></i><a href="https://www.behance.net/gallery/Cavin-Spacey/908808">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Illustration pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-7.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-7.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Geometric Tiger</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Illustrtion</a></li>
                                            <li><i class="icon-user"></i><a href="http://themetapicture.com/geometric-tiger-made-from-triangles/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Typography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-8.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-8.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Hope – Chalk Typography</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Typography</a></li>
                                            <li><i class="icon-user"></i><a href="http://theberry.com/2014/06/04/dont-worry-be-happy-40-photos-4/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Typography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-9.png" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-9.png" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Love Letters</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Typography</a></li>
                                            <li><i class="icon-user"></i><a href="https://d13yacurqjgara.cloudfront.net/users/25514/screenshots/1526373/love-letters-ramotion-logo-design-lettering.png">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Photography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-10.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-10.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">The Shadow of the Bridge</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Photography</a></li>
                                            <li><i class="icon-user"></i><a href="http://www.fromupnorth.com/photography-inspiration-1015/">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Photography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-11.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-11.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Light</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Photography</a></li>
                                            <li><i class="icon-user"></i><a href="http://serialthriller.com/post/27407872793/light">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Illustration pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-12.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-12.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Spirales</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Illustration</a></li>
                                            <li><i class="icon-user"></i><a href="https://www.behance.net/gallery/12266703/SPIRALES">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Typography pi-col-sm-4 pi-col-xs-6 isotope-item">
                        <div class="pi-img-w pi-img-hover-zoom">
                            <img src="img_external/gallery/port-13.jpg" alt="">
                            <div class="pi-img-overlay pi-img-overlay-darker">
                                <div class="pi-caption-centered">
                                    <div>
                                        <a href="img_external/gallery/port-13.jpg" class="pi-colorbox">
                                            <span class="pi-caption-icon pi-caption-scale icon-search"></span>
                                        </a>
                                        <h3 class="h4 pi-weight-300"><a href="#" class="pi-link-white">Custom typography sculptures</a></h3>
                                        <ul class="pi-caption-links">
                                            <li><i class="icon-tag"></i><a href="#">Typography</a></li>
                                            <li><i class="icon-user"></i><a href="http://www.creativebloq.com/typography/custom-typography-sculptures-create-beautiful-objects-9134413">Author</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
endwhile;
?>    
<?php get_footer(); ?>