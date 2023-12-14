<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Admin_Ajax') ) {

    class EG_Admin_Ajax extends EG_Library {

        /**
         * All the ajax related tasks are hooked
         *
         * @since 1.0.0
         */
        function __construct() {
            /**
             * Generate image gallery HTML
             */
            add_action('wp_ajax_eg_generate_image_gallery_html', array( $this, 'generate_image_gallery_html' ));
            add_action('wp_ajax_nopriv_eg_generate_image_gallery_html', array( $this, 'no_permission' ));

            /**
             * Generate image gallery HTML
             */
            add_action('wp_ajax_eg_generate_post_gallery_html', array( $this, 'generate_post_gallery_html' ));
            add_action('wp_ajax_nopriv_eg_generate_post_gallery_html', array( $this, 'no_permission' ));

            /**
             * Gallery Save
             */
            add_action('wp_ajax_eg_gallery_save_action', array( $this, 'save_gallery' ));
            add_action('wp_ajax_nopriv_eg_gallery_save_action', array( $this, 'no_permission' ));

            /**
             * Gallery  Add
             */
            add_action('wp_ajax_eg_add_gallery_action', array( $this, 'add_gallery' ));
            add_action('wp_ajax_nopriv_eg_generate_image_gallery_html', array( $this, 'no_permission' ));

            /**
             * Video  Add
             */
            add_action('wp_ajax_eg_video_add_action', array( $this, 'video_gallery_item' ));
            add_action('wp_ajax_nopriv_eg_video_add_action', array( $this, 'no_permission' ));

            /**
             * Audio  Add
             */
            add_action('wp_ajax_eg_audio_add_action', array( $this, 'audio_gallery_item' ));
            add_action('wp_ajax_nopriv_eg_audio_add_action', array( $this, 'no_permission' ));

            /**
             * Gallery  Delete
             */
            add_action('wp_ajax_eg_gallery_delete_action', array( $this, 'delete_gallery' ));
            add_action('wp_ajax_nopriv_eg_gallery_delete_action', array( $this, 'no_permission' ));

            /**
             * Post Taxonomies retrive
             */
            add_action('wp_ajax_eg_post_type_taxonomy_action', array( $this, 'post_type_taxonomy_action' ));
            add_action('wp_ajax_nopriv_eg_post_type_taxonomy_action', array( $this, 'no_permission' ));

            /**
             * Post Terms retrive
             */
            add_action('wp_ajax_eg_taxonomy_terms_action', array( $this, 'taxonomy_terms_action' ));
            add_action('wp_ajax_nopriv_eg_taxonomy_terms_action', array( $this, 'no_permission' ));

            /**
             * Post Fetch
             */
            add_action('wp_ajax_eg_post_fetch_action', array( $this, 'post_fetch_action' ));
            add_action('wp_ajax_nopriv_eg_post_fetch_action', array( $this, 'no_permission' ));

            /**
             * Instagram Images Fetch
             */
            add_action('wp_ajax_eg_fetch_instagram_images', array( $this, 'get_instagram_images' ));
            add_action('wp_ajax_nopriv_eg_fetch_instagram_images', array( $this, 'no_permission' ));

            /**
             * Gallery Code for export
             */
            add_action('wp_ajax_eg_gallery_code_action', array( $this, 'gallery_code_action' ));
            add_action('wp_ajax_nopriv_eg_gallery_code_action', array( $this, 'no_permission' ));

            /**
             * Gallery Import
             */
            add_action('wp_ajax_eg_gallery_import_action', array( $this, 'gallery_import_action' ));
            add_action('wp_ajax_nopriv_eg_gallery_import_action', array( $this, 'no_permission' ));

            /**
             * Gallery Settings Save
             */
            add_action('wp_ajax_eg_gallery_settings_save_action', array( $this, 'save_gallery_settings' ));
            add_action('wp_ajax_nopriv_eg_gallery_settings_save_action', array( $this, 'no_permission' ));

            /**
             * Gallery Copy Action
             */
            add_action('wp_ajax_eg_copy_gallery', array( $this, 'gallery_copy' ));
            add_action('wp_ajax_nopriv_eg_copy_gallery', array( $this, 'no_permission' ));
        }

        function no_permission() {
            die('No script kiddies please!!');
        }

        function generate_image_gallery_html() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                include(EG_PATH . 'includes/views/backend/ajax/image-gallery-html.php');
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function generate_post_gallery_html() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                include(EG_PATH . 'includes/views/backend/ajax/posts-gallery-html.php');
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function add_gallery() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $title = sanitize_text_field($_POST[ 'title' ]);
                $alias = sanitize_text_field($_POST[ 'alias' ]);
                $gallery_type = sanitize_text_field($_POST[ 'gallery_type' ]);
                $gallery_item_type = sanitize_text_field($_POST[ 'gallery_item_type' ]);
                $response = array( 'error' => 0 );
                $alias_check = $this->check_alias_availability($alias);
                if ( !$alias_check ) {
                    $response[ 'error' ] = 1;
                    $response[ 'error_message' ] = __('Alias already available. Please enter different alias.', 'everest-gallery');
                }
                if ( $response[ 'error' ] == 0 ) {

                    global $wpdb;
                    $insert_check = $wpdb->insert(
                            EG_GALLERY_TABLE, array(
                        'gallery_title' => $title,
                        'gallery_alias' => $alias,
                        'gallery_details' => maybe_serialize($this->get_default_gallery_details()),
                        'gallery_type' => $gallery_type,
                        'gallery_item_type' => $gallery_item_type,
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
                    //   $wpdb->print_error();
                    //   die('reached');
                    if ( $insert_check ) {
                        $response[ 'success_message' ] = __('Gallery created successfully.Redirecting...', 'everest-gallery');
                        $gallery_id = $wpdb->insert_id;
                        $response[ 'redirect_url' ] = admin_url('admin.php?page=everest-gallery&gallery_id=' . $gallery_id . '&action=edit_gallery');
                    } else {
                        $response[ 'error' ] = 1;
                        $response[ 'error_message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                    }
                }
                echo json_encode($response);
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function save_gallery() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $response = array();
                $_POST = array_map('stripslashes_deep', $_POST);
                parse_str($_POST[ 'posted_values' ], $received_data);
                $sanitize_rule = array( 'custom_css' => 'html' );
                $received_data = $this->sanitize_array($received_data, $sanitize_rule);
                $gallery_details = $received_data[ 'gallery_details' ];
                $gallery_id = $received_data[ 'gallery_id' ];
                if ( $gallery_details[ 'general' ][ 'title' ] == '' || $gallery_details[ 'general' ][ 'alias' ] == '' ) {
                    $response[ 'success' ] = 0;
                    $response[ 'message' ] = __('Gallery Title and Alias are mandatory', 'everest-gallery');
                } else {
                    $alias = $gallery_details[ 'general' ][ 'alias' ];
                    $alias_check = $this->check_alias_availability($alias, true, $gallery_id);
                    if ( false ) {

                        $response[ 'success' ] = 0;
                        $response[ 'message' ] = __('Alias already available. Please enter different alias.', 'everest-gallery');
                    } else {
                        $update_data = array( 'gallery_title' => $gallery_details[ 'general' ][ 'title' ],
                            'gallery_alias' => $alias,
                            'gallery_details' => maybe_serialize($gallery_details),
                        );
                        global $egwpdb;
                        $update_check = $egwpdb->update_gallery($received_data);
                        if ( $update_check ) {
                            $response[ 'success' ] = 1;
                            $response[ 'message' ] = __('Gallery updated successfully.', 'everest-gallery');
                        } else {
                            $response[ 'success' ] = 0;
                            $response[ 'message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                        }
                    }
                }
                die(json_encode($response));
            } else {
                die('No script kiddies please!');
            }
        }

        function delete_gallery() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                global $egwpdb;
                $gallery_id = sanitize_text_field($_POST[ 'gallery_id' ]);
                $delete_check = $egwpdb->delete_gallery($gallery_id);
                if ( $delete_check ) {
                    $response[ 'success' ] = 1;
                    $response[ 'message' ] = __('Gallery deleted successfully.', 'everest-gallery');
                } else {
                    $response[ 'success' ] = 0;
                    $response[ 'message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                }
                die(json_encode($response));
            } else {
                die('No script kiddies please!!');
            }
        }

        function video_gallery_item() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                include(EG_PATH . 'includes/views/backend/ajax/video-gallery-html.php');
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function audio_gallery_item() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                include(EG_PATH . 'includes/views/backend/ajax/audio-gallery-html.php');
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function post_type_taxonomy_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $post_type = sanitize_text_field($_POST[ 'post_type' ]);
                $taxonomies = get_object_taxonomies($post_type, 'objects');
                unset($taxonomies[ 'post_format' ]);
                //$this->print_array($taxonomies);
                ?>
                <option value=""><?php _e('Choose Taxonomy', 'everest-gallery'); ?></option>
                <?php
                if ( !empty($taxonomies) ) {
                    foreach ( $taxonomies as $taxonomy => $taxonomy_object ) {
                        ?>
                        <option value="<?php echo $taxonomy ?>"><?php echo $taxonomy_object->label; ?></option>
                        <?php
                    }
                    die();
                }
            } else {
                die('No script kiddies please!!');
            }
        }

        function taxonomy_terms_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $taxonomy = sanitize_text_field($_POST[ 'taxonomy' ]);
                $terms = get_terms($taxonomy, array( 'hide_empty' => false, 'orderby' => 'name', 'order' => 'asc' ));
                ?>
                <option value=""><?php _e('Choose Terms', 'everest-gallery'); ?></option>
                <?php
                if ( !empty($terms) ) {
                    foreach ( $terms as $term ) {
                        ?>
                        <option value="<?php echo $term->term_id ?>"><?php echo $term->name; ?></option>
                        <?php
                    }
                    die();
                }
            } else {
                die('No script kiddies please!!');
            }
        }

        function post_fetch_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $post_type = sanitize_text_field($_POST[ 'post_type' ]);
                $post_taxonomy = sanitize_text_field($_POST[ 'post_taxonomy' ]);
                $post_term = sanitize_text_field($_POST[ 'post_term' ]);
                $paged = isset($_POST[ 'page_number' ]) ? sanitize_text_field($_POST[ 'page_number' ]) : 1;
                $post_args = array( 'posts_per_page' => 10, 'post_status' => 'publish', 'post_type' => $post_type, 'paged' => $paged );
                if ( $post_taxonomy != '' && $post_term != '' ) {
                    $post_args[ 'tax_query' ] = array( array( 'taxonomy' => $post_taxonomy, 'field' => 'term_id', 'terms' => $post_term ) );
                }
                $post_query = new WP_Query($post_args);
                ?>
                <div class="eg-field-wrap">
                    <label><?php _e('Posts', 'everest-gallery'); ?></label>
                    <div class="eg-field">


                        <ul>
                            <?php
                            if ( $post_query->have_posts() ) {
                                while ( $post_query->have_posts() ) {
                                    $post_query->the_post();
                                    ?>
                                    <li><label><input type="checkbox" class="eg-fetch-post-id" value="<?php echo get_the_ID(); ?>"/><?php the_title(); ?></label></li>
                                    <?php
                                }
                                ?>
                                <p class="description"><?php _e('Please add posts before you go to next page.', 'everest-gallery'); ?></p>
                                <div class="eg-pagination-wrap">
                                    <?php
                                    $big = 999999999; // need an unlikely integer
                                    $paginate_links = paginate_links(array(
                                        'type' => 'plain',
                                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, $paged),
                                        'total' => $post_query->max_num_pages
                                    ));
                                    echo $paginate_links;
                                    //$this->print_array($paginate_links)
                                    ?>
                                    <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader"/>
                                </div>
                                <?php
                            } else {
                                ?>
                                <li><?php _e('Posts not found', 'everest-gallery'); ?></li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label><?php _e('Caption Length', 'everest-gallery'); ?></label>
                    <div class="eg-field">
                        <input type="number" class="eg-caption-length" min="1"/>
                        <p class="description"><?php _e('Please enter the length of the caption to be fetched from post content', 'everest-gallery'); ?></p>
                    </div>
                </div>
                <div class="eg-field-wrap">
                    <label></label>
                    <div class="eg-field">
                        <input type="button" value="<?php _e('Add Posts', 'everest-gallery'); ?>" class="eg-fetch-post-add-trigger button-secondary"/>
                    </div>
                </div>
                <?php
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function get_instagram_images() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                include(EG_PATH . '/includes/views/backend/ajax/instagram-gallery-html.php');
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function gallery_code_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $gallery_id = intval(sanitize_text_field($_POST[ 'gallery_id' ]));
                if ( $gallery_id != 0 ) {
                    global $egwpdb;
                    $gallery_row = $egwpdb->get_gallery_row($gallery_id);
                    if ( !empty($gallery_row) ) {
                        echo json_encode($gallery_row);
                    } else {
                        echo "0";
                    }
                } else {
                    echo "0";
                }
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function gallery_import_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $_POST = array_map('stripslashes_deep', $_POST);
                $allowed_html = wp_kses_allowed_html('post');
                $import_code = $_POST[ 'import_code' ];
                $export_url = $_POST[ 'export_url' ];
                $site_url = str_replace('"', '', json_encode(site_url()));
                $import_code = str_replace($export_url, $site_url, $import_code);
                $import_code = json_decode($import_code);
                //  $this->print_array(json_decode($import_code));
                if ( isset($import_code->gallery_id, $import_code->gallery_title, $import_code->gallery_alias, $import_code->gallery_details, $import_code->gallery_type, $import_code->gallery_item_type) ) {
                    global $wpdb;
                    $insert_check = $wpdb->insert(
                            EG_GALLERY_TABLE, array(
                        'gallery_title' => $import_code->gallery_title,
                        'gallery_alias' => $import_code->gallery_alias,
                        'gallery_details' => $import_code->gallery_details,
                        'gallery_type' => $import_code->gallery_type,
                        'gallery_item_type' => $import_code->gallery_item_type,
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
                    //   $wpdb->print_error();
                    //   die('reached');
                    if ( $insert_check ) {
                        $gallery_id = $wpdb->insert_id;
                        $response[ 'success_message' ] = __('Gallery imported successfully.Redirecting...', 'everest-gallery');
                        $response[ 'redirect_url' ] = admin_url('admin.php?page=everest-gallery&gallery_id=' . $gallery_id . '&action=edit_gallery');
                    } else {
                        $response[ 'error' ] = 1;
                        $response[ 'error_message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                    }
                } else {
                    $response[ 'error' ] = 1;
                    $response[ 'error_message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                }
                echo json_encode($response);
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function save_gallery_settings() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                $response = array();
                parse_str($_POST[ 'posted_values' ], $received_data);
                $received_data = $this->sanitize_array($received_data);
                $gallery_settings = $received_data[ 'gallery_settings' ];
                update_option('eg_settings', $gallery_settings);
                $response[ 'success' ] = 1;
                $response[ 'message' ] = __('Settings saved successfully.', 'everest-gallery');



                die(json_encode($response));
            } else {
                die('No script kiddies please!');
            }
        }

        function gallery_copy() {
            if ( isset($_POST[ '_wpnonce' ], $_POST[ 'gallery_id' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_ajax_nonce') ) {
                global $egwpdb;
                $gallery_id = intval(sanitize_text_field($_POST[ 'gallery_id' ]));
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
                    $response[ 'redirect_url' ] = admin_url('admin.php?page=everest-gallery&gallery_id=' . $gallery_id . '&action=edit_gallery');
                } else {
                    $response[ 'error' ] = 1;
                    $response[ 'error_message' ] = __('There occurred some error. Please try after some time.', 'everest-gallery');
                }
                die(json_encode($response));
            } else {
                die('No script kiddies please!');
            }
        }

    }

    new EG_Admin_Ajax();
}
