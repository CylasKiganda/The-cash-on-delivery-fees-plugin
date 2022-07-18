<?php
?>
<div class="container" style=" margin-left: 0; margin-top: 60px;">
    <h3 style="margin-bottom:20px;">Cash on delivery fees</h3>

    <button class="btn   btn-sm rounded-0 add_new_rule" type="button" data-toggle="tooltip" data-placement="top"
        title="Add rule" style="margin-bottom: 10px;background: #048dcd;color: white;"><i class="fa fa-plus"
            aria-hidden="true"></i>New
        rule</button>


    <form id="cod_rules" method="POST" enctype="multipart/form-data">
        <!-- rule_enable_switch Default checked -->
        <div class="custom-control custom-switch" style=" margin: 20px 0px; ">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="rule_enable_switch" checked>
            <label class="custom-control-label" for="customSwitch1">Enable Rules</label>
        </div>
        <div class="rules_container">
            <!-- <input type="hidden" name="updated" value="true" />
            <?php wp_nonce_field( 'custom_cod_rules_update', 'custom_cod_rules_form' ); ?> -->
            <div class="form-row rule">
                <div class="form-group col-md-3">
                    <!-- rule_format -->
                    <label for="rule_format[]">If order total is</label>
                    <select name="rule_format[]" class="rule_format form-control">
                        <option value="null" selected>Select...</option>
                        <option value="is_G">greater than</option>
                        <option value="is_L">less than</option>
                        <option value="is_R">within a range of</option>
                    </select>
                </div>
                <div class="dynamic_position col-md-4">
                    <div class="form-group forgreaterandless">
                        <!-- rule_amount -->
                        <label for="rule_amount[]">Amount</label>
                        <input type="text" class="form-control" name="rule_amount[]" disabled="disabled">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <!-- rule_fee -->
                    <label for="rule_fee[]">Add fee</label>
                    <input type="text" class="form-control" name="rule_fee[]" disabled="disabled">
                </div>
                <!-- Action buttons -->
                <div class="form-group col-md-2 action-buttons"
                    style=" display: flex; flex-direction: row; justify-content: start; align-items: end; ">
                    <ul class="list-inline m-0" style=" padding: 0px; ">
                        <li class="list-inline-item" style="margin: 2px !important;">
                            <button class="btn btn-danger btn-sm rounded-5 delete_rule" type="button"
                                data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <input type="submit" name="submit" value="Save"
            style=" background: #048dcd;color: white; border:0;padding: 6px 40px;">
    </form>
</div>