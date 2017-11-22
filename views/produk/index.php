<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

?>
<div class="col-md-3">
	<!-- sidebar untuk kategori dan kawan2 -->
</div>
<div class="col-md-8">
	<div class="col-md-12">
		<!-- Untuk menu pencarian produk -->
	</div>
	<div class="col-md-12">
		<h1>Hello</h1>
		<style type="text/css">
			.thumbnail
			{
			    margin-bottom: 20px;
			    padding: 0px;
			    -webkit-border-radius: 0px;
			    -moz-border-radius: 0px;
			    border-radius: 0px;
			}

			.item.list-group-item
			{
			    float: none;
			    width: 100%;
			    background-color: #fff;
			    margin-bottom: 10px;
			}
			.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
			{
			    background: #428bca;
			}

			.item.list-group-item .list-group-image
			{
			    margin-right: 10px;
			}
			.item.list-group-item .thumbnail
			{
			    margin-bottom: 0px;
			}
			.item.list-group-item .caption
			{
			    padding: 9px 9px 0px 9px;
			}
			.item.list-group-item:nth-of-type(odd)
			{
			    background: #eeeeee;
			}

			.item.list-group-item:before, .item.list-group-item:after
			{
			    display: table;
			    content: " ";
			}

			.item.list-group-item img
			{
			    float: left;
			}
			.item.list-group-item:after
			{
			    clear: both;
			}
			.list-group-item-text
			{
			    margin: 0 0 11px;
			}
		</style>
		<div id="products" class="row list-group">
			<?= ListView::widget([
			    'dataProvider' => $dataProvider,
			    'itemView' => '_listProduk',
			]); ?>
		</div>
		
		<!-- untuk list produk -->
	</div>
</div>