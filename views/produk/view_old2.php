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

    .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
    .menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
    .btn-success{width:100%;border-radius:0;}
    .section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
    .title-price{margin-top:30px;margin-bottom:0;color:black}
    .title-attr{margin-top:0;margin-bottom:0;color:black;}
    .btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
    .btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
    div.section > div {width:100%;display:inline-flex;}
    div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
    .attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
    .attr.active,.attr2.active{ border:1px solid orange;}

    @media (max-width: 426px) {
        .container {margin-top:0px !important;}
        .container > .row{padding:0 !important;}
        .container > .row > .col-xs-12.col-sm-5{
            padding-right:0 ;    
        }
        .container > .row > .col-xs-12.col-sm-9 > div > p{
            padding-left:0 !important;
            padding-right:0 !important;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > ul{
            padding-left:10px !important;
            
        }            
        .section{width:104%;}
        .menu-items{padding-left:0;}
    }
</style>

<div class="produk-view" style="background: white;">
    <div class="col-md-12">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row" >
        <div class="col-xs-4 item-photo">
            <img style="max-width:100%;" src="https://ak1.ostkcdn.com/images/products/8818677/Samsung-Galaxy-S4-I337-16GB-AT-T-Unlocked-GSM-Android-Cell-Phone-85e3430e-6981-4252-a984-245862302c78_600.jpg" />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">

                    <!-- Datos del vendedor y titulo del producto -->
            <h3>Samsung Galaxy S4 I337 16GB 4G LTE Unlocked GSM Android Cell Phone</h3>    
            <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>

            <!-- Precios -->
            <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
            <h3 style="margin-top:0px;">U$S 399</h3>

            <!-- Detalles especificos del producto -->
            <div class="section">
                <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
                <div>
                    <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                    <div class="attr" style="width:25px;background:white;"></div>
                </div>
            </div>
            <div class="section" style="padding-bottom:5px;">
                <h6 class="title-attr"><small>CAPACIDAD</small></h6>                    
                <div>
                    <div class="attr2">16 GB</div>
                    <div class="attr2">32 GB</div>
                </div>
            </div>   
            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr"><small>CANTIDAD</small></h6>                    
                <div>
                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                    <input value="1" />
                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                </div>
            </div>                

            <!-- Botones de compra -->
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Agregar a lista de deseos</a></h6>
            </div>                                        
        </div> 
    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="col-xs-9">
            <?= $this->render('_menuViewProduk',['model'=>$model]);?>
        </div>
    </div>

</div>


<?php

$scriptJs = '
     $(document).ready(function(){
        //-- Click on detail
        $("ul.menu-items > li").on("click",function(){
            $("ul.menu-items > li").removeClass("active");
            $(this).addClass("active");
        })

        $(".attr,.attr2").on("click",function(){
            var clase = $(this).attr("class");

            $("." + clase).removeClass("active");
            $(this).addClass("active");
        })

        //-- Click on QUANTITY
        $(".btn-minus").on("click",function(){
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)){
                if (parseInt(now) -1 > 0){ now--;}
                $(".section > div > input").val(now);
            }else{
                $(".section > div > input").val("1");
            }
        })            
        $(".btn-plus").on("click",function(){
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)){
                $(".section > div > input").val(parseInt(now)+1);
            }else{
                $(".section > div > input").val("1");
            }
        })                        
    }) 
';

$this->registerJs($scriptJs);

?>
