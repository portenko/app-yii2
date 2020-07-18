<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class DefaultAsset
 * @package site\assets
 */
class DefaultAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css',
        '//pro.fontawesome.com/releases/v5.10.0/css/all.css',
    ];
    public $js = [
        '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset'
    ];
}
