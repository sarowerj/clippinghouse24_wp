<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <title>Clipping House 24</title>

        <link rel="shortcut icon" href="/favicon.ico"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/3dParty/bootstrap/css/bootstrap.min.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/global.css"/> 

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/typo.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/3dParty/colorbox/colorbox.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/portfolio.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slider.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/counters.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/social.css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/pricing-tables.css" />


        <!--Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic'
              rel='stylesheet' type='text/css'/>

        <!--Fonts with Icons-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/3dParty/fontello/css/fontello.css"/>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />


        <script src="<?php echo get_template_directory_uri(); ?>/3dParty/jquery-1.11.0.min.js"></script>

        <?php wp_head(); ?>
    </head>
    <body>
        <?php
        $phone_no_1 = get_option('phone_no_1');
        $logo_url = get_option('logo_url');
        $admin_email = get_option('admin_email');
        $skype = get_option('skype');
        ?>
        <div id="pi-all">

            <!-- Header -->
            <div class="pi-header">

                <!-- Header row -->
                <div class="pi-section-w pi-section-dark">
                    <div class="pi-section pi-row-sm">

                        <!-- Phone -->
                        <?php if (!empty($phone_no_1)) { ?>
                            <div class="pi-row-block pi-row-block-txt">
                                <i class="pi-row-block-icon icon-skype pi-icon-base pi-icon-square"></i>Skype:
                                <strong><a href="skype::<?= $skype ?>?call"><?= $skype ?> </a></strong>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- End phone -->

                        <!-- Email -->
                        <?php if (!empty($admin_email)) { ?>
                            <div class="pi-row-block pi-row-block-txt pi-hidden-xs pi-pull-right"><i
                                    class="pi-row-block-icon icon-mail pi-icon-base pi-icon-square"></i>Email: <a
                                    href="mailto:<?= $admin_email ?>"><?= $admin_email ?></a>
                            </div>
                            <?php
                        }
                        ?>
                        <!-- End email -->

                    </div>
                </div>

                <div class="pi-section-w pi-section-white pi-shadow-bottom">
                    <div class="pi-section pi-row-lg">

                        <!-- Logo -->
                        <div class="pi-row-block pi-row-block-logo pi-center-text-xs-only" style="margin-right: 20px;">
                            <a href="<?= esc_url(home_url('/')); ?>"> 
                                <img src="<?php echo ($logo_url == '') ? esc_url(get_template_directory_uri()) . '/img/cphouse_logo_main.png' : $logo_url ?>" alt="" />
                            </a>
                        </div>
                        <!-- End logo --> 

                        <!-- Search -->
                        <div class="pi-row-block pi-pull-right pi-hidden-sm"> 
                            <form class="form-inline pi-search-form-wide" role="form" action="<?= site_url(); ?>">
                                <div class="pi-input-with-icon pi-input-inline" style="margin-right: 1px;">
                                    <div class="pi-input-icon"><i class="icon-search-1"></i></div>
                                    <input type="text" name="s" id="s" class="form-control pi-input-wide" placeholder="Type here..">
                                </div>
                                <button type="submit" class="btn pi-btn pi-btn-base">Search</button>
                            </form>
                        </div>
                        <!-- End search -->

                    </div>
                </div>
                <!-- End header row --

                    <div class="pi-header-sticky"> 
                    </div>

                <!-- Header row -->
                <div class="pi-section-w pi-section-dark pi-shadow-bottom pi-header-sticky">
                    <div class="pi-section pi-row-sm">

                        <!-- Menu -->
                        <div class="">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => '',
                                'container_class' => '',
                                'menu_class' => 'pi-row-block',
                                'items_wrap' => '<ul id="%1$s" class="pi-menu pi-has-hover-border pi-items-have-borders pi-full-height pi-hidden-xs %2$s">%3$s</ul>'
                            ));
                            ?>
                        </div>
                        <!-- End menu -->

                        <!-- Social icons -->
                        <div class="pi-row-block pi-pull-right pi-hidden-sm">
                            <ul class="pi-social-icons pi-stacked pi-jump pi-full-height pi-bordered pi-small">
                                <?php
                                $google_plus = get_option('google_plus');
                                $facebook = get_option('facebook');
                                $instagram = get_option('instagram');
                                $twitter = get_option('twitter');
                                $linked_in = get_option('linked_in');
                                $youtube = get_option('youtube');
                                ?>
                                <?php if (!empty($google_plus)) { ?><li><a href="https://plus.google.com/<?= $google_plus ?>" class="pi-social-icon-gplus"><i class="icon-gplus"></i></a></li><?php } ?>
                                <?php if (!empty($facebook)) { ?><li><a href="https://www.facebook.com/<?= $facebook ?>" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li><?php } ?>
                                <?php if (!empty($twitter)) { ?><li><a href="https://twitter.com/<?= $twitter ?>" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li><?php } ?>
                                <?php if (!empty($linked_in)) { ?><li><a href="https://www.linkedin.com/in/<?= $linked_in ?>" class="pi-social-icon-linkedin"><i class="icon-linkedin"></i></a></li><?php } ?>
                                <?php if (!empty($youtube)) { ?><li><a href="https://www.youtube.com/user/<?= $youtube ?>" class="pi-social-icon-youtube"><i class="icon-youtube"></i></a></li><?php } ?>
                            </ul>
                        </div>
                        <!-- End social icons -->

                        <!-- Text -->
                        <div class="pi-row-block pi-row-block-txt pi-pull-right pi-hidden-sm">Follow Us:</div>
                        <!-- End text -->

                        <!-- Mobile menu button -->
                        <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only pi-hidden-sm-only">
                            <button class="btn pi-btn pi-btn-dark pi-btn-no-border pi-mobile-menu-toggler" data-target="#pi-mobile-menu-7">
                                <i class="icon-menu pi-text-center"></i>
                            </button>
                        </div>
                        <!-- End mobile menu button -->

                        <!-- Mobile menu -->
                        <div id="pi-mobile-menu-7" class="pi-section-menu-mobile-w pi-section-dark">
                            <div class="pi-section-menu-mobile">

                                <!-- Search form -->
                                <form class="form-inline pi-search-form-wide" role="form">
                                    <div class="pi-input-with-icon">
                                        <div class="pi-input-icon"><i class="icon-search-1"></i></div>
                                        <input type="text" class="form-control pi-input-wide" placeholder="Search..">
                                    </div>
                                </form>
                                <!-- End search form -->

                                <ul class="pi-menu-mobile pi-menu-mobile-dark">
                                    <li><a href="index.php"><span>Home</span></a></li>
                                    <li><a href="about.php"><span>About Us</span></a></li>
                                    <li><a href="services.php"><span>Services</span></a></li>
                                    <li><a href="pricing.php"><span>Pricing</span></a></li>
                                    <li><a href="gallery.php"><span>Gallery</span></a></li>
                                    <li><a href="index.php"><span>Free Trial</span></a></li>
                                    <li><a href="contact_us.php"><span>Contact Us</span></a></li>
                                </ul>

                            </div>
                        </div>

                        <!-- End mobile menu -->

                    </div>
                </div>
                <!-- End header row -->
            </div>
            <!-- End header -->

