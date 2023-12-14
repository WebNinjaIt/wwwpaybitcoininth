<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <span class="eg-admin-title"><?php _e('Edit Gallery', 'everest-gallery'); ?></span>
        </h3>
        <div class="logo">
            <img src="<?php echo EG_IMG_DIR . 'logo.png'; ?>"/>
        </div>
    </div>
    <?php
    $gallery_details = maybe_unserialize($gallery_row[ 'gallery_details' ]);
    $gallery_item_type = $gallery_row[ 'gallery_item_type' ];
    ?>
    <div class="eg-form-wrap clearfix">
        <div class="eg-form-section-tabs">
            <a class="eg-section-tab eg-active-tab" data-tab-id="general" href="javascript:void(0);"><span class="dashicons dashicons-admin-generic"></span><?php _e('General', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="filter" href="javascript:void(0);"><span class="dashicons dashicons-filter"></span><?php _e('Filter Options', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="gallery-items" href="javascript:void(0);"><span class="dashicons dashicons-format-gallery"></span><?php _e('Gallery Items', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="layout" href="javascript:void(0);"><span class="dashicons dashicons-layout"></span><?php _e('Layout', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="hover-animations" href="javascript:void(0);"><span class="dashicons dashicons-video-alt2"></span><?php _e('Hover Animations', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="pagination" href="javascript:void(0);"><span class="dashicons dashicons-editor-ol"></span><?php _e('Pagination', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="lightbox" href="javascript:void(0);"><span class="dashicons dashicons-search"></span><?php _e('Lightbox', 'everest-gallery'); ?></a>
            <a class="eg-section-tab" data-tab-id="custom" href="javascript:void(0);"><span class="dashicons dashicons-admin-customizer"></span><?php _e('Custom', 'everest-gallery'); ?></a>
        </div>
        <div class="form-wrapper">
            <form method="post" action="" class="eg-gallery-form">
                <div class="eg-shortcode-info">
                    <div class="eg-field-wrap">
                        <label>Shortcode</label>
                        <div class="eg-field">
                            <input type="text" id="eg-shortcode" readonly="readonly" value='[everest_gallery alias="<?php echo esc_attr($gallery_row[ 'gallery_alias' ]); ?>"]' onfocus="this.select();"/>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * General Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/general.php');

                /**
                 * Filter Options Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/filter-options.php');

                /**
                 * Gallery Items Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/gallery-items.php');

                /**
                 * Layout Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/layout.php');

                /**
                 * Hover Animations Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/hover-animations.php');

                /**
                 * Pagination Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/pagination.php');

                /**
                 * Lightbox Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/lightbox.php');

                /**
                 * Custom Items Section
                 */
                include(EG_PATH . 'includes/views/backend/boxes/edit-gallery-sections/custom.php');
                ?>

                <input type="hidden" name="gallery_id" value="<?php echo $gallery_id; ?>" class="eg-gallery-form-field"/>
            </form>
            <div class="eg-clear"></div>
            <div class="eg-form-actions-wrap">
                <a href="javascript:void(0);" id="eg-save-gallery" class="eg-form-actions"><i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php _e('Save', 'everest-gallery'); ?></span></a>
                <a href="<?php echo site_url() . '?eg_preview=true&gallery_alias=' . esc_attr($gallery_row[ 'gallery_alias' ]); ?>" id="eg-preview-gallery" class="eg-form-actions" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i><span><?php _e('Preview', 'everest-gallery'); ?></span></a>
                <a href="<?php echo admin_url('admin.php?page=everest-gallery'); ?>" id="eg-cancel-gallery" class="eg-form-actions"><i class="fa fa-times" aria-hidden="true"></i><span><?php _e('Cancel', 'everest-gallery'); ?></span></a>
            </div>
        </div>
    </div>
    <div class="eg-backend-popup">
        <div class="eg-overlay"></div>
        <?php
        if ( $gallery_row[ 'gallery_item_type' ] == 'video' || $gallery_row[ 'gallery_item_type' ] == 'mixed' ) {
            include(EG_PATH . 'includes/views/backend/boxes/video-gallery-item-popup.php');
        }
        if ( $gallery_row[ 'gallery_item_type' ] == 'audio' || $gallery_row[ 'gallery_item_type' ] == 'mixed' ) {
            include(EG_PATH . 'includes/views/backend/boxes/audio-gallery-item-popup.php');
        }
        if ( $gallery_row[ 'gallery_item_type' ] == 'posts' || $gallery_row[ 'gallery_item_type' ] == 'mixed' ) {
            include(EG_PATH . 'includes/views/backend/boxes/posts-gallery-item-popup.php');
        }
        if ( $gallery_row[ 'gallery_item_type' ] == 'instagram' ) {
            include(EG_PATH . 'includes/views/backend/boxes/instagram-gallery-item-popup.php');
        }
        ?>
    </div>

    <div class="eg-notice-head"></div>
</div>

