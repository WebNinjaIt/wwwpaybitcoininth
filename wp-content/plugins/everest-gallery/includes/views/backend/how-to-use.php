<div class="wrap eg-wrap">
    <div class="eg-header-wrap">
        <h3>
            <span class="eg-admin-title"><?php esc_html_e('How to use', 'everest-gallery'); ?></span>
        </h3>
        <div class="logo">
            <img src="<?php echo EG_IMG_DIR . 'logo.png'; ?>"/>
        </div>
    </div>
    <div class="eg-form-wrap">
        <div class="eg-content-wrap">
            <div class="eg-content-section">
                <h5 class="description">For detailed documentation, please visit <a href="https://accesspressthemes.com/documentation/everest-gallery-plugin-responsive-wordpress-gallery-plugin/" target="_blank">here</a>.</h5>

                <h4 class="eg-content-title">Create new gallery</h4>
                <p><?php esc_html_e('Please go to all galleries and click on create a new gallery. While creating you will need to enter few parameters such as gallery title, gallery alias and gallery item type. While entering gallery alias, please enter the unique alias which has been entered in any other galleries because shortode will be generated as per this alias.', 'everest-gallery');?></p>
                <p><?php esc_html_e('Currently, there are 6 gallery item types. They are:', 'everest-gallery'); ?></p>
                <ul>
                    <li>
                        <strong><?php esc_html_e('Image Gallery', 'everest-gallery'); ?></strong><?php esc_html_e(' -This gallery supports only image as the gallery item.', 'everest-gallery'); ?>
                    </li>

                    <li><strong><?php esc_html_e('Video Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e('- This gallery supports only video gallery items. Video can be self hosted, Youtube URL or Vimeo URL.' , 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Audio Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e('- This gallery supports only audi gallery items. Audio can be self hosted or Soundcloud URL.', 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Posts Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e("- This also supports image gallery items but the images can be fetched from the posts's featured image.", "everest-gallery"); ?></li>
                    <li><strong><?php esc_html_e('Instagram Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e('- This also supports image gallery items but the images will be fetched from configured instagram account. For this you will need to add the instagram access token in the settings section.', 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Mixed Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e('- This gallery supports all the combination of gallery items such as image, audio and video.', 'everest-gallery'); ?></li>
                </ul>
            </div>
            <div class="eg-content-section">
                <h4 class="eg-content-title"><?php esc_html_e('Gallery Details', 'everest-gallery'); ?></h4>
                <h5><?php esc_html_e('General', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here, you can change all the general parameters for the gallery such as title, alias, CSS ID etc', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Filter Options', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('In this section, you can add filters for filtering the gallery. Please note that filter option is only available for grid and masonary layouts.', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Gallery Items', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here you can the gallery items as per the gallery item type selected while adding the gallery.', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Layout', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here you can configure necessary layout related settings such as Image Source Type, Layout Type. Currently, there are 6 layouts available - Grid, Masonary, Slideshow, Filmstrip, Blob, Caraousel', 'everest-gallery'); ?> </p>
                <p><?php esc_html_e('All layouts have their individual configurations.', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Hover Animations', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here, you can choose hover animations as per your requirement. Currently, there are two type of hovers. One is overlay and other is image filters.', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Pagination', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here, you can choose pagination configuration. In this section, you can choose either load more or page number as pagination type.', 'everest-gallery'); ?></p>

                <h5><?php esc_html_e('Lightbox', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('There are currently 4 types of lightboxes available. They are :', 'everest-gallery'); ?></p>
                <ul>
                    <li><strong><?php esc_html_e('Pretty Photo', 'everest-gallery'); ?></strong> <?php esc_html_e('- Useful for image gallery which has the option to share the gallery in facebook and twitter', 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Colorbox', 'everest-gallery'); ?></strong> <?php esc_html_e('- Useful for image gallery', 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Magnific Popup', 'everest-gallery'); ?></strong> <?php esc_html_e('- Useful for image gallery', 'everest-gallery'); ?></li>
                    <li><strong><?php esc_html_e('Everest Gallery', 'everest-gallery'); ?></strong> <?php esc_html_e('- This is our inbuilt lightbox which is useful for all gallery item types. But we recommend this use in video and audio gallery and for image, please use any one of the above for better user experience.', 'everest-gallery'); ?></li>
                </ul>

                <h5><?php esc_html_e('Custom', 'everest-gallery'); ?></h5>
                <p><?php esc_html_e('Here you can add the custom css code which will be appended with each gallery individually. This will be useful if you want to customize the specific gallery.','everest-gallery'); ?></p>
            </div>
            <div class="eg-content-section">
                <h4 class="eg-content-title"><?php esc_html_e('Shortcode', 'everest-gallery'); ?></h4>
                <p><?php esc_html_e('Once you create and save gallery, you can paste the generated shortcode in any of the post or page content editor to generate that specific gallery on that section.', 'everest-gallery'); ?></p>
            </div>

        </div>
    </div>
</div>