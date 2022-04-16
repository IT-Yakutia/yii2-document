<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

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
    <div class="row mb-3">
        <div class="col-12 col-md-6">
            <?php foreach ($documentCategories as $key => $documentCategory) { ?>
                <?php if (!$is_divided && $key > (sizeof($documentCategories)/2)) { $is_divided = true; ?>
                     </div><div class="col-12 col-md-6">
                <?php } ?>
                <a href="<?= Url::toRoute(['/document/front/index', 'category_id' => $documentCategory->id]); ?>" class="d-flex align-items-center my-2 pb-2" style="border-bottom: 1px dotted #cdcdcd;" title="<?= $documentCategory->title ?>">
                    <div class="mr-2">
                        <img width="30" height="30" src="<?= $assetBundle->baseUrl ?>/img/icon_doc.png" alt="Документы НПА">
                    </div>
                    <div class="">
                        <small><?= Yii::$app->formatter->asDate($documentCategory->created_at); ?></small>
                        <p class="p-0 m-0"><?= $documentCategory->title ?></p>
                    </div>
                    <div class="flex-grow-1 text-right">
                        Смотреть документы
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