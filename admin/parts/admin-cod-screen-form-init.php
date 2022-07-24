<?php
include(COD_PLUGIN_PATH .'admin/parts/process.php');
print_r(get_option('belo_cod_rules_data',$added_rules));
//print_r($added_rules);
?>
<div class="container" style=" margin-left: 0; margin-top: 60px;">
    <h3 style="margin-bottom:20px;">Cash on delivery fees</h3>

    <button class="btn   btn-sm rounded-0 add_new_rule" type="button" data-toggle="tooltip" data-placement="top"
        title="Add rule" style="margin-bottom: 10px;background: #048dcd;color: white;"><i class="fa fa-plus"
            aria-hidden="true"></i>New
        rule</button>


    <form id="cod_rules" method="POST" enctype="multipart/form-data" class="was-validated">
        <!-- rule_enable_switch Default checked -->
        <div class="custom-control custom-switch" style=" margin: 20px 0px; ">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="rule_enable_switch"
                <?php if(get_option('rule_enable_switch',$_POST['rule_enable_switch'])) echo " checked";?>>
            <label class="custom-control-label" for="customSwitch1">Enable Rules</label>
        </div>
        <?php
        if(get_option('belo_cod_rules_data',$added_rules)):
            include(COD_PLUGIN_PATH .'admin/parts/form-dynamic-data.php');
             else:
            include(COD_PLUGIN_PATH .'admin/parts/form-temp-part.php');
        endif;
        ?>
        <input type="submit" name="submit" value="Save"
            style=" background: #048dcd;color: white; border:0;padding: 6px 40px;">
    </form>
</div>

<?php