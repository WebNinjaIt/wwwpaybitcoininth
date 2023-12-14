<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('EG_Ajax') ) {

    class EG_Ajax extends EG_Library {

        /**
         * All the frontend ajax related tasks are hooked
         *
         * @since 1.0.0
         */
        function __construct() {
            /**
             * Frontend Gallery Pagination0
             */
            add_action('wp_ajax_eg_pagination_action', array( $this, 'pagination_action' ));
            add_action('wp_ajax_nopriv_eg_pagination_action', array( $this, 'pagination_action' ));
        }

        function pagination_action() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'eg_frontend_ajax_nonce') ) {
                $layout = sanitize_text_field($_POST[ 'layout_type' ]);
                $page_num = sanitize_text_field($_POST[ 'page_num' ]);
                $gallery_id = intval(sanitize_text_field($_POST[ 'gallery_id' ]));
                global $egwpdb;
                $gallery_row = $egwpdb->get_gallery_row($gallery_id);
                $gallery_details = maybe_unserialize($gallery_row[ 'gallery_details' ]);
                $gallery_items = $gallery_details[ 'gallery_items' ];
                $per_page = $gallery_details[ 'pagination' ][ 'per_page' ];
                $offset = ($page_num - 1) * $per_page;
                $gallery_items_array = array_slice($gallery_items, $offset, $per_page);
                if ( isset($gallery_details[ 'hover' ][ 'hover_type' ]) ) {
                    $hover_type = esc_attr($gallery_details[ 'hover' ][ 'hover_type' ]);
                    switch ( $hover_type ) {
                        case 'overlay':
                            $animation_class = isset($gallery_details[ 'hover' ][ 'overlay_layout' ]) ? 'eg-overlay-' . esc_attr($gallery_details[ 'hover' ][ 'overlay_layout' ]) : 'eg-overlay-layout-1';
                            break;
                        case 'image-filters':
                            $animation_class = isset($gallery_details[ 'hover' ][ 'image_filter_type' ]) ? 'eg-image-filter-' . esc_attr($gallery_details[ 'hover' ][ 'image_filter_type' ]) : 'eg-image-filter-layout-1';
                            break;
                        case 'no-hover':
                            $animation_class = 'eg-no-hover';
                            break;
                    }
                } else {
                    $animation_class = 'eg-no-hover';
                }
                switch ( $layout ) {
                    case 'grid':
                    case 'masonary':
                        $total_items = count($gallery_items_array);
                        $item_counter = 0;
                        ?>
                        <?php
                        foreach ( $gallery_items_array as $gallery_item_key => $gallery_item_details ) {
                            $item_counter++;
                            $gallery_item_type = isset($gallery_item_details[ 'gallery_item_type' ]) ? esc_attr($gallery_item_details[ 'gallery_item_type' ]) : 'image';
                            //$this->print_array($gallery_item_details);
                            switch ( $gallery_item_type ) {
                                case 'image':
                                    include(EG_PATH . '/includes/views/frontend/gallery-item-types/image.php');
                                    break;
                                case 'post':
                                    include(EG_PATH . '/includes/views/frontend/gallery-item-types/post.php');
                                    break;
                                case 'video':
                                    include(EG_PATH . '/includes/views/frontend/gallery-item-types/video.php');
                                    break;
                                case 'audio':
                                    include(EG_PATH . '/includes/views/frontend/gallery-item-types/audio.php');
                                    break;
                                case 'instagram':
                                    include(EG_PATH . '/includes/views/frontend/gallery-item-types/instagram.php');
                                    break;
                            }
                        }
                        break;
                    case 'blog':
                        foreach ( $gallery_items_array as $gallery_item_key => $gallery_item_details ) {
                            ?>
                            <div class="eg-each-item" data-eg-item-key="<?php echo $gallery_item_key; ?>">
                                <?php
                                $image_source_type = esc_attr($gallery_details[ 'layout' ][ 'image_source_type' ]);
                                $gallery_attachment_id = esc_attr($gallery_item_details[ 'attachment_id' ]);
                                $attachment_src = wp_get_attachment_image_src($gallery_attachment_id, $image_source_type);
                                $attachment_full_src = wp_get_attachment_image_src($gallery_attachment_id, 'full');
                                ?>
                                <a href="<?php echo $attachment_full_src[ 0 ] ?>"
                                   data-lightbox-type="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'lightbox_type' ]); ?>"
                                   rel="prettyPhoto[gallery_<?php echo $gallery_row[ 'gallery_id' ]; ?>]"
                                   title="<?php echo esc_attr($gallery_item_details[ 'item_caption' ]); ?>">
                                    <img src="<?php echo $attachment_src[ 0 ]; ?>" alt="<?php echo $gallery_item_details[ 'item_title' ]; ?>"/>
                                </a>
                                <div class="eg-gallery-info-wrap">
                                    <div class="eg-gallery-action-wrap">
                                        <a href="javascript:void(0);" class="eg-zoom"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        <?php if ( $gallery_item_details[ 'item_link' ] != '' ) { ?>
                                            <a href="<?php echo esc_url($gallery_item_details[ 'item_link' ]); ?>" class="eg-link" target="<?php echo $link_target;?>"><i class="fa fa-link" aria-hidden="true"></i></a>

                                        <?php } ?>
                                    </div>
                                    <div class="eg-gallery-title"><?php echo esc_attr($gallery_item_details[ 'item_title' ]); ?></div>
                                    <div class="eg-gallery-caption"><?php echo esc_attr($gallery_item_details[ 'item_caption' ]); ?></div>
                                </div>
                            </div>
                            <?php
                        }
                        break;
                }

                //  $this->print_array($gallery_items);
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

        function no_permission() {
            die('No script kiddies please!!');
        }

    }

    new EG_Ajax();
}
