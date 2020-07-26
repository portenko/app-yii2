<?php

/* @var $this yii\web\View */
/* @var $model common\models\Ads */

$this->title = 'New sitemap URL';
$this->params['breadcrumbs'][] = ['label' => 'Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
