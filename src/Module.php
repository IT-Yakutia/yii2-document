<?php

namespace ityakutia\document;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ityakutia\document\controllers';
    public $defaultRoute = 'document';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}