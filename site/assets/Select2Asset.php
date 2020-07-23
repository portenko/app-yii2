<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class Select2Asset
 * @package site\modules\admin\assets
 */
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@site/assets/src/select2';
    public $css = [
        'css/select2.min.css'
    ];
    public $js = [
        'js/select2.full.min.js',
    ];
    public $depends = [
        'site\assets\AdminAsset',
    ];
}
