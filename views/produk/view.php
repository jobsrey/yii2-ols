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


<?= $this->render('_view_produk_image_data',['model'=>$model]);?>

<br/>
<br/>
<br/>
<div class="ulasan">
    <div class="col-xs-12">
        <?= $this->render('_menuViewProduk',['model'=>$model]);?>
    </div>

</div>