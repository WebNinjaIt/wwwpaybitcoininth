<?php
defined('ABSPATH') or die('No script kiddies please!!');
$form_data = $_POST[ 'form_data' ];
parse_str($form_data, $received_data);
//$this->print_array($received_data);
$gallery_item_key = $this->generate_random_string(15);
$field_name_prefix = "gallery_details[gallery_items][eg_item_$gallery_item_key]";
$preview_image_url = sanitize_text_field($received_data[ 'audio_preview_image_url' ]);
$audio_preview_image_id = sanitize_text_field($received_data[ 'audio_preview_image_id' ]);
if ( $preview_image_url == '' ) {
    global $eg_settings;
    $audio_preview_image_id = ($eg_settings[ 'audio_preview_image_id' ] != '') ? esc_attr($eg_settings[ 'audio_preview_image_id' ]) : '';
    $default_preview_image = (isset($eg_settings[ 'audio_preview_image_url' ]) && $eg_settings[ 'audio_preview_image_url' ] != '') ? esc_url($eg_settings[ 'audio_preview_image_url' ]) : EG_IMG_DIR . 'no-preview.jpg';
    $preview_image_url = ($eg_settings[ 'audio_preview_image_url' ] != '') ? esc_url($eg_settings[ 'audio_preview_image_url' ]) : $default_preview_image;
}
?>
<div class="eg-each-gallery-item" data-gallery-item-key="<?php echo 'eg_item_' . $gallery_item_key; ?>">
    <div class="eg-gallery-image-preview">
        <div class="eg-gallery-item-actions-wrap">
            <a href="javascript:void(0)" class="eg-move-item"><span><?php _e('Move', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-settings-item"><span><?php _e('Settings', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-copy-item"><span><?php _e('Copy', 'everest-gallery'); ?></span></a>
            <a href="javascript:void(0)" class="eg-delete-item"><span><?php _e('Delete', 'everest-gallery'); ?></span></a>
        </div>
        <img src="<?php echo $preview_image_url; ?>" class="eg-preview-image"/>
    </div>
    <div class="eg-gallery-item-detail-wrap eg-backend-popup" style="display:none;">
        <div class="eg-overlay"></div>
        <div class="eg-gallery-item-detail-fields">
            <h4><?php _e('Audio Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
            <div class="eg-field-wrap">
                <label><?php _e('Audio Title', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_title]'; ?>" value="<?php echo sanitize_text_field($received_data[ 'item_title' ]); ?>"/>
                </div>
            </div>
            <div class="eg-field-wrap">
                <label><?php _e('Audio Caption', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <textarea class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_caption]'; ?>"><?php echo sanitize_text_field($received_data[ 'item_caption' ]); ?></textarea>
                </div>
            </div>
            <div class="eg-field-wrap">
                <label><?php _e('Audio Link', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_link]'; ?>" value="<?php echo sanitize_text_field($received_data[ 'item_link' ]); ?>"/>
                </div>
            </div>
            <div class="eg-field-wrap">
                <label><?php _e('Audio Type', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <select name="<?php echo $field_name_prefix . '[audio_type]'; ?>" class="eg-audio-type-trigger eg-gallery-form-field">
                        <option value="soundcloud" <?php selected($received_data[ 'audio_type' ], 'soundcloud'); ?>><?php _e('Soundcloud', 'everest-gallery'); ?></option>
                        <option value="self-hosted" <?php selected($received_data[ 'audio_type' ], 'self-hosted'); ?>><?php _e('Self Hosted', 'everest-gallery'); ?></option>
                    </select>
                </div>
            </div>
            <div class="eg-field-wrap eg-soundcloud-reference eg-audio-type-reference" <?php echo ($received_data[ 'audio_type' ] == 'soundcloud') ? '' : 'style="display:none"'; ?>>
                <label><?php _e('Audio URL', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <input type="text" name="<?php echo $field_name_prefix . '[audio_url]'; ?>" placeholder="https://www.youtube.com/watch?v=qm67wbB5GmI" value="<?php echo sanitize_text_field($received_data[ 'audio_url' ]); ?>" class="eg-gallery-form-field"/>
                </div>
            </div>
            <div class="eg-field-wrap eg-self-hosted-reference eg-audio-type-reference"  <?php echo ($received_data[ 'audio_type' ] != 'self-hosted') ? 'style="display:none"' : ''; ?>>
                <label><?php _e('Self Hosted audio URL', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload audio', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose audio', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose audio', 'everest-gallery'); ?>"/>
                    <input type="text" name="<?php echo $field_name_prefix . '[self_audio_url]'; ?>" value="<?php echo sanitize_text_field($received_data[ 'self_audio_url' ]); ?>" class="eg-gallery-form-field"/>
                    <input type="hidden" name="<?php echo $field_name_prefix . '[self_audio_id]'; ?>" value="<?php echo sanitize_text_field($received_data[ 'self_audio_id' ]); ?>" class="eg-gallery-form-field"/>
                </div>
            </div>
            <div class="eg-field-wrap">
                <label><?php _e('Preview Image', 'everest-gallery'); ?></label>
                <div class="eg-field">
                    <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Image', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Image', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Image', 'everest-gallery'); ?>" data-preview-image="true"/>
                    <input type="text" name="<?php echo $field_name_prefix . '[audio_preview_image_url]'; ?>" value="<?php echo $preview_image_url; ?>" class="eg-gallery-form-field eg-preview-image-url"/>
                    <input type="hidden" name="<?php echo $field_name_prefix . '[audio_preview_image_id]'; ?>" value="<?php echo $audio_preview_image_id; ?>" class="eg-gallery-form-field"/>
                </div>
            </div>

            <div class="eg-field-wrap">
                <label><?php _e('Filters', 'everest-gallery'); ?></label>
                <div class="eg-field eg-gallery-item-filter-wrap" data-item-key="eg_item_<?php echo $gallery_item_key; ?>">
                    <?php
                    if ( isset($_POST[ 'filters' ]) && !empty($_POST[ 'filters' ]) ) {
                        $filters = array_map('sanitize_text_field', $_POST[ 'filters' ]);
                        foreach ( $filters as $filter_key => $filter_label ) {
                            ?>
                            <div class="eg-gallery-item-each-filter eg-inline-block" data-filter-key="<?php echo $filter_key; ?>">
                                <label><span class="eg-filter-label"><?php echo $filter_label; ?></span><input type="checkbox" name="<?php echo $field_name_prefix . '[filters][]' ?>" value="<?php echo $filter_key ?>" class="eg-gallery-form-field"/></label>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[gallery_item_type]'; ?>" value="audio"/>
        </div>
        <?php // $this->print_array($attachment);    ?>
    </div>
</div>

