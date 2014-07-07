<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link href="<?=SITE_DIR?>bootstrap/css/bootstrap.min.css" type="text/css"  rel="stylesheet" />
    <link href="<?=SITE_DIR?>bootstrap/css/bootstrap-responsive.min.css" type="text/css"  rel="stylesheet" />
    <?php
    CJSCore::Init(array('jquery'));
    $APPLICATION->ShowHead();
    ?>
</head>

<body>
<?php
$APPLICATION->ShowPanel();
?>
<div class="container">
    <div class="head">
        <div class="row-fluid">
            <div class="span12">
                <? $APPLICATION->IncludeComponent("aqw:store.system", "site_name", array(), false); ?>
            </div>
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                            "ROOT_MENU_TYPE" => "top",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "top",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => ""
                        )
                    );?>
                    <form id="custom-search-form" action="<?= SITE_DIR ?>search/"
                          class="form-search form-horizontal pull-right">
                        <div class="input-append">
                            <input type="text" name="q" class="search-query" placeholder="<?=GetMessage("SEARCH")?>">
                            <button type="submit" class="btn"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a name="nav_start"></a>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "top", Array(
        "START_FROM" => "0",
        "SITE_ID" => SITE_ID
    )
);?>