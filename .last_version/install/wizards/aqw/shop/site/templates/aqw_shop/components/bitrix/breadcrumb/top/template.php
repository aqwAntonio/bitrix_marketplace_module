<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
ob_start();
 if (count($arResult) > 1): ?>
    <ul class="breadcrumb">
        <?$BREADCRUMBS = array_slice($arResult, 0, -1);?>
        <? foreach ($BREADCRUMBS as $key => $item): ?>
            <li><a href="<?= $item['LINK'] ?>">
                    <?= $item['TITLE'] ?></a>
                <span class="divider">/</span>
            </li>
        <? endforeach ?>
        <li class="active">
            <? $endItemMenu = end($arResult); print($endItemMenu['TITLE']);?>
        </li>
    </ul>
<?
endif;
$content = ob_get_contents();
ob_end_clean();
return $content;