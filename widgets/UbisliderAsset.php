<?php


/**
 * @link http://dokumentasi.local-server.link/
 * @copyright Copyright (c) 2015 PT. Buka Media Teknologi
 * @license http://www.bukapeta.co.id/license/
 */


namespace jobsrey\ols\widgets;


use yii\web\AssetBundle;


class UbisliderAsset extends AssetBundle
{

    public function init() {
        $this->jsOptions['position'] = \yii\web\View::POS_BEGIN;
        parent::init();
    }

    public $sourcePath = '@jobsrey/ols/widgets/assets/Ubislider/';
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
        '//cdn.jsdelivr.net/elevatezoom/3.0.8/jqueryElevateZoom.js',
        // 'js/jqueryElevateZoom.js',
        'js/ubislider.min.js',
        'js/sample.js',
    ];

	public $css = [
        'css/ubislider.min.css',
	];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];


}