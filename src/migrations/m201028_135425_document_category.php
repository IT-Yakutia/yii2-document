<?php

use yii\db\Migration;

/**
 * Class m201028_135425_document_category
 */
class m201028_135425_document_category extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('document_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'sort' => $this->integer(),

            'is_publish' => $this->boolean(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addColumn('document', 'category_id', $this->integer()->notNull());

        $this->addForeignKey('document-document_category-fkey','document','category_id','document_category','id','CASCADE','CASCADE');
        $this->createIndex('document-document_category-idx','document','category_id');

        $this->addColumn('document', 'accepted_at', $this->string());
        $this->addColumn('document', 'number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('document', 'number');
        $this->dropColumn('document', 'accepted_at');

        $this->dropForeignKey('document-document_category-fkey','document');
        $this->dropIndex('document-document_category-idx','document');

        $this->dropColumn('document', 'category_id');

        $this->dropTable('document_category');
    }
}
