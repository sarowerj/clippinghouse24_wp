<?php
/**
 * The template for displaying pages
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

while (have_posts()) : the_post();
    include('inner_header.php');
    ?>
    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <main class="inner_page pricing">
        <div class="pi-section-w pi-section-white piCounter">
            <div class="pi-section pi-padding-bottom-30">
                <div class="pi-row pi-padding-bottom-20">
                    <?php
                    if (has_post_thumbnail()) {
                        ?>
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
                                            'class' => $post->post_type,
                                        );
                                    }
                                    if (class_exists('MultiPostThumbnails')) {
                                        $i = 1;
                                        while ($i <= 5) {
                                            $image_name = 'feature-image-' . $i;  // sets image name as feature-image-1, feature-image-2 etc.
                                            if (MultiPostThumbnails::has_post_thumbnail($post->post_type, $image_name)) {
                                                $image_id = MultiPostThumbnails::get_post_thumbnail_id($post->post_type, $image_name, $post->ID);  // use the MultiPostThumbnails to get the image ID
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
                            <?php the_content(); ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="pi-col-xs-12 pi-padding-bottom-40"> 
                            <?php the_content(); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (has_excerpt($post->ID)) {
            the_excerpt();
        }
        ?>
    </main>  
    <?php
endwhile;
?>    
<?php get_footer(); ?>
