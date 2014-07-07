<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult)>0):
?>
<ul class="nav">
    <?foreach($arResult as $item):?>
    <li class="<?=($item['SELECTED'])?'active':'';?>">
        <a href="<?=$item['LINK']?>">
            <?=$item['TEXT']?>
        </a>
    </li>
    <?endforeach?>
</ul>
<?endif;?>