<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use jobsrey\ols\widgets\ProductViewZoomBox;
use jobsrey\ols\widgets\Ubislider;
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

<div class="produk-view">
    <div class="col-md-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <?= Ubislider::widget(); ?>
        </div>

        <div class="col-xs-7">

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

            <div class="tombolAksi">
                <p>
                    <?= Html::a('<i class="fa fa-shopping-cart" aria-hidden="true"></i> '.Yii::t('app','Add to cart'), [
                            'order','slug'=>$model->slug,
                            ],
                        [
                            'role'=>'modal-remote',
                            'data-modal-size'=>'large',
                            'title'=> 'Create new Asset Class',
                            'class'=>'btn btn-warning col-xs-3',
                            'style'=>'margin-right:10px;'
                    ])?>
                    <?= Html::a('<i class="glyphicon glyphicon-star" aria-hidden="true"></i>', [
                            'order','slug'=>$model->slug,
                            ],
                        [
                            'role'=>'modal-remote',
                            'data-modal-size'=>'large',
                            'title'=> 'Create new Asset Class',
                            'class'=>'btn btn-warning col-xs-1'
                    ])?>
                </p>
            </div>
            <br/>
            <br/>
            <h5><b><?= Yii::t('app','Product description');?></b></h5>
            <p>
                <?= $model->description;?>
            </p>

        </div>

    </div>

</div>