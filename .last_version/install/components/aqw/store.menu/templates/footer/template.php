<div class="container" id="footer">
    <? if (count($arResult['MENU']) > 0): ?>
        <div class="row-fluid">
            <div class="span12">
                <?
                foreach ($arResult['MENU'] AS $item):
                    ?>
                    <div class="span2">
                        <ul class="unstyled">
                            <li><?= $item['NAME'] ?></li>
                            <? if (!empty($item['CHILDREN'])): ?>
                                <? foreach ($item['CHILDREN'] as $CHILDREN): ?>
                                    <li><a href="<?= $CHILDREN['SECTION_PAGE_URL'] ?>"><?= $CHILDREN['NAME'] ?></a></li>
                                <? endforeach; ?>
                            <? endif; ?>
                        </ul>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <hr>
    <? endif; ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="span8">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "share",
                        "AREA_FILE_RECURSIVE" => "Y",
                    )
                );?>
            </div>
            <div class="span4">
                <p class="muted pull-right">&copy; <?= date("Y") ?> <?= $arResult['SYSTEM']->getSiteParam('NAME') ?></p>
            </div>
        </div>
    </div>
</div>