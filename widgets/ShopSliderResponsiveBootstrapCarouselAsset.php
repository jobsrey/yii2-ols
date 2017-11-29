<?php


/**
 * @link http://dokumentasi.local-server.link/
 * @copyright Copyright (c) 2015 PT. Buka Media Teknologi
 * @license http://www.bukapeta.co.id/license/
 */


namespace jobsrey\ols\widgets;


use yii\web\AssetBundle;


class ShopSliderResponsiveBootstrapCarouselAsset extends AssetBundle
{

    public $sourcePath = '@jobsrey/ols/widgets/assets/ShopSliderResponsiveBootstrapCarousel/';
    public $js = [
        'js/core.js',
    ];

	public $css = [
        'css/style.css',
	];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];


}