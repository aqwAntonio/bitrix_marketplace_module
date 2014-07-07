<?$APPLICATION->IncludeComponent("bitrix:main.include", "hero", Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "hero",
    )
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "info", Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "info",
    )
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "lead", Array(
        "AREA_FILE_SHOW" => "page",
        "AREA_FILE_SUFFIX" => "lead",
    )
);?>
<?$APPLICATION->IncludeComponent(
    "aqw:store.recommend",
    "main",
    Array()
);?>