<?php
?>
<div class="container" style=" margin-left: 0; margin-top: 60px;">
    <h3 style="margin-bottom:20px;">Cash on delivery fees</h3>
    <button class="btn   btn-sm rounded-0 " type="button" data-toggle="tooltip" data-placement="top" title="Add rule"
        style="margin-bottom: 10px;background: #048dcd;color: white;"><i class="fa fa-plus" aria-hidden="true"></i>New
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
        <input type="submit" name="submit" value="Save"
            style=" background: #048dcd;color: white; border:0;padding: 6px 40px;">

    </form>
</div>