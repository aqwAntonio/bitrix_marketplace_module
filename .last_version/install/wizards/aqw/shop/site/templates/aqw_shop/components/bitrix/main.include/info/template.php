<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(file_exists($arResult['FILE']))
{
    ?><h2 class="text-info text-center"><?
    include ($arResult['FILE']);
    ?></h2><?
}
