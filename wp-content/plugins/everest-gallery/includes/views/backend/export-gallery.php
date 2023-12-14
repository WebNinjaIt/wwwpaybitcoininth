<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <span class="eg-admin-title"><?php _e('Export Gallery', 'everest-gallery'); ?></span>
        </h3>
        <div class="logo">
            <img src="<?php echo EG_IMG_DIR.'logo.png';?>"/>
        </div>
    </div>
    <div class="eg-content-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Gallery', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select id="eg-gallery-id">
                    <option value=""><?php _e('Choose Gallery', 'everest-gallery'); ?></option>
                    <?php
                    global $egwpdb;
                    $galleries = $egwpdb->get_galleries();
                    if ( !empty($galleries) ) {
                        foreach ( $galleries as $gallery ) {
                            ?>
                            <option value="<?php echo $gallery[ 'gallery_id' ]; ?>" ><?php echo esc_attr($gallery[ 'gallery_title' ]); ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>
                <img src="<?php echo EG_IMG_DIR . '/ajax-loader-add.gif' ?>" class="eg-ajax-loader"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Gallery Export Code', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea readonly="readonly" id="eg-gallery-export-code" onfocus="this.select();"></textarea>
                <p class="description"><?php _e('Please choose gallery first. Please copy this code in the import section of the site where you want to import this gallery.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Export URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea readonly="readonly" onfocus="this.select();"><?php echo str_replace('"', '', json_encode(site_url())); ?></textarea>
                <p class="description"><?php _e('Please copy this URL in the Gallery Export URL field of the import section of the site where you want to import this gallery.', 'everest-gallery') ?></p>
            </div>
        </div>

    </div>
</div>