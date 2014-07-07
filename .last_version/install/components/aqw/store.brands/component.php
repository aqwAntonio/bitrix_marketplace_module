<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var AqwCatalog $this
 */
$arResult['ITEMS'] = $this->getItems();
$arResult['BREADCRUMBS'] = $this->getBreadcrumbs();
$arResult['NAV'] = $this->navResult;
$arResult['COMPONENT'] = $this;
$this->IncludeComponentTemplate();
?>