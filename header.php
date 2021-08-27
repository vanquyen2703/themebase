<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5"/>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex">
    <link rel="profile" href="//gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https: // unkg .com / ionicons @ 5.5.2 / dist / ionicons / ionicons.js "></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/un-minify/custom.js"></script>
    <?php wp_head(); ?>
</head>
<?php
$themebase_site_layout = get_post_meta(get_the_ID(), 'site_layout', true);
$themebase_hide_header = get_post_meta(get_the_ID(), 'hide_header', true);
if(is_category() || is_tax()){
    $themebase_hide_header_cat = themebase_get_meta_value('hide_header', true);
    if (!$themebase_hide_header_cat) {
        $themebase_hide_header = true;
    }
}
$container = Themebase_Global::check_container_type();
?>
<body <?php body_class(); ?>>
    <?php wp_body_open();
    if (class_exists('WooCommerce')) {
        ?>
        <div class="shopping_cart sub-cart">
            <h4 class="cart-title">
                <?php echo esc_html__('Cart', 'themebase') ?>
                <span class="count-product-cart">
                    <?php echo is_object(WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?>
                </span>
                <span class="close-sub-cart"><?php echo esc_html__('x', 'themebase') ?></span>
            </h4>
            <?php echo the_widget('WC_Widget_Cart', 'title='); ?>
        </div>
        <?php
    }   $scroll_chevron_enable = get_post_meta(get_the_ID(), 'remove_space_top', true);
        if($scroll_chevron_enable) :?>
           <div id="arrowAnim">
              <div class="arrowSliding">
                <i class="theme-icon-download"></i>
              </div>
              <div class="arrowSliding delay1">
                <i class="theme-icon-download"></i>
              </div>
              <div class="arrowSliding delay2">
                <i class="theme-icon-download"></i>
              </div>
              <div class="arrowSliding delay3">
                <i class="theme-icon-download"></i>
              </div>
        </div>
        <?php endif; 
        Themebase_Functions::themebase_pre_loader();
        if ( is_front_page() ){
            Themebase_Templates::popup_newsletter();
        }
        if(class_exists('WooCommerce') && !is_checkout()){
            Themebase_Templates::popup_account();
        }

    ?>
    <div id="page" <?php themebase_page_class();?>>
        <?php if(!$themebase_hide_header && !is_404()) {
            Themebase::get_header_type(); }
        ?>

        <?php get_template_part('breadcrumb'); ?>
