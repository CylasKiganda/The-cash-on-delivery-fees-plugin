<?php
 
add_action('admin_menu', 'register_cash_on_delivery_fees_page');

function register_cash_on_delivery_fees_page() {
    add_menu_page( "BELO", "BELO", "manage_options", "belo_main",  '', ''); 
    add_submenu_page( 'belo_main', 'Cash on delivery fees', 'Cash on delivery fees', 'manage_options', 'belo_main', 'admin_cod_screen_callback' ); 
    add_submenu_page( 'belo_main', 'xxx', 'xxx', 'manage_options', 'admin-cod-menu-hack', false );  
  
}
function admin_cod_menu_hack( $submenu_file ) {
    global $plugin_page;
    $hidden_item = array(
        'admin-cod-menu-hack' => true,
    );
    foreach ( $hidden_item as $submenu => $unused ) {
        remove_submenu_page( 'belo_main', $submenu );
    }
    return $submenu_file;
}
add_filter( 'submenu_file', 'admin_cod_menu_hack' );

add_action('admin_enqueue_scripts', 'cod_admin_enqueue_scripts');

function cod_admin_enqueue_scripts() {
    $screen = get_current_screen();
    if($screen->base=="toplevel_page_belo_main"){
        wp_enqueue_style( 'admin-cod-font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', false, '1.0' );
        wp_enqueue_style( 'admin-cod-bootstrapcss','https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', false, '1.0' );
        wp_enqueue_style('admin-cod-page-styles', plugin_dir_url( __FILE__ ) . '/assets/admin-cod-page.css' , '1.7.11', true);
        wp_enqueue_script('admin-cod-page-js', plugin_dir_url( __FILE__ ) . '/assets/admin-cod-page.js', array('jquery'), '1.71111111111', true);
        wp_enqueue_script('admin-bootstrapjs-page', 'https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js', array('jquery'), '1.3', true);
        
    }
  
}


function admin_cod_screen_callback() { 
     
        require_once(COD_PLUGIN_PATH .'admin/parts/admin-cod-screen-form-init.php');
   
} 