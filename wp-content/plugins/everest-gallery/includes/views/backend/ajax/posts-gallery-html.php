<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !empty($_POST[ 'post_ids' ]) ) {
    global $eg_settings;
    $post_ids = array_map('sanitize_text_field', $_POST[ 'post_ids' ]);
    $posts_query = new WP_Query(array( 'post__in' => $post_ids ));
    $caption_length = sanitize_text_field($_POST[ 'caption_length' ]);
    if ( $posts_query->have_posts() ) {

        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();
            $gallery_item_key = $this->generate_random_string(15);
            $field_name_prefix = "gallery_details[gallery_items][eg_item_$gallery_item_key]";
            if ( $caption_length != '' || $caption_length > 0 ) {
                $post_content = substr(strip_tags(get_the_content()), 0, $caption_length);
            } else {
                $post_content = get_the_content();
            }
            if ( has_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                $preview_image_url = $image_url[ 0 ];
            } else {
                $image_id = ($eg_settings[ 'post_preview_image_id' ] != '') ? esc_attr($eg_settings[ 'post_preview_image_id' ]) : '';
                $default_preview_image = (isset($eg_settings[ 'post_preview_image_url' ]) && $eg_settings[ 'post_preview_image_url' ] != '') ? esc_url($eg_settings[ 'post_preview_image_url' ]) : EG_IMG_DIR . 'no-preview.jpg';
                $preview_image_url = ($eg_settings[ 'post_preview_image_url' ] != '') ? esc_url($eg_settings[ 'post_preview_image_url' ]) : $default_preview_image;
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
                <div class="eg-gallery-item-detail-wrap" style="display:none;">
                    <div class="eg-overlay"></div>
                    <div class="eg-gallery-item-detail-fields">
                        <h4><?php _e('Item Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
                        <div class="eg-field-wrap">
                            <label><?php _e('Item Title', 'everest-gallery'); ?></label>
                            <div class="eg-field">
                                <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_title]'; ?>" value="<?php the_title(); ?>"/>
                            </div>
                        </div>
                        <div class="eg-field-wrap">
                            <label><?php _e('Item Caption', 'everest-gallery'); ?></label>
                            <div class="eg-field">
                                <textarea class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_caption]'; ?>"><?php echo $post_content; ?></textarea>
                            </div>
                        </div>
                        <div class="eg-field-wrap">
                            <label><?php _e('Item Link', 'everest-gallery'); ?></label>
                            <div class="eg-field">
                                <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_link]'; ?>" value="<?php the_permalink(); ?>"/>
                            </div>
                        </div>
                        <div class="eg-field-wrap">
                            <label><?php _e('Preview Image', 'everest-gallery'); ?></label>
                            <div class="eg-field">
                                <input type="text" name="<?php echo $field_name_prefix . '[post_preview_image_url]'; ?>" value="<?php echo $preview_image_url; ?>" class="eg-gallery-form-field"/>
                                <input type="button" class="eg-media-upload-button button-secondary" value="<?php _e('Upload Image', 'everest-gallery'); ?>" data-button-label="<?php _e('Choose Image', 'everest-gallery'); ?>" data-window-title="<?php _e('Choose Image', 'everest-gallery'); ?>" data-preview-image="true"/>
                                <input type="hidden" name="<?php echo $field_name_prefix . '[post_preview_image_id]'; ?>" value="<?php echo isset($image_id) ? $image_id : ''; ?>" class="eg-gallery-form-field"/>
                                <img src="<?php echo $preview_image_url; ?>" class="eg-settings-preview-image"/>
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
                    </div>
                    <input type="hidden" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[post_id]'; ?>" value="<?php echo get_the_ID(); ?>"/>
                    <input type="hidden" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[gallery_item_type]'; ?>" value="post"/>
                    <?php // $this->print_array($attachment);  ?>
                </div>
            </div>
            <?php
        }
    }
}
//$this->print_array( $_POST );
