jQuery(document).ready(($) => {
  // on select rule format
  $(document).on("change", ".rule_format", function () {
    let dynamic_section = $(this).parent().parent().find(".dynamic_position");

    if (this.value != "") {
      $(this).parent().parent().find("input").removeAttr("disabled");
    } else {
      $(this).parent().parent().find("input").attr("disabled", "disabled");
      $(this).parent().parent().find("input").val("");
    }
  });

  // on click new_rule button
  $(document).on("click", ".add_new_rule", function () {
    let parent_form = $("#cod_rules");
    parent_form
      .find(".rules_container")
      .append(
        '<div class="form-row rule"> <div class="form-group col-md-3"> <!-- rule_format --> <label for="rule_format[]">If order total is</label><select name="rule_format[]" class="rule_format form-control" required> <option value="" selected>Select...</option> <option value="is_equal_to">Equal to ( = )</option> <option value="less_equal_to">Less or Equal to ( &lt;= )</option> <option value="less_then">Less then ( &lt; )</option> <option value="greater_equal_to">greater or Equal to ( &gt;= )</option> <option value="greater_then">greater then ( &gt; )</option> <option value="not_in">Not Equal to ( != )</option> </select> </div> <div class="dynamic_position col-md-4"> <div class="form-group forgreaterandless"> <!-- rule_amount --> <label for="rule_amount[]">Amount</label> <input  disabled="disabled" type="text" class="form-control" name="rule_amount[]" required> </div></div> <div class="form-group col-md-3"> <!-- rule_fee --> <label for="rule_fee[]">Add fee</label> <input  disabled="disabled" type="text" class="form-control" name="rule_fee[]"  required> </div> <!-- Action buttons --> <div class="form-group col-md-2 action-buttons" style=" display: flex; flex-direction: row; justify-content: start; align-items: end; "> <ul class="list-inline m-0" style=" padding: 0px; "> <li class="list-inline-item" style="margin: 2px !important;"> <button class="btn btn-danger btn-sm rounded-5 delete_rule" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button> </li> </ul> </div> </div>'
      );
  });

  // on click delete button
  $(document).on("click", ".delete_rule", function (e) {
    e.preventDefault();
    if ($(".rules_container").children(".rule").length > 1) {
      $(this).parents(".rule").remove();
    } else {
      $(".rule_format").val("").trigger("change");
      $(".rule input.form-control").val("");
      if ($(".rule_format").val() == "") {
        $(".rule_format").removeAttr("required");
        $("#customSwitch1").removeAttr("checked");
        alert("The rules have been reset! You can save the changes");
      }
    }
  });

  function iputvalidation() {
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g, ""));
    if ($input.hasClass("rule_error")) {
      $input.removeClass("rule_error");
    }
  }
  $(document).on("propertychange input", 'input[type="text"]', iputvalidation);

  // form validations
  $("form").submit(function (e) {
    var validationStatus = true;
    // do your validation here ...
    if (!validationStatus) {
      e.preventDefault();
      alert("The 'To' value must be larger than the 'From'.");
      return false;
    }
  });
});
