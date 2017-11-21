<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use amilna\elevatezoom\ElevateZoom;

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
        <?php
            $images = [
                [
                    'image'=>'https://images-eu.ssl-images-amazon.com/images/I/71Bveild+AL.AC_AA200.jpg',
                    'small'=>'https://images-eu.ssl-images-amazon.com/images/I/71Bveild+AL.AC_AA200.jpg',
                    'medium'=>'https://images-eu.ssl-images-amazon.com/images/I/71Bveild+AL.AC_AA200.jpg',
                ],
                    // 'https://cdn.shopclues.com/images/thumbnails/74207/320/320/102011644punchers71497426443.jpg',
                    // 'https://images-eu.ssl-images-amazon.com/images/I/916DWoHhEAL.AC_AA200.jpg',
                    // 'https://assets.mspcdn.net/t_c-desktop-normal,f_auto,q_auto,d_c:noimage.jpg/c/8808-62-4.jpg',
                ];

            echo ElevateZoom::widget([
                'images'=>$images,
                'baseUrl'=>'',
                'smallPrefix'=>'/.thumbs',
                'mediumPrefix'=>'',
            ]);

        /* //or another example set 'images' with 3 dimension array:
        $images'= [
            [   
                'image'=>'an url of zoom image 1',
                'small'=>'an url of gallery display image 1',
                'medium'=>'an url of basic display image 1'
            ],
            [   
                'image'=>'an url of zoom image n',
                'small'=>'an url of gallery display image n',
                'medium'=>'an url of basic display image n'
            ],
        ];

        echo ElevateZoom::widget([
            'images'=>$images,      
        ]);
        */
        ?>
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
