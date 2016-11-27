<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage clippingpath
 */
get_header();
?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic'
      rel='stylesheet' type='text/css'/>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="pi-section-w pi-section-white">
            <div class="pi-section pi-text-center pi-padding-top-120 pi-padding-bottom-100">
                <p class="pi-weight-700 pi-text-dark pi-404">
                    404
                </p>
                <p class="lead-30 pi-weight-700 pi-uppercase pi-text-dark pi-margin-bottom-10">
                    <?php _e('Oops! That page can&rsquo;t be found.', 'clippingpath'); ?>
                </p>
                <p>
                    We're sorry, the page you requested cannot be found.<br>
                    You can go back to
                </p>
                <p>
                    <a href="<?php echo site_url(); ?>" class="btn pi-btn pi-btn-base pi-btn-big-paddings pi-btn-big">
                        Homepage
                    </a>
                </p>

            </div>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
