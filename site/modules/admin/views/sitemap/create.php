<?php

/* @var $this yii\web\View */
/* @var $model common\models\Sitemap */

$this->title = 'New sitemap URL';
$this->params['breadcrumbs'][] = ['label' => 'Sitemap', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitemap-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
