<?php

namespace site\modules\admin\controllers;

use common\models\Options;
use Yii;
use common\models\UploadForm;
use common\models\Posts;
use common\models\PostsSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Class PostsController
 * @package site\modules\admin\controllers
 */
class PostsController extends Controller
{
    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
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
        $model = new Posts();
        $uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if (Yii::$app->request->isPost)
            {
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $uploadForm->folder = $model::tableName();
                $uploadForm->prefix = uniqid();
                $uploadForm->imageWidth = Options::val('POSTS_COVER', 'width');
                $uploadForm->imageHeight = Options::val('POSTS_COVER', 'height');
                if ($uploadForm->upload()) {
                    $model->cover = $uploadForm->imageName;
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
                $uploadForm->imageWidth = Options::val('POSTS_COVER', 'width');
                $uploadForm->imageHeight = Options::val('POSTS_COVER', 'height');
                if ($uploadForm->upload()) {
                    $model->cover = $uploadForm->imageName;
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
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDeleteCover($id)
    {
        $model = $this->findModel($id);
        @unlink(Yii::getAlias('@uploads/posts/'.$model->cover));
        $model->cover = null;
        $model->save(false);
        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * @param $id
     * @return Posts|mixed|null
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
