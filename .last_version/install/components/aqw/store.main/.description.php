<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("AQW_SHOP_COMPONENT_NAME"),
	"DESCRIPTION" => GetMessage("AQW_SHOP_COMPONENT_DESCRIPTION"),
	"ICON" => "/images/catalog.gif",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "catalog",
			"NAME" => GetMessage("T_IBLOCK_DESC_CATALOG"),
		),
	),
);

?>