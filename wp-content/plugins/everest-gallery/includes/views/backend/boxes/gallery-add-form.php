<div class="eg-gallery-add-form" style="display:none;">
    <div class="eg-overlay"></div>
    <div class="eg-gallery-add-form-fields eg-gallery-popup-form">
        <h3><?php _e('Add New Gallery', 'everest-gallery'); ?></h3>
        <div class="eg-field-wrap">
            <label><?php _e('Title', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" id="eg-gallery-add-title" class="eg-keyup-trigger"/>
                <div class="eg-error" id="eg-gallery-add-title-error"></div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Alias', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" id="eg-gallery-add-alias" class="eg-keyup-trigger"/>
                <div class="eg-error" id="eg-gallery-add-alias-error"></div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Shortcode', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" id="eg-gallery-add-shortcode" readonly="readonly"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Gallery Item Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select id="eg-gallery-add-gallery-item-type">
                    <option value="image"><?php _e('Image Gallery', 'everest-gallery'); ?></option>
                    <option value="video"><?php _e('Video Gallery', 'everest-gallery'); ?></option>
                    <option value="audio"><?php _e('Audio Gallery', 'everest-gallery'); ?></option>
                    <option value="posts"><?php _e('Posts Gallery', 'everest-gallery'); ?></option>
                    <option value="instagram"><?php _e('Instagram Gallery', 'everest-gallery'); ?></option>
                    <option value="mixed"><?php _e('Mixed Gallery', 'everest-gallery'); ?></option>
                    <?php
                    /**
                     * Fired when gallery item types are displayed to add new gallery item types
                     *
                     * Can be used to add new gallery item types
                     *
                     * @since 1.0.0
                     */
                    do_action('eg_gallery_item_type');
                    ?>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" id="eg-gallery-add-trigger" value="<?php _e('Add Gallery', 'everest-gallery'); ?>" class="eg-button-primary"/>
                <img src="<?php echo EG_IMG_DIR . '/ajax-loader-add.gif'; ?>" class="eg-add-gallery-loader" style="display:none;"/>
            </div>
        </div>
        <div class="eg-add-gallery-message"></div>
    </div>
</div>