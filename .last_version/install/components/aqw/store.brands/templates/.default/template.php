<? if (count($arResult['ITEMS']) > 0): ?>
    <? foreach ($arResult['ITEMS'] as $item): ?>
        <div class="row">
            <div class="span8">
                <div class="row">
                    <div class="span8">
                        <h4><strong><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></strong></h4>
                    </div>
                </div>
                <div class="row">

                    <?
                    $ResizeImageGet = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => 260, 'height' => 180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    if (strlen($ResizeImageGet['src']) > 0) {
                        ?>
                        <div class="span2">
                            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="thumbnail"><?
                                print '<img alt="' . htmlspecialchars($item['NAME']) . '" src="' . $ResizeImageGet['src'] . '">';
                                ?>
                            </a>
                        </div>
                    <?
                    }
                    ?>
                    <div class="span6">
                        <p>
                            <?= $item['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <? endforeach ?>
    <?
    $arResult['NAV']->NavPrint(GetMessage("AQW_SHOP_BRENDY"), false, "pagination pull-right","/bitrix/modules/aqw.shop/include/navprint.php");
    ?>
<? endif; ?>