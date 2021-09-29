<?php
require_once 'functions.php';
$user = wp_get_current_user()
?>


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post">
<div class="contact_input_area">
    <div class="row">
        <!-- Single Input Area -->
        <div class="col-lg-3 col-12">
            <div class="form-group">
                <input type="text" class="form-control" name="author" id="author" placeholder="Name" required="">
            </div>
        </div>

        <!-- Single Input Area -->
        <div class="col-lg-9 col-12">
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
            </div>
        </div>
        <!-- Single Input Area -->
        <!-- Single Input Area -->
        <div class="col-12">
            <div class="form-group">
                <textarea  name="comment" id="comment" class="form-control" cols="30" rows="10" placeholder="Messages" required="" style="margin-top: 0px; margin-bottom: 0px; height: 123px;"></textarea>
            </div>
            <div class="col-12">
                <div id="upload-container">
                    <input id="file-input" type="file" name="file" multiple>
                    <label for="file-input"><?php _e('Chose file')?></label>
                    <span><?php _e('Or drop here')?></span>
                </div>
            </div>
        </div>
        <!-- Single Input Area -->
        <div class="col-12 send">
            <button type="submit" class="btn fancy-btn fancy-dark bg-transparent"><?php _e('Send Message')?></button>
        </div>
    </div>
</div>
	<?php comment_id_fields();
	do_action('comment_form', $post->ID); ?>
</form>
