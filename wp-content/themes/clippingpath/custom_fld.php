<?php global $post; ?>
<form action="" method="POST">
    <div class="row member_meta_box">
        <table>
            <?php if ($post->post_type == 'core_values' || $post->post_type == 'what_we_offer') { ?>
                <tr>
                    <td width="150"><label for="designation">Class Name</label></td>
                    <td width="350"><input type="text" name="class_name" id="class_name" value="<?php echo get_post_meta($post->ID, 'class_name', true); ?>" /></td>
                </tr>
            <?php } ?>
            <?php if ($post->post_type == 'core_values') { ?>
                <tr>
                    <td width="150"><label for="designation">Color code</label></td>
                    <td width="350"><input type="text" name="color_code" id="class_name" value="<?php echo get_post_meta($post->ID, 'color_code', true); ?>" /></td>
                </tr>
            <?php } ?>
            <?php if ($post->post_type == 'testimonial') { ?>
                <tr>
                    <td width="150"><label for="designation">Designation</label></td>
                    <td width="350"><input type="text" name="designation" id="class_name" value="<?php echo get_post_meta($post->ID, 'designation', true); ?>" /></td>
                </tr>
                <tr>
                    <td width="150"><label for="designation">Company Name</label></td>
                    <td width="350"><input type="text" name="company_name" id="class_name" value="<?php echo get_post_meta($post->ID, 'company_name', true); ?>" /></td>
                </tr>
            <?php } ?>
        </table>
    </div> 
</form>