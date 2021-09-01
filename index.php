<?php
get_header();
?>
<section class="slider">
		<?php  $args = array(
			'post_type' => 'slides', 
			'showposts' => -1,
			'order' => 'DESC', 
			'orderby' => 'ID',                          
		); 
		$news = new WP_Query($args); ?>
		<?php  if ($news->have_posts()) : ?>
			<?php while ($news->have_posts()) : $news->the_post();?>
				<div class="item">
					<?php the_post_thumbnail('full', array( 'class' => 'img-fluid center-block' ) ); ?>
				</div>
			<?php endwhile; ?>
			<?php else : ?><!-- Slides -->
			<div class="alert alert-danger notice text-center" role="alert"><?php _e('Rất tiếc, mục này chưa có dữ liệu.','kenit'); ?></div>
		<?php endif; wp_reset_query();?> 
</section>
<section class="highlights">
	<div class="container">
		<div class="row">
			<div class="highlights__all">
				<div class="highlights__all--item">
					<h3>Free shipping</h3>
					<p>All order over $300</p>
				</div>
				<div class="highlights__all--item">
					<h3>Support customer</h3>
					<p>Support 24/7</p>
				</div>
				<div class="highlights__all--item">
					<h3>Secure payments</h3>
					<p>Support 24/7</p>
				</div>
			</div>
		</div>

	</div>
</section>
<section class="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="title-section">
				<p>It started with a simple idea: Create quality, well-designed products that I wanted myself.</p>
			</div>
		</div>
		<div class="row banner__around">
		<div class="banner__around--item bn1">
			<?php dynamic_sidebar('banner1'); ?>
			</div>
			<div class="banner__around--item bn2">
			<?php dynamic_sidebar('banner2'); ?>
			</div>
			<div class="banner__around--item bn3">
			<?php dynamic_sidebar('banner3'); ?>
			</div>
		</div>
		<div class="row banner__around2">
			<div class="banner__around--item bn4">
			<?php dynamic_sidebar('banner4'); ?>
			</div>
			<div class="banner__around--item bn5">
			<?php dynamic_sidebar('banner5'); ?>
			</div>
			<div class="banner__around--item bn6">
			<?php dynamic_sidebar('banner6'); ?>
			</div>
		</div>

	</div>
</section>

<section class="product">
	<div class="container">
		<div class="row">
			<div class="product__title">
				<h3><a href="">Featured items</a></h3>
				<a href="" class="view-more">View more<ion-icon name="chevron-forward-outline"></ion-icon></a>
			</div>
		</div>

		<div class="row">
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr1.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr1.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>

				</div>
				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Kubusbowl Small</a></h3>
					<div class="price"><span>$19.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr2.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr2.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Divine Footstool</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr3.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr3.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Cache Pendant Lamp</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr4.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr4.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">RIO Chair</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr5.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr5.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Cache Pendant Lamp</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr6.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr6.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Prismatic table</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr7.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr7.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">CobraT hermo Cup</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
			<div class="product__all--item">
				<div class="img-info">
					<div class="pro-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr8.png" alt="" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pr8.png" alt="" class="img-fluid">

					</div>
					<div class="add-pro">
						<a href="" class="add-to-cart">Add to cart</a>
						<ul>
							<li><a href="">
								<ion-icon name="heart-outline"></ion-icon>
							</a></li>
							<li><a href="">
								<ion-icon name="cellular-outline"></ion-icon>
							</li>
							<li><a href="">
								<ion-icon name="search-outline"></ion-icon>
							</a></li>
						</ul>
					</div>
				</div>

				<div class="pro-info">
					<h3 class="pro-info__name"><a href="">Montana Collection</a></h3>
					<div class="price"><span>$179.00</span></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blogs">
	<div class="container">
		<div class="title-blogs">
			<h2>Blog update</h2>
		</div>

				<?php if (have_posts()): ?>  
					<?php get_template_part('templates/content', 'blog-archive'); ?>
				<?php else: ?> 
					<?php get_template_part('content', 'none'); ?>
				<?php endif; ?>

		<div class="go-to-blog">
			<a href="">Go to blog</a>
		</div>
	</div>
</section>
<section class="partner">
	<div class="container">
		<div class="partner__all">
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-6.png" alt="" class="img-fluid">
				</div>
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-5.png" alt="" class="img-fluid">
				</div>
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-4.png" alt="" class="img-fluid">
				</div>
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-3.png" alt="" class="img-fluid">
				</div>
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-2.png" alt="" class="img-fluid">
				</div>
				<div class="partner__item item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/part-1.png" alt="" class="img-fluid">
				</div>

		</div>
	</div>
</section>

<?php get_footer(); ?> 