<?php
/*
 * Code for Theme Option
 * setup_theme_admin_menu() is for creating admin menu. 
 * theme_settings_page() is for Theme Option HTML
 */

function setup_theme_admin_menu() {
    add_menu_page('Theme settings', 'Theme Option', 'manage_options', 'aspirations_theme_settings', 'theme_settings_page');
}

add_action("admin_menu", "setup_theme_admin_menu");


/*
 * Custom Media upload handeler. 
 */

function theme_settings_page() {
    wp_enqueue_media();
    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        $tab = $_REQUEST['tab'];
        if (!empty($tab)) {
            $tab = $_REQUEST['tab'];
        } else {
            $tab = "site_options";
        }
    }
    ?>
    <div class="wrap custom_theme_option">
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab <?php echo ($tab == "site_options" ? 'nav-tab-active' : ''); ?>" href="?page=aspirations_theme_settings&amp;tab=site_options">Site Options</a>
            <a class="nav-tab <?php echo ($tab == "free_trial" ? 'nav-tab-active' : ''); ?>" href="?page=aspirations_theme_settings&amp;tab=free_trial">Free Trial</a>
            <a class="nav-tab <?php echo ($tab == "contact_info" ? 'nav-tab-active' : ''); ?>" href="?page=aspirations_theme_settings&amp;tab=contact_info">Contact Info</a>
            <a class="nav-tab <?php echo ($tab == "general_info" ? 'nav-tab-active' : ''); ?>" href="?page=aspirations_theme_settings&amp;tab=general_info">General Info</a>
            <a class="nav-tab <?php echo ($tab == "our_details" ? 'nav-tab-active' : ''); ?>" href="?page=aspirations_theme_settings&amp;tab=our_details">Our Details</a>
        </h2>

        <?php
        switch ($tab) {
            case 'site_options' :
                if (isset($_REQUEST['site_options_btn'])) {
                    $logo_url = get_option('logo_url');
                    $footer_logo_url = get_option('footer_logo_url');

                    if (isset($_POST['logo_url'])) {
                        update_option('logo_url', $_POST['logo_url'], 'yes');
                    }
                    if (isset($_POST['footer_logo_url'])) {
                        update_option('footer_logo_url', $_POST['footer_logo_url'], 'yes');
                    }
                }
                $logo_url = get_option('logo_url');
                $footer_logo_url = get_option('footer_logo_url');


                if (!$logo_url) {
                    $logo_url = '';
                }
                if (!$footer_logo_url) {
                    $footer_logo_url = '';
                }
                ?>
                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Site Options</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table site_options">
                                    <tr class="border_bottom">
                                        <td><label for="site_logo">Site Logo</label></td>
                                        <td>
                                            <div class="uploader stag-table-metabox-table">
                                                <input type="hidden" id="logo_url" value="<?php echo $logo_url ?>" name="logo_url" type="text" />
                                                <input id="logo_url_button" class="button" name="logo_url_button" type="text" value="Upload" />
                                            </div>
                                        </td>
                                        <td>
                                            <img src="<?php echo $logo_url ?>" alt="" id="img_logo_url" style="max-width:250px;"/>
                                            <label class="hints">Logo Image must be in JPG, JPEG, PNG or SVG and size must be under 280 X 200 pixel.</label>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td><label for="site_logo">Footer Logo</label></td>
                                        <td>
                                            <div class="uploader stag-table-metabox-table">
                                                <input type="hidden" id="footer_logo_url" value="<?php echo $footer_logo_url ?>" name="footer_logo_url" type="text" />
                                                <input id="footer_logo_url_button" class="button" name="footer_logo_url_button" type="text" value="FLUpload" />
                                            </div>
                                        </td>
                                        <td>
                                            <img src="<?php echo $footer_logo_url; ?>" alt="" id="img_footer_logo_url" style="max-width:250px;"/>
                                            <label class="hints">Logo Image must be in JPG, JPEG, PNG or SVG and size must be under 280 X 200 pixel.</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="site_options" value="1" /></td>
                                        <td><input type="submit" name="site_options_btn" value="Update" class="button button-primary button-large" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form> 
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var _custom_media = true,
                                            _orig_send_attachment = wp.media.editor.send.attachment;

                                    $('.stag-table-metabox-table .button').click(function(e) {
                                        var send_attachment_bkp = wp.media.editor.send.attachment;
                                        var button = $(this);
                                        var id = button.attr('id').replace('_button', '');
                                        _custom_media = true;
                                        wp.media.editor.send.attachment = function(props, attachment) {
                                            if (_custom_media) {
                                                $("#" + id).val(attachment.url);
                                                $("#img_" + id).attr('src', attachment.url);
                                            } else {
                                                return _orig_send_attachment.apply(this, [props, attachment]);
                                            }
                                            ;
                                        }

                                        wp.media.editor.open(button);
                                        return false;
                                    });

                                    $('.add_media').on('click', function() {
                                        _custom_media = false;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div> 
                <?php
                break;
            case 'free_trial':
                if ($_POST) {
                    if ($_POST['free_trial_info'] == '1') {
                        $free_trial_title = get_option('free_trial_title');
                        $free_trial_text = get_option('free_trial_text');
                        $free_trial_link = get_option('free_trial_link');

                        if (isset($_POST['free_trial_title'])) {
                            update_option('free_trial_title', $_POST['free_trial_title'], 'yes');
                        }
                        if (isset($_POST['free_trial_text'])) {
                            update_option('free_trial_text', $_POST['free_trial_text'], 'yes');
                        }
                        if (isset($_POST['free_trial_link'])) {
                            update_option('free_trial_link', $_POST['free_trial_link'], 'yes');
                        }
                    }
                }

                $free_trial_title = get_option('free_trial_title');
                $free_trial_text = get_option('free_trial_text');
                $free_trial_link = get_option('free_trial_link');

                if (!$free_trial_title) {
                    $free_trial_title = '';
                }
                if (!$free_trial_text) {
                    $free_trial_text = '';
                }
                if (!$free_trial_link) {
                    $free_trial_link = '';
                }
                ?>

                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Free Trial Options</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table">
                                    <tr>
                                        <td><label for="phone_no_1">Title</label></td>
                                        <td width="500"><input type="text" name="free_trial_title" id="phone_no_1" value="<?= $free_trial_title; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone_no_2">Text</label></td>
                                        <td><textarea rows="5" cols="50" name="free_trial_text"><?= $free_trial_text; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="admin_email">Page's Link</label></td>
                                        <td><input type="text" name="free_trial_link" id="admin_email" value="<?= $free_trial_link; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="free_trial_info" value="1" /></td>
                                        <td><input type="submit" value="Update" name="free_trial_info_btn" class="button button-primary button-large" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'contact_info':
                if ($_POST) {
                    if ($_POST['update_contact_info'] == '1') {
                        $phone_no_1 = get_option('phone_no_1');
                        $phone_no_2 = get_option('phone_no_2');
                        $admin_email = get_option('admin_email');
                        $email_2 = get_option('email_2');
                        $skype = get_option('skype');
                        $address = get_option('address');
                        $address_2 = get_option('address_2');

                        if (isset($_POST['phone_no_1'])) {
                            update_option('phone_no_1', $_POST['phone_no_1'], 'yes');
                        }
                        if (isset($_POST['phone_no_2'])) {
                            update_option('phone_no_2', $_POST['phone_no_2'], 'yes');
                        }
                        if (isset($_POST['admin_email'])) {
                            update_option('admin_email', $_POST['admin_email'], 'yes');
                        }
                        if (isset($_POST['email_2'])) {
                            update_option('email_2', $_POST['email_2'], 'yes');
                        }
                        if (isset($_POST['skype'])) {
                            update_option('skype', $_POST['skype'], 'yes');
                        }
                        if (isset($_POST['address'])) {
                            update_option('address', $_POST['address'], 'yes');
                        }
                        if (isset($_POST['address_2'])) {
                            update_option('address_2', $_POST['address_2'], 'yes');
                        }
                    }
                }
                $phone_no_1 = get_option('phone_no_1');
                $phone_no_2 = get_option('phone_no_2');
                $admin_email = get_option('admin_email');
                $email_2 = get_option('email_2');
                $skype = get_option('skype');
                $address = get_option('address');
                $address_2 = get_option('address_2');
                if (!$phone_no_1) {
                    $phone_no_1 = '';
                }
                if (!$phone_no_2) {
                    $phone_no_2 = '';
                }
                if (!$admin_email) {
                    $admin_email = '';
                }
                if (!$email_2) {
                    $email_2 = '';
                }
                if (!$skype) {
                    $skype = '';
                }
                if (!$address) {
                    $address = '';
                }
                if (!$address_2) {
                    $address_2 = '';
                }
                ?>
                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Site Options</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table">
                                    <tr>
                                        <td><label for="phone_no_1">Phone No 1</label></td>
                                        <td><input type="text" name="phone_no_1" id="phone_no_1" value="<?php echo $phone_no_1; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone_no_2">Phone No 2</label></td>
                                        <td><input type="text" name="phone_no_2" id="phone_no_2" value="<?php echo $phone_no_2; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="admin_email">Admin Email</label></td>
                                        <td><input type="text" name="admin_email" id="admin_email" value="<?php echo $admin_email; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email_2">Email 2</label></td>
                                        <td><input type="text" name="email_2" id="email_2" value="<?php echo $email_2; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="skype">Skype</label></td>
                                        <td><input type="text" name="skype" id="website" value="<?php echo $skype; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="address">Office Address</label></td>
                                        <td><textarea type="text" name="address" id="address" ><?php echo $address; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label for="address_2">Office Address 2</label></td>
                                        <td><textarea type="text" name="address_2" id="address_2" ><?php echo $address_2; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="update_contact_info" value="1" /></td>
                                        <td><input type="submit" value="Update" name="up_contact_btn" class="button button-primary button-large" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                if ($_POST) {
                    if ($_POST['social_update'] == '1') {
                        $google_plus = get_option('google_plus');
                        $facebook = get_option('facebook');
                        $instagram = get_option('instagram');
                        $twitter = get_option('twitter');
                        $linked_in = get_option('linked_in');
                        $youtube = get_option('youtube');

                        if (isset($_POST['facebook'])) {
                            update_option('facebook', $_POST['facebook'], 'yes');
                        }
                        if (isset($_POST['google_plus'])) {
                            update_option('google_plus', $_POST['google_plus'], 'yes');
                        }
                        if (isset($_POST['instagram'])) {
                            update_option('instagram', $_POST['instagram'], 'yes');
                        }
                        if (isset($_POST['twitter'])) {
                            update_option('twitter', $_POST['twitter'], 'yes');
                        }
                        if (isset($_POST['linked_in'])) {
                            update_option('linked_in', $_POST['linked_in'], 'yes');
                        }
                        if (isset($_POST['youtube'])) {
                            update_option('youtube', $_POST['youtube'], 'yes');
                        }
                    }
                }
                $facebook = get_option('facebook');
                $google_plus = get_option('google_plus');
                $instagram = get_option('instagram');
                $twitter = get_option('twitter');
                $linked_in = get_option('linked_in');
                $youtube = get_option('youtube');

                if (!$facebook) {
                    $facebook = '';
                }
                if (!$google_plus) {
                    $google_plus = '';
                }
                if (!$instagram) {
                    $instagram = '';
                }
                if (!$twitter) {
                    $twitter = '';
                }
                if (!$linked_in) {
                    $linked_in = '';
                }
                if (!$youtube) {
                    $youtube = '';
                }
                ?>
                <br/>

                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Social pages</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table">
                                    <tr>
                                        <td><label for="google_plus">Google Plus</label></td>
                                        <td><input type="text" name="google_plus" id="google_plus" value="<?php echo $google_plus; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="facebook">Facebook Page</label></td>
                                        <td><input type="text" name="facebook" id="facebook" value="<?php echo $facebook; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="instagram">Instagram</label></td>
                                        <td><input type="text" name="instagram" id="instagram" value="<?php echo $instagram; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="twitter">Twitter Page</label></td>
                                        <td><input type="text" name="twitter" id="twitter" value="<?php echo $twitter; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="linked_in">Linked in Page</label></td>
                                        <td><input type="text" name="linked_in" id="linked_in" value="<?php echo $linked_in; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="youtube">Youtube</label></td>
                                        <td><input type="text" name="youtube" id="youtube" value="<?php echo $youtube; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="social_update" value="1" /></td>
                                        <td><input type="submit" value="Update" class="button button-primary button-large" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                if ($_POST) {
                    if ($_POST['location_info'] == '1') {
                        $g_map_location = get_option('g_map_location');

                        if (isset($_POST['g_map_location'])) {
                            update_option('g_map_location', $_POST['g_map_location'], 'yes');
                        }
                    }
                }

                $g_map_location = get_option('g_map_location');

                if (!$g_map_location) {
                    $g_map_location = '';
                }
                ?>

                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Location</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table">
                                    <tr>
                                        <td><label for="g_map_location">Google Map Location</label></td>
                                        <td><textarea name="g_map_location" id="g_map_location"><?php echo $g_map_location; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="location_info" value="1" /></td>
                                        <td><input type="submit" value="Update" class="button button-primary button-large" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'general_info':
                if (isset($_REQUEST['copyright_text_btn'])) {
                    $copyright_text = get_option('copyright_text');

                    if (isset($_POST['copyright_text'])) {
                        update_option('copyright_text', $_POST['copyright_text'], 'yes');
                    }
                }
                $copyright_text = get_option('copyright_text');

                if (!$copyright_text) {
                    $copyright_text = '';
                }
                ?>
                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Copyright text</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table site_options">
                                    <tr class="border_bottom">
                                        <td width="100"><label for="copyright_text">Copyright Text</label></td>
                                        <td>
                                            <textarea name="copyright_text" id="copyright_text" cols="40" rows="2"><?php echo $copyright_text; ?></textarea>
                                        </td>
                                        <td><label class="hints">Maximum 15 words is most suitable for this text.</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="copyright_text_btn" value="Update" class="button button-primary button-large" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>  
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'our_details':
                if (isset($_REQUEST['we_are_good_at_btn'])) {
                    $fld_name_1 = get_option('fld_name_1');
                    $fld_value_1 = get_option('fld_value_1');
                    $fld_name_2 = get_option('fld_name_2');
                    $fld_value_2 = get_option('fld_value_2');
                    $fld_name_3 = get_option('fld_name_3');
                    $fld_value_3 = get_option('fld_value_3');
                    $fld_name_4 = get_option('fld_name_4');
                    $fld_value_4 = get_option('fld_value_4');
                    $fld_name_5 = get_option('fld_name_5');
                    $fld_value_5 = get_option('fld_value_5');

                    if (isset($_POST['fld_name_1'])) {
                        update_option('fld_name_1', $_POST['fld_name_1'], 'yes');
                    }
                    if (isset($_POST['fld_value_1'])) {
                        update_option('fld_value_1', $_POST['fld_value_1'], 'yes');
                    }
                    if (isset($_POST['fld_name_2'])) {
                        update_option('fld_name_2', $_POST['fld_name_2'], 'yes');
                    }
                    if (isset($_POST['fld_value_2'])) {
                        update_option('fld_value_2', $_POST['fld_value_2'], 'yes');
                    }
                    if (isset($_POST['fld_name_3'])) {
                        update_option('fld_name_3', $_POST['fld_name_3'], 'yes');
                    }
                    if (isset($_POST['fld_value_3'])) {
                        update_option('fld_value_3', $_POST['fld_value_3'], 'yes');
                    }
                    if (isset($_POST['fld_name_4'])) {
                        update_option('fld_name_4', $_POST['fld_name_4'], 'yes');
                    }
                    if (isset($_POST['fld_value_4'])) {
                        update_option('fld_value_4', $_POST['fld_value_4'], 'yes');
                    }
                    if (isset($_POST['fld_name_5'])) {
                        update_option('fld_name_5', $_POST['fld_name_5'], 'yes');
                    }
                    if (isset($_POST['fld_value_5'])) {
                        update_option('fld_value_5', $_POST['fld_value_5'], 'yes');
                    }
                }
                $fld_name_1 = get_option('fld_name_1');
                $fld_value_1 = get_option('fld_value_1');
                $fld_name_2 = get_option('fld_name_2');
                $fld_value_2 = get_option('fld_value_2');
                $fld_name_3 = get_option('fld_name_3');
                $fld_value_3 = get_option('fld_value_3');
                $fld_name_4 = get_option('fld_name_4');
                $fld_value_4 = get_option('fld_value_4');
                $fld_name_5 = get_option('fld_name_5');
                $fld_value_5 = get_option('fld_value_5');

                if (!$fld_name_1) {
                    $fld_name_1 = '';
                }
                if (!$fld_value_1) {
                    $fld_value_1 = '';
                }
                if (!$fld_name_2) {
                    $fld_name_2 = '';
                }
                if (!$fld_value_2) {
                    $fld_value_2 = '';
                }
                if (!$fld_name_3) {
                    $fld_name_3 = '';
                }
                if (!$fld_value_3) {
                    $fld_value_3 = '';
                }
                if (!$fld_name_4) {
                    $fld_name_4 = '';
                }
                if (!$fld_value_4) {
                    $fld_value_4 = '';
                }
                if (!$fld_name_5) {
                    $fld_name_5 = '';
                }
                if (!$fld_value_5) {
                    $fld_value_5 = '';
                }
                ?>
                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>We are good at</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table site_options">
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_1">Field 1</label></td>
                                        <td>
                                            <input type="text" value="<?= $fld_name_1 ?>" name="fld_name_1" id="fld_name_1" placeholder="Field Name" />
                                        </td>
                                        <td><input type="text" value="<?= $fld_value_1 ?>" name="fld_value_1" id="fld_value_1" placeholder="Field Value" /></td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_2">Field 2</label></td>
                                        <td>
                                            <input type="text" value="<?= $fld_name_2 ?>" name="fld_name_2" id="fld_name_2" placeholder="Field Name" />
                                        </td>
                                        <td><input type="text" value="<?= $fld_value_2 ?>" name="fld_value_2" id="fld_value_2" placeholder="Field Value" /></td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_3">Field 3</label></td>
                                        <td>
                                            <input type="text" value="<?= $fld_name_3 ?>" name="fld_name_3" id="fld_name_3" placeholder="Field Name" />
                                        </td>
                                        <td><input type="text" value="<?= $fld_value_3 ?>" name="fld_value_3" id="fld_value_3" placeholder="Field Value" /></td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_4">Field 4</label></td>
                                        <td>
                                            <input type="text" value="<?= $fld_name_4 ?>" name="fld_name_4" id="fld_name_4" placeholder="Field Name" />
                                        </td>
                                        <td><input type="text" value="<?= $fld_value_4 ?>" name="fld_value_4" id="fld_value_4" placeholder="Field Value" /></td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_5">Field 5</label></td>
                                        <td>
                                            <input type="text" value="<?= $fld_name_5 ?>" name="fld_name_5" id="fld_name_5" placeholder="Field Name" />
                                        </td>
                                        <td><input type="text" value="<?= $fld_value_5 ?>" name="fld_value_5" id="fld_value_5" placeholder="Field Value" /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="we_are_good_at_btn" value="Update" class="button button-primary button-large" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>  
                        </div>
                    </div>
                </div>


                <?php
                if (isset($_REQUEST['office_details_btn'])) {
                    $total_employees = get_option('total_employees');
                    $image_per_hour = get_option('image_per_hour');
                    $hours_per_day = get_option('hours_per_day');
                    $image_done = get_option('image_done');

                    if (isset($_POST['total_employees'])) {
                        update_option('total_employees', $_POST['total_employees'], 'yes');
                    }
                    if (isset($_POST['image_per_hour'])) {
                        update_option('image_per_hour', $_POST['image_per_hour'], 'yes');
                    }
                    if (isset($_POST['hours_per_day'])) {
                        update_option('hours_per_day', $_POST['hours_per_day'], 'yes');
                    }
                    if (isset($_POST['image_done'])) {
                        update_option('image_done', $_POST['image_done'], 'yes');
                    }
                }
                $total_employees = get_option('total_employees');
                $image_per_hour = get_option('image_per_hour');
                $hours_per_day = get_option('hours_per_day');
                $image_done = get_option('image_done');

                if (!$total_employees) {
                    $total_employees = '';
                }
                if (!$image_per_hour) {
                    $image_per_hour = '';
                }
                if (!$hours_per_day) {
                    $hours_per_day = '';
                }
                if (!$image_done) {
                    $image_done = '';
                }
                ?>
                <div id="dashboard_right_now" class="postbox sj_postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Office Details</span></h2>
                    <div class="inside">
                        <div class="main">
                            <form method="POST" action="#">
                                <table class="sj_table site_options">
                                    <tr class="border_bottom">
                                        <td width="100"><label for="total_employees">Total Employees</label></td>
                                        <td>
                                            <input type="text" value="<?= $total_employees ?>" name="total_employees" id="total_employees" placeholder="Total Employees" />
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="image_per_hour">Images per hour</label></td>
                                        <td>
                                            <input type="text" value="<?= $image_per_hour ?>" name="image_per_hour" id="image_per_hour" placeholder="Images per hour" />
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="hours_per_day">Hours per day</label></td>
                                        <td>
                                            <input type="text" value="<?= $hours_per_day ?>" name="hours_per_day" id="hours_per_day" placeholder="Hours per day" />
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        <td width="100"><label for="fld_name_5">Image done</label></td>
                                        <td>
                                            <input type="text" value="<?= $image_done ?>" name="image_done" id="image_done" placeholder="Image done" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="office_details_btn" value="Update" class="button button-primary button-large" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>  
                        </div>
                    </div>
                </div>
                <?php
                break;
        }
        ?>
    </div>
    <?php
}
