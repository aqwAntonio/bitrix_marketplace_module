<?
$photos = $arResult['COMPONENT']->getPhotos();
if ($photos['PREVIEW_PICTURE'] > 0) {
    $path = $photos['PREVIEW_PICTURE'];
} elseif (is_array($photos['PROPERTY_PHOTOS_VALUE'])) {
    foreach ($photos['PROPERTY_PHOTOS_VALUE'] as $p_photo) {
        if ($p_photo > 0) {
            $path = $p_photo;
        }
    }
}
if (isset($path)) {
    $ResizeImageGet = CFile::ResizeImageGet($path, array('width' => 100, 'height' => 100), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
    if (strlen($ResizeImageGet['src']) > 0) {
        $image_path = $ResizeImageGet['src'];
    }
}
if (empty($image_path)) {
    $image_path = SITE_TEMPLATE_PATH . '/images/no-photo.jpg';
}
?>
<img src="<?= $image_path ?>">

