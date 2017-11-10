<?php

namespace fijas\yii2\rest_api_doc;

class ModuleAsset extends \yii\web\AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/fijas/rest-api-doc/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'jsonview/jquery.jsonview.min.css',
        'doc.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'jsonview/jquery.jsonview.min.js',
        'doc.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
