<?php
get_header();
$cols = Themebase_Global::get_page_sidebar();
?>
<div class="container">
    <div class="row">
        <?php get_sidebar('left'); ?>
    <div class="<?php echo esc_attr($cols);?>">
        <div id="primary" class="content-area">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'templates/content', 'single' ); ?>
            <?php endwhile; // End of the loop. ?>
        </div> <!-- End primary -->
    </div>
<?php get_sidebar('right'); ?>
    </div>
    
</div>

<?php get_footer(); ?> 