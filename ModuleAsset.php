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
    public $js = [
        'doc.js',
    ];

}
