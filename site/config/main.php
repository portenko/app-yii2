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
            'class' => 'common\user\User',
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
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'timeFormat' => 'HH:mm',
            'decimalSeparator' => '.',
            'datetimeFormat' => 'php:d/m/Y H:i',
            'thousandSeparator' => ' ',
            'nullDisplay' => '<span class="not-set">—</span>',
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
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => $params['siteUrl'].'uploads',
                    'basePath' => '@uploads',
                    'name' => Yii::t('app','Files'),
                ],
            ],
        ],
    ],
    'params' => $params,
];
