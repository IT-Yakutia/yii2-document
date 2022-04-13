<?php

use yii\bootstrap4\Html;

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
                <a href="<?= $document->file ?>" target="_blank" download="<?= $document->title ?>">
                    <small><?= Yii::$app->formatter->asDate($document->created_at); ?></small>
                    <p><?= $document->title ?> [<?= $document->size ?>]</p>
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