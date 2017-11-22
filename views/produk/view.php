<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use jobsrey\ols\widgets\ProductViewZoomBox;
use jobsrey\ols\assets\FontAwesome;
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Modal;


CrudAsset::register($this);
FontAwesome::register($this);

/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\Produk */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'options' => [
        'class'    => 'modal modal-success fade',
        'id'       => 'ajaxCrudModal',
        'tabindex' => false,
    ],
    'footer'  => '',
]);
Modal::end();

?>



<style type="text/css">
    .product-box-content {
        display: block;
        padding: 5px 0;
    }
    .product-box {
        border: 1px solid #e4e4e4;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        margin-bottom: 10px;
        float: left;
        width: 100%;
    }
    .product-pricetag {
        color: #f44336;
        margin: 0;
        padding: 10px 0;
        font-size: 1.6em;
    }
    .product-pricelastupdated {
        color: #999;
        font-size: 10px;
    }
</style>

<div class="produk-view">
    <div class="col-md-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= ProductViewZoomBox::widget(); ?>
        </div>

        <div class="col-md-6">

            <?= $this->render('_menuViewProduk',['model'=>$model]);?>
            <table class="table" style="font-size: 12px;">
                <tr>
                    <td><i class="glyphicon glyphicon-eye-open"></i> <?= Yii::t('app','See');?></td>
                    <td>80</td>
                    <td><i class="glyphicon glyphicon-briefcase"></i> <?= Yii::t('app','Weight');?></td>
                    <td>300gr</td>
                </tr>
                <tr>
                    <td><i class="fa fa-shopping-basket" aria-hidden="true"></i> <?= Yii::t('app','Sold');?></td>
                    <td>0</td>
                    <td><i class="fa fa-truck" aria-hidden="true"></i> <?= Yii::t('app','Insurance');?></td>
                    <td>Optional</td>
                </tr>
                <tr>
                    <td><i class="fa fa-tag" aria-hidden="true"></i> <?= Yii::t('app','Condition');?></td>
                    <td>New</td>
                    <td><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?= Yii::t('app','Booking Min');?></td>
                    <td>1</td>
                </tr>
            </table>

            <h5><b><?= Yii::t('app','Product description');?></b></h5>
            <p>
                <?= $model->description;?>
            </p>

        </div>

        <div class="col-md-3">
            <!-- Detail harga -->
            <div class="product-box">
                <div class="product-box-content">
                    <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer" class="product-pricetag p-0 mt-10 text-center">
                        <span class="bold" itemprop="priceCurrency" content="IDR">Rp </span>
                        <span class="bold" itemprop="price">100.000</span>
                    </div>
                    <div class="text-center">
                        <small class="product-pricelastupdated"><i><?= Yii::t('app','Last Price Changes')?>: 06-08-2017, 00:06 WIB</i></small>
                    </div>
                    <input type="hidden" id="product_price_int" value="100000">
                </div>
            </div>

            <div class="">
                <?= Html::a('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t('app','Add to cart'), [
                    'order','id'=>md5($model->id),
                    ],
                    [
                        'role'=>'modal-remote',
                        'data-modal-size'=>'large',
                        'title'=> 'Create new Asset Class',
                        'class'=>'btn btn-success col-md-12'
                ])?>
            </div>
            
        </div>

    </div>

</div>
