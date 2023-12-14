<?php global $eg_settings; ?>
<div class="eg-instagram-gallery-item-popup eg-gallery-popup-form" style="display:none;">

    <h4><?php _e('Instagram Account Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
    <div class="eg-popup-inner-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Instagram Username', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" id="eg-instagram-username"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Total Images', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" min="1" max="35" id="eg-instagram-total-image"/>
                <p class="description"><?php _e('Max number of images to be fetched set by instagram is 35.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Access Token', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" id="eg-instagram-access-token" value="<?php echo isset($eg_settings[ 'instagram_access_token' ]) ? esc_attr($eg_settings[ 'instagram_access_token' ]) : ''; ?>"/>
                <?php $access_token_link = 'https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=' . site_url('/?eg_instagram_callback=true') . '&response_type=token'; ?>
                <p class="description"><?php _e(sprintf('Please get your access token from %s here %s', '<a href="' . $access_token_link . '" target="_blank">', '</a>'), 'everest-gallery'); ?></p>
                <p class="description"><?php _e('You can also save your access token in settings section of our plugin for multiple use', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-fetch-instagram-trigger" value="<?php _e('Fetch Images', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif' ?>" class="eg-ajax-loader"/>
                <div class="eg-error eg-instagram-error"></div>
            </div>
        </div>
    </div>
</div>
