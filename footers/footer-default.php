
<?php
$footer_layout = Themebase::setting('footer_layout');
if ($footer_layout === 'wide'){
	$f_container ='container-fluid';
}elseif ($footer_layout === 'full_width'){
	$f_container ='container';
}else{
	$f_container ='container-fluid boxed';
}
?>
<footer class="footer">
	<div class="<?php echo esc_attr($f_container); ?>">
		<div class="row footer__top">
			<div class="logo-ft">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo .png" alt="" class="img-fluid">
			</div>
			<div class="menu-ft">
			<?php dynamic_sidebar('footer'); ?>
			</div>
			<div class="subcribe"><a href="">Subscribe <ion-icon name="mail-outline"></ion-icon></a></div>

			<?php if (is_active_sidebar('footer')) { ?>
				<!-- <div class="">
					<?php dynamic_sidebar('footer'); ?>	
				</div> -->
			<?php } ?>

		</div>
		<div class="row footer__bottom">
			<div class="copyright">
				<div class="copyright__content">
					<p>14 L.E Goulburn St, Sydney 2000NSW &nbsp;-&nbsp; <a href="tel:08819906886">(088) 1990
					6886</a>
				</p>
				<?php echo  Themebase::setting( 'footer_copyright' ); ?>
			</div>
		</div>
		<div class="text-right">
			<div class="footer-social ">
				<ul>
					<li><a href="#">
						<ion-icon name="logo-facebook"></ion-icon>
					</a></li>
					<li><a href="#">
						<ion-icon name="logo-twitter"></ion-icon>
					</a>
				</li>
				<li><a href="#">
					<ion-icon name="logo-youtube"></ion-icon>
				</a></li>

				<li><a href="#">
					<ion-icon name="logo-skype"></ion-icon>
				</a></li>
			</ul>
		</div>
	</div>
</div>
</div>
</footer>
