<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Json;


$this->title = Yii::t('app','Checkout');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);


Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
]);

Modal::end();

/* @var $this yii\web\View */


/*register select2 javascript ajax custom*/
$this->registerJs($this->render('_select2_ajax.js'),\yii\web\View::POS_HEAD);

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

	
	<div class="row">
		<div class="col-md-9">
			<?php
				/*echo Select2::widget([
				    'name' => 'kv-repo-template',
				    'value' => '14719648',
				    'initValueText' => 'kartik-v/yii2-widgets',
				    'options' => ['placeholder' => 'Search for a repo ...'],
				    'pluginOptions' => [
				        'allowClear' => true,
				        'minimumInputLength' => 1,
				        'ajax' => [
				            'url' => "https://api.github.com/search/repositories",
				            'dataType' => 'json',
				            'delay' => 250,
				            'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
				            'processResults' => new JsExpression('resultData'),
				            'cache' => true
				        ],
				        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
				        'templateResult' => new JsExpression('formatRepo'),
				        'templateSelection' => new JsExpression('formatRepoSelection'),
				    ],
				]);*/
			?>
		</div>

		<!-- untuk alamat -->
		<?php \yii\widgets\Pjax::begin(['id'=>'checkout-address']); ?>
		<?php if($defaultAddress == null){ ?>
		<div class="well col-md-9">
			<div class="transaction-card col-md-12">
			   	<div class="row transaction-card-body">
			      	<div class="col-sm-8">
				        <p>
				         	<b><?= Yii::t('app','You do not have a shipping address yet');?>.</b>
				         	<br/>
				         	<span>
				         		Masukkan alamat pengiriman atau
				         	</span>
				         	<a href="/user/login?redirect=%2Fcart">
				         		masuk dengan akunmu
				         	</a>
				         	<span></span>
				         	<br class="hidden-xs">
				         	<span>
				         	jika sudah pernah berbelanja sebelumnya</span>
				        </p>
			      	</div>
			      	<div class="col-sm-4 text-right">
			         	<span class="hidden-xs"><br></span>
			         	<p>
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
		<?php } else { ?>
		<div class="well col-md-9">
			<div class="transaction-card col-md-9">
			   <div class="row transaction-card-body">
			      	<div class="col-sm-3 col-xs-5">
			         	<p><b>Penerima</b><br/>
			         	<span><?=$defaultAddress->recipient_name ;?></span>
			         	<br><span><?=$defaultAddress->phone_number ;?></span></p>
			      	</div>
			      	<div class="col-sm-6 col-xs-7">
			         	<p><b>Alamat Pengiriman</b><br>
			         	<span><?= $defaultAddress->address ;?> Sukmajaya - Depok. Jawa Barat - 16415.</span></p>
			      	</div>
			      	<div class="col-sm-3 col-xs-12">
			      		<?= Html::a(Yii::t('app','Change Address'), ['user-address/use-address','id'=>md5($defaultAddress->id)],
                    			[
                    				'role'=>'modal-remote',
                    				'title'=> 'Change Address',
                    				'class'=>'btn btn-primary']);?>	
			      	</div>
			   	</div>
			</div>
		</div>
		<?php } ?>
		<?php \yii\widgets\Pjax::end(); ?>

	</div>
</div>
