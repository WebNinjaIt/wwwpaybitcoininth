<?php

function gallery_id_url($post_id, $att_id, $filepath, $is_keep_existing_images = '')
{

    // The custom field used by the gallery.
    $key = '_property_gallery';

    // The image size to list in the gallery.
    $size = 'full';     

    // Retrieve the current gallery value.
    $gallery = get_post_meta($post_id, $key, TRUE);

    // If it's empty declare a new array.
    if (empty($gallery)) {
        $gallery = array();
    }

    // Check if image is already in the gallery.
    if (!isset($gallery[$att_id])) {

        // If not, retrieve the image's URL.
        $src = wp_get_attachment_url($att_id);

        // Add the image ID and URL to our gallery.
        $gallery[$att_id] = $src;

        // Save the gallery.
        update_post_meta($post_id, $key, $gallery);

    }
}

add_action('pmxi_gallery_image', 'gallery_id_url', 10, 4);

?>