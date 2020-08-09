<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title ;

?>
<div class="profile-index row justify-content-center mt-5">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin(); ?>
            <div class="card mt-5">
                <div class="card-body px-3 pt-4 pb-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'email')->textInput() ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                              <?= $form->field($model, 'first_name')->textInput() ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'last_name')->textInput() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6 col-sm-6 pr-1">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                </div>
                <div class="col-6 col-sm-6 pl-1">
                    <?= Html::a('Cancel', '/admin/', ['class' => 'btn btn-secondary btn-block']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
