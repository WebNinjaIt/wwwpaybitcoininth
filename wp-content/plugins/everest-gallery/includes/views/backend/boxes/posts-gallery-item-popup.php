<div class="eg-posts-gallery-item-popup eg-gallery-popup-form" style="display:none;">

    <h4><?php _e('Posts Details', 'everest-gallery'); ?><span class="dashicons dashicons-no eg-close-popup"></span></h4>
    <div class="eg-popup-inner-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Post Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php
                $post_types = $this->get_registered_post_types();
                //    $this->print_array($post_types);
                ?>
                <select id="eg-post-type-trigger">
                    <option value=""><?php _e('Choose Post Type', 'everest-gallery'); ?></option>
                    <?php
                    if ( !empty($post_types) ) {
                        foreach ( $post_types as $post_type ) {
                            ?>
                            <option value="<?php echo $post_type; ?>"><?php echo ucwords(str_replace('_', ' ', $post_type)); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif' ?>" class="eg-ajax-loader"/>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Post Taxonomies', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select id="eg-post-taxonomy-trigger">
                    <option value=""><?php _e('Choose Taxonomy', 'everest-gallery'); ?></option>
                </select>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif' ?>" class="eg-ajax-loader"/>
                <p class="description"><?php _e('Please choose post type first.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Post Terms', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select id="eg-post-terms-trigger">
                    <option value=""><?php _e('Choose Terms', 'everest-gallery'); ?></option>
                </select>
                <p class="description"><?php _e('Please choose taxonomy first', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-fetch-posts-trigger" value="<?php _e('Fetch Posts', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif' ?>" class="eg-ajax-loader"/>
            </div>
        </div>
        <div class="eg-fetched-posts-wrap"></div>
    </div>
</div>
