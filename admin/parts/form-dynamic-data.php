<?php  
if(get_option('belo_cod_rules_data')):
    
  
?>
<div class="rules_container">
    <!-- <input type="hidden" name="updated" value="true" />
            <?php wp_nonce_field( 'custom_cod_rules_update', 'custom_cod_rules_form' ); ?> -->
    <?php  
  foreach(get_option('belo_cod_rules_data') as $rule):
  
?>
    <div class="form-row rule">
        <div class="form-group col-md-3">
            <!-- rule_format -->
            <label for="rule_format[]">If checkout total is</label>
            <select name="rule_format[]" class="rule_format form-control" required>
                <option value="">Select...</option>
                <option value="is_equal_to" <?php if($rule["rule_format"] == "is_equal_to") {echo " selected";}
                     ?>>
                    Equal
                    to (
                    = )</option>
                <option value="less_equal_to" <?php if($rule["rule_format"] == "less_equal_to") {echo " selected";}
                     ?>>Less or Equal to ( &lt;= )</option>
                <option value="less_then" <?php if($rule["rule_format"] == "less_then") {echo " selected";}
                     ?>>Less then ( &lt; )</option>
                <option value="greater_equal_to" <?php if($rule["rule_format"] == "greater_equal_to") {echo " selected";}
                     ?>>greater or Equal to ( &gt;= )</option>
                <option value="greater_then" <?php if($rule["rule_format"] == "greater_then") {echo " selected";}
                     ?>>greater then ( &gt; )</option>
                <option value="not_in" <?php if($rule["rule_format"] == "not_in") {echo " selected";}
                     ?>>Not Equal to ( != )</option>
            </select>
        </div>
        <div class="dynamic_position col-md-4">
            <div class="form-group forgreaterandless">
                <!-- rule_amount -->
                <label for="rule_amount[]">Amount</label>
                <input type="text" class="form-control" name="rule_amount[]" value="<?php if($rule["rule_amount"] ) {echo $rule["rule_amount"];}
                     ?>" required>
            </div>
        </div>

        <div class="form-group col-md-3">
            <!-- rule_fee -->
            <label for="rule_fee[]">Add fee</label>
            <input type="text" class="form-control" name="rule_fee[]" value="<?php if($rule["rule_fee"] ) {echo $rule["rule_fee"];}
                     ?>" required>
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
    <?php  
  endforeach; 
    ?>
</div>
<?php                 
endif;
?>