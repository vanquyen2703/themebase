<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
        <div class="title-hdwoo">
            <h6 class="title-cart"><?php esc_html_e('Grand total', 'themebase'); ?></h6>
            <span class="ti-angle-down"></span>
        </div>
        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
	        <div class="box-shipping box-shipping-cs  box-shipping-mobile ">
	            <div class="title-hdwoo">
	                <h6 class="title-cart"><?php esc_html_e('Estimate shipping and tax', 'themebase'); ?></h6>
	                <span class="ti-angle-down"></span>
	            </div>
	            <div class="form-shipping-cs">

	                    <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

	                    <?php wc_cart_totals_shipping_html(); ?>

	                    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
	            </div >
	        </div>
	    <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

            <?php woocommerce_shipping_calculator(); ?>

        <?php endif; ?>
		<div class="box-cart-total">
			<?php do_action('woocommerce_before_cart_totals'); ?>
			<table cellspacing="0" class="shop_table shop_table_responsive">
				<tr class="cart-subtotal">
					<th><?php esc_html_e('Subtotal:', 'themebase'); ?></th>
					<td data-title="<?php esc_attr_e('Subtotal:', 'themebase'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
				</tr>
				<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
					<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
						<th><?php echo esc_html__('Discount:','themebase'); ?></th>
						<td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></td>
					</tr>
				<?php endforeach; ?>
				<tr class="cart-shipping">
					<th><?php esc_html_e('Shipping:', 'themebase'); ?></th>
					<td data-title="<?php esc_attr_e('Shipping:', 'themebase'); ?>">   <?php
						echo $current_shipping_cost = WC()->cart->get_cart_shipping_total();
						?></td>
				</tr>
				<?php foreach (WC()->cart->get_fees() as $fee) : ?>
					<tr class="fee">
						<th><?php echo esc_html($fee->name); ?></th>
						<td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart) :
					$taxable_address = WC()->customer->get_taxable_address();
					$estimated_text = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()
						? sprintf(' <small>(' . __('estimated for %s', 'themebase') . ')</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]])
						: '';

					if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
						<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
							<tr class="tax-rate tax-rate-<?php echo sanitize_title($code); ?>">
								<th><?php echo esc_html($tax->label) . $estimated_text; ?></th>
								<td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses($tax->formatted_amount,'themebase_allow_html()'); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr class="tax-total">
							<th>
								<?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?>

							</th>
							<td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>

				<?php do_action('woocommerce_cart_totals_before_order_total'); ?>
				<tr class="order-total">
					<th><?php esc_html_e('Grand Total:', 'themebase'); ?></th>
					<?php $order_total = '<strong>' . WC()->cart->get_total() . '</strong> '; ?>
					<td data-title="<?php esc_attr_e('Total', 'themebase'); ?>"><?php echo wp_kses($order_total, themebase_allow_html()); ?></td>
				</tr>
				<?php do_action('woocommerce_cart_totals_after_order_total'); ?>
			</table>
			<div class="wc-proceed-to-checkout">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>
		</div>

    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
