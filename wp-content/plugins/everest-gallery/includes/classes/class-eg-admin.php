<?php

defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Admin') ) {

    class EG_Admin extends EG_Library {

        /**
         * Includes all the backend functionality
         *
         * @since 1.0.0
         */
        function __construct() {

            add_action('admin_menu', array( $this, 'eg_admin_menu' ));
        }

        /**
         * Everest gallery menu in backend
         *
         * @since 1.0.0
         */
        function eg_admin_menu() {
            $page_title = (isset($_GET[ 'gallery_id' ], $_GET[ 'action' ]) && $_GET[ 'action' ] == 'edit_gallery') ? __('Edit Gallery', 'everest-gallery') : __('All Galleries', 'everest-gallery');
            add_menu_page(__('Everest Gallery', 'everest-gallery'), __('Everest Gallery', 'everest-gallery'), 'manage_options', 'everest-gallery', array( $this, 'gallery_lists' ), 'dashicons-grid-view');
            add_submenu_page('everest-gallery', $page_title, __('All Galleries', 'everest-gallery'), 'manage_options', 'everest-gallery', array( $this, 'gallery_lists' ));
            add_submenu_page('everest-gallery', __('Import Gallery', 'everest-gallery'), __('Import Gallery', 'everest-gallery'), 'manage_options', 'eg-import-gallery', array( $this, 'import_gallery' ));
            add_submenu_page('everest-gallery', __('Export Gallery', 'everest-gallery'), __('Export Gallery', 'everest-gallery'), 'manage_options', 'eg-export-gallery', array( $this, 'export_gallery' ));
            add_submenu_page('everest-gallery', __('Settings', 'everest-gallery'), __('Settings', 'everest-gallery'), 'manage_options', 'eg-settings', array( $this, 'gallery_settings' ));
            add_submenu_page('everest-gallery', __('How to Use', 'everest-gallery'), __('How to Use', 'everest-gallery'), 'manage_options', 'eg-how-to-use', array( $this, 'how_to_use' ));
            add_submenu_page('everest-gallery', __('About Us', 'everest-gallery'), __('About Us', 'everest-gallery'), 'manage_options', 'eg-about-us', array( $this, 'about_us' ));
        }

        /**
         * Gallery Listing
         *
         * @since 1.0.0
         */
        function gallery_lists() {
            if ( isset($_GET[ 'gallery_id' ], $_GET[ 'action' ]) && $_GET[ 'action' ] == 'edit_gallery' ) {
                $gallery_id = intval(sanitize_text_field($_GET[ 'gallery_id' ]));
                global $egwpdb;
                $gallery_row = $egwpdb->get_gallery_row($gallery_id);
                if ( $gallery_row ) {
                    include(EG_PATH . 'includes/views/backend/edit-gallery.php');
                } else {
                    wp_redirect(admin_url('admin.php?page=everest-gallery'));
                }
            } else {
                include(EG_PATH . 'includes/views/backend/gallery-lists.php');
            }
        }

        /**
         * Add New Gallery Section
         *
         * @since 1.0.0
         */
        function add_new_gallery() {
            include(EG_PATH . 'includes/views/backend/add-new-gallery.php');
        }

        /**
         * Import Gallery
         *
         * @since 1.0.0
         */
        function import_gallery() {
            include(EG_PATH . 'includes/views/backend/import-gallery.php');
        }

        /**
         * Export Gallery
         *
         * @since 1.0.0
         */
        function export_gallery() {
            include(EG_PATH . 'includes/views/backend/export-gallery.php');
        }

        /**
         * Gallery Settings
         *
         * @since 1.0.0
         */
        function gallery_settings() {
            include(EG_PATH . 'includes/views/backend/gallery-settings.php');
        }

        /**
         * How to use
         *
         * @since 1.0.0
         */
        function how_to_use() {
            include(EG_PATH . 'includes/views/backend/how-to-use.php');
        }

        /**
         * About Us
         *
         * @since 1.0.0
         */
        function about_us() {
            include(EG_PATH . 'includes/views/backend/about-us.php');
        }

    }

    new EG_Admin();
}