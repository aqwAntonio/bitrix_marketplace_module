<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if($_REQUEST['PRODUCT_ORDER_AJAX_LOAD']=='Y')
{
    /**
     * clear output content
     */
    $APPLICATION->RestartBuffer();
    /**
     * encode request
     */
    foreach($_REQUEST as &$item)
        $item = iconv("UTF-8",LANG_CHARSET,$item);
    /**
     * add new order
     */
    $this->addOrder($_REQUEST);
    /**
     * set footer
     */
    require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_after.php");
    exit();
} else {
    $this->IncludeComponentTemplate();
}
