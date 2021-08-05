<?php
function vt_widgets_init() {

		register_sidebar(array(
		'name'			=> __('Blog Sidebar', 'vt'),
		'id' 			=> 'm_sidebar_1',
		'description'   => __( 'Contact Info sidebar that appears on the left.', 'vt' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',	
		'before_title' => '<h4 class="section-item-title-1">',
		'after_title' => '</h4>',
	));
}
/** Register sidebars by running spa_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'vt_widgets_init' );
?>