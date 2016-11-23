<?php
/**
 * Template Name: Contact Us
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

                <!-- Row -->
                <div class="pi-row">
                    <?php the_content(); ?>
                </div>
            </div>
        </div> 
    </main>
    <?php
endwhile;
get_footer();
?>