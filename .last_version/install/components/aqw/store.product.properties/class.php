<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwProductProperties extends CBitrixComponent
{
    protected $itemID, $colorID, $sizeID;

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function init($ID)
    {
       $this->itemID = $ID;
    }

    function getProperties()
    {
        $arSelect = Array("ID","PROPERTY_VENDOR.NAME","PROPERTY_MATERIAL.NAME");
        $arFilter = Array("IBLOCK_ID" => (int)$GLOBALS['AQW_STORE']['IBLOCK_ID'], "ID" => (int)$this->itemID);
        $res = CIBlockElement::GetList(false, $arFilter, false, false, $arSelect);
        if ($arFields = $res->GetNext()) {
            return $arFields;
        }
        return false;
    }

}