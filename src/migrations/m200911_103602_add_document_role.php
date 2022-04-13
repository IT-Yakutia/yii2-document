<?php

use yii\db\Migration;

/**
 * Class m200911_103602_add_document_role
 */
class m200911_103602_add_document_role extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $documentRedactor = $auth->getPermission('document');
        if($documentRedactor == null){
            $documentRedactor = $auth->createPermission('document');
            $documentRedactor->description = 'Редактирование Документов';

            $auth->add($documentRedactor);

            $operator = $auth->getRole('operator');
            if($operator != null || $operator != false)
                $auth->addChild($operator,$documentRedactor);
        }
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $documentRedactor = $auth->getPermission('document');
        if($documentRedactor !== null)
            $auth->remove($documentRedactor);
        
    }
}
