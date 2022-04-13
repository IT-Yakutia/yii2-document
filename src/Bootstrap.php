<?php

namespace ityakutia\document;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

    public function bootstrap($app)
    {
        $app->setModule('document', 'ityakutia\document\Module');
    }
}