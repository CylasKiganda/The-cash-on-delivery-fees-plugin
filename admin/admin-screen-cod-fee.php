<?php

add_action('admin_menu', 'register_cash_on_delivery_fees_page');

function register_cash_on_delivery_fees_page() {
    add_submenu_page( 'woocommerce', 'Cash on delivery fees', 'Cash on delivery fees', 'manage_options', 'cash-on-delivery-fees', 'cash_on_delivery_rules' ); 
}

add_action('admin_enqueue_scripts', 'cod_admin_enqueue_scripts');

function cod_admin_enqueue_scripts() {
    $screen = get_current_screen();
    if($screen->base=="woocommerce_page_cash-on-delivery-fees"){
        wp_enqueue_style( 'cod-font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', false, '1.0' );
        wp_enqueue_style( 'cod-bootstrapcss','https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', false, '1.0' );
        wp_enqueue_style('admin-cod-page-styles', plugin_dir_url( __FILE__ ) . '/assets/admin-cod-page.css' , '1.0', true);
        wp_enqueue_script('admin-cod-page-js', plugin_dir_url( __FILE__ ) . '/assets/admin-cod-page.js', array('jquery'), '1.0', true);
        wp_enqueue_script('bootstrapjs-page', 'https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
        
    }
  
}


function cash_on_delivery_rules() {  
    ?>
<div class="container" style=" margin-left: 0; margin-top: 60px;">
    <h3 style="margin-bottom:20px;">Cash on delivery fees</h3>

    <form id="file-upload-form" class="uploader" action="" method="post" enctype="multipart/form-data">

        <div class="form-row">
            <div class="form-group col-md-4">
                <!-- rule_format -->
                <label for="rule_format">If total is</label>
                <select name="rule_format" class="form-control">
                    <option selected>Select...</option>
                    <option value="is_G">greater than</option>
                    <option value="is_L">less than</option>
                    <option value="is_R">within a range of</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <!-- rule_amount -->
                <label for="rule_amount">Amount</label>
                <input type="text" class="form-control" name="rule_amount">
            </div>

            <div class="form-group col-md-4">
                <!-- rule_fee -->
                <label for="rule_fee">Add fee</label>
                <input type="text" class="form-control" name="rule_fee">
            </div>
            <!-- Action buttons -->
            <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip"
                        data-placement="top" title="Edit"><i class="fa fa-plus"></i></button>
                </li>
                <li class="list-inline-item">
                    <button class="btn btn-danger btn-sm rounded-5
                    " type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"
                            aria-hidden="true"></i></button>
                </li>
            </ul>
        </div>
        <input type="submit" name="submit" value="submit">

    </form>

    <?php
    if (isset($_POST['submit'])) { 
        if (isset($_POST['rule_fee'])) {
            var_dump($_POST);
            
        }
        
    }
?>
</div>
<?php 
}?>