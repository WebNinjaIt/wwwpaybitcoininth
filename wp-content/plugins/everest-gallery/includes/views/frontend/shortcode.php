<?php
defined('ABSPATH') or die('No script kiddies please!');
$gallery_details = maybe_unserialize($gallery_row[ 'gallery_details' ]);
//$this->print_array($gallery_details);
$layout = $gallery_details[ 'layout' ][ 'layout_type' ];
$hover_animation_components = isset($gallery_details[ 'hover' ][ 'hover_animation_components' ]) ? array_map('esc_attr', $gallery_details[ 'hover' ][ 'hover_animation_components' ]) : array();
$components_class = (isset($gallery_details[ 'hover' ][ 'hover_animation_components' ])) ? 'eg-component-' . implode('-', $gallery_details[ 'hover' ][ 'hover_animation_components' ]) : '';
$read_more_label = (isset($gallery_details[ 'layout' ][ 'blog' ][ 'read_more_label' ]) && $gallery_details[ 'layout' ][ 'blog' ][ 'read_more_label' ] != '') ? esc_attr($gallery_details[ 'layout' ][ 'blog' ][ 'read_more_label' ]) : __('Read More', 'everest-gallery');
$link_target = isset($gallery_details[ 'hover' ][ 'link_target' ]) ? esc_attr($gallery_details[ 'hover' ][ 'link_target' ]) : '_self';
if ( file_exists(EG_PATH . 'includes/views/frontend/layouts/' . $layout . '.php') ) {
    if ( isset($gallery_details[ 'gallery_items' ]) ) {
        if ( isset($gallery_details[ 'layout' ][ 'font' ]) && $gallery_details[ 'layout' ][ 'font' ] != '' ) {
            ?>
            <link href="//fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $gallery_details[ 'layout' ][ 'font' ]); ?>:300,400,500,700" rel="stylesheet">
            <?php
        }

        include(EG_PATH . 'includes/views/frontend/layouts/' . $layout . '.php');
        if ( isset($gallery_details[ 'custom' ][ 'custom_css' ]) ) {
            ?>
            <style>
            <?php
            if ( isset($gallery_details[ 'layout' ][ 'font' ]) && $gallery_details[ 'layout' ][ 'font' ] != '' ) {
                ?>
                    .eg-wrap {
                        font-family: <?php echo $gallery_details[ 'layout' ][ 'font' ]; ?>;
                    }
                <?php
            }
            echo $gallery_details[ 'custom' ][ 'custom_css' ];
            ?></style>
            <?php
        }
    }
} else {
    /**
     * Fires when the layout file is not available in the layouts folder
     * Useful to add new layouts as addon
     *
     * @param array $gallery_row
     *
     * @since 1.0.0
     */
    do_action('eg_extra_layout', $gallery_row);
}




