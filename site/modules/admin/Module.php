<?php

namespace site\modules\admin;

use Yii;
use yii\web\ErrorHandler;

/**
 * Class Module
 * @package site\modules\admin
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'site\modules\admin\controllers';
    public $layoutPath = 'site\modules\admin\views\layouts';
    public $layout = 'admin';

    public function init()
    {
        parent::init();

        Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'errorAction' => '/admin/default/error',
                    'class' => ErrorHandler::class,
                    //'layout' => 'clean'
                ]
            ],
        ]);

        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        Yii::$app->set('errorHandler', $handler);
        $handler->register();
    }
}
