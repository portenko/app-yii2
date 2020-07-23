<?php

namespace site\modules\admin\controllers;

use common\models\Options;
use common\models\UploadForm;
use Yii;
use common\models\Authors;
use common\models\AuthorsSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Class AuthorsController
 * @package site\modules\admin\controllers
 */
class AuthorsController extends Controller
{
    /**
     * Lists all Authors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
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
        $model = new Authors();
        $uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if (Yii::$app->request->isPost)
            {
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $uploadForm->folder = $model::tableName();
                $uploadForm->prefix = uniqid();
                $uploadForm->imageWidth = Options::val('AUTHORS_IMAGE', 'width');
                $uploadForm->imageHeight = Options::val('AUTHORS_IMAGE', 'height');
                if ($uploadForm->upload()) {
                    $model->pic = $uploadForm->imageName;
                    $model->save(false);
                }
            }
            if(Yii::$app->request->post('save_close')){
                return $this->redirect(['index']);
            }
            else {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm' => $uploadForm,
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
        $uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if (Yii::$app->request->isPost)
            {
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $uploadForm->folder = $model::tableName();
                $uploadForm->prefix = uniqid();
                $uploadForm->imageWidth = Options::val('AUTHORS_IMAGE', 'width');
                $uploadForm->imageHeight = Options::val('AUTHORS_IMAGE', 'height');
                if ($uploadForm->upload()) {
                    $model->pic = $uploadForm->imageName;
                    $model->save(false);
                }
            }
            if(Yii::$app->request->post('save_close')){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Deletes an existing Authors model.
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
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDeletePic($id)
    {
        $model = $this->findModel($id);
        @unlink(Yii::getAlias('@uploads/authors/'.$model->pic));
        $model->pic = null;
        $model->save(false);
        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Finds the Authors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Authors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Authors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
