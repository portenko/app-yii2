<?php

/* @var $this yii\web\View */
/* @var $model common\models\Posts */

$this->title = 'New post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
