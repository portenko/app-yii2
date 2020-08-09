<?php

/* @var $this yii\web\View */
/* @var $model common\models\Ads */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="ads-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
