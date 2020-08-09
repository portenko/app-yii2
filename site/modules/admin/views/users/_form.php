<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \common\models\Options;

/* @var $this yii\web\View */
/* @var $model \site\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */

$listRoles = explode(',', Options::val('USERS_ROLES'));
$roles = [];
foreach($listRoles as $role){
    $roles[$role] = $role;
}
unset($roles['admin']);

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card p-2">
        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'username')->textInput() ?>
            </div>
            <div class="col-sm-4">
                  <?= $form->field($model, 'email')->textInput() ?>
            </div>
            <div class="col-sm-4">
                <?php if($model->role !== 'admin'){ ?>
                    <?= $form->field($model, 'role')->dropDownList($roles) ?>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
            <div class="col-sm-4">
                  <?= $form->field($model, 'first_name')->textInput() ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'last_name')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <?php if($model->role !== 'admin'){ ?>
                    <?= $form->field($model, 'status')->dropDownList($model::getStatuses()) ?>
                <?php } ?>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            </div>
        </div>

    </div>

    <div class="mt-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
