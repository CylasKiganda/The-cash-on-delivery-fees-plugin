(function ($) {
  $(function () {
    if (typeof wc_checkout_params === "undefined") {
      return false;
    }

    var $checkout_form = $("form.checkout");

    $checkout_form.on("change", 'input[name="payment_method"]', function () {
      $checkout_form.trigger("update");
    });
  });
})(jQuery);
