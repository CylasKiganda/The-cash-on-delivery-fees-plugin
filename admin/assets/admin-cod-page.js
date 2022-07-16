jQuery(document).ready(($) => {
  $("select").on("change", function () {
    alert(this.value);
  });
  console.log("belo is cool!");
});
