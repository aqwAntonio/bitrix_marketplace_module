<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwProductOrder extends CBitrixComponent
{

    function __construct($component = null)
    {
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function addOrder($data)
    {
        if ($data['product'] > 0 and
            strlen(trim($data['name'])) > 0 and
            (
                strlen(trim($data['phone'])) > 0 or
                strlen(trim($data['email'])) > 0
            )
        ) {
            /**
             * save form
             */
            $arFields = array(
                'IBLOCK_ID' => (int)$GLOBALS['AQW_ORDER']['IBLOCK_ID'],
                'NAME' => GetMessage("AQW_SHOP_NOVYY_ZAKAZ_OT") . date("d.m.Y H:i:s"),
                'PROPERTY_VALUES' => array(
                    'PRODUCT' => $data['product'],
                    'COLOR' => $data['color'],
                    'SIZE' => $data['size'],
                    'NAME' => $data['name'],
                    'PHONE' => $data['phone'],
                    'EMAIL' => $data['email'],
                    'ORDER_URL' => getenv("REQUEST_URI")
                ),
            );
            $iBlock = new CIBlockElement();
            $ORDER_ID = $iBlock->Add($arFields);

            /**
             * send email
             */
            $arEventFields = array(
                "IBLOCK_TYPE" => $GLOBALS['AQW_ORDER']['IBLOCK_TYPE'],
                "IBLOCK_ID" => (int)$GLOBALS['AQW_ORDER']['IBLOCK_ID'],
                "ORDER_ID" => $ORDER_ID,
                "PRODUCT" => $data['product'],
                "COLOR" => $data['color'],
                "SIZE" => $data['size'],
                "NAME" => $data['name'],
                "PHONE" => $data['phone'],
                "EMAIL" => $data['email'],
                "ORDER_URL" => getenv("REQUEST_URI")
            );
            CEvent::Send("NEW_ORDER", SITE_ID, $arEventFields);
        }
    }
}