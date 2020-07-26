<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Posts;
use \common\models\Categories;
use \common\models\Authors;
use site\assets\DatetimepickerAsset;
use \site\assets\TinymceAsset;
use \site\assets\Select2Asset;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
/* @var $uploadForm common\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */

DatetimepickerAsset::register($this);
TinymceAsset::register($this);
Select2Asset::register($this);

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

                <?= $form->field($model, 'recommendedPosts')->dropDownList(Posts::listMap(), [
                    'multiple' => true,
                    'class' => 'form-control select2'
                ]) ?>

                <?= $form->field($model, 'alternate_id', ['options' => ['class' => 'mb-0']])
                    ->dropDownList($model->getAlternateListMap(), ['prompt' => '——']) ?>

            </div>
            <div class="card mt-2 p-2">
                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_description')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'meta_keywords', ['options' => ['class' => 'mb-0']])
                    ->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-4 pl-1">
            <div class="card pl-2 pt-2 pr-2 pb-2">
                <?= $form->field($model, 'category_id')->dropDownList(Categories::listMap(), ['prompt' => '——']) ?>
                <?= $form->field($model, 'author_id')->dropDownList(Authors::listMap(), ['prompt' => '——']) ?>
                <div class="row">
                    <div class="col-sm-6 pr-1">
                        <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
                    </div>
                    <div class="col-sm-6 pl-1">
                        <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
                    </div>
                </div>
                <?= $form->field($model, 'publishAt', ['options' => ['class' => 'mb-0']])
                    ->textInput(['autocomplete' => 'off']) ?>

            </div>
            <div class="card mt-2 pl-2 pt-2 pr-2 pb-2">

                <div class="post-cover text-center mb-2">
                    <div class="cover-preview">
                        <?= !empty($model->cover) ? Html::a('<i class="far fa-trash-alt"></i>', ['delete-cover', 'id' => $model->id],
                            ['class' => 'delete-cover', 'title' => 'Delete?']) : '' ?>
                        <img class="img-thumbnail" src="<?= !empty($model->cover) ? '/uploads/posts/'.$model->cover : '/images/no-image.jpg' ?>">
                    </div>
                </div>

                <?= $form->field($uploadForm, 'imageFile', [
                    'template' => "{label}<div>{input}\n{hint}\n{error}</div>"
                ])->fileInput(['accept' => 'image/*'])->label($model->getAttributeLabel('cover').' (400x400)') ?>

                <?= $form->field($model, 'cover_alt', ['options' => ['class' => 'mb-0']])
                    ->textarea(['rows' => 2]) ?>

            </div>
        </div>

    </div>

    <div class="mt-2">
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
    
    $('#posts-publishat').datetimepicker({
        lang: 'en',
        format: 'd.m.Y H:i',
    });
    
    tinymceCreate('#posts-content');
    $('.select2').select2({width: '100%'});
JS;

$this->registerJs($js, $this::POS_END);