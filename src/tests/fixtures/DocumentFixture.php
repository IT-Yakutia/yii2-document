<?php

namespace ityakutia\document\tests\fixtures;

use ityakutia\document\models\Document;
use yii\test\ActiveFixture;

class DocumentFixture extends ActiveFixture
{
    public $modelClass = Document::class;
    public $dataFile = '@ityakutia/document/tests/_data/document.php';
    public $depends = [DocumentCategoryFixture::class];
}