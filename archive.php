<?php
get_header();
?>
<div class="container">
    <div class="<?php echo esc_attr($cols);?>">
		<div id="primary" class="content-area">
             <?php if (have_posts()): ?>                        
                 <?php get_template_part('templates/content', 'blog-archive'); ?>
             <?php else: ?> 
                 <?php get_template_part('content', 'none'); ?>
             <?php endif; ?>
		</div> <!-- End primary -->
	</div>
</div>
	

<?php get_footer(); ?> 