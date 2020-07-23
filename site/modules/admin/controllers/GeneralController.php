<?php

namespace site\modules\admin\controllers;

use Yii;
use common\models\Options;
use yii\helpers\Json;

/**
 * Class GeneralController
 * @package site\modules\admin\controllers
 */
class GeneralController extends OptionsController
{
    /**
     * @return mixed|string|\yii\web\Response
     */
    public function actionIndex()
    {
        //TODO добавить поле visible в options
        $model = Options::getByCode('GENERAL_SETTINGS', true);

        if ($model->load(Yii::$app->request->post()))
        {
            if(isset($model->json) && count($model->json)){
                $model->data = Json::encode($model->json);
            }
            if($model->save()){
                if(Yii::$app->request->post('save_close')){
                    return $this->redirect('/admin/');
                }
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return Options|mixed|void|null
     */
    public function findModel($id){}
}
