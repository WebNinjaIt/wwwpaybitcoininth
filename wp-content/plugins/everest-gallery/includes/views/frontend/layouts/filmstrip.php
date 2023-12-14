<?php
defined('ABSPATH') or die('No script kiddies please!');
$filmstrip_gallery_id = $this->generate_random_string(10);
?>
<div class="eg-filmstrip-wrap eg-wrap" data-lightbox-type="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'lightbox_type' ]); ?>"
<?php if ( $gallery_details[ 'lightbox' ][ 'lightbox_type' ] == 'pretty_photo' ) {
    ?>
         data-pretty_photo-theme ="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'pretty_photo' ][ 'theme' ]); ?>"
         data-pretty_photo-social ="<?php echo isset($gallery_details[ 'lightbox' ][ 'pretty_photo' ][ 'social_tools' ]) ? 'true' : 'false'; ?>"
     <?php } else if ( $gallery_details[ 'lightbox' ][ 'lightbox_type' ] == 'colorbox' ) {
         ?>
         data-colorbox-transition ="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'colorbox' ][ 'transition_type' ]); ?>"
         <?php
     }
     if ( $gallery_details[ 'lightbox' ][ 'lightbox_type' ] == 'everest_lightbox' ) {
         $lightbox_theme = isset($gallery_details[ 'lightbox' ][ 'everest_gallery' ][ 'lightbox_theme' ]) ? esc_attr($gallery_details[ 'lightbox' ][ 'everest_gallery' ][ 'lightbox_theme' ]) : 'black';
         ?>
         data-lightbox-theme ="<?php echo $lightbox_theme; ?>"
     <?php }
     ?>
     data-gallery-id="<?php echo $filmstrip_gallery_id; ?>"
     data-lightbox-status="<?php echo isset($gallery_details[ 'lightbox' ][ 'lightbox_status' ]) ? 'true' : 'false' ?>"
     <?php
     if ( isset($gallery_details[ 'general' ][ 'css_id' ]) && $gallery_details[ 'general' ][ 'css_id' ] != '' ) {
         echo 'id="' . esc_attr($gallery_details[ 'general' ][ 'css_id' ]) . '"';
     }
     ?>
     >
         <?php
         $filmstrip_options = isset($gallery_details[ 'layout' ][ 'filmstrip' ]) ? $gallery_details[ 'layout' ][ 'filmstrip' ] : array( 'pause_duration' => '', 'mode' => 'fade' );
         $filmstrip_pause_duration = ($filmstrip_options[ 'pause_duration' ] == '') ? 2500 : esc_attr($filmstrip_options[ 'pause_duration' ]);
         $filmstrip_transition_duration = ($filmstrip_options[ 'transition_duration' ] == '') ? 500 : esc_attr($filmstrip_options[ 'transition_duration' ]);
         $filmstrip_mode = esc_attr($filmstrip_options[ 'mode' ]);
         $filmstrip_next_previous_controls = isset($filmstrip_options[ 'next_previous_controls' ]) ? 'true' : 'false';
         $filmstrip_play_pause_controls = isset($filmstrip_options[ 'play_pause_controls' ]) ? 'true' : 'false';
         $filmstrip_auto_start = isset($filmstrip_options[ 'auto_start' ]) ? 'true' : 'false';
         $filmstrip_adaptive_height = isset($filmstrip_options[ 'adaptive_height' ]) ? 'true' : 'false';
         $filmstrip_pager = isset($filmstrip_options[ 'pager' ]) ? 'true' : 'false';
         $filmstrip_pager_type = isset($filmstrip_options[ 'pager_type' ]) ? esc_attr($filmstrip_options[ 'pager_type' ]) : 'full';
         $filmstrip_gallery_id = $this->generate_random_string(10);
         $filmstrip_pager_id = 'eg-pager-' . $filmstrip_gallery_id;
         $filmstrip_page_minslides = (isset($filmstrip_options[ 'min_slides' ]) && $filmstrip_options[ 'min_slides' ] != '') ? esc_attr($filmstrip_options[ 'min_slides' ]) : 4;
         $filmstrip_page_maxslides = (isset($filmstrip_options[ 'max_slides' ]) && $filmstrip_options[ 'max_slides' ] != '') ? esc_attr($filmstrip_options[ 'max_slides' ]) : 5;
         $filmstrip_page_thumbnail_width = (isset($filmstrip_options[ 'slide_width' ]) && $filmstrip_options[ 'slide_width' ] != '') ? esc_attr($filmstrip_options[ 'slide_width' ]) : 170;
         $filmstrip_page_pager_moves = (isset($filmstrip_options[ 'pager_moves' ]) && $filmstrip_options[ 'pager_moves' ] != '') ? esc_attr($filmstrip_options[ 'pager_moves' ]) : 1;
         $layout_class = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) ? 'eg-filmstrip-' . esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) : 'eg-filmstrip-layout-1';
         $outer_layout_class = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) ? 'eg-filmstrip-outer-' . esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) : 'eg-filmstrip-outer-layout-1';
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
         ?>

    <div class="eg-filmstrip-outer-wrap <?php echo $outer_layout_class; ?>">
        <div class="eg-filmstrip-items-outerwrap">
            <div class="eg-filmstrip-items-wrap <?php echo $layout_class; ?>"
                 data-pause-duration="<?php echo $filmstrip_pause_duration; ?>"
                 data-transition-duration="<?php echo $filmstrip_transition_duration; ?>"
                 data-mode="<?php echo $filmstrip_mode; ?>"
                 data-next-previous-controls="<?php echo $filmstrip_next_previous_controls; ?>"
                 data-play-pause-controls="<?php echo $filmstrip_play_pause_controls; ?>"
                 data-auto-start="<?php echo $filmstrip_auto_start; ?>"
                 data-adaptive-height="<?php echo $filmstrip_adaptive_height; ?>"
                 data-pager="<?php echo $filmstrip_pager; ?>"
                 data-pager-type="<?php echo $filmstrip_pager_type; ?>"
                 data-filmstrip-id="<?php echo $filmstrip_gallery_id; ?>"

                 >
                     <?php
                     if ( count($gallery_details[ 'gallery_items' ]) > 0 ) {

                         $gallery_items_array = $gallery_details[ 'gallery_items' ];
                         $total_items = count($gallery_items_array);
                         $item_counter = 0;
                         foreach ( $gallery_items_array as $gallery_item_key => $gallery_item_details ) {
                             $item_counter++;
                             $gallery_item_type = isset($gallery_item_details[ 'gallery_item_type' ]) ? esc_attr($gallery_item_details[ 'gallery_item_type' ]) : 'image';
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
                     }
                     ?>
            </div>
        </div>
        <div class="eg-filmstrip-pager-outerwrap">
            <div class="eg-filmstrip-pager" id="<?php echo $filmstrip_pager_id; ?>" data-min-slides="<?php echo $filmstrip_page_minslides; ?>" data-max-slides="<?php echo $filmstrip_page_maxslides; ?>" data-slide-width="<?php echo $filmstrip_page_thumbnail_width; ?>" data-move-slides="<?php echo $filmstrip_page_pager_moves; ?>">
                <?php
                if ( count($gallery_details[ 'gallery_items' ]) > 0 ) {

                    $gallery_items_array = $gallery_details[ 'gallery_items' ];
                    $item_count = 0;
                    foreach ( $gallery_items_array as $gallery_item_key => $gallery_item_details ) {
                        //  $this->print_array($gallery_item_details);
                        $gallery_item_type = isset($gallery_item_details[ 'gallery_item_type' ]) ? esc_attr($gallery_item_details[ 'gallery_item_type' ]) : 'image';
                        if ( $gallery_item_type == 'image' ) {
                            $image_source_type = esc_attr($gallery_details[ 'layout' ][ 'image_source_type' ]);
                            $gallery_attachment_id = esc_attr($gallery_item_details[ 'attachment_id' ]);
                            $attachment_src = wp_get_attachment_image_src($gallery_attachment_id, 'everest-medium-large');
                            $preview_image_url = $attachment_src[ 0 ];
                        } else if ( $gallery_item_type == 'video' ) {
                            if ( isset($gallery_item_details[ 'video_preview_image_id' ]) && $gallery_item_details[ 'video_preview_image_id' ] != '' ) {
                                $gallery_attachment_id = esc_attr($gallery_item_details[ 'video_preview_image_id' ]);
                                $gallery_attachment_array = wp_get_attachment_image_src($gallery_attachment_id, $image_source_type);
                                $preview_image_url = $gallery_attachment_array[ 0 ];
                                $attachment_full_src = wp_get_attachment_image_src($gallery_attachment_id, 'thumbnail');
                            } else {
                                $preview_image_url = EG_IMG_DIR . 'no-preview.jpg';
                            }
                        } else if ( $gallery_item_type == 'instagram' ) {
                            if ( isset($gallery_item_details[ 'preview_image_url' ]) && $gallery_item_details[ 'preview_image_url' ] != '' ) {
                                $preview_image_url = $gallery_item_details[ 'preview_image_url' ];
                            } else {
                                $preview_image_url = EG_IMG_DIR . 'no-preview.jpg';
                            }
                        }
                        ?>
                        <a href="" data-slide-index="<?php echo $item_count++; ?>">
                            <img src="<?php echo $preview_image_url; ?>" alt="<?php echo $gallery_item_details[ 'item_title' ]; ?>"/>
                            <div class="eg-filmstrip-caption" style="display:none;">
                                <span class="eg-title" style="display:none"><?php echo esc_attr($gallery_item_details[ 'item_title' ]); ?></span>
                                <p><?php echo esc_attr($gallery_item_details[ 'item_caption' ]); ?></p>
                            </div>
                        </a>

                        <?php
                    }
                }
                ?>
            </div>
            <div class="eg-flimstrip-caption-tooltip"></div>

        </div>
    </div>
</div>


