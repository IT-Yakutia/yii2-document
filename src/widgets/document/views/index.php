<?php

use yii\bootstrap4\Html;

use ityakutia\document\assets\DocumentAsset;
$assetBundle = DocumentAsset::register($this);

$is_divided = false;

?>

<section class="container mb-5">
    <div class="row">
        <div class="col-12">
            <h3>Документы НПА</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?php foreach ($documents as $key => $document) { ?>
                <?php if (!$is_divided && $key > (sizeof($documents)/2)) { $is_divided = true; ?>
                     </div><div class="col-6">
                <?php } ?>
                <a href="<?= $document->file; ?>" download="<?= $document->title; ?>" class="d-flex align-items-center my-3">
                    <div class="mr-2">
                        <img width="30" height="30" src="<?= $assetBundle->baseUrl ?>/img/icon_doc.png" alt="Документы НПА">
                    </div>
                    <div class="">
                        <small><?= Yii::$app->formatter->asDate($document->created_at); ?></small>
                        <p class="p-0 m-0"><?= $document->title ?> [<?= $document->size ?>]</p>
                    </div>
                    <div class="flex-grow-1 text-right">
                        <img width="24" height="24" src="<?= $assetBundle->baseUrl ?>/img/icon_download.png" alt="Скачать документы НПА">
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="text-center"><?= Html::a('Все документы', ['/document/front/index'], ['class' => 'btn']); ?></p>
        </div>
    </div>
</section>