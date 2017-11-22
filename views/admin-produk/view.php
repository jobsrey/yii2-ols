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
<div class="produk-view">
    <div class="col-md-12">
    </div>

    <div class="col-md-3">
        <?= ProductViewZoomBox::widget(); ?>
    </div>

    <div class="col-md-9">
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

</div>
