<?php


/**
 * @link http://dokumentasi.local-server.link/
 * @copyright Copyright (c) 2015 PT. Buka Media Teknologi
 * @license http://www.bukapeta.co.id/license/
 */


namespace jobsrey\ols\widgets;


use yii\web\AssetBundle;


class ProductViewZoomBoxAsset extends AssetBundle
{

    public $sourcePath = '@jobsrey/ols/widgets/assets/ProductViewZoomBox/';
    public $js = [
        'js/core.js',
    ];

	public $css = [
        'css/style.css',
	];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];


}