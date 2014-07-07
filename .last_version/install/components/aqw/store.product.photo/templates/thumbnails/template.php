<?
$photos = $arResult['COMPONENT']->getPhotos();
?>
<? if (count($photos['PROPERTY_PHOTOS_VALUE']) > 1): ?>
<div class="row hidden-phone" id="slider-thumbs">
    <div class="span12">
        <!-- Bottom switcher of slider -->
        <ul class="thumbnails">
            <? foreach ($photos['PROPERTY_PHOTOS_VALUE'] as $photoID): ?>
                <li class="span2">
                    <a class="thumbnail">
                        <? echo CFile::ShowImage($photoID, 170, 100); ?>
                    </a>
                </li>
            <? endforeach ?>
        </ul>
    </div>
</div>
<?endif;?>