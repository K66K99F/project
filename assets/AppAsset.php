<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/chosen.min.css',
        'css/main.min.css',
    ];
    public $js = [
//        'js/common.js',
        'js/scripts.min.js',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
//    public function init()
//    {
//        parent::init();
//        // resetting BootstrapAsset to not load own css files
//        \Yii::$app->assetManager->bundles['yii\\web\\YiiAsset'] = [
//            'css' => [],
//            'js' => []
//        ];
//    }
}
