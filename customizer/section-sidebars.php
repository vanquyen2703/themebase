<?php
$section             = 'sidebars';
$priority            = 1;
$prefix              = 'sidebars_';
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'title_sidebar_color',
	'label'       => esc_html__( 'Title Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     =>  '',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget .widget-title .widget-tlt, .active-sidebar .widget .widget-title',
			'property' => 'color',
		),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_sidebar_color',
	'label'       => esc_html__( 'Link Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget a, 
				.active-sidebar .widget ul li span.count',
			'property' => 'color',
			'suffix'   => ' !important',
		),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_hover_sidebar_color',
	'label'       => esc_html__( 'Link Hover Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => "",
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar .widget a:hover,
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>a, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>p, 
				.active-sidebar .widget.widget_product_categories ul.product-categories li:hover>span.count,
				.active-sidebar .widget.brand li:hover a,
				.active-sidebar .widget.widget_categories a:hover,
				.active-sidebar .widget.yith-woocompare-widget .products-list li:hover .title,
				.active-sidebar .tm-posts-widget .post-widget-info .post-widget-title a:hover',
			'property' => 'color',
			'suffix'   => ' !important',
		),
		array(
			'element'  => '.active-sidebar .tm-posts-widget .view_more:before',
			'property' => 'background-color',
			'suffix'   => ' !important',
		),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'content_sidebar_color',
	'label'       => esc_html__( 'Content Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
				.active-sidebar, .active-sidebar .widget ul li, .active-sidebar p, .active-sidebar strong, .active-sidebar span:not(.widget-tlt), .active-sidebar div',
			'property' => 'color',
			'suffix'   => ' !important',
		),
	),
) );