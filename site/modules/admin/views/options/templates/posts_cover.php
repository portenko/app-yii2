<?php

use yii\helpers\Json;

$json = Json::decode($model->data, false);

?>

<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'json[width]')
            ->textInput(['value' => $json->weight??150, 'required' => true])
            ->label('Width')
            ->hint('px')
        ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'json[height]')
            ->textInput(['value' => $json->height??150])
            ->label('Height')
            ->hint('px')
        ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'json[quality]')->textInput([
            'min' => 0,
            'max' => 100,
            'value' => $json->quality??85])
            ->label('Quality')
            ->hint('%')
        ?>
    </div>
</div>






