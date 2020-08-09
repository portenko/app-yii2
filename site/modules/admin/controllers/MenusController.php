<?php

namespace site\modules\admin\controllers;

use Yii;
use common\models\Menus;
use common\models\MenusSearch;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

/**
 * Class MenusController
 * @package site\modules\admin\controllers
 */
class MenusController extends Controller
{
    /**
     * Lists all Menus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Menus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menus();

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
     * Deletes an existing Menus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Menus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
