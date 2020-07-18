<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-form card p-2">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-7">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
        </div>
        <div class="col-sm-3" hidden>
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
        </div>
    </div>

    <div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
