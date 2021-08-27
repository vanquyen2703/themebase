<?php
$header_layout = Themebase::setting('header_layout_style');
if ($header_layout == 'wide') {
    $container = 'container-fluid';
} elseif ($header_layout == 'full_width') {
    $container = 'container-fluid';
} else {
    $container = 'container-fluid';
}

$class_sticky ='';
if (themebase_get_meta_value('meta_header_sticky') ==''){
    if (Themebase::setting('header_sticky_enable') == 1){
        $class_sticky = 'header-sticky';
    }
}elseif (themebase_get_meta_value('meta_header_sticky') == 'on'){
    $class_sticky = 'header-sticky';
}else{
    $class_sticky ='';
}
?>
<div class="cover"></div>
<header class="header">
    <div class="header__top site-header header-default <?php echo esc_attr($class_sticky);?>">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="header__menu header-main-content d-flex align-items-center row">
             <div class="menu-icon menu_bar align-items-center col-md-3 col-sm-3 col-xs-3">
                <span class="theme-icon-menu"></span>
                
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6 header-logo">
                <?php get_template_part('templates/header/site', 'branding'); ?>
            </div>
            <?php if (has_nav_menu('primary')): ?>
                <div class="navigation-top menu-col-center col-xl-9 col-lg-9 col-md-8 col-sm-8">

                </div>
            <?php endif; ?>
            <div class="head-right header-group menu-col-right justify-content-end col-xl-1 col-lg-1 col-md-3 col-sm-3 col-xs-3">
                <?php
                $show_cart = Themebase::setting('show_cart');

                if (class_exists('WooCommerce') && $show_cart) {
                    Themebase_Templates::get_minicart_template();
                }
                ?>
                <div class="navbar">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="nav-overlay">
                    <?php Themebase_Templates::mobile_menu();?>
                </div>

            </div>

        </div>
    </div>
    <div class="social-right">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>
        </ul>
    </div>
    <div class="content-qc">
        <div class="container">
            <div class="row">
                <div class="qc-caption">
                    <p>Spring 2017 </p>
                    <h2>It’s your shine time</h2>
                    <div class="dicover">
                        <a href="">Discover now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
