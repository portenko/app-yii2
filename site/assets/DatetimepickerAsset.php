<?php

namespace site\assets;

use yii\web\AssetBundle;

/**
 * Class DatetimepickerAsset
 * @package site\assets
 */
class DatetimepickerAsset extends AssetBundle
{
    public $sourcePath = '@site/assets/src/datetimepicker';
    public $css = [
        'jquery.datetimepicker.min.css'
    ];
    public $js = [
        'jquery.datetimepicker.full.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
