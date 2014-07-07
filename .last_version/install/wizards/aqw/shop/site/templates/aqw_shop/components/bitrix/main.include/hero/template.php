<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(file_exists($arResult['FILE']))
{
    ?><div class="hero-unit"><?
    include ($arResult['FILE']);
    ?></div><?
}
