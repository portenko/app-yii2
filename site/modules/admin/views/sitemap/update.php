<?php

/* @var $this yii\web\View */
/* @var $model common\models\Sitemap */

$this->title = 'Update: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sitemap', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="sitemap-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
