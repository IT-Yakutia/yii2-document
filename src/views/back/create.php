<?php

$this->title = 'Новый партнер';
?>
<div class="document-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
