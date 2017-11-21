<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\Produk;
use jobsrey\ols\models\ProdukSearch;

class ProdukController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

}
