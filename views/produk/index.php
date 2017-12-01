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
			@import url('https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&subset=latin-ext,vietnamese');   
			
			body {
			 	#my-products font-family: 'Quicksand', sans-serif;}
			   	h4{
			    	font-weight: 600;
				}
				p{
					font-size: 12px;
					margin-top: 5px;
				}
				.price{
					font-size: 30px;
			    	margin: 0 auto;
			    	color: #333;
				}

				.thumbnail{
					opacity:0.70;
					-webkit-transition: all 0.5s; 
					transition: all 0.5s;
				}
				.thumbnail:hover{
					opacity:1.00;
					box-shadow: 0px 0px 10px #4bc6ff;
				}
				.line{
					margin-bottom: 5px;
				}
				@media screen and (max-width: 770px) {
					.right{
						float:left;
						width: 100%;
					}
				}
				span.thumbnail {
			        border: 1px solid #00c4ff !important;
			    border-radius: 0px !important;
			    -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.16);
			    -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.16);
			    box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.16);
				padding: 10px;
			}
			#my-products h4{margin-top:70px; margin-bottom:30px;}
			button {    margin-top: 6px;
			}
			.right {
			    float: right;
			    border-bottom: 2px solid #0a5971;
			}
			.btn-info {
			    color: #fff;
			    background-color: #19b4e2;
			    border-color: #19b4e2;
				font-size:13px;
				font-weight:600;
			}
		</style>
		
		<?= ListView::widget([
		    'dataProvider' => $dataProvider,
		    'itemView' => '_listProduk',
		    'layout' => "{summary}\n<div id=\"my-products\" class=\"row\">{items}</div>\n{pager}"
		]); ?>
		
		<!-- untuk list produk -->
	</div>
</div>