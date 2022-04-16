<?php

$this->title = 'Новая категория документов';
?>
<div class="document-category-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
