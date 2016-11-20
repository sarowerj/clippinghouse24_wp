<form action="" method="POST">
    <div class="row member_meta_box">
        <table>
            <tr>
                <td width="150"><label for="designation">Designation</label></td>
                <td width="350"><input type="text" name="designation" id="designation" value="<?php echo get_post_meta($post->ID, 'designation', true); ?>" /></td>
            </tr>
            <tr>
                <td width="150"><label for="facebook">Facebook</label></td>
                <td width="350"><input type="text" name="facebook" id="facebook" value="<?php echo get_post_meta($post->ID, 'facebook', true); ?>" /></td>
            </tr>
            <tr>
                <td><label for="twitter">Twitter</label></td>
                <td><input type="text" name="twitter" id="twitter" value="<?php echo get_post_meta($post->ID, 'twitter', true); ?>" /></td>
            </tr>
            <tr>
                <td><label for="linked_in">Linked in</label></td>
                <td><input type="text" name="linked_in" id="linked_in" value="<?php echo get_post_meta($post->ID, 'linked_in', true); ?>" /></td>
            </tr>
            <tr>
                <td><label for="instagram">Instagram</label></td>
                <td><input type="text" name="instagram" id="instagram" value="<?php echo get_post_meta($post->ID, 'instagram', true); ?>" /></td>
            </tr>
        </table>
    </div> 
</form>