/**
 * Created by anton on 20.11.13.
 */
function product_reload() {
    $("#colorSelect, #sizeSelect").change(function () {
        var params = $("form[name=order]").serialize();
        $.post("", params + "&PRODUCT_AJAX_LOAD=Y", function (data) {
            $("#product_ajax_layer").html(data);
            product_reload();
        })
    });
}
$(document).ready(function () {
    product_reload();
});
