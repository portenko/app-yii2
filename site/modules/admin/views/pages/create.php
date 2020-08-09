<?php

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
/* @var $uploadForm common\models\UploadForm */

$this->title = 'New page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
