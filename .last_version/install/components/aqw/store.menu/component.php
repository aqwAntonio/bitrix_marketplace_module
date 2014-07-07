<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CBitrixComponent::includeComponentClass('aqw:store.system');
$arResult['SYSTEM']  = new AqwSystem();
/**
 * @var AqwCatalogMenu $this
 * @var $arResult
 */
$this->setSectionID($_REQUEST['SECTION_ID']);
$arResult['MENU'] = $this->getTreeMenu();
if(count($arResult['MENU'])>0)
{
    $arResult['ACTIVE_ID'] = $this->getSectionID();
    $this->IncludeComponentTemplate();
}
?>