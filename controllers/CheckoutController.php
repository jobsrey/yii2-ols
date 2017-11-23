<?php

namespace jobsrey\ols\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yz\shoppingcart\ShoppingCart;
use jobsrey\ols\models\ProdukCart;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;

class CheckoutController extends \yii\web\Controller
{

	/*public function actions()
    {
       return ArrayHelper::merge(parent::actions(), [
           'editqty' => [                                       // identifier for your editable column action
               'class' => EditableColumnAction::className(),     // action class name
               'modelClass' => ProdukCart::className(),                // the model for the record being edited
               'outputValue' => function ($model, $attribute, $key, $index) {
                    print_r($model);
                    die();
                    // $cart = new ShoppingCart();
                    // $cart->update($key,(int)$model->$attribute);
                    return (int) $quantity = $model->$attribute;      // return any custom output value if desired
               },
               'outputMessage' => function($model, $attribute, $key, $index) {
                     return '';                                  // any custom error to return after model save
               },
               'showModelErrors' => true,                        // show model validation errors after save
               'errorOptions' => ['header' => '']                // error summary HTML options
               // 'postOnly' => true,
               // 'ajaxOnly' => true,
               // 'findModel' => function($id, $action) {},
               // 'checkAccess' => function($action, $model) {}
           ]
       ]);
    }
*/
    public function actionIndex()
    {

    	$cart = new ShoppingCart();

    	$dataProvider = new ArrayDataProvider([
		    'allModels' => $cart->getPositions(),
		    'sort' => [
		        'attributes' => ['name','qty','price','quantity','cost'],
		    ],
		    'pagination' => [
		        'pageSize' => 10,
		    ],
		    'key'=>'id',
		]);


        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

    public function actionEditqty(){
    	$model = new ProdukCart(); // your model can be loaded here

    	$cart = new ShoppingCart();
    
	    // Check if there is an Editable ajax request
	    if (isset($_POST['hasEditable'])) {

	        // use Yii's response format to encode output as JSON
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	        
	        // read your posted model attributes
	        if ($model->load($_POST)) {

	        	//editable quantity
	        	if(isset($_POST['ProdukCart'])){

	        		foreach ($_POST['ProdukCart'] as $value) {
	        			$quantity = $value['quantity'];
	        		}

	        		$position = $cart->getPositionById($_POST['editableKey']);

	        		$cart->update($position,$quantity);

		            // return JSON encoded output in the below format
		            return ['output'=>$quantity, 'message'=>''];
	            }

	            // alternatively you can return a validation error
	            return ['output'=>'', 'message'=>'Validation error'];
	        }
	        // else if nothing to do always return an empty JSON encoded output
	        else {
	            return ['output'=>'', 'message'=>''];
	        }
	    }
	    
	    // Else return to rendering a normal view
	    // return $this->render('view', ['model'=>$model]);
    }


}
