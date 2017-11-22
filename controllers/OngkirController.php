<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\FormOrder;
use yii\helpers\Json;

class OngkirController extends \yii\web\Controller
{
	public function actionGetCity(){
		$out = [];
	    if (isset($_POST['depdrop_parents'])) {
	        $id = end($_POST['depdrop_parents']);

			$model = new FormOrder();
			$list = $model->ambilCity($id);

	        $selected  = null;
	        if ($id != null && count($list) > 0) {
	            $selected = '';
	            foreach ($list as $i => $account) {
	                $out[] = ['id' => $account['city_id'], 'name' => $account['city_name']];
	                if ($i == 0) {
	                    $selected = $account['city_id'];
	                }
	            }
	            // Shows how you can preselect a value
	            echo Json::encode(['output' => $out, 'selected'=>$selected]);
	            return;
	        }
	    }
	    echo Json::encode(['output' => '', 'selected'=>'']);


	}
}
