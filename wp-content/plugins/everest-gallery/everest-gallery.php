<?php

defined('ABSPATH') or die('No script kiddies please!!');
/*
  Plugin Name: Everest Gallery
  Plugin URI: http://accesspressthemes.com/wordpress-plugins/everest-gallery
  Description: All in one gallery plugin for WordPress. Photo, Audio, Video, Multimedia, Portfolio - for almost everything!
  Version: 	1.0.5
  Author:  	AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License: 	GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: everest-gallery
 */

/**
 * Plugin Main Class
 *
 * @since 1.0.0
 */
if ( !class_exists('Everest_gallery') ) {

    class Everest_gallery {

        /**
         * Plugin Main initialization
         *
         * @since 1.0.0
         */
        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Necessary Constants Define
         *
         * @since 1.0.0
         */
        function define_constants() {
            global $wpdb;
            defined('EG_PATH') or define('EG_PATH', plugin_dir_path(__FILE__));
            defined('EG_URL') or define('EG_URL', plugin_dir_url(__FILE__));
            defined('EG_IMG_DIR') or define('EG_IMG_DIR', plugin_dir_url(__FILE__) . 'images/');
            defined('EG_CSS_DIR') or define('EG_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
            defined('EG_JS_DIR') or define('EG_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
            defined('EG_VERSION') or define('EG_VERSION', '1.0.5');
            defined('EG_GALLERY_TABLE') or define('EG_GALLERY_TABLE', $wpdb->prefix . 'eg_galleries');
        }

        /**
         * Includes all the necessary files
         *
         * @since 1.0.0
         */
        function includes() {
            include(EG_PATH . 'includes/classes/class-eg-library.php');
            include(EG_PATH . 'includes/classes/class-eg-model.php');
            include(EG_PATH . 'includes/classes/class-eg-mobile-detect.php');
            include(EG_PATH . 'includes/classes/class-eg-activation.php');
            include(EG_PATH . 'includes/classes/class-eg-enqueue.php');
            include(EG_PATH . 'includes/classes/class-eg-admin.php');
            include(EG_PATH . 'includes/classes/class-eg-admin-ajax.php');
            include(EG_PATH . 'includes/classes/class-eg-ajax.php');
            include(EG_PATH . 'includes/classes/class-eg-shortcode.php');
            include(EG_PATH . 'includes/classes/class-eg-hooks.php');
        }

    }

    $GLOBALS[ 'everest_gallery' ] = new Everest_gallery();
    $GLOBALS[ 'eg_settings' ] = get_option('eg_settings');
}


