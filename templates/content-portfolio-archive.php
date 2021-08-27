<?php
global $wp_query;
$terms = '';
$taxonomy_names = get_object_taxonomies('portfolio');
$cat = $wp_query->get_queried_object();
if (isset($cat->term_id)) {
    $woo_cat = $cat->term_id;
} else {
    $woo_cat = 0;
}
if (is_array($taxonomy_names) && count($taxonomy_names) > 0 && in_array('portfolio_cat', $taxonomy_names)) {
    $terms = get_terms('portfolio_cat', array(
        'hide_empty' => true,
        'parent' => $woo_cat,
        'hierarchical' => false,
        'orderby' => 'COUNT',
        'order' => 'DESC',
    ));
}
$portfolio_column = Themebase_Portfolio::portfolio_columns();
$portfolio_layout2 = Themebase::setting('portfolio_layout2');
$portfolio_pagination = Themebase::setting('portfolio_pagination');
$portfolio_number_cate = Themebase::setting('portfolio_number_cate');
$portfolio_num_cate = array_slice($terms, 0, $portfolio_number_cate);
$current_page = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
if (is_category()) {
    $portfolio_pagination = themebase_get_meta_value('post_pagination_portfolio', false);
}
?>
<div class="portfolio-container <?php echo esc_attr($portfolio_layout2); ?>">
    <div class="tabs_sort portfolio-sort">
        <div class="load-item row portfolio-entries-wrap clearfix">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $themebase_portfolio_term_arr = get_the_terms(get_the_ID(), 'portfolio_cat');
                $themebase_portfolio_term_filters = '';
                if (is_array($themebase_portfolio_term_arr) || is_object($themebase_portfolio_term_arr)) {
                    foreach ($themebase_portfolio_term_arr as $post_term) {
                        $themebase_portfolio_term_filters .= $post_term->slug . ' ';
                        if ($post_term->parent != 0) {
                            $parent_term = get_term($post_term->parent, 'portfolio_cat');
                            $themebase_portfolio_term_filters .= $parent_term->slug . ' ';
                        }
                    }
                }
                $themebase_portfolio_term_filters = trim($themebase_portfolio_term_filters);
                ?>
                <div class="item <?php echo esc_attr($portfolio_column); ?> <?php echo esc_attr($themebase_portfolio_term_filters); ?> item-page<?php echo esc_attr($current_page); ?>">
                    <div class="portfolio_body text-center">
                        <?php if ($portfolio_layout2 === 'layout1') { ?>

                            <div class="portfolio-content">
                                <div class="portfolio-img">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php
                                        $image = themebase_resize_image(545, 545);
                                        ?>
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image); ?>"
                                             alt="<?php the_title_attribute(); ?>"/></a>
                                        <?php
                                    }
                                    ?>
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
                                </div>
                            </div>
                            <div class="title-category">
                                <h3 class="portfolio_title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                        <?php } else { ?>
                            <div class="title-category">
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
                                    <a class="view_poppup_portfolio" data-elementor-lightbox-slideshow="portfolio_gallery_archive"
                                       href="<?php echo esc_url($image_url); ?>"><span
                                                class="theme-icon-move-selector"></span></a>
                                </div>
                                <div class="share">
                                    <span class="theme-icon-share"></span>
                                    <?php Themebase_Templates::portfolio_sharing(); ?>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php if ($portfolio_pagination === 'load_more'): ?>
            <?php if (get_next_posts_link()) { ?>
                <div class="pagination-content type-loadmore load_more_button text-center"
                     rel="<?php echo esc_attr($wp_query->max_num_pages); ?>"
                     data-paged="<?php echo esc_attr($current_page) ?>"
                     data-totalpage="<?php echo esc_attr($wp_query->max_num_pages); ?>">
                    <?php echo get_next_posts_link(esc_html__('Load more', 'themebase')); ?>
                </div>
            <?php } ?>
        <?php endif; ?>
        <?php if ($portfolio_pagination === 'next_prev'): ?>
            <?php if( get_previous_posts_link() ||  get_next_posts_link()):?>
                <ul class="pagination-content type-arrow">
                    <?php if( get_previous_posts_link()): ?>
                        <li class="pagination_button_prev"><?php previous_posts_link( '<button class="btn-next"><span class="theme-icon-back"></span></button>' ); ?></li>
                    <?php endif; ?>
                    <?php if( get_next_posts_link()): ?>
                        <li class="pagination_button_next"><?php next_posts_link( '<button class="btn-next"><span class="theme-icon-next"></span></button>'); ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($portfolio_pagination === 'number'): ?>
            <div class="pagination-content type-number text-center">
                <?php Themebase_Templates::paging_nav(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>