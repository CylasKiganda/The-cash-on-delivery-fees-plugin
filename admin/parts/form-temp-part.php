<?php
?>
<div class="rules_container">
    <!-- <input type="hidden" name="updated" value="true" />
            <?php wp_nonce_field( 'custom_cod_rules_update', 'custom_cod_rules_form' ); ?> -->
    <div class="form-row rule">
        <div class="form-group col-md-3">
            <!-- rule_format -->
            <label for="rule_format[]">If checkout total is</label>
            <select name="rule_format[]" class="rule_format form-control" required>
                <option value="" selected>Select...</option>
                <option value="is_equal_to">Equal to ( = )</option>
                <option value="less_equal_to">Less or Equal to ( &lt;= )</option>
                <option value="less_then">Less then ( &lt; )</option>
                <option value="greater_equal_to">greater or Equal to ( &gt;= )</option>
                <option value="greater_then">greater then ( &gt; )</option>
                <option value="not_in">Not Equal to ( != )</option>
                <option value="is_R">within a range of</option>
            </select>
        </div>
        <div class="dynamic_position col-md-4">
            <div class="form-group forgreaterandless">
                <!-- rule_amount -->
                <label for="rule_amount[]">Amount</label>
                <input type="text" class="form-control" name="rule_amount[]" disabled="disabled" required>
            </div>
        </div>

        <div class="form-group col-md-3">
            <!-- rule_fee -->
            <label for="rule_fee[]">Add fee</label>
            <input type="text" class="form-control" name="rule_fee[]" disabled="disabled" required>
        </div>
        <!-- Action buttons -->
        <div class="form-group col-md-2 action-buttons"
            style=" display: flex; flex-direction: row; justify-content: start; align-items: end; ">
            <ul class="list-inline m-0" style=" padding: 0px; ">
                <li class="list-inline-item" style="margin: 2px !important;">
                    <button class="btn btn-danger btn-sm rounded-5 delete_rule" type="button" data-toggle="tooltip"
                        data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </li>
            </ul>
        </div>
    </div>
</div>