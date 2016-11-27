<?php
/**
 * Template Name: Blog
 * The template for displaying Gallery Page
 *
 * @package WordPress
 * @subpackage Clipping Path
 * @since Clipping Path 1.0
 */
get_header();
while (have_posts()) : the_post();
    include('inner_header.php');
    ?>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.isotope.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/3dParty/isotope/isotope.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/3dParty/colorbox/jquery.colorbox-min.js"></script>

    <main class="inner_page">
        <div class="pi-section-w pi-section-white piCounter">
            <div class="pi-section pi-padding-bottom-30">
                <?php the_content(); ?>
                <div class="pi-row pi-padding-bottom-20 isotope" data-isotope-mode="masonry">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'category_name' => 'Blog',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        $date_time_array = explode(' ', $post->post_date);
                        $post_date = $date_time_array[0];
                        $youtube_video_id = get_post_meta($post->ID, 'youtube_video_id', true)
                        ?>
                        <div class = "pi-col-sm-4 pi-col-xs-6 isotope-item">
                            <div class = "pi-portfolio-item pi-portfolio-description-box pi-portfolio-item-round-corners">

                                <div class = "pi-img-w pi-img-round-corners pi-img-hover-zoom">
                                    <?php if (empty($youtube_video_id)) { ?>
                                        <a href = "<?php the_post_thumbnail_url() ?>" class = "pi-colorbox cboxElement">
                                            <?php the_post_thumbnail('medium'); ?>
                                            <div class = "pi-img-overlay pi-no-padding pi-img-overlay-dark">
                                                <div class = "pi-caption-centered">
                                                    <div>
                                                        <span class = "pi-caption-icon pi-caption-icon-dark pi-caption-scale icon-search"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <iframe width="100%" height="220" src="//www.youtube.com/embed/<?= $youtube_video_id ?>" frameborder="0" allowfullscreen></iframe>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class = "pi-portfolio-description pi-portfolio-description-round-corners">
                                    <ul class = "pi-portfolio-cats">
                                        <li><i class = "icon-clock"></i><?php echo $post_date; ?></li>
                                        <li><i class = "icon-comment"></i><a href = "javascript:void(0)"><?php echo $post->comment_count; ?></a></li>
                                    </ul>
                                    <h2 class = "h4"><a href="<?php the_permalink(); ?>" class = "pi-link-no-style"><?php the_title(); ?></a></h2>
                                        <?php echo substr(get_the_content(), 0, 100); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
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
get_footer();
?>