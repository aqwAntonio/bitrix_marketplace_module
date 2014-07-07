<?
if (is_array($arResult['ITEMS'])):
    ?>
    <ul class="thumbnails">
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <li class="span3">
                <div class="thumbnail thumbnail-center">
                    <a class="preview" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                        <? $APPLICATION->IncludeComponent("aqw:store.product.photo", "catalog", array("ID"=>$item['ID']), false); ?>
                    </a>

                    <div class="caption">
                        <h3><?= $item['NAME'] ?></h3>
                        <? $APPLICATION->IncludeComponent("aqw:store.product.properties", "catalog", array("ID"=>$item['ID']), false); ?>
                        <? $APPLICATION->IncludeComponent("aqw:store.product.order", "catalog", array("ID" => $item['ID']), false); ?>
                    </div>
                </div>
            </li>
        <? endforeach; ?>
    </ul>
<? endif; ?>
