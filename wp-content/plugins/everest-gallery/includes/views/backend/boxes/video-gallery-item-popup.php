<div class="eg-video-gallery-item-popup eg-gallery-popup-form" style="display:none;">
    <h4><?php _e('Video Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
    <div class="eg-popup-inner-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Video Title', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="item_title" class="eg-video-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Video Caption', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea name="item_caption" class="eg-video-form-field"></textarea>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Video Link', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="item_link" class="eg-video-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Video Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="video_type" class="eg-video-form-field eg-video-type-trigger">
                    <option value="youtube"><?php _e('Youtube', 'everest-gallery'); ?></option>
                    <option value="vimeo"><?php _e('Vimeo', 'everest-gallery'); ?></option>
                    <option value="self-hosted"><?php _e('Self Hosted', 'everest-gallery'); ?></option>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap eg-youtube-reference eg-vimeo-reference eg-video-type-reference">
            <label><?php _e('Video URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=qm67wbB5GmI" class="eg-video-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap eg-self-hosted-reference eg-video-type-reference" style="display:none;">
            <label><?php _e('Self Hosted Video URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="self_video_url" class="eg-video-form-field"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Video', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Video', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Video', 'everest-gallery'); ?>"/>
                <input type="hidden" name="self_video_id" class="eg-video-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Preview Image', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="video_preview_image_url" class="eg-video-form-field"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Image', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Image', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Image', 'everest-gallery'); ?>"/>
                <input type="hidden" name="video_preview_image_id" class="eg-video-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-video-add-trigger" value="<?php _e('Add Video', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader" style="display:none;">
            </div>
        </div>
    </div>
</div>
