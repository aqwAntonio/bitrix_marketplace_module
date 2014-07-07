<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var AqwCatalog $this
 */
InitSorting(SITE_DIR);

$this->init($_REQUEST['SECTION_ID']);
if(is_array($_SESSION["SESS_SORT_BY"]) && is_array($_SESSION["SESS_SORT_ORDER"])){
    $this->setOrder(array(reset($_SESSION["SESS_SORT_BY"]) => reset($_SESSION["SESS_SORT_ORDER"])));
}
$arResult['ITEMS'] = $this->getItems();
$arResult['COMPONENT'] = $this;
$this->IncludeComponentTemplate();
?>