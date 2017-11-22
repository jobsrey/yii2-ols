<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\Produk;
use jobsrey\ols\models\ProdukSearch;
use jobsrey\ols\models\FormOrder;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

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

    public function actionOrder($id){
    	$request = Yii::$app->request;
        $model = $this->findProduk($id);  
        $modelForm = new FormOrder();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t("app","Order"),
                    'size' => 'normal',
                    'content'=>$this->renderAjax('order', [
                        'model' => $model,
                        'modelForm' => $modelForm,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t("app",'Add to cart'),['class'=>'btn btn-primary col-md-12','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> Yii::t('app','Successfully'),
                    'size' => 'normal',
                    'content'=>'<span class="text-success">'.Yii::t('app','You have successfully added a shopping cart').'</span>',
                    'footer'=> Html::button(Yii::t("app","Close"),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a(Yii::t("app",'Create More'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{

                return [
                    'title'=> Yii::t("app","Order"),
                    'size' => 'normal',
                    'content'=>$this->renderAjax('order', [
                        'model' => $model,
                        'modelForm' => $modelForm,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t("app",'Add to cart'),['class'=>'btn btn-primary col-md-12','type'=>"submit"])
        
                ];         
            }
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    protected function findProduk($id){
    	if (($model = Produk::findOne(['md5(id)'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

}
