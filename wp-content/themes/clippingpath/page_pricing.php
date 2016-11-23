<?php
/**
 * Template Name: Pricing
 * The template for displaying Pricing Page
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

<?php
while (have_posts()) : the_post();
    include('inner_header.php');
    ?>
    <!-- Extra Resources-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pricing-tables.css" />
    <!-- End Extra Resources -->
    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <main class="inner_page pricing">
        <div class="pi-section-w pi-section-white piCounter">
            <div class="pi-section pi-padding-bottom-30">
                <div class="pi-row pi-grid-small-margins">
                    <div class="pi-col-md-4 pi-col-xs-6 pi-col-md-offset-2">
                        <?php dynamic_sidebar('pricing_type'); ?>
                    </div>

                    <div class="pi-col-md-4 pi-col-xs-6">
                        <?php dynamic_sidebar('pricing_price'); ?>
                    </div>
                </div>
            </div>
        </div>

    </main>  
    <?php
endwhile;
?>    
<?php get_footer(); ?>