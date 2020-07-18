<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use site\assets\AdminAsset;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= $this->render('_header') ?>
    <div class="container mt-3">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => false,
            'tag' => 'ol',
            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
            'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>\n"
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
