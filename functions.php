<?php
/*http://www.drafie-design.nl/correct-hatom-errors-in-google-webmaster-tools/ tells me the following function helps fix errors */
function hatom_mod_post_content ($content) {
  if ( in_the_loop() && !is_page() ) {
    $content = '<span class="entry-content">'.$content.'</span>';
  }
  return $content;
}
add_filter( 'the_content', 'hatom_mod_post_content');

/*from http://codex.wordpress.org/Function_Reference/the_excerpt#Control_Excerpt_Length_using_Filters*/
/*This simply lets me import raw html from files, used in my automatically updating lists*/

function show_file_func( $atts ) {
  extract( shortcode_atts( array(
    'file' => ''
  ), $atts ) );
 
  if ($file!='')
    return @file_get_contents($file);
}
 
add_shortcode( 'show_file', 'show_file_func' );

/*from http://wordpress.stackexchange.com/questions/116713/creating-a-left-side-sidebar-in-word-press */
/*Code used to register a sidebar on a new page, used for the CommuniKate subsite*/
register_sidebar(array(
    'name' => 'sidebar-left',
    'before_widget' => '<div class="sidebar-box" >',
    'after_widget' => '</div>',
    'before_title' => '<div class="widgettitle2">',
    'after_title' => '</div>'
    ));
?>
