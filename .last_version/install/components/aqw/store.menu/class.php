<?php
/**
 * Created by JetBrains PhpStorm.
 * Project: www-demo1251-test
 * User: anton (aqw.novij@gmail.com)
 * Date: 17.10.13
 * Time: 22:36
 */

class AqwCatalogMenu extends CBitrixComponent {

    protected $arMenu = null, $currentDepthLevel = "1", $sectionID, $treeMenu = array();
    function __construct($component = null)
    {;
        parent::__construct($component);
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('aqw.shop');
    }

    function getMenu()
    {
        if(!is_array($this->arMenu))
        {
            $menu = array();
            $arFilter = array(
                "IBLOCK_ID" => (int)$GLOBALS['AQW_STORE']['IBLOCK_ID'],
               // "GLOBAL_ACTIVE"=>"Y",
            );
            $GetTreeList = CIBlockSection::GetTreeList($arFilter);
            while($item = $GetTreeList->GetNext())
            {
                $menu[$item['ID']] = $item;
            }
            $this->arMenu = $menu;
        }
        return $this->arMenu;
    }

    function getTreeMenu($depth=1,$left=0,$right=1000000)
    {
        $treeMenu = array();
        $menu = $this->getMenu();
        foreach($menu as $item){
            if($item['DEPTH_LEVEL']==$depth and $item['LEFT_MARGIN']>$left and $item['RIGHT_MARGIN']<$right){
                $treeMenu[$item['ID']] = $item;
                $treeMenu[$item['ID']]['CHILDREN'] = $this->getTreeMenu(($item['DEPTH_LEVEL']+1),$item['LEFT_MARGIN'],$item['RIGHT_MARGIN']);
            }
        }
        return $treeMenu;
    }

    function getSectionID()
    {
        return $this->sectionID ;
    }

    function setSectionID($sectionID)
    {
        $this->sectionID = (int)$sectionID;
    }
}