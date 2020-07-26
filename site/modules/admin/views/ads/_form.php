<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use site\assets\DatetimepickerAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Ads */
/* @var $form yii\widgets\ActiveForm */

DatetimepickerAsset::register($this);

?>

<div class="ads-form card p-2">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-7">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'is_unlimited')->dropDownList([1 => 'Yes', 0 => 'No']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'dateFrom')->textInput() ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'dateTo')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
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
    $('#ads-datefrom, #ads-dateto').datetimepicker({
        lang: 'en',
        format: 'd.m.Y H:i',
    });
JS;

$this->registerJs($js, $this::POS_READY);
