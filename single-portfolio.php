<?php get_header();
$cols = Themebase_Global::get_page_sidebar();
$portfolio_single_layout_content = Themebase::setting('portfolio_single_layout_content');
$portfolio_single_layout = get_post_meta(get_the_id(), 'portfolio_layout_single', true);
$single_type ="";
    if ($portfolio_single_layout && $portfolio_single_layout !== 'default') {
        $single_type = $portfolio_single_layout;
    } else{
        $single_type = $portfolio_single_layout_content;
    }
?>
    <div class="portfolio-single col-md-12 <?php echo esc_attr($single_type); ?>">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $taxonomy_names = get_object_taxonomies('portfolio');
            $client_portfolio = get_post_meta(get_the_ID(), 'client_portfolio', true);
            $designer_portfolio = get_post_meta(get_the_ID(), 'designer_portfolio', true);
            $materials_portfolio = get_post_meta(get_the_ID(), 'materials_portfolio', true);
            $link_portfolio = get_post_meta(get_the_ID(), 'link_portfolio', true);
            $portfolio_single_item_enable_text = Themebase::setting('portfolio_single_item_enable_text');
            $portfolio_single_related_number = Themebase::setting('portfolio_single_related_number');
            $portfolio_single_other_title  = Themebase::setting('portfolio_single_other_title');
            $portfolio_single_category_enable = Themebase::setting('portfolio_single_category_enable');
            $portfolio_single_item_enable_text = Themebase::setting('portfolio_single_item_enable_text');
            $related = themebase_get_related_portfolio($post->ID, $portfolio_single_related_number);
            if (is_array($taxonomy_names) && count($taxonomy_names) > 0 && in_array('portfolio_cat', $taxonomy_names)) {
                $terms = get_terms('portfolio_cat', array(
                    'hide_empty' => true,
                    'parent' => 0,
                    'hierarchical' => false,
                ));
            }
            ?>
            <div class="row">
                <div class="portfolio-img col-xl-6 col-md-6 col-sm-12">
                    <?php
                    $portfolio_id = 'portfolio_id-' . wp_rand();
                    $gallery = get_post_meta(get_the_ID(), 'gallery_metabox_portfolio', true);
                    if (is_array($gallery)) : ?>
                        <?php if (is_singular()): ?>
                            <div class="portfolio-gallery-single portfolio-gallery-single-img">
                                <div class="portfolio-height">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php
                                        $image = themebase_resize_image(991, 991);
                                        ?>
                                        <div class="img-gallery-single img-item">
                                            <img src="<?php echo esc_url($image); ?>"
                                                 alt="<?php the_title_attribute(); ?>"/>
                                           
                                            <div class="poppup">
                                                <?php
                                                $full_image_size = get_the_post_thumbnail_url(null, 'full');
                                                $image_url = Themebase_Helper::aq_resize(array(
                                                    'url' => $full_image_size,
                                                ));
                                                ?>
                                                <a class="view_poppup_portfolio" data-elementor-open-lightbox="default"
                                                   href="<?php echo esc_url($image_url); ?>"><span
                                                            class="theme-icon-move-selector"></span></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    foreach ($gallery as $key => $value) :
                                        $full_image_size = wp_get_attachment_image_src($value, 'full');
                                        $alt = get_post_meta($value, '_wp_attachment_image_alt', true);
                                        $image_url = Themebase_Helper::aq_resize(array(
                                            'url' => $full_image_size[0],
                                            'width' => 991,
                                            'height' => 991,
                                        ));
                                        ?>
                                        <div class="img-gallery img-item">
                                            <img src="<?php echo esc_url($image_url); ?>"
                                                 alt="<?php echo esc_attr($alt); ?>"/>
                                            <div class="poppup">
                                                
                                                <a class="view_poppup_portfolio" data-elementor-open-lightbox="default"
                                                   href="<?php echo esc_url($image_url); ?>"><span
                                                            class="theme-icon-move-selector"></span></a>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if (has_post_thumbnail()) { ?>
                            <?php
                            $image = themebase_resize_image(991, 991);
                            ?>
                            <div class="img-gallery-single">
                                <img src="<?php echo esc_url($image); ?>"
                                     alt="<?php the_title_attribute(); ?>"/>
                                     <div class="poppup">
                                        <?php
                                        $full_image_size = get_the_post_thumbnail_url(null, 'full');
                                        $image_url = Themebase_Helper::aq_resize(array(
                                            'url' => $full_image_size,
                                        ));
                                        ?>
                                        <a class="view_poppup_portfolio" data-elementor-open-lightbox="default"
                                           href="<?php echo esc_url($image_url); ?>"><span
                                                    class="theme-icon-move-selector"></span></a>
                                    </div>
                            </div>
                            <?php
                        }
                        ?>
                    <?php endif; ?>
                </div>
                <div class="portfolio-content col-xl-6 col-md-6 col-sm-12">
                    <div class="portfolio-desc">
                        <?php
                        if (Themebase::setting('portfolio_single_category_enable') === '1') {
                            $themebase_portfolio_term_arr = get_the_terms(get_the_ID(), 'portfolio_cat');
                            if (is_array($themebase_portfolio_term_arr) || is_object($themebase_portfolio_term_arr)) { ?>
                                <div class="cate-portfolio">
                                    <?php
                                    $cate = get_the_term_list($post->ID, 'portfolio_cat', '', ', ');
                                    if (!empty($cate)) {
                                        echo get_the_term_list($post->ID, 'portfolio_cat', '', ', ', '');
                                    }
                                    ?>
                                </div>
                        <?php } 
                        }?>
                        <h1 class="portfolio_title"><?php the_title(); ?></h1>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="portfolio-info">
                            <?php if (Themebase::setting('portfolio_single_share_enable') === '1') : ?>
                                <div class="portfolio-share">
                                    <div class="row">
                                        <div class="col-portfolio-12 col-sm-12 col-md-12 col-lg-12">
                                            <?php Themebase_Templates::portfolio_sharing(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-link">
                <nav class="navigation case-navigation">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <div class="icon-prev">
                                <?php previous_post_link( '%link', '<i class="theme-icon-back"></i>'); ?>
                            </div>
                            <div class="text-prev"> 
                                <?php previous_post_link( '%link', __( 'Prev portfolio', 'themebase' )); ?>
                                <?php previous_post_link('%link', '%title'); ?>
                            </div>
                        </div>
                        <div class="nav-next">
                            <div class="text-next">
                                <?php next_post_link( '%link', __( 'Next portfolio', 'themebase' ) );?>
                                <?php next_post_link('%link', '%title'); ?>
                            </div>
                            <div class="icon-next">

                                <?php previous_post_link( '%link', '<i class="theme-icon-next"></i>'); ?>
                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <?php if (Themebase::setting('portfolio_single_related_enable') === '1') : ?>
                <?php
                if ($related->have_posts()) {
                    ?>
                    <div class="related-archive post-type-archive-portfolio">
                        <div class="portfolio-container">
                            <?php if ($portfolio_single_other_title !== ''): ?>
                                <h3><?php echo esc_html($portfolio_single_other_title); ?></h3>
                            <?php endif; ?>
                            <?php
                            echo '<div class="item-posts load-item row portfolio-entries-wrap clearfix">';
                            while ($related->have_posts()) {
                                $related->the_post(); ?>
                                <?php
                                $themebase_portfolio_term_arr = get_the_terms(get_the_ID(), 'portfolio_cat');
                                ?>
                                <div class="item">
                                    <div class="portfolio_body text-center">
                                        <div class="title-category">
                                            <?php
                                            if (is_array($themebase_portfolio_term_arr) || is_object($themebase_portfolio_term_arr)) { ?>
                                                <div class="cate-portfolio">
                                                    <?php
                                                    $cate = get_the_term_list($post->ID, 'portfolio_cat', '', ', ');
                                                    if (!empty($cate)) {
                                                        echo get_the_term_list($post->ID, 'portfolio_cat', '', ', ', '');
                                                    }
                                                    ?>
                                                </div>
                                            <?php } ?>
                                            <h3 class="portfolio_title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="portfolio-content">
                                            <div class="portfolio-img">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <?php
                                                    $image = themebase_resize_image(545, 545);
                                                    ?>
                                                    <img src="<?php echo esc_url($image); ?>"
                                                         alt="<?php the_title_attribute(); ?>"/>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="poppup-share">
                                            <div class="poppup">
                                                <?php
                                                $full_image_size = get_the_post_thumbnail_url(null, 'full');
                                                $image_url = Themebase_Helper::aq_resize(array(
                                                    'url' => $full_image_size,
                                                ));
                                                ?>
                                                <a class="view_poppup_portfolio" data-settings="{'lightbox':'yes'}"
                                                   href="<?php echo esc_url($image_url); ?>"><span
                                                            class="theme-icon-move-selector"></span></a>
                                            </div>
                                            <div class="share">
                                                <span class="theme-icon-share"></span>
                                                <?php Themebase_Templates::portfolio_sharing(); ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            echo '</div>';
                            ?>

                        </div>
                    </div>
                <?php } ?>
            <?php endif; ?>
        <?php endwhile; // End of the loop. ?>
    </div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>