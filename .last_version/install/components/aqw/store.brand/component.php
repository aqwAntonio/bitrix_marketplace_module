<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var AqwBrand $this
 */
$this->init($_REQUEST['ID']);
$arResult['ITEM'] = $this->getItem();
$arResult['COMPONENT'] = $this;

if(!$arResult['ITEM'])
    LocalRedirect("/404.php", "404 Not Found");

$this->IncludeComponentTemplate();
?>