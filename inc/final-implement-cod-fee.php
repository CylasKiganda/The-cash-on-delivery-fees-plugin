<?php

use Automattic\WooCommerce\Utilities\NumberUtil;

function cod_add_checkout_fee_for_gateway( $cart ) {

	if ( ( is_admin() && ! defined( 'DOING_AJAX' ) ) || ! is_checkout() ) {
		return;
    }
 
    $chosen_gateway = WC()->session->chosen_payment_method;
	
    if ( $chosen_gateway == 'cod' ) {
        
        $total = cod_get_cart_total( $cart );

        $cod_rules = get_option('belo_cod_rules_data'); 
        $fee = false;
        foreach($cod_rules as $cdrule){
            if($cdrule['rule_format']=='is_equal_to'){
                if($total == $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
            elseif($cdrule['rule_format']=='less_equal_to'){
                if($total <= $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
            elseif($cdrule['rule_format']=='less_then'){
                if($total < $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
            elseif($cdrule['rule_format']=='greater_equal_to'){
                if($total >= $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
            elseif($cdrule['rule_format']=='greater_then'){
                if($total > $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
            elseif($cdrule['rule_format']=='not_in'){
                if($total != $cdrule['rule_amount']){
                    $fee = $cdrule['rule_fee']; 
                    break;
                }
            }
        }  
        if ( false !== $fee ) {
            if(!empty(get_option('cod_rule_name'))){
                $fee_name =get_option('cod_rule_name');
            }
            else{
                $fee_name = __( 'Cash on delivery fees', 'woocommerce' );
            }
           
            $cart->add_fee( $fee_name, $fee, false );
        }
	}
}
add_action( 'woocommerce_cart_calculate_fees','cod_add_checkout_fee_for_gateway' );
 

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