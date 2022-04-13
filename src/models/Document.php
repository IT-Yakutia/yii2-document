<?php

namespace ityakutia\document\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use uraankhayayaal\sortable\behaviors\Sortable;

class Document extends ActiveRecord
{
    public static function tableName()
    {
        return 'document';
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
            [['title', 'file'], 'required'],
            [['sort', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'file', 'size'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'file' => 'Файл',
            'size' => 'Размер',
            'sort' => 'Sort',
            'is_publish' => 'Опубликовать',
            'status' => 'Status',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }

    public function deleteFile()
    {
        return DocumentForm::deleteFile($this->file);
    }
}