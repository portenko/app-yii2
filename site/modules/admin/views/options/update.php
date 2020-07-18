<?php

/* @var $this yii\web\View */
/* @var $model common\models\Options */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="options-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
