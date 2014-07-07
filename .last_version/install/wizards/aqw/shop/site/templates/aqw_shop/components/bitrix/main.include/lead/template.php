<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(file_exists($arResult['FILE']))
{
    ?><p class="lead text-center"><?
    include ($arResult['FILE']);
    ?></p><?
}
