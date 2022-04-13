<?php

namespace ityakutia\document\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\BaseInflector;

class DocumentForm extends Model
{
    const MAX_UPLOAD_FILES = 100;
    const FILE_PATH = "@frontend/web/uploads/document/";
    const URL_PATH = "/uploads/document/";

    /**
     * @var UploadedFile
     */
    public $uploadFile;

    /**
     * @var UploadedFile[]
     */
    public $uploadFiles;

    public function rules()
    {
        return [
            [['uploadFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, doc, docx, ppt, pptx, xls, xlsx, pdf, odt, rtf'],
            [['uploadFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif, doc, docx, ppt, pptx, xls, xlsx, pdf, odt, rtf', 'maxFiles' => static::MAX_UPLOAD_FILES],
        ];
    }

    public function attributeLabels()
    {
        return [
            'uploadFile' => 'Файл',
            'uploadFiles' => 'Файлы',
        ];
    }
    
    public function upload()
    {
        $path = \Yii::getAlias(static::FILE_PATH);
        $filename = '_' . time() . '_' . BaseInflector::slug($this->uploadFile->baseName) . '.' . $this->uploadFile->extension;
        if (!file_exists($path) || !is_dir($path))
            \yii\helpers\FileHelper::createDirectory($path, $mode = 0775, $recursive = true);

        if ($this->uploadFile->saveAs($path . $filename, false)) {
            $model = new Document();
            $model->file = static::URL_PATH . $filename;
            $model->title = $file->baseName . '.' . $file->extension;
            $model->size = \Yii::$app->formatter->asShortSize($file->size);
            $model->is_publish = 1;
            if (!$model->save()) {
                \Yii::error("Error to save file model: " . json_encode($model->errors), $category = 'document');
            }
            return true;
        } else {
            \Yii::error("Error to save upload file to disk.", $category = 'document');
            return false;
        }
    }

    public function uploadMultiple()
    {
        $path = \Yii::getAlias(static::FILE_PATH);
        if ($this->validate()) { 
            foreach ($this->uploadFiles as $file) {
                $filename = '_' . time() . '_' . BaseInflector::slug($file->baseName) . '.' . $file->extension;
                if (!file_exists($path) || !is_dir($path))
                    \yii\helpers\FileHelper::createDirectory($path, $mode = 0775, $recursive = true);

                if ($file->saveAs($path . $filename, false)) {
                    $model = new Document();
                    $model->file = static::URL_PATH . $filename;
                    $model->size = \Yii::$app->formatter->asShortSize($file->size);
                    $model->title = $file->baseName . '.' . $file->extension;
                    $model->is_publish = 1;
                    if (!$model->save()) {
                        \Yii::error("Error to save file model: " . json_encode($model->errors), $category = 'document');
                    }
                } else {
                    \Yii::error("Error to save upload file to disk.", $category = 'document');
                }
            }
            return true;
        } else {
            return false;
        }
    }

    static function deleteFile($url)
    {
        $file_path = str_replace(static::URL_PATH, \Yii::getAlias(static::FILE_PATH), $url);
        if (file_exists($file_path)) {
            return unlink($file_path);
        } else {
            \Yii::error("Error to delete file from disk. File does not exist", $category = 'document');
        }
        return true;
    }
}