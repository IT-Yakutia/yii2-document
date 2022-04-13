<?php

namespace ityakutia\document\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use ityakutia\document\models\DocumentSearch;

class FrontController extends Controller
{
    public function actionIndex()
    {
        $view = Yii::$app->params['custom_view_for_modules']['document_front']['index'] ?? 'index';

        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render($view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
