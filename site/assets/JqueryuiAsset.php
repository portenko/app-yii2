<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class JqueryuiAsset
 * @package site\assets
 */
class JqueryuiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/components/jqueryui/';
    public $css = [
        'themes/base/jquery-ui.css',
    ];
    public $js = [
        'jquery-ui.js',
    ];
    public $depends = [
        'site\assets\DefaultAsset',
    ];
}
