<?php

/* @var $this yii\web\View */
/* @var $model common\models\Menus */

$this->title = 'New menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menus-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
