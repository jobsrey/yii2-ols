<?php
use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [
        [
            'label' => Yii::t('app', 'Product Information'),
            'url' => ['produk/view','slug'=>$model->slug],
        ],
        [
            'label' => Yii::t('app', 'Review').' (0)',
            'url' => ['produk/review','id'=>md5($model->id)],
        ],
        [
            'label' => Yii::t('app','Product Discussion').' (0)',
            'url' => ['produk/product-discussion','id'=>md5($model->id)],
        ],
    ],
]) ?>