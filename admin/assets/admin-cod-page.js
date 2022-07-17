jQuery(document).ready(($) => {
  // on select rule format
  $(document).on("change", ".rule_format", function () {
    let dynamic_section = $(this).parent().parent().find(".dynamic_position");

    if (this.value == "is_R") {
      if (!dynamic_section.find(".forwithinrange").length > 0) {
        dynamic_section.find(".forgreaterandless").remove();
        dynamic_section.append(
          '<div class="row forwithinrange"> <div class="form-group col-md-5"> <!-- rule_amount_from --> <label for="rule_amount_from">From</label> <input type="text" class="form-control" name="rule_amount_from"> </div> <div style="align-items: center; display: flex; padding: 0; justify-content: center; margin-top: 12px;" class=" col-md-1 dash">—</div> <div class="form-group col-md-5"> <!-- rule_amount_to --> <label for="rule_amount_to">To</label> <input type="text" class="form-control" name="rule_amount_to"> </div> </div>'
        );
      }
    } else {
      if (!dynamic_section.find(".forgreaterandless").length > 0) {
        dynamic_section.find(".forwithinrange").remove();
        dynamic_section.append(
          '<div class="form-group forgreaterandless"> <!-- rule_amount --> <label for="rule_amount">Amount</label> <input type="text" class="form-control" name="rule_amount"> </div>'
        );
      }
    }
  });

  // on click new_rule button
  $(document).on("click", ".add_new_rule", function () {
    let parent_form = $("#cod_rules");
    parent_form
      .find(".rules_container")
      .append(
        '<div class="form-row rule"> <div class="form-group col-md-3"> <!-- rule_format --> <label for="rule_format[]">If total is</label> <select name="rule_format[]" class="rule_format form-control"> <option selected="">Select...</option> <option value="is_G">greater than</option> <option value="is_L">less than</option> <option value="is_R">within a range of</option> </select> </div> <div class="dynamic_position col-md-4"> <div class="form-group forgreaterandless"> <!-- rule_amount --> <label for="rule_amount[]">Amount</label> <input type="text" class="form-control" name="rule_amount[]"> </div></div> <div class="form-group col-md-3"> <!-- rule_fee --> <label for="rule_fee[]">Add fee</label> <input type="text" class="form-control" name="rule_fee[]"> </div> <!-- Action buttons --> <div class="form-group col-md-2 action-buttons" style=" display: flex; flex-direction: row; justify-content: start; align-items: end; "> <ul class="list-inline m-0" style=" padding: 0px; "> <li class="list-inline-item" style="margin: 2px !important;"> <button class="btn btn-danger btn-sm rounded-5 delete_rule" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button> </li> </ul> </div> </div>'
      );
  });

  // on click delete button
  $(document).on("click", ".delete_rule", function (e) {
    e.preventDefault();
    console.log(this);
    $(this).parents(".rule").remove();
  });
});
