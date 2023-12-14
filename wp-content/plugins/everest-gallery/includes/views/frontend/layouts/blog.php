<?php
defined('ABSPATH') or die('No script kiddies please!');
$gallery_id = $this->generate_random_string(10);
$layout_class = isset($gallery_details[ 'layout' ][ 'blog' ][ 'layout' ]) ? 'eg-blog-' . esc_attr($gallery_details[ 'layout' ][ 'blog' ][ 'layout' ]) : 'eg-blog-layout-1';
if ( isset($gallery_details[ 'hover' ][ 'hover_type' ]) ) {
    $hover_type = esc_attr($gallery_details[ 'hover' ][ 'hover_type' ]);
    switch ( $hover_type ) {
        case 'overlay':
            $animation_class = isset($gallery_details[ 'hover' ][ 'overlay_layout' ]) ? 'eg-overlay-' . esc_attr($gallery_details[ 'hover' ][ 'overlay_layout' ]) : 'eg-overlay-layout-1';
            break;
        case 'image-filters':
            $animation_class = isset($gallery_details[ 'hover' ][ 'image_filter_type' ]) ? 'eg-image-filter eg-image-filter-' . esc_attr($gallery_details[ 'hover' ][ 'image_filter_type' ]) : 'eg-image-filter eg-image-filter-layout-1';
            break;
        case 'no-hover':
            $animation_class = 'eg-no-hover';
            break;
    }
} else {
    $animation_class = 'eg-no-hover';
}
?>
<div class="eg-blog-wrap eg-wrap clearfix"
     data-lightbox-type="<?php echo esc_attr($gallery_details[ 'lightbox' ][ 'lightbox_type' ]); ?>"
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
     data-gallery-id="<?php echo $gallery_id; ?>"
     data-lightbox-status="<?php echo isset($gallery_details[ 'lightbox' ][ 'lightbox_status' ]) ? 'true' : 'false' ?>"
     <?php
     if ( isset($gallery_details[ 'general' ][ 'css_id' ]) && $gallery_details[ 'general' ][ 'css_id' ] != '' ) {
         echo 'id="' . esc_attr($gallery_details[ 'general' ][ 'css_id' ]) . '"';
     }
     ?>
     >

    <div class="eg-blog-items-wrap <?php echo $layout_class; ?>">
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


