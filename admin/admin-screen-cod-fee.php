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
    <button class="btn btn-primary btn-sm rounded-0 " type="button" data-toggle="tooltip" data-placement="top"
        title="Add rule" style="margin-bottom: 10px;"><i class="fa fa-plus" aria-hidden="true"></i>New
        rule</button>
    <form id="cod_rules" action="" method="post" enctype="multipart/form-data">

        <div class="form-row">
            <div class="form-group col-md-3">
                <!-- rule_format -->
                <label for="rule_format">If total is</label>
                <select name="rule_format" class="form-control">
                    <option selected>Select...</option>
                    <option value="is_G">greater than</option>
                    <option value="is_L">less than</option>
                    <option value="is_R">within a range of</option>
                </select>
            </div>
            <div class="dynamic_position col-md-4">
                <div class="form-group " style="display:none;">
                    <!-- rule_amount -->
                    <label for="rule_amount">Amount</label>
                    <input type="text" class="form-control" name="rule_amount">
                </div>
                <div class="row" style=" justify-content: center; ">
                    <div class="form-group col-md-5">
                        <!-- rule_amount_from -->
                        <label for="rule_amount_from">From</label>
                        <input type="text" class="form-control" name="rule_amount_from">
                    </div>
                    <div class=" col-md-1" style="
                        align-items: center;
                        display: flex;
                        padding: 0;
                        justify-content: center;
                        margin-top: 12px;
                    ">—</div>
                    <div class="form-group col-md-5">
                        <!-- rule_amount_to -->
                        <label for="rule_amount_to">To</label>
                        <input type="text" class="form-control" name="rule_amount_to">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <!-- rule_fee -->
                <label for="rule_fee">Add fee</label>
                <input type="text" class="form-control" name="rule_fee">
            </div>
            <!-- Action buttons -->
            <div class="form-group col-md-2 action-buttons"
                style=" display: flex; flex-direction: row; justify-content: start; align-items: end; ">
                <ul class="list-inline m-0" style=" padding: 0px; ">
                    <li class="list-inline-item" style="margin: 2px !important;">
                        <button class="btn btn-danger btn-sm rounded-5 " type="button" data-toggle="tooltip"
                            data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </li>
                </ul>
            </div>
        </div>
        <input class="bg-primary" type="submit" name="submit" value="Save"
            style="color:white;border:0;padding: 6px 40px;">

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