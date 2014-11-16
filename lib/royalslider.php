<?php

add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['rsPete'] = array(
           'label' => 'alfonso slider skin',
           'path' => get_stylesheet_directory_uri() . '/assets/royalSlider/custom-skin/rsPete.css'  // get_stylesheet_directory_uri returns path to your theme folder
      );
      return $skins;
}

?>