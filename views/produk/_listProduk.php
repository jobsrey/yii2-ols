<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


<div class="item  col-xs-4 col-lg-4">
    <div class="thumbnail">
        <img class="group list-group-image" src="https://d2z1i9y16ulya2.cloudfront.net/uploads/items/square/ca66044c884c9b1028d4af2da3c75851573661cc7142b206303003a897e5fa5d.jpeg" alt="" />
        <div class="caption">
            <h5 class="group inner list-group-item-heading">
                <?= Html::a($model->name,['produk/view','slug'=>$model->slug]) ;?>    
            </h5>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p style="font-size: 11px;">
                        My Branch
                    </p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a href="/item/baby-bandana-a2/kakedaclothingline/80257">
                        <span itemprop="price" class="col-md-12 product-card-price">Rp. <?= $model->price ;?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>