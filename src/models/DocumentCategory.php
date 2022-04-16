<?php

namespace ityakutia\document\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use uraankhayayaal\sortable\behaviors\Sortable;

class DocumentCategory extends ActiveRecord
{
    public static function tableName()
    {
        return 'document_category';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'sortable' => [
                'class' => Sortable::class,
                'query' => self::find(),
            ]
        ];
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'sort' => 'Sort',
            'is_publish' => 'Опубликовать',
            'status' => 'Status',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::class, ['category_id' => 'id']);
    }
}