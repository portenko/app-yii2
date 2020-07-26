<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Options */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="options-form card p-2">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-7">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php if(!empty($model->template) && !is_file(Yii::getAlias('@site/modules/admin/views/options/templates' . $model->template . '.php'))){ ?>

        <?= $this->render('templates/'. $model->template, compact('form', 'model')) ?>

    <?php } else { ?>


        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'data')->textarea(['rows' => 4])->label('Data (JSON format)') ?>

    <?php } ?>

    <div>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
