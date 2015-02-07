<?php


/*from http://codex.wordpress.org/Function_Reference/the_excerpt#Control_Excerpt_Length_using_Filters*/

function show_file_func( $atts ) {
  extract( shortcode_atts( array(
    'file' => ''
  ), $atts ) );
 
  if ($file!='')
    return @file_get_contents($file);
}
 
add_shortcode( 'show_file', 'show_file_func' );
/*from http://wordpress.stackexchange.com/questions/116713/creating-a-left-side-sidebar-in-word-press */
register_sidebar(array(
    'name' => 'sidebar-left',
    'before_widget' => '<div class="sidebar-box">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>'
    ));



?>
