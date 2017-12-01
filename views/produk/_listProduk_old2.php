<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


<div class="col-md-4">
    <div class="product-item">
      <div class="pi-img-wrapper">
        <img src="http://keenthemes.com/assets/bootsnipp/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
        <div>
          <a href="#" class="btn">Zoom</a>
          <a href="#" class="btn">View</a>
        </div>
      </div>
      <h3><?= Html::a($model->name,['produk/view','slug'=>$model->slug]) ;?></h3>
      <div class="pi-price">$29.00</div>
      <a href="javascript:;" class="btn add2cart">Add to cart</a>
      <div class="sticker sticker-new"></div>
    </div>
</div>