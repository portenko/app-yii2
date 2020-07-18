<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class AdminAsset
 * @package site\assets
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin.css',
    ];
    public $js = [
        'js/slugify.js'
    ];
    public $depends = [
        'site\assets\DefaultAsset',
    ];
}
