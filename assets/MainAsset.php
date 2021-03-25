<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/temp.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'app\assets\parts\AdminLteAsset',
        'app\assets\parts\ParticlesAsset',
        'app\assets\parts\FontAwesomeAsset'
    ];
}
