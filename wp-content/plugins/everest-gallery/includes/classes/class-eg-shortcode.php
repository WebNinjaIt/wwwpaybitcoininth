<?php

defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Shortcode') ) {

    /**
     * Frontend Gallery Shortcode
     */
    class EG_Shortcode extends EG_Library {

        function __construct() {
            add_shortcode('everest_gallery', array( $this, 'shortcode_manager' ));
            add_shortcode('eg_album_gallery', array( $this, 'album_shortcode_manager' ));
        }

        function shortcode_manager($atts) {
            if ( isset($atts[ 'alias' ]) && $atts[ 'alias' ] != '' ) {
                global $egwpdb;
                global $eg_mobile_detector;
                $gallery_row = $egwpdb->get_gallery_row_by_alias($atts[ 'alias' ]);
                if ( $gallery_row != null ) {
                    ob_start();
                    include(EG_PATH . 'includes/views/frontend/shortcode.php');
                    $gallery = ob_get_contents();
                    ob_end_clean();
                    return $gallery;
                } else {
                    return (sprintf(__('Gallery not found with %s alias', 'everest-gallery'), $atts[ 'alias' ]));
                }
            } else {
                return __('Alias missing in shortcode', 'everest-gallery');
            }
        }

        function album_shortcode_manager() {
            if ( !empty($_GET[ 'gallery_alias' ]) ) {
                $gallery_alias = sanitize_text_field($_GET[ 'gallery_alias' ]);
                return do_shortcode("[everest_gallery alias='$gallery_alias']");
            } else {
                return '';
            }
        }

    }

    new EG_Shortcode();
}

