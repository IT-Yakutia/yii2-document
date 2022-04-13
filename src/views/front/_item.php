<?php

use yii\helpers\Url;
use ityakutia\document\assets\DocumentAsset;

$assetBundle = DocumentAsset::register($this);

?>

	<a href="<?= $model->file; ?>" download="<?= $model->title; ?>" class="d-flex align-items-center my-3">
        <div class="mr-2">
            <img width="30" height="30" src="<?= $assetBundle->baseUrl ?>/img/icon_doc.png" alt="Документы НПА">
        </div>
        <div class="">
            <small><?= Yii::$app->formatter->asDate($model->created_at); ?></small>
            <p class="p-0 m-0"><?= $model->title ?> [<?= $model->size ?>]</p>
        </div>
        <div class="flex-grow-1 text-right">
            <img width="24" height="24" src="<?= $assetBundle->baseUrl ?>/img/icon_download.png" alt="Скачать документы НПА">
        </div>
	</a>

