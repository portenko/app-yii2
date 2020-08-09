<?php

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
/* @var $uploadForm common\models\UploadForm */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="pages-update">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
