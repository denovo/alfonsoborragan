<?php

// Create new image sizes for picturefill and homepage slider
add_image_size('smallest', 479, 9999);
add_image_size('small', 768, 9999);
add_image_size('largest', 1800, 9999);
add_image_size('fullscreen', 1920, 9999);



if(defined('PICTUREFILL_WP_VERSION') && '2' === substr(PICTUREFILL_WP_VERSION, 0, 1)){
  // Add Picturefill.WP 2 specific code here.

}



// function picturefill_script() {
//     wp_enqueue_script( 'picturefill', get_stylesheet_uri() . '/js/picturefill_2.2.0.min.js', '', '', true );
// }

// add_action( 'wp_enqueue_scripts', 'picturefill_script' );



// // Get Image Alt - Used for Picturefill
// function get_img_alt( $image ) {
//     $img_alt = trim( strip_tags( get_post_meta( $image, '_wp_attachment_image_alt', true ) ) );
//     return $img_alt;
// }



?>