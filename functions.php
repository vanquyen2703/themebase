<?php
$theme = wp_get_theme();
define('THEMEBASE_CSS', get_template_directory_uri() . '/css');
define('THEMEBASE_JS', get_template_directory_uri() . '/assets/js');
define('THEMEBASE_THEME_NAME', $theme['Name']);
define('THEMEBASE_THEME_VERSION', $theme->get('Version'));
define('THEMEBASE_THEME_DIR', get_template_directory());
define('THEMEBASE_THEME_URI', get_template_directory_uri());
define('THEMEBASE_THEME_IMAGE_URI', get_template_directory_uri() . '/assets/images');
define('THEMEBASE_CHILD_THEME_URI', get_stylesheet_directory_uri());
define('THEMEBASE_CHILD_THEME_DIR', get_stylesheet_directory());
define('THEMEBASE_FRAMEWORK_DIR', get_template_directory() . '/inc');
define('THEMEBASE_ADMIN', get_template_directory() . '/inc/admin');
define('THEMEBASE_FRAMEWORK_FUNCTION', get_template_directory() . '/inc/functions');
define('THEMEBASE_FRAMEWORK_PLUGIN', get_template_directory() . '/inc/plugins');
define('THEMEBASE_CUSTOMIZER_DIR', THEMEBASE_THEME_DIR . '/customizer');

require_once THEMEBASE_FRAMEWORK_PLUGIN . '/functions.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/function.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/woocommerce.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/ajax_search/ajax-search.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/menu.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/class-edit-menu-walker.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/class-walker-nav-menu.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/ajax-account/custom-ajax.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-customize.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-functions.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-helper.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-kirki.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-static.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-templates.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-aqua-resizer.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-global.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-widgets.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-wpml.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-post-type-blog.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-post-type-portfolio.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-actions-filters.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-enqueue.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-custom-style.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-minify.php';
if (!isset($content_width)) {
    $content_width = 1170;
}

function themebase_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support(
        'custom-logo',
        array(
            'flex-width' => false,
            'flex-height' => false,
        )
    );

    register_sidebar( array(
        'name'          => __( 'Product', 'text_domain' ),
        'id'            =>'product',
        'description'   => __( 'Product', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget sb_news %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="h2-title">',
        'after_title'   => '</h2>',
    ) ); 

    register_sidebar( array(
        'name'          => __( 'Slide', 'text_domain' ),
        'id'            =>'slide',
        'description'   => __( 'Slide', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget sb_news %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="h2-title">',
        'after_title'   => '</h2>',
    ) ); 

    register_sidebar( array(
        'name'          => __( 'Social', 'text_domain' ),
        'id'            =>'social',
        'description'   => __( 'Social', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget sb_news %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="h2-title">',
        'after_title'   => '</h2>',
    ) ); 

    register_sidebar( array(
        'name'          => __( 'Partner', 'text_domain' ),
        'id'            =>'partner',
        'description'   => __( 'Partner', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget sb_news %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="h2-title">',
        'after_title'   => '</h2>',
    ) ); 
}

add_action('after_setup_theme', 'themebase_theme_setup');


function slides() {

    $labels = array(
        'name' => _x('Banner','kenit'),
        'singular_name' => _x('Banner','kenit'),
        'add_new' => __ ('Thêm ảnh'),
        'add_new_item' => __('Thêm ảnh mới'),
        'edit_item' => __('Sửa ảnh'),
        'new_item' => __('Thêm ảnh mới'),
        'all_items' => __('Tất cả ảnh'),
        'view_item' => __('Xem ảnh'),
        'search_item' => __('Tìm ảnh'),
        'not_found' => __('Hiện tại chưa có ảnh nào'),
        'not_found_in_trash' => __('Không có ảnh nào trong sọt rác'),
        'menu_name' => 'Banner'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',        
    );

    register_post_type( 'slides',$args);
    register_taxonomy( 'slides_category', 'slides', array( 'hierarchical' => true, 'label' => __('Hệ thống Banner'), 'rewrite' => array( 'slug' => __('slides') ) ) );
    flush_rewrite_rules();
}
add_action( 'init', 'slides' );


