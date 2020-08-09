<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use site\assets\JqueryuiAsset;

JqueryuiAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Menus */
/* @var $form yii\widgets\ActiveForm */

$json  = Json::decode($model->data, true);

$placeholderLabel = 'Name of menu item';
$placeholderUrl = 'Url of menu item';

?>

<div class="menus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4 pr-1">
            <div class="card p-2">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <div class="row">
                    <div class="col-sm-6 pr-1">
                        <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['statuses']) ?>
                    </div>
                    <div class="col-sm-6 pl-1">
                        <?= $form->field($model, 'lang')->dropDownList(Yii::$app->params['languages']) ?>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
            </div>
        </div>
        <div class="col-sm-8 pl-1">
            <div class="card p-2">
                <div class="menu-items">
                    <div class="sortable mt-2">
                        <?php if($json !== null && isset($json['label'])){ ?>
                            <?php foreach($json['label'] as $key => $value){ ?>
                                <div class="row menu-item">
                                    <div class="col-sm-5 menu-label pr-1">
                                        <?= $form->field($model, 'json[label][]')
                                            ->textInput(['value' => $value, 'placeholder' => $placeholderLabel])
                                            ->label(false)
                                        ?>
                                    </div>
                                    <div class="col-sm-7 menu-url pl-1">
                                        <?= $form->field($model, 'json[url][]')
                                            ->textInput(['value' => $json['url'][$key], 'placeholder' => $placeholderUrl])
                                            ->label(false)
                                        ?>
                                    </div>
                                    <span class="fas fa-bars handle"></span>
                                    <span class="far fa-trash-alt remove"></span>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="row menu-item">
                                <div class="col-sm-5 menu-label pr-1">
                                    <?= $form->field($model, 'json[label][]')
                                        ->textInput(['value' => null, 'placeholder' => $placeholderLabel])
                                        ->label(false)
                                    ?>
                                </div>
                                <div class="col-sm-7 menu-url pl-1">
                                    <?= $form->field($model, 'json[url][]')
                                        ->textInput(['value' => null, 'placeholder' => $placeholderUrl])
                                        ->label(false)
                                    ?>
                                </div>
                                <span class="fas fa-bars handle"></span>
                                <span class="far fa-trash-alt remove"></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary btn-sm add-item" type="button">Add item</button>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php

$js = <<<JS
    $(".sortable").sortable();
    $(".sortable").disableSelection();
    
    $(document)
    .on('click', '.menu-items .remove', function(){
        if($('.menu-items .menu-item').length > 1){
            $(this).parent().remove();    
        } else {
            $(this).parent().find('.field-menus-json-label input').val('');
            $(this).parent().find('.field-menus-json-url input').val('');
        }
    });
    
    $('.add-item').on('click', function(){
        var item = $($('.menu-items .menu-item')[0]).clone();
        item.find('.field-menus-json-label input').val('');
        item.find('.field-menus-json-url input').val('');
        $('.menu-items .sortable').append(item);
    });
JS;
$this->registerJs($js, $this::POS_READY);