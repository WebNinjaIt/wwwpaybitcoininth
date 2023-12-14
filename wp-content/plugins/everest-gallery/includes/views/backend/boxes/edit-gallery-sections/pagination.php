<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="eg-gallery-section-wrap" data-section-ref="pagination" style="display:none;">
    <div class="eg-field-wrap">
        <label><?php _e('Pagination', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <?php $pagination_status = (isset($gallery_details[ 'pagination' ][ 'status' ])) ? esc_attr($gallery_details[ 'pagination' ][ 'status' ]) : 0; ?>
            <input type="checkbox" name="gallery_details[pagination][status]" class="eg-gallery-form-field" value="1" <?php checked($pagination_status, true); ?>/>
        </div>
    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Items Per Page', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <input type="number" min="1" name="gallery_details[pagination][per_page]" class="eg-gallery-form-field" value="<?php echo (isset($gallery_details[ 'pagination' ][ 'per_page' ])) ? esc_attr($gallery_details[ 'pagination' ][ 'per_page' ]) : ''; ?>"/>
        </div>
    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Pagination Type', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <select name="gallery_details[pagination][type]" class="eg-gallery-form-field">
                <?php $selected_pagination_type = isset($gallery_details[ 'pagination' ][ 'type' ]) ? esc_attr($gallery_details[ 'pagination' ][ 'type' ]) : 'page_numbers'; ?>
                <option value="page_numbers" <?php selected($selected_pagination_type, 'page_number'); ?>><?php _e('Page Numbers', 'everest-gallery'); ?></option>
                <option value="load_more" <?php selected($selected_pagination_type, 'load_more'); ?>><?php _e('Load More', 'everest-gallery'); ?></option>
            </select>
        </div>
    </div>
    <?php $pagination_type = (isset($gallery_details[ 'pagination' ][ 'type' ])) ? esc_attr($gallery_details[ 'pagination' ][ 'type' ]) : 'page_numbers'; ?>
    <div class="eg-pagination-type-options eg-load_more-options" <?php $this->eg_display_none($pagination_type, 'load_more'); ?>>
        <div class="eg-field-wrap">
            <label><?php _e('Load More Text', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_details[pagination][load_more][text]" class="eg-gallery-form-field" value="<?php echo (isset($gallery_details[ 'pagination' ][ 'load_more' ][ 'text' ])) ? esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'text' ]) : ''; ?>" placeholder="<?php _e('Load More', 'everest-gallery'); ?>"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Loader', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php
                $loader_directory = EG_PATH . 'images/loaders';
                $loaders = array_diff(scandir($loader_directory), array( '..', '.' ));
                natsort($loaders);
                $checked = (isset($gallery_details[ 'pagination' ][ 'load_more' ][ 'loader' ])) ? esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'loader' ]) : 'loader-1.gif';
                foreach ( $loaders as $loader ) {
                    ?>
                    <label>
                        <input type="radio" name="gallery_details[pagination][load_more][loader]" value="<?php echo $loader; ?>" <?php checked($loader, $checked); ?> style="display: none;" class="eg-image-radio eg-gallery-form-field"/>
                        <img src="<?php echo EG_IMG_DIR . 'loaders/' . $loader ?>"/>
                    </label>
                    <?php
                }
                ?>
            </div>

        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Load More Layout', 'everest-gallery') ?></label>
            <div class="eg-field">
                <select name="gallery_details[pagination][load_more][load_more_layout]" class="eg-gallery-form-field eg-load-more-template-trigger">
                    <?php
                    $load_more_layout = isset($gallery_details[ 'pagination' ][ 'load_more' ][ 'load_more_layout' ]) ? esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'load_more_layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($load_more_layout, 'layout-' . $i); ?>>
                            <?php
                            _e('Layout', 'everest-gallery');
                            echo ' ' . $i;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-load-more-preview-wrap">
                    <?php for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/load-more/load-more-template-' . $i . '.png'; ?>" data-preview-id="layout-<?php echo $i; ?>" class="eg-load-more-preview" <?php echo ($load_more_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eg-pagination-type-options eg-page_numbers-options" <?php $this->eg_display_none($pagination_type, 'page_numbers'); ?>>
        <div class="eg-field-wrap">
            <label><?php _e('Pagination Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[pagination][pagination_layout]" class="eg-gallery-form-field eg-pagination-template-trigger">
                    <?php
                    $pagination_layout = isset($gallery_details[ 'pagination' ][ 'pagination_layout' ]) ? esc_attr($gallery_details[ 'pagination' ][ 'pagination_layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($pagination_layout, 'layout-' . $i); ?>>
                            <?php
                            _e('Template', 'everest-gallery');
                            echo ' ' . $i;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-pagination-preview-wrap">
                    <?php for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/pagination/pagination-template-' . $i . '.png'; ?>" data-preview-id="layout-<?php echo $i; ?>" class="eg-pagination-preview" <?php echo ($pagination_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <p class="description"><?php _e('Note: Pagination is available for grid and masonary layout only.', 'everest-gallery'); ?></p>
</div>