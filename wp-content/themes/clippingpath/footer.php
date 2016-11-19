<!-- Footer -->
<!-- Widget area -->
<?php
$facebook = get_option('facebook');
?>
<div class="pi-section-w pi-border-bottom pi-border-top-light pi-section-dark footer">
    <div class="pi-section pi-padding-bottom-10">

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-padding-bottom-30">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    <a href="#" class="pi-link-no-style">Our Facebook Page</a>
                </h6>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1401103616787674";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-page" 
                     data-href="https://www.facebook.com/<?= $facebook ?>" 
                     data-tabs="timeline" 
                     data-height="200" 
                     data-small-header="false"
                     data-adapt-container-width="true" 
                     data-hide-cover="false" 
                     data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/<?= $facebook ?>">
                            <a href="https://www.facebook.com/<?= $facebook ?>"><?= $facebook ?></a>
                        </blockquote>
                    </div>
                </div>


            </div>
            <!-- End col 4 -->

            <div class="pi-clearfix pi-hidden-lg-only pi-hidden-md-only"></div>

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-sm-6 pi-padding-bottom-30" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/map-base.png'); background-position: 50% 55px; background-repeat: no-repeat;">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    Contact Us
                </h6>

                <!-- Contact info -->
                <ul class="pi-list-with-icons pi-list-big-margins">
                    <?php
                    $phone_no_1 = get_option('phone_no_1');
                    $phone_no_2 = get_option('phone_no_2');
                    $admin_email = get_option('admin_email');
                    $email_2 = get_option('email_2');
                    $skype = get_option('skype');
                    $address = get_option('address');

                    if (!empty($address)) {
                        ?>
                        <li>
                            <span class="pi-bullet-icon"><i class="icon-location"></i></span>
                            <strong>Address:</strong> <?php echo $address; ?>
                        </li>
                        <?php
                    }

                    if (!empty($phone_no_2)) {
                        ?>
                        <li>
                            <span class="pi-bullet-icon"><i class="icon-phone"></i></span>
                            <strong>Phone:</strong> <a href="tel:<?= $phone_no_2; ?>"><?= $phone_no_2; ?></a>
                        </li>
                        <?php
                    }

                    if (!empty($admin_email)) {
                        ?>
                        <li>
                            <span class="pi-bullet-icon"><i class="icon-mail"></i></span>
                            <strong>Email:</strong> <a href="mailto:<?= $admin_email ?>"><?= $admin_email ?></a>
                        </li>
                        <?php
                    }

                    if (!empty($skype)) {
                        ?>
                        <li>
                            <span class="pi-bullet-icon"><i class="icon-skype"></i></span>
                            <strong>Skype:</strong> <a href="callto:<?=$skype?>"><?=$skype?></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <!-- End contact info -->

            </div>
            <!-- End col 4 -->

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-sm-6 pi-padding-bottom-30">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    Say Hey
                </h6>

                <!-- Contact form -->
                <?php 
                    echo do_shortcode('[contact-form-7 id="8" title="Footer Contact"]');
                ?>
                <!-- End contact form -->

            </div>
            <!-- End col 4 -->

        </div>
        <!-- End row -->

    </div>
</div>
<!-- End widget area -->

<!-- Copyright area -->
<div class="pi-section-w pi-section-dark pi-border-top-light pi-border-bottom-strong-base">
    <div class="pi-section pi-row-lg pi-center-text-2xs pi-clearfix">

        <?php
        $google_plus = get_option('google_plus');
        $facebook = get_option('facebook');
        $instagram = get_option('instagram');
        $twitter = get_option('twitter');
        $linked_in = get_option('linked_in');
        $youtube = get_option('youtube');
        $footer_logo_url = get_option('footer_logo_url');

        if (!empty($google_plus) || !empty($facebook) || !empty($instagram) || !empty($twitter) || !empty($linked_in) || !empty($youtube)) {
            ?>

            <!-- Social icons -->
            <div class="pi-row-block pi-pull-right pi-hidden-2xs">
                <ul class="pi-social-icons-simple pi-small clearFix">
                    <?php if (!empty($google_plus)) { ?><li><a href="https://plus.google.com/<?= $google_plus ?>" class="pi-social-icon-gplus"><i class="icon-gplus"></i></a></li><?php } ?>
                    <?php if (!empty($facebook)) { ?><li><a href="https://www.facebook.com/<?= $facebook ?>" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li><?php } ?>
                    <?php if (!empty($instagram)) { ?><li><a href="https://twitter.com/<?= $twitter ?>" class="pi-social-icon-instagram"><i class="icon-instagram"></i></a></li><?php } ?>
                    <?php if (!empty($linked_in)) { ?><li><a href="https://www.linkedin.com/in/<?= $linked_in ?>" class="pi-social-icon-linkedin"><i class="icon-linkedin"></i></a></li><?php } ?>
                    <?php if (!empty($youtube)) { ?><li><a href="https://www.youtube.com/user/<?= $youtube ?>" class="pi-social-icon-youtube"><i class="icon-youtube"></i></a></li><?php } ?>
                </ul>
            </div>
            <!-- End social icons -->
            <?php
        }
        ?>

        <!-- Footer logo -->

        <div class="pi-row-block pi-row-block-logo pi-row-block-bordered">
            <a href="<?php echo esc_url(home_url('/')); ?>"> 
                <img src="<?php echo ($footer_logo_url == '') ? esc_url(get_template_directory_uri()) . '/images/cphouse_logo_dark.png' : $footer_logo_url ?>" alt="" />
            </a>
        </div>
        <!-- End footer logo -->

        <!-- Text -->
        <span class="pi-row-block pi-row-block-txt pi-hidden-xs">
            <?php echo get_option('copyright_text'); ?>
            All right reserved.
        </span>
        <!-- End text -->

    </div>
</div>
<!-- End copyright area -->
<!-- End footer -->

</div>
<div class="pi-scroll-top-arrow" data-scroll-to="0"></div>

<script src="<?php echo get_template_directory_uri(); ?>/3dParty/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/jquery.touchSwipe.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/gauge.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/inview.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/requestAnimationFramePolyfill.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/jquery.scrollTo.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.global.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.slider.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.slider.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/3dParty/jquery.easing.1.3.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.counter.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.counter.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pi.init.revolutionSlider.js"></script>


</body>
</html>