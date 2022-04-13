<?php

use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use uraankhayayaal\materializecomponents\imgcropper\Cropper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="partner-form">

    <?php $form = ActiveForm::begin([
        'errorCssClass' => 'red-text',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= WCheckbox::widget(['model' => $model, 'attribute' => 'is_publish']); ?>

    <div class="row">
        <div class="col s12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <?php if ($model->isNewRecord && $model->file === null) { ?>
            <div class="file-field input-field">
                <?= $form->field($model, 'uploadFile', ['options' => ['class' => ''], 'template' => '
                <div class="btn teal"><span>Файл</span>{input}</div><div class="file-path-wrapper"><input class="file-path validate" type="text" placeholder="Выберите файл"></div>
                '])->fileInput(['disable' => $model->isNewRecord ? 'false' : 'disable']) ?>
                <small>Разрешены следующие форматы: .png, .jpg, .gif, .doc, .docx, .ppt, .pptx, .xls, .xlsx, .pdf, .odt, .rtf</small>
            </div>
            <?php } else { ?>
                <div>
                    <i class="material-icons teal-text tiny">insert_drive_file</i> <a href="<?= $model->file ?>" download="<?= $model->title ?>"><?= $model->title ?></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
    </div>
    <div class="fixed-action-btn">
        <?= Html::submitButton('<i class="material-icons">save</i>', [
            'class' => 'btn-floating btn-large waves-effect waves-light tooltipped',
            'title' => 'Сохранить',
            'data-position' => "left",
            'data-tooltip' => "Сохранить",
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
