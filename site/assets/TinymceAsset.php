<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class TinymceAsset
 * @package site\assets
 */
class TinymceAsset extends AssetBundle
{
    public $sourcePath = '@site/assets/src/tinymce';
    public $css = [
    ];
    public $js = [
        'tinymce.min.js',
        'tinymce.func.js',
    ];
    public $depends = [
        'site\assets\AdminAsset',
    ];
}
