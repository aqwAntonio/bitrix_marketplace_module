<? if (count($item = $arResult['ITEM']) > 0): ?>
    <div class="row">
        <div class="span8">
            <div class="row">
                <?
                $ResizeImageGet = CFile::ResizeImageGet($item['DETAIL_PICTURE'], array('width' => 260, 'height' => 180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                if (strlen($ResizeImageGet['src']) > 0) {
                    ?>
                    <div class="span2">
                        <?
                        print '<img alt="' . htmlspecialchars($item['NAME']) . '" src="' . $ResizeImageGet['src'] . '">';
                        ?>
                    </div>
                <?
                }
                ?>
                <div class="span6">
                    <p>
                        <?= $item['DETAIL_TEXT'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
<? endif; ?>