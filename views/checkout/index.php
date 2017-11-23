<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\bootstrap\Modal;

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
	</div>
</div>
