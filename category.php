<?php 
get_header(); 
?>
<?php get_sidebar('left'); ?> 
	<div class="<?php echo esc_attr($themebase_class);?>">
		<div id="primary" class="content-area">
             <?php if (have_posts()): ?>                        
                 <?php get_template_part( 'templates/content', 'blog-archive' ); ?>
             <?php else: ?> 
                 <?php get_template_part('content', 'none'); ?>
             <?php endif; ?>
		</div> <!-- End primary -->
	</div>
<?php get_footer(); ?>