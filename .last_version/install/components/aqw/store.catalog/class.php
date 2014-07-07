<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */
class AqwCatalog extends CBitrixComponent
{

    protected $limit = 9, $sectionID = 0, $itemList = array(), $order = Array("SORT" => "ASC", "IBLOCK_SECTION_ID"=>"ASC"), $filter = array();
    public $navResult;

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
        CBitrixComponent::includeComponentClass('aqw:store.product');
    }

    function init($ID)
    {
        $this->setSectionID($ID);
        $sections = $this->getBreadcrumbs();
        if(count($sections)>0)
        {
            global $APPLICATION;
            foreach($sections as $item)
            {
                $APPLICATION->AddChainItem($item['NAME'], $item['SECTION_PAGE_URL']);
            }
            $APPLICATION->SetPageProperty("description", $item['DESCRIPTION']);
            $APPLICATION->SetTitle($item['NAME']);
        }
    }

    function setOrder($order)
    {
        $this->order = $order;
    }

    function getOrder()
    {
        return $this->order;
    }

    function setLimit($limit)
    {
        $this->limit = $limit;
    }

    function setFilter($filter)
    {
        $this->filter = $filter;
    }

    function getFilter()
    {
        $arFilter = $this->filter;
        $arFilter["IBLOCK_ID"] = (int)$GLOBALS['AQW_STORE']['IBLOCK_ID'];
        $arFilter["GLOBAL_ACTIVE"] = "Y";
        return $arFilter;
    }

    function getItems()
    {
        $arItems = array();
        $arSelect = Array("ID");
        $arFilter = $this->getFilter();
        if ($this->getSectionID() > 0) {
            $arFilter['SECTION_ID'] = $this->getSectionID();
            $arFilter['INCLUDE_SUBSECTIONS'] = "Y";
        }
        $iBlock = new CIBlockElement();
        $this->navResult = $res = $iBlock->GetList(
            $this->getOrder(),
            $arFilter,
            false,
            Array("nPageSize" => $this->limit),
            $arSelect
        );
        while ($arFields = $res->GetNext()) {
            $product = new AqwProduct();
            $product->setItemID($arFields['ID']);
            $arItems[] = $product->getItem();
        }
        return $arItems;
    }

    function getSectionID()
    {
        return $this->sectionID;
    }

    function setSectionID($sectionID)
    {
        $this->sectionID = (int)$sectionID;
    }

    function getBreadcrumbs()
    {
        $sections = array();
        $getResult = CIBlockSection::GetNavChain((int)$GLOBALS['AQW_STORE']['IBLOCK_ID'], $this->getSectionID());
        while ($section = $getResult->GetNext()) {
            $sections[] = $section;
        }
        return $sections;
    }
}