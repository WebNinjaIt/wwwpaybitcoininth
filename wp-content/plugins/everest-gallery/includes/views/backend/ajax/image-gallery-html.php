<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !empty($_POST[ 'attachments' ]) ) {

    foreach ( $_POST[ 'attachments' ] as $attachment ) {
        $gallery_item_key = $this->generate_random_string(15);
        $field_name_prefix = "gallery_details[gallery_items][eg_item_$gallery_item_key]";
        ?>
        <div class="eg-each-gallery-item" data-gallery-item-key="<?php echo 'eg_item_' . $gallery_item_key; ?>">
            <div class="eg-gallery-image-preview">
                <div class="eg-gallery-item-actions-wrap">
                    <a href="javascript:void(0)" class="eg-move-item"><span><?php _e('Move', 'everest-gallery'); ?></span></a>
                    <a href="javascript:void(0)" class="eg-settings-item"><span><?php _e('Settings', 'everest-gallery'); ?></span></a>
                    <a href="javascript:void(0)" class="eg-copy-item"><span><?php _e('Copy', 'everest-gallery'); ?></span></a>
                    <a href="javascript:void(0)" class="eg-delete-item"><span><?php _e('Delete', 'everest-gallery'); ?></span></a>
                </div>
                <img src="<?php echo $attachment[ 'sizes' ][ 'full' ][ 'url' ]; ?>"/>
            </div>
            <div class="eg-gallery-item-detail-wrap" style="display:none;">
                <div class="eg-overlay"></div>
                <div class="eg-gallery-item-detail-fields">
                    <h4><?php _e('Item Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
                    <div class="eg-field-wrap">
                        <label><?php _e('Item Title', 'everest-gallery'); ?></label>
                        <div class="eg-field">
                            <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_title]'; ?>" value="<?php echo ucfirst($attachment[ 'title' ]); ?>"/>
                        </div>
                    </div>
                    <div class="eg-field-wrap">
                        <label><?php _e('Item Caption', 'everest-gallery'); ?></label>
                        <div class="eg-field">
                            <textarea class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_caption]'; ?>"><?php echo $attachment[ 'caption' ]; ?></textarea>
                        </div>
                    </div>

                    <div class="eg-field-wrap">
                        <label>
                            <?php _e('Link to gallery', 'everest-gallery'); ?>
                        </label>
                        <div class="eg-field">
                            <input type="checkbox" class="eg-gallery-form-field eg-gallery-link-check" name="<?php echo $field_name_prefix . '[link_to_gallery]'; ?>" value="1"/>
                            <p class="description"><?php _e('You will need to add the album detail page URL in the settings section of our plugin.', 'everest-gallery'); ?></p>
                        </div>

                    </div>
                    <div class="eg-field-wrap eg-link-gallery-alias" style="display: none">
                        <label><?php _e('Gallery', 'everest-gallery'); ?></label>
                        <div class="eg-field">
                            <select name="<?php echo $field_name_prefix . '[gallery_alias]'; ?>" class="eg-gallery-form-field">
                                <option value=""><?php _e('Choose Gallery', 'everest-gallery'); ?></option>
                                <?php
                                global $wpdb;
                                $gallery_table = EG_GALLERY_TABLE;
                                $gallery_rows1 = $wpdb->get_results("select * from $gallery_table order by gallery_title asc");
                                if ( !empty($gallery_rows1) ) {
                                    foreach ( $gallery_rows1 as $gallery_row1 ) {
                                        ?>
                                        <option value="<?php echo $gallery_row1->gallery_alias; ?>"><?php echo $gallery_row1->gallery_title; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="eg-field-wrap eg-url-link">
                        <label><?php _e('Item Link', 'everest-gallery'); ?></label>
                        <div class="eg-field">
                            <input type="text" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[item_link]'; ?>" value="<?php echo $attachment[ 'link' ]; ?>"/>
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
                <input type="hidden" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[attachment_id]'; ?>" value="<?php echo $attachment[ 'id' ]; ?>"/>
                <input type="hidden" class="eg-gallery-form-field" name="<?php echo $field_name_prefix . '[gallery_item_type]'; ?>" value="image"/>
                <?php // $this->print_array($attachment);  ?>
            </div>
        </div>
        <?php
    }
}
//$this->print_array( $_POST );
