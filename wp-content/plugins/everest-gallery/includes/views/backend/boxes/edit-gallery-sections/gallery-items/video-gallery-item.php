<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="eg-each-gallery-item" data-gallery-item-key="<?php echo $gallery_item_key; ?>">
    <div class="eg-gallery-image-preview">
        <div class="eg-gallery-item-actions-wrap">
            <a href="javascript:void(0)" class="eg-move-item"><span><?php _e('Move', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-settings-item"><span><?php _e('Settings', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-copy-item"><span><?php _e('Copy', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-delete-item"><span><?php _e('Delete', 'everest-gallery'); ?></span></a>
        </div>
        <?php
        $preview_image = $gallery_item_details[ 'video_preview_image_url' ];
        $default_preview_image = EG_IMG_DIR . 'no-preview.jpg';
        $preview_image = ($preview_image != '') ? esc_url($preview_image) : $default_preview_image;

        //$this->print_array($image_url_array);
        ?>
        <img src="<?php echo esc_url($preview_image); ?>">
    </div>
    <div class="eg-gallery-item-detail-wrap eg-backend-popup" style="display:none;">
        <div class="eg-overlay"></div>
        <div class="eg-gallery-item-detail-fields">
            <h4><?php _e('Video Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
            <div class="eg-popup-inner-wrap">
                <div class="eg-field-wrap">
                    <label><?php _e('Video Title', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="text" class="eg-gallery-form-field" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][item_title]" value="<?php echo $gallery_item_details[ 'item_title' ]; ?>">
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Video Caption', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <textarea class="eg-gallery-form-field" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][item_caption]"><?php echo $gallery_item_details[ 'item_caption' ]; ?></textarea>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Video Link', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="text" class="eg-gallery-form-field" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][item_link]" value="<?php echo $gallery_item_details[ 'item_link' ]; ?>">
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Video Type', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <select name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][video_type]" class="eg-video-form-field eg-video-type-trigger eg-gallery-form-field">
                            <option value="youtube" <?php selected($gallery_item_details[ 'video_type' ], 'youtube'); ?>><?php _e('Youtube', 'everest-gallery'); ?></option>
                            <option value="vimeo" <?php selected($gallery_item_details[ 'video_type' ], 'vimeo'); ?>><?php _e('Vimeo', 'everest-gallery'); ?></option>
                            <option value="self-hosted" <?php selected($gallery_item_details[ 'video_type' ], 'self-hosted'); ?>><?php _e('Self Hosted', 'everest-gallery'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="eg-field-wrap eg-youtube-reference eg-vimeo-reference eg-video-type-reference" <?php echo ($gallery_item_details[ 'video_type' ] == 'vimeo' || $gallery_item_details[ 'video_type' ] == 'youtube') ? '' : 'style="display:none"'; ?>>
                    <label><?php _e('Video URL', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="text" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][video_url]" placeholder="https://www.youtube.com/watch?v=qm67wbB5GmI" value="<?php echo esc_attr($gallery_item_details[ 'video_url' ]); ?>" class="eg-gallery-form-field"/>
                    </div>
                </div>
                <div class="eg-field-wrap eg-self-hosted-reference eg-video-type-reference"  <?php echo ($gallery_item_details[ 'video_type' ] != 'self-hosted') ? 'style="display:none"' : ''; ?>>
                    <label><?php _e('Self Hosted Video URL', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Video', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Video', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Video', 'everest-gallery'); ?>"/>
                        <input type="text" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][self_video_url]" value="<?php echo esc_attr($gallery_item_details[ 'self_video_url' ]); ?>" class="eg-gallery-form-field"/>
                        <input type="hidden" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][self_video_id]" value="<?php echo esc_attr($gallery_item_details[ 'self_video_id' ]); ?>" class="eg-gallery-form-field"/>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Preview Image', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Image', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Image', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Image', 'everest-gallery'); ?>"/>
                        <input type="text" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][video_preview_image_url]" value="<?php echo esc_attr($gallery_item_details[ 'video_preview_image_url' ]); ?>" class="eg-gallery-form-field"/>
                        <input type="hidden" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][video_preview_image_id]" value="<?php echo esc_attr($gallery_item_details[ 'video_preview_image_id' ]); ?>" class="eg-gallery-form-field"/>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Filters', 'everest-gallery'); ?></label>
                    <div class="eg-field eg-gallery-item-filter-wrap" data-item-key="<?php echo $gallery_item_key; ?>">
                        <?php
                        if ( isset($gallery_details[ 'filter_options' ][ 'filters' ]) && count($gallery_details[ 'filter_options' ][ 'filters' ]) > 0 ) {
                            $item_filters = isset($gallery_details[ 'gallery_items' ][ $gallery_item_key ][ 'filters' ]) ? array_map('esc_attr', $gallery_details[ 'gallery_items' ][ $gallery_item_key ][ 'filters' ]) : array();
                            foreach ( $gallery_details[ 'filter_options' ][ 'filters' ] as $filter_key => $filter_details ) {
                                ?>
                                <div class="eg-gallery-item-each-filter eg-inline-block" data-filter-key="<?php echo $filter_key; ?>">
                                    <label><span class="eg-filter-label"><?php echo $filter_details[ 'label' ]; ?></span><input type="checkbox" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][filters][]" value="<?php echo $filter_key; ?>" class="eg-gallery-form-field" <?php echo (in_array($filter_key, $item_filters)) ? 'checked="checked"' : ''; ?>></label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <input type="hidden" class="eg-gallery-form-field" name="gallery_details[gallery_items][<?php echo $gallery_item_key; ?>][gallery_item_type]" value="video">
        </div>
    </div>
</div>