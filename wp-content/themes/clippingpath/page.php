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
?>

<?php
while (have_posts()) : the_post();
    include('inner_header.php');
    ?>
    <!-- - - - - - - - - - SECTION - - - - - - - - - -->
    <main class="inner_page pricing">
        <div class="pi-section-w pi-section-white piCounter">
            <div class="pi-section pi-padding-bottom-30">
                <div class="pi-row pi-grid-small-margins">
                     <?php the_content(); ?>
                </div>
            </div>
        </div>

    </main>  
    <?php
endwhile;
?>    
<?php get_footer(); ?>
