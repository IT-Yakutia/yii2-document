<?php

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\bootstrap4\LinkPager;

$this->title = $documentCategory === null ? "Все документы НПА" : $documentCategory->title;

if ($documentCategory !== null) {
    $this->params['breadcrumbs'][] = ['label' => 'Документы НПА', 'url' => ['/document/front/index']];
}
$this->params['breadcrumbs'][] = $this->title;

$itemView = Yii::$app->params['custom_view_for_modules']['document_front']['_item'] ?? '_item';

?>

<div id="document">
    <section class="container">
        <div class="row">
            <div class="col-12">
                <h3><?= $this->title ?></h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => $itemView,
                    'options' => ['tag' => false, 'class' => false, 'id' => false],
                    'itemOptions' => [
                        'tag' => false,
                        'class' => 'news-item',
                    ],
                    'layout' => '{items}',
                    'summaryOptions' => ['class' => 'summary grey-text'],
                    'emptyTextOptions' => ['class' => 'empty grey-text'],
                ]) ?>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ]); ?>
        </div>
    </section>
</div>
