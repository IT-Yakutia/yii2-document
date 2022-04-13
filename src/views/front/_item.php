<?php

use yii\helpers\Url;

?>

	<a href="<?= $model->file; ?>" download="<?= $model->title; ?>" class="">
        <small><?= Yii::$app->formatter->asDate($model->created_at); ?></small>
        <p><?= $model->title ?> [<?= $model->size ?>]</p>
	</a>

