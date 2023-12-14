<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;
$meta_obj = WP_RealEstate_Property_Meta::get_instance($post->ID);
?>
<div class="property-detail-detail">
    <h2 class="title"><?php esc_html_e('| DETAILS', 'homeo'); ?></h2>
    <ul class="list">
        <?php if ( $meta_obj->check_post_meta_exist('property_id') && ($property_id = $meta_obj->get_post_meta('property_id')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Property ID:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($property_id); ?></div>
            </li>
        <?php } ?>
        <?php if ( $meta_obj->check_post_meta_exist('lot_area') && ($lot_area = $meta_obj->get_post_meta('lot_area')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Land Size:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($lot_area); ?> <?php echo wp_realestate_get_option('measurement_unit_area'); ?></div>
            </li>
        <?php } ?>
        <?php if ( $meta_obj->check_post_meta_exist('home_area') && ($home_area = $meta_obj->get_post_meta('home_area')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Indoor Area:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($home_area); ?> <?php echo wp_realestate_get_option('measurement_unit_area'); ?></div>
            </li>
        <?php } ?>
        <?php if ( $meta_obj->check_post_meta_exist('lot_dimensions') && ($lot_dimensions = $meta_obj->get_post_meta('lot_dimensions')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Land Size (SqM)', 'homeo'); ?></div>
                <div class="value"><?php echo trim($lot_dimensions); ?></div>
            </li>
        <?php } ?>
        <?php if ( $meta_obj->check_post_meta_exist('rooms') && ($rooms = $meta_obj->get_post_meta('rooms')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Stroyers:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($rooms); ?></div>
            </li>
        <?php } ?>
       
       
        <?php if ( $meta_obj->check_post_meta_exist('garages') && ($garages = $meta_obj->get_post_meta('garages')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Garages:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($garages); ?></div>
            </li>
        <?php } ?>
       

        <?php if ( $meta_obj->check_post_meta_exist('year_built') && ($year_built = $meta_obj->get_post_meta('year_built')) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Year built:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($year_built); ?></div>
            </li>
        <?php } ?>

        <?php if ( ($status = homeo_property_display_status_label($post, false, false)) ) { ?>
            <li>
                <div class="text"><?php esc_html_e('Property Status:', 'homeo'); ?></div>
                <div class="value"><?php echo trim($status); ?></div>
            </li>
        <?php } ?>

        <?php do_action('wp-realestate-single-property-details', $post); ?>
    </ul>
</div>