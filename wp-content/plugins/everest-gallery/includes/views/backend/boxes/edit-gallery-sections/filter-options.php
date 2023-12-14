<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="eg-gallery-section-wrap" data-section-ref="filter" style="display:none;">
    <div class="eg-field-wrap">
        <label><?php _e('Enable Filter', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <input type="checkbox" name="gallery_details[filter_options][filter_status]" value="1" id="eg-filter-status" class="eg-gallery-form-field" <?php
            if ( isset($gallery_details[ 'filter_options' ][ 'filter_status' ]) ) {
                checked($gallery_details[ 'filter_options' ][ 'filter_status' ], true);
            }
            ?>/>
            <p class="description"><?php _e('Please check to enable the filter options for gallery items', 'everest-gallery'); ?></p>
        </div>
    </div>
    <div class="eg-gallery-filter-options">
        <div class="eg-field-wrap">
            <label><?php _e('All Items Label', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_details[filter_options][all_label]" class="eg-gallery-form-field" placeholder="<?php _e('All', 'everest-gallery'); ?>" value="<?php echo (isset($gallery_details[ 'filter_options' ][ 'all_label' ])) ? esc_attr($gallery_details[ 'filter_options' ][ 'all_label' ]) : ''; ?>"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Filters', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <div class="eg-add-filter-actions">
                    <input type="text" class="eg-filter-title" placeholder="<?php _e('Filter 1', 'everest-gallery'); ?>"/>
                    <a href="javascript:void(0);" class="eg-button-primary eg-add-gallery-filter"><?php _e('Add New Filter') ?></a>
                </div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <div class="eg-filter-holder">
                    <?php
                    if ( isset($gallery_details[ 'filter_options' ][ 'filters' ]) && count($gallery_details[ 'filter_options' ][ 'filters' ]) > 0 ) {
                        foreach ( $gallery_details[ 'filter_options' ][ 'filters' ] as $filter_key => $filter_details ) {
                            ?>
                            <div class="eg-filter-tag" data-filter-key="<?php echo $filter_key; ?>" data-filter-label="<?php echo $filter_details[ 'label' ]; ?>">
                                <span class="eg-filter-tag-label"><?php echo $filter_details[ 'label' ] ?></span>
                                <span class="dashicons dashicons-no-alt eg-filter-remover"></span>
                                <input type="hidden" name="gallery_details[filter_options][filters][<?php echo $filter_key ?>][label]" value="<?php echo $filter_details[ 'label' ]; ?>" class="eg-gallery-form-field">
                                <input type="hidden" name="gallery_details[filter_options][filters][<?php echo $filter_key ?>][filter_key]" value="<?php echo $filter_key ?>" class="eg-gallery-form-field">
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Filter Layout', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <select name="gallery_details[filter_options][filter_layout]" class="eg-gallery-form-field eg-filter-template-trigger">
                <?php
                $filter_layout = isset($gallery_details[ 'filter_options' ][ 'filter_layout' ]) ? esc_attr($gallery_details[ 'filter_options' ][ 'filter_layout' ]) : 'layout-1';
                for ( $i = 1; $i <= 10; $i++ ) {
                    ?>
                    <option value="layout-<?php echo $i; ?>" <?php selected($filter_layout, 'layout-' . $i); ?>><?php echo __('Template ', 'everest-gallery') . ' ' . $i; ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="eg-filter-preview-wrap">
                <?php for ( $i = 1; $i <= 10; $i++ ) {
                    ?>
                    <img src="<?php echo EG_IMG_DIR . 'previews/filters/filter-template-' . $i . '.png'; ?>" data-preview-id="layout-<?php echo $i; ?>" class="eg-filter-preview" <?php echo ($filter_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <p class="description"><?php _e('Note', 'everest-gallery') ?>: <?php _e('Filter is only available for Grid and Masonary Layout', 'everest-gallery'); ?></p>

</div>