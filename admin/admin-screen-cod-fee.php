<?php

add_action('admin_menu', 'register_cash_on_delivery_fees_page');

function register_cash_on_delivery_fees_page() {
    add_submenu_page( 'woocommerce', 'Cash on delivery fees', 'Cash on delivery fees', 'manage_options', 'cash-on-delivery-fees', 'cash_on_delivery_rules' ); 
}

function cash_on_delivery_rules() {
    echo '<h3>Ebru Cash on delivery fees</h3>';

}