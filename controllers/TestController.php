<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\FormOrder;
use yii\helpers\Json;

class TestController extends \yii\web\Controller
{
	public function actionIndex(){
		$product = \jobsrey\ols\models\ProdukCart::findOne(1);
        if ($product) {
            \Yii::$app->cart->create($product);
            echo 'ini dia';
        }
        echo 'bisa';
	}

	public function actionLihat(){
		$cart = \Yii::$app->cart;
        $products = $cart->getItems();

        print_r($products);
        die();
	}
}