<?php

namespace site\modules\admin\controllers;

use Yii;
use common\models\Options;
use common\models\OptionsSearch;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

/**
 * Class OptionsController
 * @package site\modules\admin\controllers
 */
class OptionsController extends Controller
{
    /**
     * Lists all Options models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Options();

        if ($model->load(Yii::$app->request->post()))
        {
            if(isset($model->json) && count($model->json)){
                $model->data = Json::encode($model->json);
            }
            if($model->save()){
                if(Yii::$app->request->post('save_close')){
                    return $this->redirect(['index']);
                }
                else {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {
            if(isset($model->json) && count($model->json)){
                $model->data = Json::encode($model->json);
            }
            if($model->save()){
                if(Yii::$app->request->post('save_close')){
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return Options|mixed|null
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = Options::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
