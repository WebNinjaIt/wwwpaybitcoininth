<div class="eg-audio-gallery-item-popup eg-gallery-popup-form" style="display:none;">

    <h4><?php _e('Audio Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
    <div class="eg-popup-inner-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Audio Title', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="item_title" class="eg-audio-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Audio Caption', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea name="item_caption" class="eg-audio-form-field"></textarea>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Audio Link', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="item_link" class="eg-audio-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Audio Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="audio_type" class="eg-audio-form-field eg-audio-type-trigger">
                    <option value="soundcloud"><?php _e('Soundcloud', 'everest-gallery'); ?></option>
                    <option value="self-hosted"><?php _e('Self Hosted', 'everest-gallery'); ?></option>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap eg-soundcloud-reference eg-audio-type-reference">
            <label><?php _e('Audio URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="audio_url" placeholder="https://soundcloud.com/bchettri/syndicate-single-promo" class="eg-audio-form-field"/>
                <p class="description"><?php _e('Please add soundcloud client id in the settings section of our plugin to display soundcloud music player in the frontend', 'everest-gallery'); ?></p>
                <p class="description"><?php _e('Note: Soundcloud music player won\'t work in frontend without soundcloud client id.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap eg-self-hosted-reference eg-audio-type-reference" style="display:none;">
            <label><?php _e('Self Hosted audio URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="self_audio_url" class="eg-audio-form-field"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload audio', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose audio', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose audio', 'everest-gallery'); ?>"/>
                <input type="hidden" name="self_audio_id" class="eg-audio-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Preview Image', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="audio_preview_image_url" class="eg-audio-form-field"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Image', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Image', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Image', 'everest-gallery'); ?>"/>
                <input type="hidden" name="audio_preview_image_id" class="eg-audio-form-field"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-audio-add-trigger" value="<?php _e('Add audio', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader" style="display:none;">
            </div>
        </div>
    </div>
</div>
