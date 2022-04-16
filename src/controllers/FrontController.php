<?php

namespace ityakutia\document\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use ityakutia\document\models\DocumentSearch;
use ityakutia\document\models\DocumentCategory;

class FrontController extends Controller
{
    public function actionIndex($category_id = null)
    {
        $view = Yii::$app->params['custom_view_for_modules']['document_front']['index'] ?? 'index';
        $documentCategory = $this->findCategoryModel($category_id);

        $searchModel = new DocumentSearch();
        $searchModel->category_id = $category_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render($view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'documentCategory' => $documentCategory,
        ]);
    }

    protected function findCategoryModel($id)
    {
        return DocumentCategory::findOne($id);;
    }
}
