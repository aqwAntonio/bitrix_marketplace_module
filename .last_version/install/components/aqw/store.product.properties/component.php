<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->init($arParams['ID']);
$arResult['COMPONENT'] = $this;
$this->IncludeComponentTemplate();
