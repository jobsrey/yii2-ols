<?php

namespace jobsrey\ols\controllers;

use Yii;
use jobsrey\ols\models\UserAddress;
use jobsrey\ols\models\UserAddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * UserAddressController implements the CRUD actions for UserAddress model.
 */
class UserAddressController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserAddress models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new UserAddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single UserAddress model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "UserAddress #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new UserAddress model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new UserAddress();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new UserAddress",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new UserAddress",
                    'content'=>'<span class="text-success">Create UserAddress success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new UserAddress",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing UserAddress model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update UserAddress #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "UserAddress #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update UserAddress #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing UserAddress model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing UserAddress model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    public function actionAddAddress()
    {
        $request = Yii::$app->request;
        $model = new UserAddress();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t("app","Add New Address"),
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#checkout-address',
                    'title'=> Yii::t("app","Add New Address"),
                    'content'=>'<span class="text-success">Create UserAddress success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> Yii::t("app","Add New Address"),
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');

       
    }


    //fungsi saat user ingin mengganti alamat yang akan di gunakan saat checkout
    public function actionUseAddress($id){
        $request = Yii::$app->request;
        $model = $this->findModel($id);  
        $session = Yii::$app->session;

        $model->scenario = 'useAddressInChoseCheckout';

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> Yii::t("app","Choses Address"),
                    'content'=>$this->renderAjax('_formReadOnly', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){

                $session->set('useAddressCheckOut',$model->selectPreset);

                return [
                    'forceReload'=>'#checkout-address',
                    'title'=> Yii::t("app","Choses Address"),
                    'content'=>'<span class="text-success">Success to set address</span>',
                    'footer'=> Html::button(Yii::t('app','Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
        
                ];         
            }else{           
                return [
                    'title'=> Yii::t("app","Choses Address"),
                    'content'=>$this->renderAjax('_formReadOnly', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUseThisAddress($id){
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = $this->findModel($id);

            $session->set('useAddressCheckOut',$model->id);

            return [
                'forceReload'=>'#checkout-address',
                'forceClose'=>true,
            ];
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //for form checkout
    public function actionCreateAddressCheckout($id)
    {
        $request = Yii::$app->request;
        $model = new UserAddress();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Address",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a(Yii::t('app','Cancel'),
                            ['user-address/use-address','id'=>$id],
                            [
                                'class'=>'btn btn-danger pull-left',
                                'role'=>'modal-remote',

                            ]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#checkout-address',
                    'title'=> Yii::t("app",'Create new address successful'),
                    'content'=>'<span class="text-success">Create new address success</span>',
                    'footer'=> 
                            Html::a(Yii::t('app','Back to list address'),
                            ['user-address/use-address','id'=>$id],
                            [
                                'class'=>'btn btn-danger pull-left',
                                'role'=>'modal-remote',

                            ]).
                            Html::a(Yii::t('app','Use this address'),['user-address/use-this-address','id'=>md5($model->id)],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Address",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=>  Html::a(Yii::t('app','Cancel'),
                            ['user-address/use-address','id'=>$id],
                            [
                                'class'=>'btn btn-danger pull-left',
                                'role'=>'modal-remote',

                            ]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    //for form checkout
    public function actionUpdateAddressCheckout($id){
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Address",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a(Yii::t('app','Cancel'),[
                            'user-address/use-address','id'=>md5($model->id)
                            ],[
                                'class'=>'btn btn-danger pull-left',
                                'role'=>'modal-remote',
                            ]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#checkout-address',
                    'title'=> "Update Address Success",
                    'content'=>'<span class="text-success">Success to update address</span>',
                    'footer'=> Html::a(Yii::t('app','Back to list Address'),[
                            'user-address/use-address','id'=>md5($model->id)
                            ],[
                                'class'=>'btn btn-danger pull-left',
                                'role'=>'modal-remote',
                            ]).
                            Html::a(Yii::t('app','Use this address'),['user-address/use-this-address','id'=>md5($model->id)],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update UserAddress #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    protected function findModel($id)
    {
        if (($model = UserAddress::findOne(['md5(id)'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionAddressFaker(){
        $faker = new \Faker\Generator();
        $faker->addProvider(new \Faker\Provider\id_ID\Person($faker));
        $faker->addProvider(new \Faker\Provider\id_ID\Address($faker));
        $faker->addProvider(new \Faker\Provider\id_ID\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\id_ID\Company($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\id_ID\Internet($faker));

        $model = new UserAddress();

        for ($i=0; $i < 10; $i++) { 
            $model->isNewRecord = true;
            $model->id          = null;
            $model->recipient_name          = $faker->name;
            $model->address                 = $faker->address;
            $model->province_id             = rand(1,32);
            $model->city_id                 = rand(1,500);
            $model->phone_number            = (string)rand(10000000,99999999);
            $model->districts_id            = rand(1,1000);
            $model->postal_code             = rand(10000,99999);
            $model->is_default              = 0;
            $model->user_id                 = 0;
            // $model->
            if(!$model->save()){
                print_r($model->errors);
                die();
            }
        }
    }

    //ambil preset address
    public function actionGetPreset(){

        $request = Yii::$app->request;
        if($request->isAjax) {
            if($request->post()){
                if(isset($_POST['PresetName'])){
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    $data = array();
                    $model = UserAddress::findOne($_POST['PresetName']);

                    $data['data'] = $model;
                    $data['detailLoc'] = $model->ambilProviceAndCityByOne();

                    if($data !== null){
                        return $data;
                    }
                }
            }

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
