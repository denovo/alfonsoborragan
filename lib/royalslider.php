<?php

add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['rsPete'] = array(
           'label' => 'alfonso slider skin',
           'path' => get_stylesheet_directory_uri() . '/assets/royalSlider/custom-skin/rsPete.css'  // get_stylesheet_directory_uri returns path to your theme folder
      );
      return $skins;
}




// enables inverting caption text in slider markup editor
function newrs_add_acf_variable($m, $data, $options) {
    // $data is a post object (for posts-slider)
    $m->addHelper('invert_caption_text', function() use ($data) {
            if(get_field( "invert_caption_text", $data->ID ) == 1) {
            	return "__black";
            }
    } );

}
add_filter('new_rs_slides_renderer_helper','newrs_add_acf_variable', 10, 4);

?>