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


// Add this RoyalSlider 'remote control' to your theme functions.php
function add_additional_rs_code() {
    ?>
    $('.toggleAutoPlay-royalslider').click(function() {
         $('.royalSlider').royalSlider('toggleAutoPlay');
    });
    $('.startAutoPlay-royalslider').click(function() {
         $('.royalSlider').royalSlider('startAutoPlay');
    });
    $('.stopAutoPlay-royalslider').click(function() {
         $('.royalSlider').royalSlider('stopAutoPlay');
    });


    var header_slider = $('#new-royalslider-1').royalSlider();
    var process_down_scroll = true;
    var process_up_scroll = false;

    $(window).scroll(function(event){

        clearTimeout($.data(this, "scrollTimer"));
        $.data(this, "scrollTimer", setTimeout(function() {
          var scrollAmt = $(this).scrollTop();
          // stop the auto scroll of slider once scrolled down past 150px
          if ((scrollAmt > 150) && (process_down_scroll == true)) {
             header_slider.royalSlider('stopAutoPlay');
             console.log("stop slider autoplay here");
             process_down_scroll = false;
             process_up_scroll = true;

          }
          else if ((scrollAmt < 150) && (process_up_scroll == true) ){
             header_slider.royalSlider('startAutoPlay');
             console.log("start slider autoplay here");
             process_up_scroll = false;
             process_down_scroll = true;

          }
        }, 200));

    });
    <?php
}
add_action('new_rs_after_js_init_code', 'add_additional_rs_code');


?>