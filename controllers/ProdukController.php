<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\Produk;
use jobsrey\ols\models\ProdukSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProdukController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',['dataProvider'=>$dataProvider]);
    }


    public function actionView($id){
    	return $this->render('view',['model'=> $this->findProduk($id)]);
    }

    protected function findProduk($id){
    	if (($model = Produk::findOne(['md5(id)'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

}
