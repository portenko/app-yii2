<?php
namespace site\modules\admin\controllers;

/**
 * Class FilesController
 * @package site\modules\admin\controllers
 */
class FilesController extends Controller
{
    public $layout = 'elfinder';
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function findModel($id){}
}
