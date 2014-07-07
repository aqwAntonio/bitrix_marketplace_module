<div class="modal hide" id="orderModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h3 style="text-align: center"><?=GetMessage("AQW_SHOP_ZAPOLNITE_FORMU_DLA")?></h3>
        <h3 style="text-align: center" class="h3_order_submit"><?=GetMessage("AQW_SHOP_ZAKAZ_OFORMLEN")?></h3>
    </div>
    <div class="modal-body" style="text-align:center;">
        <div class="row-fluid">
            <div class="span10 offset1">
                <div id="modalTab">
                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <form method="post" action='' name="order_form">
                                <p><input type="text" class="span12" name="name" placeholder="<?=GetMessage("AQW_SHOP_IMA")?>"></p>

                                <p><input type="text" class="span12" name="phone" placeholder="<?=GetMessage("AQW_SHOP_TELEFON")?>"></p>


                                <p><input type="text" class="span12" name="email" placeholder="Email"></p>

                                <p>
                                    <button type="submit" class="btn btn-primary"><?=GetMessage("AQW_SHOP_OTPRAVITQ")?></button>
                                </p>
                                <input type="hidden" name="product" value="0">
                                <input type="hidden" name="color" value="0">
                                <input type="hidden" name="size" value="0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body" id="product_order_ajax_layer" style="display:none;text-align:center;">
        <div class="row-fluid">
            <div class="span10 offset1">
                <?=GetMessage("AQW_SHOP_SPASIBO_VASA_ZAAVKA")?></div>
        </div>

    </div>
</div>