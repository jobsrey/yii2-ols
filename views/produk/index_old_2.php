<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

?>
<div class="col-md-3">
	<!-- sidebar untuk kategori dan kawan2 -->
	<!-- Untuk menu pencarian produk -->
	<?= $this->render('_filter_search');?>
</div>
<div class="col-md-9">
	<div class="col-md-12">
		
	</div>
	<div class="col-md-12">
		<h1>Hello</h1>
		<style type="text/css">
			body {
			    background: #f1f1f1;
			}

			.product-item {
			    padding: 15px;
			    background: #fff;
			    margin-top: 20px;
			    position: relative;
			}
			.product-item:hover {
			    box-shadow: 5px 5px rgba(234, 234, 234, 0.9);
			}
			.product-item:after {
			    content: ".";
			    display: block;
			    height: 0;
			    clear: both;
			    visibility: hidden;
			    font-size: 0;
			    line-height:0;
			}
			.sticker {
			    position: absolute;
			    top: 0;
			    left: 0;
			    width: 63px;
			    height: 63px;
			}
			.sticker-new {
			    background: url(http://keenthemes.com/assets/bootsnipp/new.png) no-repeat;
			    left: auto;
			    right: 0;
			}
			.pi-img-wrapper {
			    position: relative;
			}
			.pi-img-wrapper div {
			    background: rgba(0,0,0,0.3);
			    position: absolute;
			    left: 0;
			    top: 0;
			    display: none;
			    width: 100%;
			    height: 100%;
			    text-align: center;
			}
			.product-item:hover>.pi-img-wrapper>div {
			    display: block;
			}
			.pi-img-wrapper div .btn {
			    padding: 3px 10px;
			    color: #fff;
			    border: 1px #fff solid;
			    margin: -13px 5px 0;
			    background: transparent;
			    text-transform: uppercase;
			    position: relative;
			    top: 50%;
			    line-height: 1.4;
			    font-size: 12px;
			}
			.product-item .btn:hover {
			    background: #e84d1c;
			    border-color: #c8c8c8;
			}

			.product-item h3 {
			    font-size: 14px;
			    font-weight: 300;
			    padding-bottom: 4px;
			    text-transform: uppercase;
			}
			.product-item h3 a {
			    color: #3e4d5c;
			}
			.product-item h3 a:hover {
			    color: #E02222;
			}
			.pi-price {
			    color: #e84d1c;
			    font-size: 18px;
			    float: left;
			    padding-top: 1px;
			}
			.product-item .add2cart {
			    float: right;
			    color: #a8aeb3;
			    border: 1px #ededed solid;
			    padding: 3px 6px;
			    text-transform: uppercase;
			}
	        .product-item .add2cart:hover {
	            color: #fff;
	            background: #e84d1c;
	            border-color: #e84d1c;
	        }
		</style>
		
		<?= ListView::widget([
		    'dataProvider' => $dataProvider,
		    'itemView' => '_listProduk',
		    'layout' => "{summary}\n<div id=\"products\" class=\"row\">{items}</div>\n{pager}"
		]); ?>
		
		<!-- untuk list produk -->
	</div>
</div>