<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
if ( ! woocommerce_products_will_display() ) {
	return;
}
?>
<p class="woocommerce-result-count">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$paged_total    = $wp_query->max_num_pages;
	if($paged_total >= 2){
		$text_paged_total = esc_html__('Pages','themebase');
	}else{
		$text_paged_total = esc_html__('Page','themebase');
	}
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
	if ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing single result', 'Showing all %d  results', $total,'themebase' ), $total );
	} else {
		/* translators: 1: first result 2: last result 3: total results 4: paged results */
        printf( _nx( 'Showing single result', 'Showing all %1$d results', $total, 'with first and last result','themebase' ),$total );
	}
	?>
</p>