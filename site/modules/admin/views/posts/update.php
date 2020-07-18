<?php

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="posts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
