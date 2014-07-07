<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Каталог товаров");
?><?$APPLICATION->IncludeComponent(
	"aqw:store.catalog",
	"",
	Array(
	)
);?><?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php')?>