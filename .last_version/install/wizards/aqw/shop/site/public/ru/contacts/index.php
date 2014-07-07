<?include($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Контакты");?> 
<table width="100%" cellpadding="10"> 
  <tbody> 
    <tr valign="top"> <td width="50%"> <?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	".default",
	Array(
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:3:{s:10:\"google_lat\";s:7:\"55.7383\";s:10:\"google_lon\";s:7:\"37.5946\";s:12:\"google_scale\";i:13;}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(0=>"SMALL_ZOOM_CONTROL",1=>"TYPECONTROL",2=>"SCALELINE",),
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",3=>"ENABLE_KEYBOARD",),
		"MAP_ID" => ""
	)
);?> </td> <td width="50%">
            <h3>Россия</h3>
            г. Москва, Московский Проспект, 1000<br>
            <br>
            Служба поддержки:<br>
            8(800)123 45 67<br>
            support@example.com
       </td> </tr>
   </tbody>
 </table>
  <? include($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php') ?>