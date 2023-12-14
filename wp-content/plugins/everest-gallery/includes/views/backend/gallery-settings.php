<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <span class="eg-admin-title"><?php _e('Gallery Settings', 'everest-gallery'); ?></span>
        </h3>
        <div class="logo">
            <img src="<?php echo EG_IMG_DIR . 'logo.png'; ?>"/>
        </div>
    </div>
    <div class="eg-content-wrap">
        <?php
        global $eg_settings;
        $gallery_settings = $eg_settings;
        ?>
        <div class="eg-field-wrap">
            <label><?php _e('Soundcloud Client ID', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_settings[soundcloud_client_id]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'soundcloud_client_id' ]) ? esc_attr($gallery_settings[ 'soundcloud_client_id' ]) : ''; ?>">
                <?php $soundcloud_link = 'https://soundcloud.com/you/apps'; ?>
                <p class="description"><?php _e(sprintf('Please get your soundcloud client ID from %s here %s', '<a href="' . $soundcloud_link . '" target="_blank">', '</a>'), 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Instagram Access Token', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_settings[instagram_access_token]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'instagram_access_token' ]) ? esc_attr($gallery_settings[ 'instagram_access_token' ]) : ''; ?>">
                <?php $access_token_link = 'https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=' . site_url('/?eg_instagram_callback=true') . '&response_type=token'; ?>
                <p class="description"><?php _e(sprintf('Please get your access token from %s here %s', '<a href="' . $access_token_link . '" target="_blank">', '</a>'), 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Audio Preview Image URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_settings[audio_preview_image_url]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'audio_preview_image_url' ]) ? esc_url($gallery_settings[ 'audio_preview_image_url' ]) : ''; ?>"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="Upload Image" data-button-label="Choose Image" data-window-title="Choose Image" style="left:300px">
                <?php if ( isset($gallery_settings[ 'audio_preview_image_url' ]) && $gallery_settings[ 'audio_preview_image_url' ] != '' ) {
                    ?>
                    <img src="<?php echo esc_url($gallery_settings[ 'audio_preview_image_url' ]); ?>" class="eg-settings-preview-image"/>
                <?php }
                ?>
                <input type="hidden" name="gallery_settings[audio_preview_image_id]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'audio_preview_image_id' ]) ? esc_attr($gallery_settings[ 'audio_preview_image_id' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please upload audio preview image if you want to override the default preview image', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Video Preview Image URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_settings[video_preview_image_url]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'video_preview_image_url' ]) ? esc_url($gallery_settings[ 'video_preview_image_url' ]) : ''; ?>"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="Upload Image" data-button-label="Choose Image" data-window-title="Choose Image" style="left:300px">
                <?php if ( isset($gallery_settings[ 'video_preview_image_url' ]) && $gallery_settings[ 'video_preview_image_url' ] != '' ) {
                    ?>
                    <img src="<?php echo esc_url($gallery_settings[ 'video_preview_image_url' ]); ?>" class="eg-settings-preview-image"/>
                <?php }
                ?>
                <input type="hidden" name="gallery_settings[video_preview_image_id]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'video_preview_image_id' ]) ? esc_attr($gallery_settings[ 'video_preview_image_id' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please upload video preview image if you want to override the default preview image', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Post Preview Image URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_settings[post_preview_image_url]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'post_preview_image_url' ]) ? esc_url($gallery_settings[ 'post_preview_image_url' ]) : ''; ?>"/>
                <input type="button" class="eg-media-upload-button button-secondary" value="Upload Image" data-button-label="Choose Image" data-window-title="Choose Image" style="left:300px">
                <?php if ( isset($gallery_settings[ 'post_preview_image_url' ]) && $gallery_settings[ 'post_preview_image_url' ] != '' ) {
                    ?>
                    <img src="<?php echo esc_url($gallery_settings[ 'post_preview_image_url' ]); ?>" class="eg-settings-preview-image"/>
                <?php }
                ?>
                <input type="hidden" name="gallery_settings[post_preview_image_id]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'post_preview_image_id' ]) ? esc_attr($gallery_settings[ 'post_preview_image_id' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please upload post preview image if you want to override the default preview image', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Album Detail Page URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $shortcode_html = '<input type="text" value="[eg_album_gallery]" readonly="readonly" onfocus="this.select();" style="width:130px;"/>'; ?>
                <input type="text" name="gallery_settings[album_detail_page_url]" class="eg-settings-field" value="<?php echo isset($gallery_settings[ 'album_detail_page_url' ]) ? esc_url($gallery_settings[ 'album_detail_page_url' ]) : ''; ?>"/>
                <p class="description"><?php _e(sprintf('Please enter the URL of the page where you want to display the gallery of certain album. This URL is required if you need to link album to the gallery. Please add %s shortcode in the page content.', $shortcode_html), 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-settings-save-trigger" value="<?php _e('Save Settings', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader"/>
                <div class="eg-export-message"></div>
            </div>
        </div>
    </div>
    <div class="eg-notice-head"></div>
</div>