<?php

namespace ityakutia\document\tests\fixtures;

use ityakutia\document\models\DocumentCategory;
use yii\test\ActiveFixture;

class DocumentCategoryFixture extends ActiveFixture
{
    public $modelClass = DocumentCategory::class;
    public $dataFile = '@ityakutia/document/tests/_data/document_category.php';
}