<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!CModule::IncludeModule("iblock"))
    return false;

$rsIBlock = CIBlock::GetList(array(), array("CODE" => "aqw_shop_material", "TYPE" => "references"));
if ($arIBlock = $rsIBlock->Fetch())
{
    $arSites = array();
    $db_res = CIBlock::GetSite($arIBlock['ID']);
    while ($res = $db_res->Fetch())
        $arSites[] = $res["LID"];
    if (!in_array(WIZARD_SITE_ID, $arSites))
    {
        $arSites[] = WIZARD_SITE_ID;
        $iBlock = new CIBlock;
        $iBlock->Update($arIBlock['ID'], array("LID" => $arSites));
    }
} else {
    $iblockID = WizardServices::ImportIBlockFromXML(
        WIZARD_SERVICE_RELATIVE_PATH . "/xml/" . LANGUAGE_ID . "/material.xml",
        "aqw_shop_material",
        "references",
        WIZARD_SITE_ID
    );
}
?>