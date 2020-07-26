<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use site\assets\DatetimepickerAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Sitemap */
/* @var $form yii\widgets\ActiveForm */

DatetimepickerAsset::register($this);

$model->changefreq = $model->changefreq ?? 'hourly';
$model->priority = $model->priority ?? '0.8';

$priority = [
    '0.0'=>'0.0','0.1'=>'0.1','0.2'=>'0.2','0.3'=>'0.3','0.4'=>'0.4','0.5'=>'0.5','0.6'=>'0.6','0.7'=>'0.7',
    '0.8'=>'0.8','0.9'=>'0.9','1.0'=>'1.0'
];

$changefreq = [
    'always' => 'always',
    'hourly' => 'hourly',
    'daily' => 'daily',
    'weekly' => 'weekly',
    'monthly' => 'monthly',
    'yearly' => 'yearly',
    'never' => 'never',
];

?>

<div class="sitemap-form card p-2">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loc')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'lastMod')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'changefreq')->dropDownList($changefreq) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'priority')->dropDownList($priority) ?>
        </div>
    </div>
    <div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php

$js = <<<JS
    $('#sitemap-lastmod').datetimepicker({
        lang: 'en',
        format: 'd.m.Y',
    });
JS;

$this->registerJs($js, $this::POS_END);