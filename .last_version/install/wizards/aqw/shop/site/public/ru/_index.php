<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');?>
<?
$APPLICATION->SetTitle("Интернет-магазин товаров");?> <?$APPLICATION->IncludeComponent(
	"aqw:store.main",
	"",
	Array(
	)
);?>
<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php')?>