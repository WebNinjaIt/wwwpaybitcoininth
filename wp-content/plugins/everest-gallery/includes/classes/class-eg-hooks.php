<?php

defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Hooks') ) {

    /**
     * Frontend Gallery Shortcode
     */
    class EG_Hooks extends EG_Library {

        function __construct() {
            add_action('wp_footer', array( $this, 'everest_lightbox_html' ));
            add_action('template_redirect', array( $this, 'get_instagram_access_token' ), 1000);
            add_action('template_redirect', array( $this, 'gallery_preview' ));
            add_image_size('everest-large', 1024, 1024, true);
            add_image_size('everest-medium-large', 700, 700, true);
            add_image_size('everest-medium', 300, 300, true);

            add_action('admin_post_eg_copy_gallery', array( $this, 'gallery_copy' ));
        }

        function everest_lightbox_html() {
            include_once(EG_PATH . '/includes/views/frontend/everest-lightbox-html.php');
        }

        function get_instagram_access_token() {
            if ( isset($_GET[ 'eg_instagram_callback' ], $_GET[ 'access_token' ]) ) {
                echo "<p>" . sanitize_text_field($_GET[ 'access_token' ]) . '</p>';
                echo "<p>";
                _e('Please copy above access token in the previous page Access Token Field', 'everest-gallery');
                echo "</p>";
                die();
            }
        }

        function gallery_preview() {
            if ( is_user_logged_in() && isset($_GET[ 'eg_preview' ], $_GET[ 'gallery_alias' ]) ) {
                $alias = sanitize_text_field($_GET[ 'gallery_alias' ]);
                global $egwpdb;
                global $eg_mobile_detector;
                $gallery_row = $egwpdb->get_gallery_row_by_alias($alias);
                if ( $gallery_row != null ) {

                    include(EG_PATH . 'includes/views/frontend/preview-gallery.php');
                    die();
                }
            }
        }

        function gallery_copy() {
            if ( isset($_GET[ '_wpnonce' ], $_GET[ 'gallery_id' ]) && wp_verify_nonce($_GET[ '_wpnonce' ], 'eg-copy-nonce') ) {
                global $egwpdb;
                $gallery_id = intval(sanitize_text_field($_GET[ 'gallery_id' ]));
                $gallery_row = $egwpdb->get_gallery_row($gallery_id);
                $random_string = $this->generate_random_string(5);
                global $wpdb;
                $insert_check = $wpdb->insert(
                        EG_GALLERY_TABLE, array(
                    'gallery_title' => $gallery_row[ 'gallery_title' ] . '-' . __('Copy', 'everest-gallery'),
                    'gallery_alias' => $gallery_row[ 'gallery_alias' ] . '-' . $random_string,
                    'gallery_details' => $gallery_row[ 'gallery_details' ],
                    'gallery_type' => $gallery_row[ 'gallery_type' ],
                    'gallery_item_type' => $gallery_row[ 'gallery_item_type' ],
                    'last_modified' => date("Y-m-d H:i:s"),
                        ), array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                        )
                );
                if ( $insert_check ) {
                    $gallery_id = $wpdb->insert_id;
                    $response[ 'success_message' ] = __('Gallery copied successfully.Redirecting...', 'everest-gallery');
                    $response[ 'redirect_url' ] = admin_url('admin.php?page=everest-gallery');
                } else {
                    $response[ 'error' ] = 1;
                    $response[ 'error_message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                }
            } else {
                die('No script kiddies please!');
            }
        }

    }

    new EG_Hooks();
}

