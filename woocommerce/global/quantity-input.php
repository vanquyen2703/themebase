<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
    ?>
    <div class="quantity hidden">
        <input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
    </div>
    <?php
} else {
    /* translators: %s: Quantity. */
    $labelledby = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'themebase' ), strip_tags( $args['product_name'] ) ) : '';
    ?>
    <div class="quantity">
        <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'themebase' ); ?></label>
        <div class="qty-number qty-number-plus"><span class="increase-qty plus"><i class="theme-icon-plus"></i></span></div>
        <input
                type="number"
                id="<?php echo esc_attr( $input_id ); ?>"
                class="input-text qty text"
                step="<?php echo esc_attr( $step ); ?>"
                min="<?php echo esc_attr( $min_value ); ?>"
                max="100"
                name="<?php echo esc_attr( $input_name ); ?>"
                value="<?php echo esc_attr( $input_value ); ?>"
                title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'themebase' ); ?>"
                inputmode="<?php echo esc_attr( $inputmode ); ?>"/>
        <div class="qty-number qty-number-minus"><span class="increase-qty minus"><i class="theme-icon-minus"></i></span></div>
    </div>
    <?php
}
