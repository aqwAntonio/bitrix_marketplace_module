<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwBrands extends CBitrixComponent
{

    protected $limit = 9, $itemList = array();
    public $navResult;

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function getItems()
    {
        $arItems = array();
        $arSelect = Array();
        $arFilter = Array("IBLOCK_ID" => (int)$GLOBALS['AQW_BRANDS']['IBLOCK_ID'], "GLOBAL_ACTIVE" => "Y");
        $this->navResult = $res = CIBlockElement::GetList(Array("NAME"=> "ASC"), $arFilter, false, Array("nPageSize" => $this->limit), $arSelect);
        while ($arFields = $res->GetNext()) {
            $arItems[] = $arFields;
        }
        return $arItems;
    }

    function getBreadcrumbs()
    {
        return array();
    }
}