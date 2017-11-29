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
class Ubislider extends \yii\base\Widget
{
	public function run()
    {
    	$htmlTag = '';

    	$htmlTag = '

    		<div class="clearfix">
				<div class="ubislider-image-container" data-ubislider="#slider4" id="imageSlider4" data-image="2"><img src="http://ubislider.com/img/sample3.jpg"></div>
		        <div id="slider4" class="ubislider ecommerce" data-slidetime="1">
		            <a class="arrow prev pasive" style="display: none;"></a>
		            <a class="arrow next" style="display: none;"></a>
		            <ul id="gal1" class="ubislider-inner" style="width: 516px; left: -86px;">
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample5.jpg"> 
		            		</a> 
		            	</li>
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample4.jpg"> 
		            		</a> 
		            	</li>
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample3.jpg"> 
		            		</a> 
		            	</li>
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample1.jpg"> 
		            		</a> 
		            	</li>
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample2.jpg"> 
		            		</a> 
		            	</li>
		            	<li> 
		            		<a> 
		            			<img class="product-v-img" src="http://ubislider.com/img/sample3.jpg"> 
		            		</a> 
		            	</li>
		            </ul>
		        </div>
		    </div>

    	';

    	return $htmlTag;
    }

    public function init(){
    	$this->registerAssets();
    }

    public function registerAssets(){
    	$view = $this->getView();
      	UbisliderAsset::register($view,View::POS_END);	
    }
}
