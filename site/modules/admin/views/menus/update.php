<?php

/* @var $this yii\web\View */
/* @var $model common\models\Menus */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="menus-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
