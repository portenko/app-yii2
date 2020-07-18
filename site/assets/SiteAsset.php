<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class SiteAsset
 * @package site\assets
 */
class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin.css',
    ];
    public $js = [
    ];
    public $depends = [
        'site\assets\DefaultAsset',
    ];
}
