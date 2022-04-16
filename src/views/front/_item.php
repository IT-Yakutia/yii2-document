<?php

use yii\helpers\Url;
use ityakutia\document\assets\DocumentAsset;

$assetBundle = DocumentAsset::register($this);

?>

    <a href="<?= $model->file; ?>" download="<?= $model->title; ?>" class="d-flex align-items-center my-2 pb-2" style="border-bottom: 1px dotted #cdcdcd;">
        <div class="mr-2">
            <img width="30" height="30" src="<?= $assetBundle->baseUrl ?>/img/icon_doc.png" alt="Документы НПА">
        </div>
        <div class="">
            <small><?= $model->number; ?> от <?= Yii::$app->formatter->asDate($model->accepted_at); ?></small>
            <p class="p-0 m-0"><?= $model->title ?> [<?= $model->size ?>]</p>
        </div>
        <div class="flex-grow-1 text-right">
            Скачать
        </div>
    </a>

