<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
//default value
$modelForm->qty = 1;

?>
<?php $form = ActiveForm::begin(); ?>


<style type="text/css">
	.control-label {
	    display: inline-block;
	    margin-bottom: 7px;
	    font-size: 13px;
	    color: rgba(0,0,0,.38);
	}
</style>


<div class="row" style="font-size: 12px;">
	<div class="col-md-6">
		<label class="control-label"><?= Yii::t('app','Product Name');?></label>
		<p style="font-size: 12px;"><b><?= $model->name;?></b></p>
		<div class="row">
			<div class="col-md-6">
				<?= $form->field($modelForm,'qty')->textInput();?>
			</div>
			<div class="col-md-6">
				<label class="control-label"><?= Yii::t('app','Product Name');?></label><br>
				Rp. 13.0000
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<?= $form->field($modelForm, 'msg_to_seller')->textarea(['rows' => '3','placeholder'=>Yii::t('app','example: white color / size xl ')]);?>
	</div>
</div>
<div class="row" style="font-size: 12px">
	<div class="col-md-3">
 		<?= $form->field($modelForm, 'provice_id')->dropDownList($dataProvince, ['id'=>'city-id']); ?>
 	</div>
 	<div class="col-md-3">
 		<?php
 			echo $form->field($modelForm, 'city_id')->widget(DepDrop::classname(), [
			    'options'=>['id'=>'subcat-id'],
			    'pluginOptions'=>[
			        'depends'=>['city-id'],
			        'placeholder'=>Yii::t('app','Select city').'...',
			        'url'=>Url::to(['ongkir/get-city'])
			    ]
			]);
		?>
 	</div>
</div>
<?php ActiveForm::end(); ?>
