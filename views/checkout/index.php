<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app','Checkout');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);


Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
]);

Modal::end();

/* @var $this yii\web\View */
?>
<h1>Checkout</h1>

<div class="checkout">
	<div class="row">
		<div class="col-md-9">
		<?php \yii\widgets\Pjax::begin(['id'=>'crud-checkout']); ?>
			<!-- Tempat Grid View nya -->
			<?php
				echo GridView::widget([
				    'dataProvider' => $dataProvider,
				    // 'filterModel' => $searchModel,
				    'columns' => require(__DIR__.'/_column.php'),
				    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
				    'toolbar'=> [
		                ['content'=>
		                    '{toggleData}'
		                    // '{export}'
		                ],
		            ],
				    'pjax' => true,
				    'bordered' => true,
				    'striped' => false,
				    'condensed' => false,
				    'responsive' => true,
				    'responsiveWrap' => false,
				    'hover' => true,
				    'floatHeader' => true,
				    // 'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
				    'showPageSummary' => true,
				    'panel' => [
		                'type' => 'success', 
		                'heading' => '<i class="glyphicon glyphicon-list"></i> '.Yii::t('app','List Checkout Product'),
		                'before'=>'',
		                'after'=>BulkButtonWidget::widget([
		                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; '.Yii::t('app','Delete All'),
		                                ["bulkdelete"] ,
		                                [
		                                    "class"=>"btn btn-danger btn-xs",
		                                    'role'=>'modal-remote-bulk',
		                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
		                                    'data-request-method'=>'post',
		                                    'data-confirm-title'=>'Are you sure?',
		                                    'data-confirm-message'=>'Are you sure want to delete this item'
		                                ]),
		                        ]).                        
		                        '<div class="clearfix"></div>',
		            ]
				]);
			?>
		<?php \yii\widgets\Pjax::end(); ?>
		</div>
		<div class="col-md-3">
		</div>
	</div>

	<!-- untuk alamat -->
	<div class="row">
		<div class="well col-md-9">
			<div class="transaction-card col-md-12">
			   	<div class="row transaction-card-body">
			      	<div class="col-sm-8">
				        <p>
				         	<b><?= Yii::t('app','You do not have a shipping address yet');?>.</b>
				         	<br data-reactid=".0.1.0.0.0.0.1">
				         	<span data-reactid=".0.1.0.0.0.0.2">
				         		Masukkan alamat pengiriman atau
				         	</span>
				         	<a href="/user/login?redirect=%2Fcart" data-reactid=".0.1.0.0.0.0.3">
				         		masuk dengan akunmu
				         	</a>
				         	<span data-reactid=".0.1.0.0.0.0.4"></span>
				         	<br class="hidden-xs" data-reactid=".0.1.0.0.0.0.5">
				         	<span data-reactid=".0.1.0.0.0.0.6">
				         	jika sudah pernah berbelanja sebelumnya</span>
				        </p>
			      	</div>
			      	<div class="col-sm-4 text-right" data-reactid=".0.1.0.0.1">
			         	<span class="hidden-xs" data-reactid=".0.1.0.0.1.0"><br data-reactid=".0.1.0.0.1.0.0"></span>
			         	<p data-reactid=".0.1.0.0.1.1">
				         	<?= Html::a(Yii::t('app','Enter the shipping address'), ['user-address/add-address'],
                    			[
                    				'role'=>'modal-remote',
                    				'title'=> 'Create new Adree',
                    				'class'=>'btn btn-primary']);?>				
        				</p>
			      	</div>
			   	</div>
			</div>
		</div>
	</div>
</div>
