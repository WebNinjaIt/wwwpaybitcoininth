<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <span class="eg-admin-title"><?php _e('Import Gallery', 'everest-gallery'); ?></span>
        </h3>
        <div class="logo">
            <img src="<?php echo EG_IMG_DIR.'logo.png';?>"/>
        </div>
    </div>
    <div class="eg-content-wrap">
        <div class="eg-field-wrap">
            <label><?php _e('Gallery Import Code', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea rows="20" id="eg-gallery-import-code"></textarea>
                <p class="description"><?php _e('Please paste the code that has been copied from the export section and also note that it will just import the settings but not the images. Image should be uploaded manually through FTP or Cpanel with same folder structure inside uploads folder.', 'everest-gallery'); ?></p>
                <p class="description"><?php _e('Invalid code may result error.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Gallery Export URL', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <textarea id="eg-gallery-export-url"></textarea>
                <p class="description"><?php _e('Please paste the export URL copied from the export section', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label></label>
            <div class="eg-field">
                <input type="button" class="eg-button-primary eg-gallery-import-trigger" value="<?php _e('Import Gallery', 'everest-gallery'); ?>"/>
                <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader"/>
                <div class="eg-export-message"></div>
            </div>
        </div>
    </div>

</div>

