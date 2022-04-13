<?php

namespace ityakutia\document\widgets\document;

use ityakutia\document\models\Document;
use yii\base\Widget;

class DocumentWidget extends Widget
{
    public function run()
    {
        $documents = Document::find()->where(['is_publish' => 1])->orderBy(['sort' => SORT_ASC])->limit(10)->all();
        
        return $this->render('index', [
            'documents' => $documents,
        ]);
    }
}