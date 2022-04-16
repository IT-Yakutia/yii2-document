<?php

namespace ityakutia\document\widgets\document;

use ityakutia\document\models\DocumentCategory;
use yii\base\Widget;

class DocumentWidget extends Widget
{
    public function run()
    {
        $documentCategories = DocumentCategory::find()->where(['is_publish' => 1])->orderBy(['sort' => SORT_ASC])->limit(10)->all();
        
        return $this->render('index', [
            'documentCategories' => $documentCategories,
        ]);
    }
}