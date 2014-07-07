function product_order_init() {

    $(".product_order_show").unbind('click');
    $(".product_order_show").click(function () {

        $("#orderModal input[name=name]").val("").parent("p").removeClass("control-group error");
        $("#orderModal input[name=phone]").val("").parent("p").removeClass("control-group error");
        $("#orderModal input[name=email]").val("").parent("p").removeClass("control-group error");
        $("#orderModal input[name=product]").val("");
        $("#orderModal input[name=color]").val("");
        $("#orderModal input[name=size]").val("");

        var product = $(this).attr("data-id");
        var color = $('#colorSelect').val();
        var size = $('#sizeSelect').val();
        $("#orderModal input[name=product]").val(product);
        $("#orderModal input[name=color]").val(color);
        $("#orderModal input[name=size]").val(size);

        $('#orderModal .modal-body').show();
        $('#product_order_ajax_layer').hide();

        $('#orderModal h3').show();
        $('#orderModal .h3_order_submit').hide();
    });
    $("form[name=order_form]").unbind('submit');
    $("form[name=order_form]").submit(function () {

        $("#orderModal input[name=name]").parent("p").removeClass("control-group error");
        $("#orderModal input[name=phone]").parent("p").removeClass("control-group error");
        $("#orderModal input[name=email]").parent("p").removeClass("control-group error");

        var product = $("#orderModal input[name=product]").val();
        var name = $("#orderModal input[name=name]").val();
        var phone = $("#orderModal input[name=phone]").val();
        var email = $("#orderModal input[name=email]").val();

        var error = false;

        if (product > 0) {
            if($.trim(name)=="")
            {
                error = true;
                $("#orderModal input[name=name]").parent("p").addClass("control-group error");
            }
            if($.trim(phone)=="" && $.trim(email)=="")
            {
                error = true;
                $("#orderModal input[name=phone]").parent("p").addClass("control-group error");
                $("#orderModal input[name=email]").parent("p").addClass("control-group error");
            }
            if(error == false)
            {
                var params = $(this).serialize();
                $.post("", params + "&PRODUCT_ORDER_AJAX_LOAD=Y", function (data) {
                    $('#orderModal .modal-body').hide();
                    $('#product_order_ajax_layer').show();

                    $('#orderModal h3').hide();
                    $('#orderModal .h3_order_submit').show();
                })
            } else {
                //alert("Пожалуйста, заполните следующие поля:\nимя, телефон или email.");
            }
        } else {
            alert("К сожалению, в настоящее время мы не можем принять заказ на выбранный товар.\nПожалуйста, обратитесь к администратору сайта, если сообщение будет повторяться вновь.");
        }

        return false;
    });
}
$(document).ready(function () {
    product_order_init()
});
$(document).ajaxComplete(function () {
    product_order_init()
});