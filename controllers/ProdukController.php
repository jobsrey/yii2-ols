<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\Produk;
use jobsrey\ols\models\ProdukCart; //memanggil tuturnan shoping cart
use jobsrey\ols\models\ProdukSearch;
use jobsrey\ols\models\FormOrder;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use yz\shoppingcart\ShoppingCart;

class ProdukController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize=18;

        return $this->render('index',['dataProvider'=>$dataProvider]);
    }


    public function actionView($slug){
    	return $this->render('view',['model'=> $this->findProduk($slug)]);
    }

    public function actionOrder($slug){
    	$request = Yii::$app->request;
        $model = $this->findProduk($slug);  
        $modelForm = new FormOrder();

        // $dataProvince = $modelForm->ambilProvice();

        $modelForm->scenario = 'orderForm';

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
                        // 'dataProvince' => $dataProvince,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t("app",'Add to cart'),['class'=>'btn btn-primary col-md-12','type'=>"submit"])
        
                ];         
            }else if($modelForm->load($request->post()) && $modelForm->validate()){

                $shopping = new ShoppingCart();

                $produkCart = ProdukCart::findOne($model->id);
                if ($produkCart) {
                    $shopping->put($produkCart, $modelForm->qty);
                    return [
                        // 'forceReload'=>'#crud-datatable-pjax',
                        'title'=> Yii::t('app','Successfully'),
                        'size' => 'normal',
                        'content'=>'<span class="text-success">'.Yii::t('app','You have successfully added a shopping cart').'</span>',
                        'footer'=> Html::button(Yii::t("app","Close"),['class'=>'btn btn-danger col-md-12','data-dismiss'=>"modal"])
            
                    ];    
                } else {
                    return [
                        // 'forceReload'=>'#crud-datatable-pjax',
                        'title'=> Yii::t('app','Failed'),
                        'size' => 'normal',
                        'content'=>'<span class="text-danger">'.Yii::t('app','You have failed added a shopping cart').'</span>',
                        'footer'=>  Html::a(Yii::t("app",'Create More'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
            
                    ];
                }

                
            }else{
                return [
                    'title'=> Yii::t("app","Order"),
                    'size' => 'normal',
                    'content'=>$this->renderAjax('order', [
                        'model' => $model,
                        'modelForm' => $modelForm,
                        // 'dataProvince' => $dataProvince,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t("app",'Add to cart'),['class'=>'btn btn-primary col-md-12','type'=>"submit"])
        
                ];         
            }
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    public function actionDeleteOrder($id){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        if($request->isAjax) {
            $cart = new ShoppingCart();
            $model = $this->findProdukCartById($id);
            $cart->remove($model);
            return [
                    'forceClose'  => true, 
                    'forceReload' => '#crud-checkout',
            ]; 
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    protected function findProduk($slug){
    	if (($model = Produk::findOne(['slug'=>$slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findProdukCartById($id){
        if (($model = ProdukCart::findOne(['md5(id)'=>$id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
