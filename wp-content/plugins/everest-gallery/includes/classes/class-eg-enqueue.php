<?php

defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Enqueue') ) {

    class EG_Enqueue {

        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
            add_action('admin_enqueue_scripts', array( $this, 'register_admin_assets' ));
            add_action('wp_enqueue_scripts', array( $this, 'register_frontend_assets' ));
        }

        function register_admin_assets($hook) {
            $page_array = array( 'everest-gallery', 'eg-import-gallery', 'eg-export-gallery', 'eg-how-to-use', 'eg-about-us', 'eg-settings' );
            if ( isset($_GET[ 'page' ]) && in_array(sanitize_text_field($_GET[ 'page' ]), $page_array) ) {
                $ajax_nonce = wp_create_nonce('eg_ajax_nonce');
                $eg_js_strings = array( 'filter_error' => __('Please provide filter label', 'everest-gallery'),
                    'filter_removal_message' => __('Are you sure you want to delete this filter and its gallery items?', 'everest-gallery'),
                    'item_add_error_filter' => __('Please add at least a filter before adding an item', 'everest-gallery'),
                    'upload_popup_title' => __('Choose Image - Use Ctrl or Command to select multiple images', 'everest-gallery'),
                    'upload_popup_button_label' => __('Insert into gallery', 'everest-gallery'),
                    'ajax_notice' => __('Please wait', 'everest-gallery'),
                    'item_removal_notice' => __('Are you sure you want to remove this item ?', 'everest-gallery'),
                    'title_blank_notice' => __('Please enter gallery title', 'everest-gallery'),
                    'alias_blank_notice' => __('Please enter gallery alias', 'everest-gallery'),
                    'gallery_delete_notice' => __('Are you sure you want to delete this gallery?', 'everest-gallery'),
                    'post_terms_dropdown_label' => __('Choose Terms', 'everest-gallery'),
                    'post_type_error' => __('Please choose a post type', 'everest-gallery'),
                    'instagram_error' => __('Please fill all necessary details', 'everest-gallery'),
                    'export_error' => __('Please fill all necessary details', 'everest-gallery')
                );
                $eg_js_object_array = array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'strings' => $eg_js_strings,
                    'ajax_nonce' => $ajax_nonce,
                    'plugin_url' => EG_URL
                );

                wp_enqueue_media();
                wp_enqueue_script('eg-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js');
                wp_enqueue_script('eg-codemirror-script', EG_JS_DIR . 'codemirror.js', array(), EG_VERSION);
                wp_enqueue_script('eg-custom-scroll-script', EG_JS_DIR . 'jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), EG_VERSION);
                wp_enqueue_script('eg-codemirror-css-script', EG_JS_DIR . 'css.js', array( 'jquery', 'eg-codemirror-script' ), EG_VERSION);
                wp_enqueue_script('eg-backend-script', EG_JS_DIR . 'eg-backend.js', array( 'jquery', 'jquery-ui-sortable', 'eg-custom-scroll-script', 'eg-codemirror-script', 'jquery-ui-slider', 'eg-webfont' ), EG_VERSION);
                wp_enqueue_style('eg-fontawesome', EG_CSS_DIR . 'font-awesome.min.css', array(), EG_VERSION);
                wp_enqueue_style('eg-custom-scroll-style', EG_CSS_DIR . 'jquery.mCustomScrollbar.css', array(), EG_VERSION);
                wp_enqueue_style('eg-backend-style', EG_CSS_DIR . 'eg-backend.css', array(), EG_VERSION);
                wp_enqueue_style('eg-codemirror-style', EG_CSS_DIR . 'codemirror.css', array(), EG_VERSION);
                wp_enqueue_style('eg-jquery-ui-style', EG_CSS_DIR . 'jquery-ui-css-1.12.1.css', array(), EG_VERSION);
                wp_localize_script('eg-backend-script', 'eg_backend_js_object', $eg_js_object_array);
            }
        }

        function register_frontend_assets() {
            $ajax_nonce = wp_create_nonce('eg_frontend_ajax_nonce');
            $eg_js_strings = array( 'video_missing' => __('Video URL missing', 'everest-gallery') );
            $eg_js_object_array = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'strings' => $eg_js_strings,
                'ajax_nonce' => $ajax_nonce,
                'plugin_url' => EG_URL
            );
            /**
             * Styles
             */
            wp_enqueue_style('eg-fontawesome', EG_CSS_DIR . 'font-awesome.min.css', array(), EG_VERSION);
            wp_enqueue_style('eg-frontend', EG_CSS_DIR . 'eg-frontend.css', array(), EG_VERSION);
            wp_enqueue_style('eg-pretty-photo', EG_CSS_DIR . 'prettyPhoto.css', array(), EG_VERSION);
            wp_enqueue_style('eg-colorbox', EG_CSS_DIR . 'eg-colorbox.css', array(), EG_VERSION);
            wp_enqueue_style('eg-magnific-popup', EG_CSS_DIR . 'magnific-popup.css', array(), EG_VERSION);
            wp_enqueue_style('eg-animate', EG_CSS_DIR . 'animate.css', array(), EG_VERSION);
            wp_enqueue_style('eg-bxslider', EG_CSS_DIR . 'jquery.bxslider.min.css', array(), EG_VERSION);

            /**
             * Scripts
             */
            wp_enqueue_script('eg-bxslider-script', EG_JS_DIR . 'jquery.bxslider.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-imageloaded-script', EG_JS_DIR . 'imagesloaded.min.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-prettyphoto', EG_JS_DIR . 'jquery.prettyPhoto.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-colorbox', EG_JS_DIR . 'jquery.colorbox-min.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-isotope-script', EG_JS_DIR . 'isotope.js', array(), EG_VERSION);
            wp_enqueue_script('eg-magnific-popup', EG_JS_DIR . 'jquery.magnific-popup.min.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-everest-lightbox', EG_JS_DIR . 'jquery.everest-lightbox.js', array( 'jquery' ), EG_VERSION);
            wp_enqueue_script('eg-frontend-script', EG_JS_DIR . 'eg-frontend.js', array( 'jquery', 'eg-prettyphoto', 'eg-colorbox', 'eg-magnific-popup', 'eg-isotope-script', 'eg-bxslider-script', 'eg-imageloaded-script', 'eg-everest-lightbox' ), EG_VERSION);

            /**
             * Localize variables
             */
            wp_localize_script('eg-frontend-script', 'eg_frontend_js_object', $eg_js_object_array);
        }

    }

    new EG_Enqueue();
}