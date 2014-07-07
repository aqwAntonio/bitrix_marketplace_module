<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Бренды");?><?$APPLICATION->IncludeComponent(
	"aqw:store.brands",
	"",
	Array(
	)
);?><?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php')?>