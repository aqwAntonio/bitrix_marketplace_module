<?
$description = array();
$properties = $arResult['COMPONENT']->getProperties();
if (strlen(trim($properties['PROPERTY_VENDOR_NAME'])) > 0)
    $description[] = GetMessage("AQW_SHOP_BREND") . $properties['PROPERTY_VENDOR_NAME'];
if (strlen(trim($properties['PROPERTY_MATERIAL_NAME'])) > 0)
    $description[] = $properties['PROPERTY_MATERIAL_NAME'];

?>
<p class="description"><?= implode("<br>", $description) ?></p>