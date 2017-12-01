<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Json;
use kartik\touchspin\TouchSpin;

$this->title = Yii::t('app','Checkout');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);


Modal::begin([
    "id"=>"ajaxCrudModal",
    "options"=> [
        'data-backdrop'=>"static",
        'data-keyboard'=>"false",
    ],
    "footer"=>"",// always need it for jquery plugin
]);

Modal::end();

/* @var $this yii\web\View */


/*register select2 javascript ajax custom*/
$this->registerJs($this->render('_select2_ajax.js'),\yii\web\View::POS_HEAD);


?>
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <!-- pilih alamat -->
        <!-- untuk alamat -->
        <?php \yii\widgets\Pjax::begin(['id'=>'checkout-address']); ?>
        <?php if($defaultAddress == null){ ?>
        <div class="well col-md-12">
            <div class="transaction-card col-md-12">
                <div class="row transaction-card-body">
                    <div class="col-sm-8">
                        <p>
                            <b><?= Yii::t('app','You do not have a shipping address yet');?>.</b>
                            <br/>
                            <span>
                                Masukkan alamat pengiriman atau
                            </span>
                            <a href="/user/login?redirect=%2Fcart">
                                masuk dengan akunmu
                            </a>
                            <span></span>
                            <br class="hidden-xs">
                            <span>
                                jika sudah pernah berbelanja sebelumnya
                            </span>
                        </p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="hidden-xs"><br></span>
                        <p>
                            <?= Html::a(Yii::t('app','Enter the shipping address'), ['user-address/add-address'],
                                [
                                    'role'=>'modal-remote',
                                    'title'=> 'Create new Adree',
                                    'class'=>'btn btn-primary']);?>             
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="well col-md-12">
            <div class="transaction-card col-md-12">
               <div class="row transaction-card-body">
                    <div class="col-sm-3 col-xs-5">
                        <p><b>Penerima</b><br/>
                        <span><?=$defaultAddress->recipient_name ;?></span>
                        <br><span><?=$defaultAddress->phone_number ;?></span></p>
                    </div>
                    <div class="col-sm-6 col-xs-7">
                        <p><b>Alamat Pengiriman</b><br>
                        <span><?= $defaultAddress->address ;?> Sukmajaya - Depok. Jawa Barat - 16415.</span></p>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> '.Yii::t('app','Change Address'), ['user-address/use-address','id'=>md5($defaultAddress->id)],
                                [
                                    'role'=>'modal-remote',
                                    'title'=> 'Change Address',
                                    'class'=>'btn btn-primary']);?> 
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>



    <div class="col-sm-12 col-md-10 col-md-offset-1">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataShopping as $value) { ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body" style="padding-left: 10px;">
                                <h4 class="media-heading"><a href="#"><?= $value->name;?></a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong><?= $value->msg_to_seller;?></strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-2 col-md-2" style="text-align: center">
                            <?php
                                echo TouchSpin::widget([
                                    'name' => 'volume'.$value->id,
                                    'readonly' => true,
                                    'options' => [
                                        'id' => 'id_saya'.$value->id
                                    ],
                                    'pluginOptions' => [
                                        'verticalbuttons' => true,
                                        'min' => 1,
                                        'max' => 5000,
                                        'initval' => $value->quantity,
                                    ],
                                    'pluginEvents' => [
                                        "touchspin.on.startspin " => 'function() { 
                                            var iniData = $(this).val();
                                            console.log(iniData);
                                        }',
                                    ],
                                ]);
                            ?>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <?=  Html::a('<i class="glyphicon glyphicon-remove-sign"></i> Remove',['produk/delete-order','id'=>md5($value->id)],[
                                    'title'                => Yii::t('app', "Delete"), 
                                    'class'                => 'btn btn-danger',
                                    'role'                 => 'modal-remote',
                                    'data-confirm'         => false, 
                                    'data-method'          => false,
                                    'data-request-method'  => 'post',
                                    'data-confirm-title'   => Yii::t('app', "Are you sure?"),
                                    'data-confirm-message' => Yii::t('app', "Are you sure want to delete this item")
                                ]);
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Estimated shipping</h5></td>
                    <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                    </button></td>
                    <td>
                    <button type="button" class="btn btn-success">
                        Checkout <span class="glyphicon glyphicon-play"></span>
                    </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>