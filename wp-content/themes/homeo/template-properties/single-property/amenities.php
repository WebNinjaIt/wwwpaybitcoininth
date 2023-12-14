<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post;

$amenities = get_the_terms($post->ID, 'property_amenity');
?>

<?php if ( ! empty( $amenities ) ) : ?>
    <div class="property-section property-amenities">
        <h2 class="title"><?php echo esc_html__('| AMENITIES', 'homeo'); ?></h2>
        <ul class="columns-gap list-check">
            <?php foreach ( $amenities as $amenity ) : ?>
                <li class="yes"><?php echo esc_html( $amenity->name ); ?></li>
                
            <?php endforeach; ?>
        </ul>

        <?php do_action('wp-realestate-single-property-amenities', $post); ?>
    </div><!-- /.property-amenities -->
<?php endif; ?>