<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       blank.com
 * @since      1.0.0
 *
 * @package    Ajax_Show_Authors
 * @subpackage Ajax_Show_Authors/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
    $user_roles = get_option( 'show_users' );
?>

<div class="container-fluid">
    <div class="row mt-4">
        <h5><?php echo esc_html ( get_admin_page_title() ); ?></h5>
    </div>
    <div class="row mt-1">
        <div class="col-sm-3">
            <h6>Your displayed authors</h6>
        </div>
        <div class="col-sm-3">
            <!-- <form action="" method="post"> -->
            <?php foreach ($user_roles as $role => $values) { 
            ?>
                <input type="checkbox" id="<?php echo $role ?>" name ="<?php echo $role ?>"
                <?php if ($user_roles[$role]) {
                        echo ' checked';
                      }?> >
                <label for="<?php echo $role ?>"><?php echo ucfirst($role); ?></label>
                <br>

          <?php  }
                $ajaxurl = admin_url('admin-ajax.php');
                submit_button('Save Settings', 'primary', 'submit', 'true', array(
                    'id' => 'savebutton',
                    'admin' => $ajaxurl
                ));
            ?>
        </div>
        <!-- </form> -->
    </div>

    <div id="saved-setting" class="visibility">
        Settings Saved!
    </div>
    
</div>
