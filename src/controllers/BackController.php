<?php

namespace ityakutia\document\controllers;

use ityakutia\document\models\Document;
use ityakutia\document\models\DocumentForm;
use ityakutia\document\models\DocumentSearch;
use uraankhayayaal\materializecomponents\imgcropper\actions\UploadAction;
use uraankhayayaal\sortable\actions\Sorting;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class BackController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['document']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    public function actions()
    {
        return [
            'sorting' => [
                'class' => Sorting::class,
                'query' => Document::find(),
            ]
        ];
    }

    public function actionIndex()
    {
        $uploadFilesModel = new DocumentForm();
        if (Yii::$app->request->isPost) {
            $uploadFilesModel->uploadFiles = UploadedFile::getInstances($uploadFilesModel, 'uploadFiles');
            if ($uploadFilesModel->uploadMultiple()) {
                $uploadFilesModel = new DocumentForm();
            }
        }

        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'uploadFilesModel' => $uploadFilesModel,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно изменена!');
            return $this->redirect(Url::previous());
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->deleteFile();
        if (false !== $model->delete()) {
            Yii::$app->session->setFlash('success', 'Запись успешно удалена!');
        }

        return $this->redirect(Url::previous());
    }

    protected function findModel($id)
    {
        $model = Document::findOne($id);
        if (null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}
