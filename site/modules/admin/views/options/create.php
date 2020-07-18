<?php

/* @var $this yii\web\View */
/* @var $model common\models\Options */

$this->title = 'New option';
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
