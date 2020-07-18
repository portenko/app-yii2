<?php

/* @var $this yii\web\View */
/* @var $model common\models\Authors */
/* @var $uploadForm common\models\UploadForm */

$this->title = 'New author';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-create">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
