<?php

//Add custom column
add_filter('manage_edit-news_columns', 'my_columns_head');
function my_columns_head($defaults) {
$defaults['news_date'] = 'News Date';
return $defaults;
}
//Add rows data
add_action( 'manage_news_posts_custom_column' , 'my_custom_column', 10, 2 );
function my_custom_column($column, $post_id ){
switch ( $column ) {
case 'news_date':
echo get_post_meta( $post_id , 'news_date' , true );
break;
}
}

// Make these columns sortable
function sortable_columns() {
  return array(
    'news_date'      => 'news_date'
  );
}

add_filter( "manage_edit-news_sortable_columns", "sortable_columns" );

// Delete column

function my_columns_filter( $columns ) {
    unset($columns['date']);
    return $columns;
}
add_filter( 'manage_edit-news_columns', 'my_columns_filter', 10, 1 );

?>