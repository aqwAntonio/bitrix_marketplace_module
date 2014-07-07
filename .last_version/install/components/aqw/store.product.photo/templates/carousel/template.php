<?
$photos = $arResult['COMPONENT']->getPhotos();
?>
<? if (count($photos['PROPERTY_PHOTOS_VALUE']) > 1): ?>
    <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <? $first = true;
            foreach ($photos['PROPERTY_PHOTOS_VALUE'] as $photoID): ?>
                <div class="<?= ($first === true) ? "active" : ""; ?> item" align="center"
                     data-slide-number="0">
                    <? echo CFile::ShowImage($photoID, 770, 300); ?>
                </div>
                <? $first = false; endforeach ?>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            jQuery('#myCarousel').carousel({
                interval: 5000
            });
        });
    </script>
<? else: ?>
    <?
    if (count($photos['PROPERTY_PHOTOS_VALUE']) > 0) {
        foreach ($photos['PROPERTY_PHOTOS_VALUE'] as $photoID) $path = $photoID;
    } elseif ($photos['DETAIL_PICTURE'] > 0) {
        $path = $photos['DETAIL_PICTURE'];
    } elseif ($photos['PREVIEW_PICTURE'] > 0) {
        $path = $photos['PREVIEW_PICTURE'];
    } else {
        $path = SITE_TEMPLATE_PATH . '/images/no-photo.jpg';
    }
    ?>
    <div id="myCarousel" style="text-align: center">
        <? echo CFile::ShowImage($path, 770, 300); ?>
    </div>
<?endif; ?>