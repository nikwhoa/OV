<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oversizedtemplate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'oversizedtemplate' ),
			'id'            => 'sidebar-left-top',
			'description'   => esc_html__( 'Add widgets here.', 'oversizedtemplate' ),
			'before_widget' => '<div class="catalog-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => null,
			'after_title'   => null,
		)
	);
}
add_action( 'widgets_init', 'oversizedtemplate_widgets_init' );

add_filter('widget_title','catalog_sidebar_title');
function catalog_sidebar_title($t)
{
	return null;
}
