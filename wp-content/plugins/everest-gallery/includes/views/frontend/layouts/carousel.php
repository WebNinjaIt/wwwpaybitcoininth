<?php
defined('ABSPATH') or die('No script kiddies please!');
$carousel_gallery_id = $this->generate_random_string(10);
?>
<div class="eg-carousel-wrap eg-wrap" data-lightbox-type="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'lightbox_type' ]); ?>"
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
     data-gallery-id="<?php echo $carousel_gallery_id; ?>"
     data-lightbox-status="<?php echo isset($gallery_details[ 'lightbox' ][ 'lightbox_status' ]) ? 'true' : 'false' ?>"
     <?php
     if ( isset($gallery_details[ 'general' ][ 'css_id' ]) && $gallery_details[ 'general' ][ 'css_id' ] != '' ) {
         echo 'id="' . esc_attr($gallery_details[ 'general' ][ 'css_id' ]) . '"';
     }
     ?>
     >
         <?php
         $carousel_options = isset($gallery_details[ 'layout' ][ 'carousel' ]) ? $gallery_details[ 'layout' ][ 'carousel' ] : array( 'pause_duration' => '', 'mode' => 'fade' );
         $carousel_pause_duration = ($carousel_options[ 'pause_duration' ] == '') ? 2500 : esc_attr($carousel_options[ 'pause_duration' ]);
         $carousel_controls = isset($carousel_options[ 'controls' ]) ? 'true' : 'false';
         $carousel_auto_start = isset($carousel_options[ 'auto_start' ]) ? 'true' : 'false';
         $carousel_page_minslides = (isset($carousel_options[ 'min_slides' ]) && $carousel_options[ 'min_slides' ] != '') ? esc_attr($carousel_options[ 'min_slides' ]) : 4;
         $carousel_page_maxslides = (isset($carousel_options[ 'max_slides' ]) && $carousel_options[ 'max_slides' ] != '') ? esc_attr($carousel_options[ 'max_slides' ]) : 5;
         $carousel_page_thumbnail_width = (isset($carousel_options[ 'slide_width' ]) && $carousel_options[ 'slide_width' ] != '') ? esc_attr($carousel_options[ 'slide_width' ]) : 170;
         $carousel_page_pager_moves = (isset($carousel_options[ 'pager_moves' ]) && $carousel_options[ 'pager_moves' ] != '') ? esc_attr($carousel_options[ 'pager_moves' ]) : 1;
         $layout_class = isset($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) ? 'eg-carousel-' . esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) : 'eg-carousel-layout-1';
         $outer_layout_class = isset($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) ? 'eg-carousel-outer-' . esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) : 'eg-carousel-outer-layout-1';

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
    <div class="eg-carousel-outer-wrap <?php echo $outer_layout_class; ?>">

        <div class="eg-carousel-items-wrap <?php echo $layout_class; ?>"
             data-pause-duration="<?php echo $carousel_pause_duration; ?>"
             data-controls="<?php echo $carousel_controls; ?>"
             data-auto-start="<?php echo $carousel_auto_start; ?>"
             data-carousel-id="<?php echo $carousel_gallery_id; ?>"
             data-min-slides="<?php echo $carousel_page_minslides; ?>"
             data-max-slides="<?php echo $carousel_page_maxslides; ?>"
             data-slide-width="<?php echo $carousel_page_thumbnail_width; ?>"
             data-move-slides="<?php echo $carousel_page_pager_moves; ?>"

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


