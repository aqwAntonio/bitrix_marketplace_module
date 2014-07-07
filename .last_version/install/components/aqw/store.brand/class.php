<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwBrand extends CBitrixComponent
{

    protected $limit = 9, $itemList = array(), $itemID;
    public $navResult;

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function init($ID)
    {
        $this->setItemID($ID);
        $item = $this->getItem();
        if($item)
        {
            global $APPLICATION;
            $APPLICATION->AddChainItem($item['NAME'], $item['DETAIL_PAGE_URL']);
            $APPLICATION->SetTitle($item['NAME']);
            $APPLICATION->SetPageProperty("description", $item['PREVIEW_TEXT']);
        }
    }

    function setItemID($ID)
    {
        $this->itemID = (int)$ID;
    }

    function getItemID()
    {
        return $this->itemID;
    }

    function getItem()
    {
        $arSelect = Array();
        $arFilter = Array("IBLOCK_ID" => (int)$GLOBALS['AQW_BRANDS']['IBLOCK_ID'], "ID" => $this->getItemID(), "GLOBAL_ACTIVE" => "Y");
        $res = CIBlockElement::GetList(Array("DATE_CREATE" => "DESC"), $arFilter, false, Array("nPageSize" => $this->limit), $arSelect);
        return $res->GetNext();
    }
}