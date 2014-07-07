<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница 404");
$APPLICATION->AddChainItem("Страница 404", "#");
?>
    <style>
    .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto; padding: 10px;}
</style>
    <div class="hero-unit center">
        <h1>Страница не найдена</h1>
        <br />
        <p>Страница, которую вы запросили, не может быть показана. Обратитесь к администратору сайта или обновите страницу через некоторое время. Используйте кнопку <b>Назад</b> в браузере для возврата на предыдущую страницу</p>
        <p><b>или просто нажмите на кнопку:</b></p>
        <a href="<?=SITE_DIR?>" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Перейти на главную страницу сайта</a>
    </div>
    <br />
 <?$APPLICATION->IncludeComponent(
    "aqw:store.recommend",
    "",
    Array(
    )
);?>
    <!-- By ConnerT HTML & CSS Enthusiast -->
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php')?>