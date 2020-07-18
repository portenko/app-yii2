<?php

namespace site\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Class Controller
 * @package site\modules\admin\controllers
 */
abstract class Controller extends \yii\web\Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['POST'],
                    'delete' => ['POST'],
                    'status' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    abstract public function findModel($id);

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionStatus($id)
    {
        $model = $this->findModel($id);
        $model->status = $model->status === $model::STATUS_ACTIVE ? $model::STATUS_INACTIVE : $model::STATUS_ACTIVE;
        $model->save(false);
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionSortUp($id)
    {
        $model = $this->findModel($id);
        $model->changeSort('up');
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionSortDown($id)
    {
        $model = $this->findModel($id);
        $model->changeSort('down');
        return $this->redirect(['index']);
    }
}
