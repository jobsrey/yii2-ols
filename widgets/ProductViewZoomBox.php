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
class ProductViewZoomBox extends \yii\base\Widget
{

    public function run()
    {
        $pathFIleOrImage = Yii::getAlias('@web');

        $html_tag = '
        <div class="container">
				      <div class="">
	                <ul id="glasscase" class="gc-start">
	                    <li><img src="http://www.pngall.com/wp-content/uploads/2016/03/Smartphone-Transparent.png" alt="Text" data-gc-caption="Handphone Baru 1" /></li>
	                    <li><img src="https://amanandandroid.files.wordpress.com/2013/01/samsung_galaxy_s_ii_plus.png" alt="Text" /></li>
	                </ul>
	            </div>
			  </div>';

        return $html_tag;

    }

    public function init()
    {
    	$this->registerAssets();
    }

    public function registerAssets()
    {
      	$view = $this->getView();
      	ProductViewZoomBoxAsset::register($view,View::POS_END);	

      	$scriptJs = '
      		$(document).ready( function () {
	            //If your <ul> has the id "glasscase"
	            $("#glasscase").glassCase({ \'thumbsPosition\': \'bottom\', \'widthDisplay\' : 250, \'heightDisplay\': 300});
	        });
      	';

      	$view->registerJs($scriptJs);
        // $view->registerJs($this->MapnikDeclaration(), \yii\web\View::POS_HEAD);
        // $view->registerJs($Config,\yii\web\View::POS_HEAD);
    }
}
