<?php


namespace jobsrey\ols\widgets;

use yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;
use yii\helpers\Url;
/**
 * This is just an example.
 */
class ShopSliderResponsiveBootstrapCarousel extends \yii\base\Widget
{
    public function run()
    {
    	$view = $this->getView();
    	return $view->render('test');
    }

    public function init()
    {
    	$this->registerAssets();
    }

    protected function registerAssets() {
    	$view = $this->getView();
      	ShopSliderResponsiveBootstrapCarouselAsset::register($view,View::POS_END);	
    }
}