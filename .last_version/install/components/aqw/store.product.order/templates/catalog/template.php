<?
$product = new AqwProduct();
$product->setItemID($arParams['ID']);
$prices = $product->getCurrentPrice();
if(isset($prices[0])){
    $CURRENT_PRICE =  GetMessage("AQW_SHOP_ZAKAZATQ_OT") .implode(" ", $prices[0])."</b>" ;

} else {
    $CURRENT_PRICE = GetMessage("AQW_SHOP_ZAKAZATQ");
}
?>
<a data-toggle="modal" class="btn btn-primary btn-block product_order_show" data-id="<?= $arParams['ID'] ?>"
   href="#orderModal">
    <?= $CURRENT_PRICE ?>
</a>