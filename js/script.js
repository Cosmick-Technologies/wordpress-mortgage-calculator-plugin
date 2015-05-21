jQuery(document).ready(function($) {
  $(".sfc_calculator .pick-length a").click(function(e) {
    $(this).parents(".pick-length").first().find("button").html($(this).text() + ' <span class="caret"></span>');
    $(this).parents(".pick-length").first().find("input").attr("name", $(this).attr("data-input-name"));
    $(this).parents(".pick-length").first().find("input").val("");

    e.preventDefault();
  });

  $('form.sfc_calculator').submit(function(e) {
    var form = $(this);
    var DOWN_PAYMENT = form.find('input[name="DOWN_PAYMENT"]').val();
    var PRINCIPAL_AMOUNT = (form.find('input[name="PRINCIPAL_AMOUNT"]').val() - DOWN_PAYMENT);
    var INTEREST_RATE = (form.find('input[name="INTEREST_RATE"]').val() / 100);
    var MONTHLY_RATE = (INTEREST_RATE / 12);
    var YEAR_LENGTH = form.find('input[name="YEAR_LENGTH"]');
    var MONTH_LENGTH = (YEAR_LENGTH.length > 0) ? (YEAR_LENGTH.val() * 12) : form.find('input[name="MONTH_LENGTH"]').val();
    var VALUE = PRINCIPAL_AMOUNT * (MONTHLY_RATE * Math.pow((1 + MONTHLY_RATE), MONTH_LENGTH)) / (Math.pow((1 + MONTHLY_RATE), MONTH_LENGTH) - 1);

    form.find('input[name="MONTHLY_PAYMENT"]').val(VALUE.toFixed(2));

    e.preventDefault();
  });
});