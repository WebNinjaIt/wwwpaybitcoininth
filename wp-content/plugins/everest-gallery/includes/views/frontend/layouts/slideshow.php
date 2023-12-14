<?php
defined('ABSPATH') or die('No script kiddies please!');
$slideshow_gallery_id = $this->generate_random_string(10);
?>
<div class="eg-slideshow-wrap eg-wrap " data-lightbox-type="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'lightbox_type' ]); ?>"
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
     data-gallery-id="<?php echo $slideshow_gallery_id; ?>"
     data-lightbox-status="<?php echo isset($gallery_details[ 'lightbox' ][ 'lightbox_status' ]) ? 'true' : 'false' ?>"
     >
         <?php
         $slideshow_options = isset($gallery_details[ 'layout' ][ 'slideshow' ]) ? $gallery_details[ 'layout' ][ 'slideshow' ] : array( 'pause_duration' => '', 'mode' => 'fade' );
         $slideshow_pause_duration = ($slideshow_options[ 'pause_duration' ] == '') ? 2500 : esc_attr($slideshow_options[ 'pause_duration' ]);
         $slideshow_transition_duration = ($slideshow_options[ 'transition_duration' ] == '') ? 500 : esc_attr($slideshow_options[ 'transition_duration' ]);
         $slideshow_mode = esc_attr($slideshow_options[ 'mode' ]);
         $slideshow_next_previous_controls = isset($slideshow_options[ 'next_previous_controls' ]) ? 'true' : 'false';
         $slideshow_play_pause_controls = isset($slideshow_options[ 'play_pause_controls' ]) ? 'true' : 'false';
         $slideshow_auto_start = isset($slideshow_options[ 'auto_start' ]) ? 'true' : 'false';
         $slideshow_adaptive_height = isset($slideshow_options[ 'adaptive_height' ]) ? 'true' : 'false';
         $slideshow_pager = isset($slideshow_options[ 'pager' ]) ? 'true' : 'false';
         $slideshow_pager_type = isset($slideshow_options[ 'pager_type' ]) ? esc_attr($slideshow_options[ 'pager_type' ]) : 'full';

         $layout_class = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) ? 'eg-slideshow-' . esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) : 'eg-slideshow-layout-1';
         $outer_layout_class = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) ? 'eg-slideshow-outer-' . esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) : 'eg-slideshow-outer-layout-1';
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
    <div class="eg-slideshow-outer-wrap <?php echo $outer_layout_class; ?>">
        <div class="eg-slideshow-items-wrap <?php echo $layout_class; ?>"
             data-pause-duration="<?php echo $slideshow_pause_duration; ?>"
             data-transition-duration="<?php echo $slideshow_transition_duration; ?>"
             data-mode="<?php echo $slideshow_mode; ?>"
             data-next-previous-controls="<?php echo $slideshow_next_previous_controls; ?>"
             data-play-pause-controls="<?php echo $slideshow_play_pause_controls; ?>"
             data-auto-start="<?php echo $slideshow_auto_start; ?>"
             data-adaptive-height="<?php echo $slideshow_adaptive_height; ?>"
             data-pager="<?php echo $slideshow_pager; ?>"
             data-pager-type="<?php echo $slideshow_pager_type; ?>"
             data-slideshow-id="<?php echo $slideshow_gallery_id; ?>"
             <?php
             if ( isset($gallery_details[ 'general' ][ 'css_id' ]) && $gallery_details[ 'general' ][ 'css_id' ] != '' ) {
                 echo 'id="' . esc_attr($gallery_details[ 'general' ][ 'css_id' ]) . '"';
             }
             ?>
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
</div>


