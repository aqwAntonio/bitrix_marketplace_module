<div class="row">
    <div class="span3">
        <div class="well" style="padding: 8px 0;">
            <div>
                <ul class="nav nav-list">

                    <li><label class="tree-toggler nav-header"><?=GetMessage("AQW_SHOP_SORTIROVATQ")?></label>
                        <ul class="nav nav-list tree" style="display: none;">
                            <li><label class="tree-toggler nav-header"><?=GetMessage("AQW_SHOP_PO_POPULARNOSTI")?><?=SortingEx("SORT")?></label></li>
                            <li><label class="tree-toggler nav-header"><?=GetMessage("AQW_SHOP_PO_BRENDU")?><?=SortingEx("PROPERTY_VENDOR")?></label></li>
                            <!--<li><label class="tree-toggler nav-header"><?=GetMessage("AQW_SHOP_PO_CENE")?><?=SortingEx("PRICE")?></label></li>-->
                            <li><label class="tree-toggler nav-header"><?=GetMessage("AQW_SHOP_PO_NAZVANIU")?><?=SortingEx("NAME")?></label></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <? $APPLICATION->IncludeComponent("aqw:store.menu", ".default", array(), false); ?>
    </div>
    <div class="span9">
        <?
        if (is_array($arResult['ITEMS'])):
            ?>
            <ul class="thumbnails">
                <? foreach ($arResult['ITEMS'] as $item): ?>
                    <li class="span3">
                        <div class="thumbnail thumbnail-center">
                            <a class="preview" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                <? $APPLICATION->IncludeComponent("aqw:store.product.photo", "catalog", array("ID" => $item['ID']), false); ?>
                            </a>

                            <div class="caption">
                                <h3><?= $item['NAME'] ?></h3>
                                <? $APPLICATION->IncludeComponent("aqw:store.product.properties", "catalog", array("ID" => $item['ID']), false); ?>
                                <p align="center">
                                    <? $APPLICATION->IncludeComponent("aqw:store.product.order", "catalog", array("ID" => $item['ID']), false); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
    </div>
</div>
<?
$arResult['COMPONENT']->navResult->NavPrint(GetMessage("AQW_SHOP_TOVARY"), false, "pagination pull-right", "/bitrix/modules/aqw.shop/include/navprint.php");
?>