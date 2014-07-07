<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CBitrixComponent::includeComponentClass('aqw:store.catalog');
$catalog = new AqwCatalog();
$catalog->setOrder(array("RAND"=>"RAND"));
$catalog->setLimit(8);
$catalog->setFilter(array(">PROPERTY_VENDOR.ID"=>0, ">PROPERTY_MATERIAL.ID"=>0));
$arResult['ITEMS'] = $catalog->getItems();
$this->IncludeComponentTemplate();
?>