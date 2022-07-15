<?php

use Automattic\WooCommerce\Utilities\NumberUtil;

function cod_add_checkout_fee_for_gateway( $cart ) {

	if ( ( is_admin() && ! defined( 'DOING_AJAX' ) ) || ! is_checkout() ) {
		return;
    }
 
    $chosen_gateway = WC()->session->chosen_payment_method;
	
    if ( $chosen_gateway == 'cod' ) {
        
        $total = cod_get_cart_total( $cart );

        switch( true ){
            case ( $total < 1252 )  : $fee = 850; break;
            case ( $total < 29633 )  : $fee = 1730; break;
            case ( $total < 456666 ) : $fee = 3730; break;
            case ( $total <= 723666 ) : $fee = 7840; break; 
            default: $fee = false;
        }

        if ( false !== $fee ) {
            $fee_name = __( 'Cash on delivery fees', 'woocommerce' );
            $cart->add_fee( $fee_name, $fee, false );
        }
	}
}
add_action( 'woocommerce_cart_calculate_fees','cod_add_checkout_fee_for_gateway' );


function cod_disable_cod_gateway_according_to_order_total( $available_gateways ) {
    if ( isset( $available_gateways['cod'] ) ) {
        $cart = WC()->cart;
        $total = cod_get_cart_total( $cart );
        if ( $total > 399999 ) {
            unset( $available_gateways['cod'] );
            $chosen_gateway = WC()->session->chosen_payment_method;
            if ( is_checkout() && $chosen_gateway == 'cod' ) {
                $notice = __( 'Purchases over 7000000 are not eligible for cash on delivery, please choose another payment method.', 'woocommerce' );
                $notice =  $notice;
                if ( ! wc_has_notice( $notice, 'error' ) ) {
                     wc_add_notice( $notice, 'error' );
                }
            }
        }
    }

    return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'cod_disable_cod_gateway_according_to_order_total' );


function cod_cart_update_script() {
    if ( is_checkout() ) {
        wp_enqueue_script( 'cod-checkout', COD_PLUGIN_URL . '/js/cod-checkout.js', array( 'jquery' ), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'cod_cart_update_script' );


/**
 * Helper
 */
function cod_get_cart_total( $cart ) {
     if($cart !==null){
    return NumberUtil::round( $cart->get_cart_contents_total() + $cart->get_shipping_total() + $cart->get_taxes_total(), 0 );
     }
     else{
         return;
     }
}