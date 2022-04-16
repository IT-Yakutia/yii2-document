<?php

use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use uraankhayayaal\materializecomponents\imgcropper\Cropper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>
<?php Pjax::begin(['id' => 'files_ajax_form']) ?>
<div class="document-form">

    <h6>Загрузить файлы</h6>
    <?php $form = ActiveForm::begin([
        'errorCssClass' => 'red-text',
        'options' => ['id' => 'document-files-form', 'enctype' => 'multipart/form-data', 'data-pjax' => true],
    ]); ?>

    <div class="row">
        <div class="col s12">
            <div class="file-field input-field">
                <?= $form->field($model, 'uploadFiles[]', ['options' => ['class' => '', 'id' => 'document-files'], 'template' => '
                <div class="btn teal"><span>Файл</span>{input}</div><div class="file-path-wrapper"><input class="file-path validate" type="text" placeholder="Выберите файл"></div>
                '])->fileInput(['multiple' => true]) ?>
                <small>Разрешены следующие форматы: .png, .jpg, .gif, .doc, .docx, .ppt, .pptx, .xls, .xlsx, .pdf, .odt, .rtf.</small>
                <small>Максимум: <?= \ityakutia\document\models\DocumentForm::MAX_UPLOAD_FILES ?> файлов.</small>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php Pjax::end() ?>


<?php
    $this->registerJs('
        $("document").ready(function(){
            $("#files_ajax_form").on("pjax:end", function() {
                $.pjax.reload({container:"#files_list"});  //Reload GridView
            });
        });

        var inputElement = document.getElementById("document-files");
        inputElement.addEventListener("change", handleFiles, false);

        function handleFiles() {
            document.getElementById("document-files-form").submit();
        }
    ');
?>