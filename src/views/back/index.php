<?php

use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use uraankhayayaal\sortable\grid\Column;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Партнеры';
?>
<div class="partner-index">
    <div class="row">
        <div class="col s12">
            <?= $this->render('_form_pjax', ['model' => $uploadFilesModel]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <?php Pjax::begin(['id' => 'files_list']) ?>
            <?= GridView::widget([
                'tableOptions' => [
                    'class' => 'striped bordered my-responsive-table',
                    'id' => 'sortable'
                ],
                'rowOptions' => function ($model, $key, $index, $grid) {
                    return ['data-sortable-id' => $model->id];
                },
                'options' => [
                    'data' => [
                        'sortable-widget' => 1,
                        'sortable-url' => Url::toRoute(['sorting']),
                    ]
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    ['class' => MaterialActionColumn::class, 'template' => '{update}'],

                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->title,['update', 'id' => $model->id]);
                        }
                    ],
                    [
                        'header' => 'Файл',
                        'format' => 'raw',
                        'value' => function($model) {
                            return $model->file ? ('<a href="'.$model->file.'" download="'.$model->title.'"  data-pjax="0">Скачать ' . $model->title . '</a>') : '';
                        }
                    ],
                    'size',
                    [
                        'attribute' => 'is_publish',
                        'format' => 'raw',
                        'value' => function($model){
                            return $model->is_publish ? '<i class="material-icons green-text">done</i>' : '<i class="material-icons red-text">clear</i>';
                        },
                        'filter' =>[0 => 'Нет', 1 => 'Да'],
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                    ],
                    ['class' => MaterialActionColumn::class, 'template' => '{delete}'],
                    [
                        'class' => Column::class,
                    ],
                ],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination center'],
                    'prevPageCssClass' => '',
                    'nextPageCssClass' => '',
                    'pageCssClass' => 'waves-effect',
                    'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
                    'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
                ],
            ]); ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
