<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<!-- BEGIN PRODUCTS -->
<div class="col-md-4 col-sm-6">
   <span class="thumbnail">
      <img src="https://s12.postimg.org/41uq0fc4d/item_2_180x200.png" alt="...">
      <h4><?= Html::a($model->name,['produk/view','slug'=>$model->slug]) ;?></h4>
      <div class="ratings">
         <span class="glyphicon glyphicon-star"></span>
         <span class="glyphicon glyphicon-star"></span>
         <span class="glyphicon glyphicon-star"></span>
         <span class="glyphicon glyphicon-star"></span>
         <span class="glyphicon glyphicon-star-empty"></span>
      </div>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
      <hr class="line">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <p class="price">$29,90</p>
         </div>
         <div class="col-md-6 col-sm-6">
            <a href="http://cookingfoodsworld.blogspot.in/" target="_blank" > <button class="btn btn-info right" > BUY ITEM</button></a>
         </div>
      </div>
   </span>
</div>