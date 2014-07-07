<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	
	if(!CModule::IncludeModule("iblock")) return;
	
	$arTypes = Array(
		Array(
			"ID"		=> "catalog",
			"SECTIONS"	=> "Y",
			"IN_RSS"	=> "N",
			"SORT"		=> 500,
			"LANG"		=> array(),
		),
        Array(
            "ID"		=> "offers",
            "SECTIONS"	=> "Y",
            "IN_RSS"	=> "N",
            "SORT"		=> 500,
            "LANG"		=> array(),
        ),
        Array(
            "ID"		=> "orders",
            "SECTIONS"	=> "Y",
            "IN_RSS"	=> "N",
            "SORT"		=> 500,
            "LANG"		=> array(),
        ),
        Array(
            "ID"		=> "references",
            "SECTIONS"	=> "Y",
            "IN_RSS"	=> "N",
            "SORT"		=> 500,
            "LANG"		=> array(),
        ),
	);
	
	$arLanguages = Array();
	$rsLanguage = CLanguage::GetList($by, $order, array());
	while($arLanguage = $rsLanguage -> Fetch())
		$arLanguages[] = $arLanguage["LID"];
	
	$iblockType = new CIBlockType;
	
	foreach($arTypes as $arType)
	{
		$dbType = CIBlockType::GetList(array(), array("=ID" => $arType["ID"]));
		if( $dbType -> Fetch() )
			continue;
		
		foreach($arLanguages as $languageID)
		{
			
			$code = strtoupper($arType["ID"]);
			$arType["LANG"][$languageID]["NAME"] = GetMessage($code."_TYPE_NAME");
			$arType["LANG"][$languageID]["ELEMENT_NAME"] = GetMessage($code."_ELEMENT_NAME");
	
			if ($arType["SECTIONS"] == "Y")
				$arType["LANG"][$languageID]["SECTION_NAME"] = GetMessage($code."_SECTION_NAME");
		}
		$res = $iblockType -> Add($arType);
	}
	
	COption::SetOptionString('iblock','combined_list_mode','Y');
?>