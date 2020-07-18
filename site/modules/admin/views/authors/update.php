<?php

/* @var $this yii\web\View */
/* @var $model common\models\Authors */
/* @var $uploadForm common\models\UploadForm */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="authors-update">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
