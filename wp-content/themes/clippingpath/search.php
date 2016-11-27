<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="pi-section-w pi-section-white">
            <div class="pi-section pi-text-center pi-padding-bottom-100">
                <?php if (have_posts()) : ?>
                    <p class="lead-30 pi-weight-700 pi-uppercase pi-text-dark pi-margin-bottom-10">
                        <?php printf(__('Search Results for: %s', 'clippingpath'), get_search_query()); ?>
                    </p>
                    <div class="pi-row pi-text-left">
                        <?php
                        while (have_posts()) : the_post();
                            ?>
                            <div class="pi-col-xs-12">
                                <h3 class="pi-weight-700 pi-uppercase pi-text-dark"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <?php the_permalink() ?>
                                <br />
                                <br />
                                <br />
                            </div>
                            <?php
                            get_template_part('content', 'search');
                        endwhile;
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'clippingpath'),
                            'next_text' => __('Next page', 'clippingpath'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'clippingpath') . ' </span>',
                        ));
                    else :
                        get_template_part('content', 'none');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

