<?php

class AqwSystem extends CBitrixComponent {

    function __construct($component = null)
    {;
        parent::__construct($component);
        CModule::IncludeModule('aqw.shop');
    }

    function getSite()
    {
        $site = CSite::GetByID(SITE_ID);
        return $site->Fetch();
    }

    function getSiteParam($paramName)
    {
        $site = self::getSite();
        return $site[$paramName];
    }
}