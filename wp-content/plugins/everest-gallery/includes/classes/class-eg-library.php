<?php

defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Library') ) {

    class EG_Library {

        /**
         * Prints array in pre format
         *
         * @since 1.0.0
         *
         * @param array $array
         */
        function print_array($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * Generates random string
         *
         * @param int $length
         * @return string
         *
         * @since 1.0.0
         */
        function generate_random_string($length) {
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i++ ) {
                $random_string .= $string[ rand(0, 61) ];
            }
            return $random_string;
        }

        /**
         * Checks alias availability in the gallery table
         *
         * @param string $alias
         * @param boolean $edit_flag
         * @param int $edit_id
         *
         * @return boolean
         *
         * @since 1.0.0
         */
        function check_alias_availability($alias, $edit_flag = false, $edit_id = 0) {
            global $wpdb;
            $gallery_table = EG_GALLERY_TABLE;
            if ( $edit_flag && $edit_id == 1 ) {
                $query = "SELECT COUNT(*) FROM $gallery_table WHERE gallery_alias = '$alias' AND gallery_id!=$edit_id";
            } else {
                $query = "SELECT COUNT(*) FROM $gallery_table WHERE gallery_alias = '$alias'";
            }
            // echo $query;
            $alias_count = $wpdb->get_var($query);
            //   var_dump($alias_count);
            if ( $alias_count == 0 ) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'html' : 'text';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html('post');
                    return wp_kses($value, $allowed_html);
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

        /**
         * Prints Display None
         *
         * @param string $parameter1
         * @param string $parameter2
         *
         * @since 1.0.0
         */
        function eg_display_none($parameter1, $parameter2) {
            if ( $parameter1 != $parameter2 ) {
                echo 'style="display:none"';
            }
        }

        /**
         * Generates the list of the registered post type
         *
         * @return array $post_types
         * @since 1.0.0
         */
        function get_registered_post_types() {
            $post_types = get_post_types(array( 'public' => true, 'publicly_queryable' => 'true' ));
            unset($post_types[ 'attachment' ]);
            return $post_types;
        }

        /**
         * Fetched instagram images
         *
         * @since 1.0.0
         */
        function fetch_instagram_images($method, $url, $header, $data) {

            if ( $method == 1 ) {
                $method_type = 1; // 1 = POST
            } else {
                $method_type = 0; // 0 = GET
            }

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_HEADER, 0);

            if ( $header !== 0 ) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            }

            curl_setopt($curl, CURLOPT_POST, $method_type);

            if ( $data !== 0 ) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }

            $response = curl_exec($curl);
            $json = json_decode($response, true);
            curl_close($curl);

            return $json;
        }

        /**
         * Default Gallery Details
         *
         * @return array
         *
         * @since 1.0.0
         */
        function get_default_gallery_details() {
            $default_gallery_details = array( 'general' => array
                    (
                    'title' => '',
                    'alias' => '',
                    'css_id' => ''
                ),
                'filter_options' => array
                    (
                    'all_label' => '',
                    'filter_layout' => 'layout-1'
                ),
                'layout' => array
                    (
                    'image_source_type' => 'full',
                    'layout_type' => 'grid',
                    'columns' => array
                        (
                        'desktop' => 3,
                        'tablet' => 3,
                        'mobile' => 3,
                    ),
                    'grid_masonary_layout' => 'layout-1',
                    'slideshow' => array
                        (
                        'pause_duration' => '',
                        'transition_duration' => '',
                        'mode' => 'fade',
                        'pager_type' => 'full',
                        'layout' => 'layout-1'
                    ),
                    'filmstrip' => array
                        (
                        'pause_duration' => '',
                        'mode' => 'fade',
                        'transition_duration' => '',
                        'min_slides' => '',
                        'max_slides' => '',
                        'slide_width' => '',
                        'pager_moves' => '',
                        'layout' => 'layout-1',
                    ),
                    'carousel' => array
                        (
                        'min_slides' => '',
                        'max_slides' => '',
                        'slide_width' => '',
                        'item_moves' => '',
                        'pause_duration' => '',
                        'layout' => 'layout-1'
                    ),
                    'blog' => array
                        (
                        'layout' => 'layout-1',
                        'read_more_label' => ''
                    ),
                ),
                'hover' => array
                    (
                    'hover_type' => 'overlay',
                    'hover_animation_components' => array( 'action', 'title', 'caption' ),
                    'overlay_layout' => 'layout-1',
                    'image_filter_type' => 'filter-1'
                ),
                'pagination' => array
                    (
                    'per_page' => '',
                    'type' => 'page_numbers',
                    'load_more' => array
                        (
                        'text' => '',
                        'loader' => 'loader-1.gif',
                        'load_more_layout' => 'layout-1'
                    ),
                    'pagination_layout' => 'layout-1'
                ),
                'lightbox' => array
                    (
                    'lightbox_status' => 1,
                    'lightbox_type' => 'pretty_photo',
                    'pretty_photo' => array
                        (
                        'theme' => 'pp_default'
                    ),
                    'colorbox' => array
                        (
                        'transition_type' => 'elastic'
                    ),
                    'everest_gallery' => array
                        (
                        'lightbox_theme' => 'black'
                    ),
                ),
                'custom' => array
                    (
                    'custom_css' => ''
                ),
            );

            return $default_gallery_details;
        }

    }

}