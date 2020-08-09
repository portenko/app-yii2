<?php

namespace site\modules\admin\controllers;

use Yii;
use site\modules\admin\models\Profile;
use yii\web\NotFoundHttpException;

/**
 * Class ProfileController
 * @package site\modules\admin\controllers
 */
class ProfileController extends Controller
{

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $model = $this->findModel(Yii::$app->user->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('/admin/');
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return mixed|Profile|null
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
