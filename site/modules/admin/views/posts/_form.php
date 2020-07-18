<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Categories;
use site\assets\DatetimepickerAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
/* @var $form yii\widgets\ActiveForm */

DatetimepickerAsset::register($this);

?>

<div class="posts-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'options' => [
        	'onctype' => 'multipart/form-data',
        ],
        'enableAjaxValidation' => false
    ]); ?>

    <div class="row">
        <div class="col-sm-8 pr-1">
            <div class="card p-2">
                <?= $form->field($model, 'name', ['options' => [
                    'class' => 'mb-0'
                ]])->textInput(['maxlength' => true]) ?>
                <div class="url-slug">
                    <?= $form->field($model, 'url_slug')->textInput(['class' => 'form-control input-url-slug'])->label(false) ?>
                </div>

                <?= $form->field($model, 'lead')->textarea(['rows' => 3]) ?>

                <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>


                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_description')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
        <div class="col-sm-4 pl-1">
            <div class="card p-2">
                <?= $form->field($model, 'category_id')->dropDownList(Categories::listMap(), ['prompt' => '——']) ?>

                <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'cover_alt')->textarea(['rows' => 3]) ?>

                <div class="row">
                    <div class="col-sm-6 pr-1">
                        <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
                    </div>
                    <div class="col-sm-6 pl-1">
                        <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
                    </div>
                </div>

                <?= $form->field($model, 'publishAt')->textInput() ?>

            </div>
        </div>

    </div>















    <?= $form->field($model, 'alternate_id')->textInput() ?>



    <?= $form->field($model, 'recommended_posts')->textInput(['maxlength' => true]) ?>



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

    $('#posts-name, #posts-url_slug').on('input', function() {
        var title = $(this).val(),
            slug = '';
        if(title.length > 0){
            slug = url_slug(title);
        }
        $('#posts-url_slug').val(slug);
    });
    
    $('#post-publish_at').datetimepicker({
        lang: 'en',
        format: 'd.m.Y H:i',
    });
JS;

$this->registerJs($js, $this::POS_READY);