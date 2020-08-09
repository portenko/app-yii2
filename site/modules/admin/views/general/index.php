<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model common\models\Options */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'General';
$this->params['breadcrumbs'][] = $this->title;

$json = Json::decode($model->data, false);

?>

<div class="general-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="card p-2">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'json[site_title]')
                    ->textInput(['value' => $json->site_title??null])
                    ->label('Site title')
                    ->hint('<span class="hint-example">Example: The awesome site</span>')
                ?>

                <?= $form->field($model, 'json[site_url]')
                    ->textInput(['value' => $json->site_url??null])
                    ->label('Site URL')
                    ->hint('<span class="hint-example">Example: http://example.com</span>')
                ?>

                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'json[email]')
                            ->textInput(['value' => $json->email??null])
                            ->label('Email')
                            ->hint('<span class="hint-example">Example: email@example.com</span>')
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'json[phone]')
                              ->textInput(['value' => $json->phone??null])
                              ->label('Phone')
                              ->hint('<span class="hint-example">Example: +1 (206) 555-2368</span>')
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'json[address]')
                    ->textarea(['value' => $json->address??null, 'rows' => 1])
                    ->label('Address')
                    ->hint('<span class="hint-example">Example: 601 N 34th St, Seattle, WA 98103, USA</span>')
                ?>

                <?= $form->field($model, 'json[map]')
                    ->textarea(['value' => $json->map??null, 'rows' => 6])
                    ->label('Map')
                    ->hint('<span class="hint-example">Example: https://goo.gl/maps/e5MHhSVG2VEX4in1A<br/>'.
                        Html::encode('or <iframe src="..." ...></iframe>').'</span>')
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'json[meta_title]')
                      ->textInput(['value' => $json->meta_title??null, 'max' => 60])
                      ->label('Meta title (max 60 characters)')
                      ->hint('<span class="hint-example">Example: The awesome site</span>')
                ?>
                <?= $form->field($model, 'json[meta_keywords]')
                      ->textarea(['value' => $json->meta_keywords??null, 'rows' => 1, 'max' => 255])
                      ->label('Meta keywords (max 255 characters)')
                      ->hint('<span class="hint-example">Example: Buy Widgets, Best Widgets, Cheap Widgets, Widgets for Sale</span>')
                ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'json[meta_description]')
                      ->textarea(['value' => $json->meta_description??null, 'rows' => 6, 'max' => 150])
                      ->label('Meta description (max 150 characters)')
                      ->hint('<span class="hint-example">Example: This is an example of a meta description. 
                      This will often show up in search results.</span>')
                ?>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Save & Close', ['class' => 'btn btn-primary', 'name' => 'save_close', 'value' => 1]) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
