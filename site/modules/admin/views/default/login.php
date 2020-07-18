<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="m-0"><?= Html::encode($this->title) ?></h4>
            </div>
            <div class="card-body px-3 pt-4 pb-2">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-sm-12\">{input}</div>\n<div class=\"col-sm-12\">{error}</div>",
                        'labelOptions' => ['class' => 'col-sm-12 control-label'],
                    ],
                ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-sm-12\">{input} {label}</div>\n<div class=\"col-sm-12\">{error}</div>",
                    ]) ?>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>