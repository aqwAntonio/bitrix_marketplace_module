<!-- Main Area -->

<div id="main_area">
    <!-- Slider -->
    <div class="row">
        <div class="span12" id="slider">
            <!-- Top part of the slider -->
            <div class="row">
                <div class="span8" id="carousel-bounding-box">
                    <? $APPLICATION->IncludeComponent("aqw:store.product.photo", "carousel", array("ID" => $arResult['ITEM']['ID']), false); ?>
                </div>
                <div class="span4" id="carousel-text">

                    <div id="slide-content">
                        <div>
                            <? if (count($arResult['OFFERS']) > 0): ?>
                                <form action="" name="order" method="post" role="form">
                                    <fieldset>
                                        <? if (count($arResult['COLORS']) > 0): ?>
                                            <div class="form-group">
                                                <label for="colorSelect"><?=GetMessage("AQW_SHOP_VYBERITE_CVET")?></label>
                                                <select id="colorSelect" name="COLOR" class="form-control">
                                                    <? foreach ($arResult['COLORS'] as $colorKey => $colorName): ?>
                                                        <? $selected = ($arResult['COLOR'] == $colorKey) ? 'selected="selected"' : '' ?>
                                                        <option <?= $selected ?>
                                                            value="<?= $colorKey ?>"><?= $colorName ?></option>
                                                    <? endforeach ?>
                                                </select>
                                            </div>
                                        <? endif ?>
                                        <? if (count($arResult['SIZES']) > 0): ?>
                                            <div class="form-group">
                                                <label for="sizeSelect"><?=GetMessage("AQW_SHOP_VYBERITE_RAZMER")?></label>
                                                <select id="sizeSelect" name="SIZE" class="form-control">
                                                    <? foreach ($arResult['SIZES'] as $sizeKey => $sizeName): ?>
                                                        <? $selected = ($arResult['SIZE'] == $sizeKey) ? 'selected="selected"' : '' ?>
                                                        <option <?= $selected ?>
                                                            value="<?= $sizeKey ?>"><?= $sizeName['NAME'] ?></option>
                                                    <? endforeach ?>
                                                </select>
                                            </div>
                                        <? endif ?>
                                        <div class="row">
                                            <div class="span1">
                                                <? $APPLICATION->IncludeComponent("aqw:store.product.order", "product", array("ID" => $arResult['ITEM']['ID']), false); ?>
                                            </div>
                                            <div class="span3">
                                                    <span class="item-price">
                                                        <?= $arResult['PRICE']; ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "product", Array(
                                        "AREA_FILE_SHOW" => "sect",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "AREA_FILE_RECURSIVE" => "Y",
                                    )
                                );?>
                            <? else: ?>
                                <p><?=GetMessage("AQW_SHOP_DLA_DANNOGO_TOVARA_O")?></p>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/Slider-->
    <? $APPLICATION->IncludeComponent("aqw:store.product.photo", "thumbnails", array("ID" => $arResult['ITEM']['ID']), false); ?>
</div>

<? if (trim($arResult['ITEM']['DETAIL_TEXT']) <> ""): ?>
    <div class="row">
        <div class="span12">
            <h3><?= $arResult['ITEM']['NAME'] ?></h3>

            <p><?= $arResult['ITEM']['PREVIEW_TEXT'] ?></p>

            <p><? print($arResult['ITEM']['DETAIL_TEXT']) ?></p>
        </div>
    </div>
<? endif; ?>
<div class="row">
    <? if (trim($arResult['ITEM']['PROPERTY_VENDOR_NAME']) <> ""): ?>
        <div class="span12">
            <?=GetMessage("AQW_SHOP_BREND")?><b>
                <?= $arResult['ITEM']['PROPERTY_VENDOR_NAME'] ?>
            </b>
        </div>
    <? endif; ?>
    <? if (trim($arResult['ITEM']['PROPERTY_MATERIAL_NAME']) <> ""): ?>
        <div class="span12">
            <?=GetMessage("AQW_SHOP_MATERIAL")?><b>
                <?= $arResult['ITEM']['PROPERTY_MATERIAL_NAME'] ?>
            </b>
        </div>
    <? endif; ?>
    <? if (trim($arResult['ITEM']['PROPERTY_CML2_ARTICLE_VALUE']) <> ""): ?>
        <div class="span12">
            <?=GetMessage("AQW_SHOP_ARTIKUL")?><b>
                <?= $arResult['ITEM']['PROPERTY_CML2_ARTICLE_VALUE'] ?>
            </b>
        </div>
    <? endif; ?>
</div>
<div id="productName<?= $arResult['ITEM']['ID'] ?>" style="display: none">
    <?= $arResult['ITEM']['NAME'] ?>
</div>