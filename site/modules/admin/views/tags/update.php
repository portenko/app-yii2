<?php

/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="tags-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
