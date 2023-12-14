<div class="eg-extra-options-wrap">
    <div class="eg-field-wrap">
        <label><?php _e('Item Type', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <select id="eg-gallery-item-type">
                <option value="image"><?php _e('Image', 'everest-gallery'); ?></option>
                <option value="video"><?php _e('Video', 'everest-gallery'); ?></option>
                <option value="audio"><?php _e('Audio', 'everest-gallery'); ?></option>
                <option value="instagram"><?php _e('Instagram Feeds', 'everest-gallery'); ?></option>
                <option value="facebook"><?php _e('Facebook Album', 'everest-gallery'); ?></option>
                <option value="posts"><?php _e('Posts', 'everest-gallery'); ?></option>
                <?php
                /**
                 * Fired when gallery item types are displayed to add new gallery item types
                 *
                 * Can be used to add new gallery item types
                 *
                 * @since 1.0.0
                 */
                do_action('eg_gallery_item');
                ?>
            </select>
        </div>
    </div>
    <div class="eg-item-type-ref-fields" data-item-type-ref="image">
        <div class="eg-field-wrap">
            <label><?php _e('Image Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <label><input type="radio" class="eg-image-type" value="single" name="eg_image_type" checked="checked"/><?php _e('Single', 'everest-gallery'); ?></label>
                <label><input type="radio" class="eg-image-type" value="multiple" name="eg_image_type"/><?php _e('Multiple', 'everest-gallery'); ?></label>
            </div>
        </div>

        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="button-primary" value="<?php _e('Upload Images', 'everest-gallery'); ?>" id="eg-gallery-item-image-upload"/>
            </div>
        </div>
    </div>

</div>