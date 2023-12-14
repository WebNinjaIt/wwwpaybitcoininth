<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="eg-gallery-section-wrap" data-section-ref="custom" style="display:none;">
    <p class="description"><?php _e('Please write all the custom CSS required for this gallery below editor.','everest-gallery');?></p>
    <div class="eg-field-wrap">
        <div class="eg-field eg-full-width">
            <textarea name="gallery_details[custom][custom_css]" class="eg-gallery-form-field" id="eg-custom-css"><?php echo (isset($gallery_details['custom']['custom_css']))?esc_attr($gallery_details['custom']['custom_css']):''?></textarea>
        </div>
    </div>
</div>