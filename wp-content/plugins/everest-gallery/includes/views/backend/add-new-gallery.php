<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <?php _e( 'Everest Gallery', 'everest-gallery' ); ?>
            <span class="eg-admin-title"><?php _e( 'New Gallery', 'everest-gallery' ); ?></span>
        </h3>

    </div>
    <div class="eg-form-wrap">
        <div class="eg-form-section-tabs">
            <a class="eg-section-tab eg-active-tab" data-tab-id="general" href="javascript:void(0);"><?php _e( 'General', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="gallery-items" href="javascript:void(0);"><?php _e( 'Gallery Items', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="layout" href="javascript:void(0);"><?php _e( 'Layout', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="hover-animations" href="javascript:void(0);"><?php _e( 'Hover Animations', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="pagination" href="javascript:void(0);"><?php _e( 'Pagination', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="filter" href="javascript:void(0);"><?php _e( 'Filter Options', 'everest-gallery' ); ?></a>
            <a class="eg-section-tab" data-tab-id="custom" href="javascript:void(0);"><?php _e( 'Custom', 'everest-gallery' ); ?></a>
        </div>
        <form method="post" action="" class="eg-gallery-form">
            <div class="eg-gallery-section-wrap" data-section-ref="general">
                <div class="eg-field-wrap">
                    <label><?php _e( 'Title', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <input type="text" class="eg-gallery-form-field" data-field-name="<?php echo urlencode( 'gallery_details[general][title]' ); ?>"/>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e( 'Alias', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <input type="text" class="eg-gallery-form-field" data-field-name="<?php echo urlencode( 'gallery_details[general][alias]' ); ?>" id="eg-alias"/>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e( 'Shortcode', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <input type="text" id="eg-shortcode" readonly="readonly"/>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e( 'CSS ID', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <input type="text" data-field-name="<?php echo urlencode( 'gallery_details[general][css_id]' ); ?>" class="eg-gallery-form-field"/>
                    </div>
                </div>
            </div>
            
            <div class="eg-gallery-section-wrap" data-section-ref="gallery-items" style="display:none;">
                <div class="eg-field-wrap">
                    <label><?php _e( 'Gallery Type', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <select class="eg-gallery-form-field" data-field-name="<?php echo urlencode( 'gallery_details[gallery_items][gallery_type]' ) ?>" id="eg-gallery-type">
                            <option value="without_filter"><?php _e( 'Without Filter', 'everest-gallery' ); ?></option>
                            <option value="with_filter"><?php _e( 'With Filter', 'everest-gallery' ); ?></option>
                        </select>
                        <div class="eg-add-filter-actions" style="display:none;">
                            <input type="text" class="eg-filter-title" placeholder="<?php _e( 'Filter 1', 'everest-gallery' ); ?>"/>
                            <a href="javascript:void(0);" class="eg-button-primary eg-add-gallery-filter"><?php _e( 'Add New Filter' ) ?></a>

                        </div>
                        <a href="javascript:void(0);" class="eg-button-primary eg-add-gallery-item"><?php _e( 'Add Item' ) ?></a>
                    </div>

                </div>

                <div class="eg-with-filter-wrap" style="display:none;">

                    <h2 class="nav-tab-wrapper wp-clearfix eg-filter-tab">
                        <?php
                        /**
                         * Filter Tabs will be appended here
                         */
                        ?>
                    </h2>
                    <div class="eg-filter-items-wrap">
                        <?php 
                        /**
                         *Filter wise gallery items will be appended here 
                         */
                        ?>
                    </div>
                </div>
                <div class="eg-without-filter-wrap">
                    <div class="eg-without-filter-gallery-items-wrap">

                    </div>
                </div>
            </div>
            <div class="eg-gallery-section-wrap" data-section-ref="layout" style="display:none;">
                Layout
            </div>
            <div class="eg-gallery-section-wrap" data-section-ref="hover-animations" style="display:none;">
                Hover Animations
            </div>
            <div class="eg-gallery-section-wrap" data-section-ref="pagination" style="display:none;">
                Paginations
            </div>
            <div class="eg-gallery-section-wrap" data-section-ref="filter" style="display:none;">
                Filter
            </div>
            <div class="eg-gallery-section-wrap" data-section-ref="custom" style="display:none;">
                Custom
            </div>
        </form>
        <div class="eg-clear"></div>
        <div class="eg-form-actions-wrap">
            <a href="javascript:void(0);" id="eg-save-gallery" class="eg-form-actions"><i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php _e( 'Save Gallery', 'everest-gallery' ); ?></span></a>
            <a href="<?php echo admin_url( 'admin.php?page=everest-gallery' ); ?>" id="eg-cancel-gallery" class="eg-form-actions"><i class="fa fa-times" aria-hidden="true"></i><span><?php _e( 'Cancel', 'everest-gallery' ); ?></span></a>
        </div>
    </div>
    <div class="eg-backend-popup">
        <div class="eg-overlay"></div>
        <div class="eg-extra-options-wrap">
            <div class="eg-field-wrap">
                <label><?php _e( 'Item Type', 'everest-gallery' ); ?></label>
                <div class="eg-field">
                    <select id="eg-gallery-item-type">
                        <option value="image"><?php _e( 'Image', 'everest-gallery' ); ?></option>
                        <option value="video"><?php _e( 'Video', 'everest-gallery' ); ?></option>
                        <option value="audio"><?php _e( 'Audio', 'everest-gallery' ); ?></option>
                        <option value="instagram"><?php _e( 'Instagram Feeds', 'everest-gallery' ); ?></option>
                        <option value="facebook"><?php _e( 'Facebook Album', 'everest-gallery' ); ?></option>
                        <option value="posts"><?php _e( 'Posts', 'everest-gallery' ); ?></option>
                        <option value="mixed"><?php _e( 'Mixed', 'everest-gallery' ); ?></option>
                        <?php
                        /**
                         * Fired when gallery item types are displayed to add new gallery item types
                         * 
                         * Can be used to add new gallery item types
                         * 
                         * @since 1.0.0
                         */
                        do_action( 'eg_gallery_item' );
                        ?>
                    </select>
                </div>
            </div>
            <div class="eg-item-type-ref-fields" data-item-type-ref="image">
                <div class="eg-field-wrap">
                    <label><?php _e( 'Image Type', 'everest-gallery' ); ?></label>
                    <div class="eg-field">
                        <label><input type="radio" class="eg-image-type" value="single" name="eg_image_type" checked="checked"/><?php _e( 'Single', 'everest-gallery' ); ?></label>
                        <label><input type="radio" class="eg-image-type" value="multiple" name="eg_image_type"/><?php _e( 'Multiple', 'everest-gallery' ); ?></label>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label></label>
                    <div class="eg-field">
                        <input type="button" class="eg-button-primary" value="<?php _e( 'Upload Images', 'everest-gallery' ); ?>" id="eg-gallery-item-image-upload"/>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="eg-notice-head"></div>
    <input type="hidden" id="eg-filter-keys" class="eg-gallery-form-field" data-field-name="<?php echo urlencode( 'gallery_details[gallery_items][filter_keys]' ) ?>"/>
</div>

