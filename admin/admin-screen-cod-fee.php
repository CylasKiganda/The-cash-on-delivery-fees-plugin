<?php

add_action('admin_menu', 'register_cash_on_delivery_fees_page');

function register_cash_on_delivery_fees_page() {
    add_submenu_page( 'woocommerce', 'Cash on delivery fees', 'Cash on delivery fees', 'manage_options', 'cash-on-delivery-fees', 'cash_on_delivery_rules' ); 
}

add_action('admin_enqueue_scripts', 'cod_admin_enqueue_scripts');

function cod_admin_enqueue_scripts() {
    $screen = get_current_screen();
    if($screen->base=="woocommerce_page_cash-on-delivery-fees"){
        wp_enqueue_style( 'cod-bootstrapcss','https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', false, '1.0' );
        wp_enqueue_script('admin-cod-page', plugin_dir_url( __FILE__ ) . 'assets/admin-cod-page.js', array('jquery'), '1.0', true);
        wp_enqueue_script('bootstrapjs-page', 'https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
        
        wp_enqueue_style('jancode-css', plugin_dir_url( __FILE__ ) . 'assets/jancode.css', false, '1.9.2');

    }
  
}


function cash_on_delivery_rules() { 
    echo '<h3>Cash on delivery fees</h3>';

}