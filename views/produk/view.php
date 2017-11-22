<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use amilna\elevatezoom\ElevateZoom;
use jobsrey\ols\widgets\ProductViewZoomBox;
/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\Produk */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
</style>

<div class="produk-view">
    <div class="col-md-12">
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= ProductViewZoomBox::widget(); ?>
        </div>

        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'price',
                    'qty',
                    'description:ntext',
                    'is_new',
                ],
            ]) ?>

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
                        <small class="product-pricelastupdated"><i>Perubahan Harga Terakhir: 06-08-2017, 00:06 WIB</i></small>
                    </div>
                    <input type="hidden" id="product_price_int" value="100000">
                </div>
            </div>
        </div>

    </div>

</div>
