<?
if (is_array($arResult['ITEMS']) and count($arResult['ITEMS'])>0):
    ?>
    <div class="thumbnail">
        <h2 class="center"><?=GetMessage("AQW_SHOP_TAKJE_REKOMENDUEM")?></h2>
    </div>
    <br/>
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $key => $item):if ($key > 3) break; ?>
            <div class=" span3 thumbnail-center ">
                <h3><?= $item['NAME'] ?></h3>
                <? $APPLICATION->IncludeComponent("aqw:store.product.properties", "catalog", array("ID" => $item['ID']), false); ?>
                <div class="hero-unit">
                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" style="height: 100px; display: block; ">
                        <? $APPLICATION->IncludeComponent("aqw:store.product.photo", "recommend", array("ID" => $item['ID']), false); ?>
                    </a>
                </div>
                <? $APPLICATION->IncludeComponent("aqw:store.product.order", "product", array("ID" => $item['ID']), false); ?>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
