<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

//echo "<pre>"; print_r($arResult);echo "</pre>";

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

?>

<div class="pagination pull-right">
    <ul>

        <? if ($arResult["bDescPageNumbering"] === true): ?>

            <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                <? if ($arResult["bSavePage"]): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= GetMessage("nav_begin") ?></a>
                    </li>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                    </li>

                <? else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_begin") ?></a>
                    </li>

                    <? if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"] + 1)): ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>

                    <? else: ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>

                    <?endif ?>
                <?endif ?>
            <? else: ?>

            <?endif ?>

            <? while ($arResult["nStartPage"] >= $arResult["nEndPage"]): ?>
                <? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li class="active"><a><?= $NavRecordGroupPrint ?></a></li>
                <? elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $NavRecordGroupPrint ?></a>
                    </li>
                <?
                else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
                    </li>
                <?endif ?>

                <? $arResult["nStartPage"]-- ?>
            <? endwhile ?>



            <? if ($arResult["NavPageNomer"] > 1): ?>
                <li>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_next") ?></a>
                </li>

                <li>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= GetMessage("nav_end") ?></a>
                </li>
            <? else: ?>

            <?endif ?>

        <? else: ?>

            <? if ($arResult["NavPageNomer"] > 1): ?>

                <? if ($arResult["bSavePage"]): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= GetMessage("nav_begin") ?></a>
                    </li>

                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                    </li>

                <? else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_begin") ?></a>
                    </li>

                    <? if ($arResult["NavPageNomer"] > 2): ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>
                    <? else: ?>
                        <li>
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>
                    <?endif ?>

                <?endif ?>

            <? else: ?>

            <?endif ?>

            <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li class="active"><a><?= $arResult["nStartPage"] ?></a></li>
                <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <?
                else: ?>
                    <li>
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <?endif ?>
                <? $arResult["nStartPage"]++ ?>
            <? endwhile ?>


            <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                <li>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_next") ?></a>
                </li>
                <li>
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= GetMessage("nav_end") ?></a>
                </li>
            <? else: ?>

            <?endif ?>

        <?endif ?>


        <? if ($arResult["bShowAll"]): ?>
            <? if ($arResult["NavShowAll"]): ?>
                <li><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=0"
                       rel="nofollow"><?= GetMessage("nav_paged") ?></a></li>
            <? else: ?>
                <li><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=1"
                       rel="nofollow"><?= GetMessage("nav_all") ?></a></li>
            <?endif ?>
        <? endif ?>

    </ul>
</div>