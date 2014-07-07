<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwProduct extends CBitrixComponent
{
    protected $itemID, $colorID, $sizeID;
    protected $emptyPhoto = '/bitrix/templates/aqw_shop/images/no-photo.jpg';

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function init($ID, $COLOR, $SIZE)
    {
        global $APPLICATION;
        $this->setItemID($ID);
        $this->setColorID($COLOR);
        $this->setSizeID($SIZE);
        $sections = $this->getBreadcrumbs();
        if (count($sections) > 0) {
            foreach ($sections as $item) {
                $APPLICATION->AddChainItem($item['NAME'], $item['SECTION_PAGE_URL']);
            }
        }
        $product = $this->getItem();
        if (count($product) > 0) {
            $APPLICATION->AddChainItem($product['NAME'], "#");
            $APPLICATION->SetPageProperty("description", $product['DETAIL_TEXT']);
            $APPLICATION->SetTitle($product['NAME']);
        }
    }

    function setItemID($itemID)
    {
        $this->itemID = $itemID;
    }

    function setColorID($colorID)
    {
        $this->colorID = $colorID;
    }

    function setSizeID($sizeID)
    {
        $this->sizeID = $sizeID;
    }

    function getBreadcrumbs()
    {
        $item = $this->getItem();
        if ($item) {
            $sections = array();
            $getResult = CIBlockSection::GetNavChain($item['IBLOCK_ID'], $item['IBLOCK_SECTION_ID']);
            while ($section = $getResult->GetNext()) {
                $sections[] = $section;
            }
            return $sections;
        }
        return false;
    }

    function getItem()
    {
        $arSelect = Array("*", "PROPERTY_VENDOR.NAME", "PROPERTY_MATERIAL.NAME", "PROPERTY_CML2_ARTICLE","PROPERTY_PHOTOS");
        $arFilter = Array("IBLOCK_ID" => (int)$GLOBALS['AQW_STORE']['IBLOCK_ID'], "ID" => (int)$this->itemID, "GLOBAL_ACTIVE" => "Y");
        $this->navResult = $res = CIBlockElement::GetList(Array("DATE_CREATE" => "DESC"), $arFilter, false, Array("nPageSize" => $this->limit), $arSelect);
        if ($arFields = $res->GetNext()) {
            return $arFields;
        }
        return false;
    }

    function getPhotosByCurrentColor()
    {
        $photos = array();
        $offers = $this->getOffers();
        $byColorID = $this->getColorID();
        foreach ($offers as $offer) {
            if (is_array($offer['PROPERTY_PHOTOS_VALUE']) and count($offer['PROPERTY_PHOTOS_VALUE']) > 0 and $offer['PROPERTY_COLOR_ID'] == $byColorID)
                $photos = $offer['PROPERTY_PHOTOS_VALUE'];
        }
        return $photos;
    }

    function getOffers()
    {
        $offers = array();
        $arSelect = Array(
            "ID",
            "NAME",
            "PROPERTY_COLOR.NAME",
            "PROPERTY_COLOR.ID",
            "PROPERTY_COLOR.SORT",
            "PROPERTY_STD_SIZE.NAME",
            "PROPERTY_STD_SIZE.ID",
            "PROPERTY_STD_SIZE.SORT",
            "PROPERTY_CATALOG_PRICE",
            "PROPERTY_CATALOG_CURRENCY",
            "IBLOCK_ID"
        );
        $arFilter = Array("IBLOCK_ID" => (int)$GLOBALS['AQW_STORE']['LINK_IBLOCK_ID'], "GLOBAL_ACTIVE" => "Y", "PROPERTY_CML2_LINK" => $this->itemID);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while ($arFields = $res->Fetch()) {
            $offers[] = $arFields;
        }
        return $offers;
    }

    function getColorID()
    {
        $colorID = $this->colorID;
        $colors = $this->getColors();
        return (array_key_exists($colorID, $colors)) ? $colorID : key($colors);
    }

    function getSizeID()
    {
        $sizeID = $this->sizeID;
        $sizes = $this->getSizesByCurrentColor();
        return (array_key_exists($sizeID, $sizes)) ? $sizeID : key($sizes);
    }

    function getColors()
    {
        $getOffers = self::getOffers();
        if (count($getOffers) > 0) {
            $colors = array();
            foreach ($getOffers as $offer) {
                if ($offer['PROPERTY_COLOR_ID'] > 0)
                    $colors[$offer['PROPERTY_COLOR_ID']] = $offer['PROPERTY_COLOR_NAME'];
            }
            asort($colors);
            return $colors;
        }
        return array();
    }

    function getPreviewPhoto()
    {
        $item = $this->getItem();
        if ($item['PREVIEW_PICTURE'] > 0)
            return $item['PREVIEW_PICTURE'];

        $photos = $this->getPhotoList();
        foreach ($photos as $photo) {
            return $photo;
        }
        return $this->emptyPhoto;
    }

    function getDetailPhoto()
    {
        $item = $this->getItem();
        if ($item['DETAIL_PICTURE'] > 0)
            return $item['DETAIL_PICTURE'];

        $photos = $this->getPhotoList();
        foreach ($photos as $photo) {
            return $photo;
        }
        return $this->emptyPhoto;
    }

    function getPhotoList()
    {
        $item = $this->getItem();
        return $item['PROPERTY_PHOTOS_VALUE'];
    }

    function getSizesByCurrentColor()
    {
        $sizes = array();
        $getOffers = self::getOffers();
        if (count($getOffers) > 0) {
            $getCurrentColor = $this->getColorID();
            $sizes = array();
            foreach ($getOffers as $offer) {
                if ($getCurrentColor == $offer['PROPERTY_COLOR_ID']) {
                    if ($offer['PROPERTY_STD_SIZE_ID'] > 0)
                        $sizes[$offer['PROPERTY_STD_SIZE_ID']] = array(
                            "NAME"=>$offer['PROPERTY_STD_SIZE_NAME'],
                            "SORT"=>$offer['PROPERTY_STD_SIZE_SORT']
                        );
                }
            }
        }
        uasort($sizes, function($a,$b) {
            if ($a['SORT'] == $b['SORT']) {
                return 0;
            }
            return ($a['SORT'] < $b['SORT']) ? -1 : 1;
        });
        return $sizes;
    }

    function getCurrentPrice()
    {
        $prices = array();
        $getOffers = self::getOffers();
        if (count($getOffers) > 0) {
            $getCurrentColor = $this->getColorID();
            $getCurrentSize = $this->getSizeID();
            foreach ($getOffers as $offer) {
                if ($getCurrentColor == $offer['PROPERTY_COLOR_ID']) {
                    if ($getCurrentSize == $offer['PROPERTY_STD_SIZE_ID'] )
                    {
                        $offer_price = array(
                            'price'=> number_format($offer['PROPERTY_CATALOG_PRICE_VALUE'],0,"."," "),
                            'currency'=>$offer['PROPERTY_CATALOG_CURRENCY_VALUE'],
                        );
                        if(!in_array($offer_price,$prices))
                        {
                            $prices[] = $offer_price;
                        }
                    }
                }
            }
        }
        return $prices;
    }

    function getPrepareCurrentPrice()
    {
        $arr_price = array();
        $prices = $this->getCurrentPrice();
        foreach ($prices as $price) {
            $current_price = $price['price']." ".$price['currency'];
            $arr_price[] = $current_price;
        }
        return implode(" / ", $arr_price);
    }
}