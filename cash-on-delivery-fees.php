<?php
/*
* Plugin Name: BELO woocommerce cash on delivery payment gateway fees
* Plugin URI: https://github.com/CylasKiganda/cash-on-delivery-fees
* Description: Adding custom Cash on Delivery fees 
* Author: BELO
  Author URI: linkedin.com/in/kiganda-c-4525a1179
* Version: 1.0.0
* Domain: cod-fee
*/


defined( 'ABSPATH' ) || exit;

$check_active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
$cod_required_plugins = array(
  "woocommerce/woocommerce.php", 
);

foreach ($cod_required_plugins as $required_plugin) {
  if ( ! in_array( $required_plugin, $check_active_plugins ) ) {
    return;
  }
}

define('COD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('COD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once(COD_PLUGIN_PATH .'admin/admin-screen-cod-fee.php');
require_once(COD_PLUGIN_PATH .'inc/final-implement-cod-fee.php');