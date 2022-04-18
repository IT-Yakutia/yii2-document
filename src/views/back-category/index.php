<?php

use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use uraankhayayaal\sortable\grid\Column;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Категории документов НПА';
?>
<div class="document-category-index">
    <div class="row">
        <div class="col s12">
            <p>
                <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="fixed-action-btn">
                <?= Html::a('<i class="material-icons">add</i>', ['create'], [
                    'class' => 'btn-floating btn-large waves-effect waves-light tooltipped',
                    'title' => 'Сохранить',
                    'data-position' => 'left',
                    'data-tooltip' => 'Добавить',
                ]) ?>
            </div>
            
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
                    ['class' => MaterialActionColumn::class, 'template' => '{update}{add}',
                        'buttons'=>[
                            'add'=>function ($url, $model) {
                                return Html::a('<i class="material-icons tooltipped" data-position="top" data-tooltip="Добавть файлы" title="Добавть файлы">add_circle_outline</i>', ['/document/back/index', 'category_id' => $model->id]);
                            },
                        ],
                    ],

                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->title,['update', 'id' => $model->id]);
                        }
                    ],
                    [
                        'header' => 'Количество документов',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a('Файлов ' . $model->getDocuments()->count() . ' шт.', ['/document/back/index', 'category_id' => $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'is_publish',
                        'format' => 'raw',
                        'value' => function($model){
                            return $model->is_publish ? '<i class="material-icons green-text">done</i>' : '<i class="material-icons red-text">clear</i>';
                        },
                        'filter' =>[0 => 'Нет', 1 => 'Да'],
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
        </div>
    </div>
</div>
