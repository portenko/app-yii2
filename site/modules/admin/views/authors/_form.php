<?php

use common\models\Options;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Authors */
/* @var $uploadForm common\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */

$imageWidth = Options::val('AUTHORS_IMAGE', 'width');
$imageHeight = Options::val('AUTHORS_IMAGE', 'height');

?>

<div class="authors-form card p-2">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'options' => [
        	'onctype' => 'multipart/form-data',
        ],
        'enableAjaxValidation' => false
    ]); ?>

    <div class="row">

        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="user-pic p-2">
                <div class="preview">
                    <?= !empty($model->pic) ? Html::a('<i class="far fa-trash-alt"></i>', ['delete-pic', 'id' => $model->id],
                        ['class' => 'delete-image', 'title' => 'Delete?']) : '' ?>
                    <img class="img-thumbnail" src="<?= !empty($model->pic) ? '/uploads/authors/'.$model->pic : '/images/user-avatar.jpg' ?>">
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($uploadForm, 'imageFile', [
                        'template' => "{label}<div>{input}\n{hint}\n{error}</div>"
                    ])->fileInput(['accept' => 'image/*'])->label($model->getAttributeLabel('pic')." ({$imageWidth}x{$imageHeight})") ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'pic_alt')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.preview img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#uploadform-imagefile").change(function(){
        readURL(this);
    });
JS;

$this->registerJs($js, $this::POS_READY);