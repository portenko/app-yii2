<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'site',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Europe/Moscow',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'site\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-site',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/login'],
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the site
            'name' => 'advanced-site',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '/',
            'rules' => require(__DIR__ . '/rules.php'),
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'site\modules\admin\Module',
            'layout' => 'admin',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            //'class' => 'mihaildev\elfinder\PathController',
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],
            'roots' => [
                [
                    'options' => ['URL' => ''],
                    'baseUrl' => '@uploads',
                    'basePath' => '@uploads',
                    'name' => Yii::t('app','Files'),
                ],
            ],
        ]
    ],
    'params' => $params,
];
