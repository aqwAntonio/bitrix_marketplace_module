<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
/**
 * @var AqwProduct $this
 */
$this->init($_REQUEST['ID'],$_REQUEST['COLOR'],$_REQUEST['SIZE']);

$arResult['COMPONENT'] = $this;
$arResult['ITEM'] = $this->getItem();
$arResult['OFFERS'] = $this->getOffers();
$arResult['BREADCRUMBS'] = $this->getBreadcrumbs();
$arResult['COLORS'] = $this->getColors();
$arResult['COLOR'] = $this->getColorID();
$arResult['SIZES'] = $this->getSizesByCurrentColor();
$arResult['SIZE'] = $this->getSizeID();
$arResult['PHOTOS'] = $this->getPhotosByCurrentColor();
$arResult['PRICE'] = $this->getPrepareCurrentPrice();

if(!$arResult['ITEM'])
    LocalRedirect("/404.php", "404 Not Found");

if($_REQUEST['PRODUCT_AJAX_LOAD']=='Y')
{
    $APPLICATION->RestartBuffer();
    $this->IncludeComponentTemplate();
    require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_after.php");
    exit();
} else {
    print '<div id="product_ajax_layer">';
    $this->IncludeComponentTemplate();
    print '</div>';
}

$APPLICATION->SetTitle($arResult['ITEM']['NAME']);
?>