<form action="" method="POST">
    <div class="row member_meta_box">
        <table>
            <tr>
                <td width="150"><label for="designation">Class Name</label></td>
                <td width="350"><input type="text" name="class_name" id="class_name" value="<?php echo get_post_meta($post->ID, 'class_name', true); ?>" /></td>
            </tr>
        </table>
    </div> 
</form>