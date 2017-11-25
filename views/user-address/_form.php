<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\UserAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-address-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->errorSummary($model); ?>
    
    <?= $form->field($model, 'recipient_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'province_id')->dropDownList($model->ambilProvice(), ['id'=>'city-id']); ?>
    
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <?php
                    echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                        'options'=>['id'=>'subcat-id','placeholder'=>'Select City'],
                        'pluginOptions'=>[
                            'depends'=>['city-id'],
                            'placeholder'=>Yii::t('app','Select city').'...',
                            'url'=>Url::to(['ongkir/get-city'])
                        ]
                    ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <?= $form->field($model, 'districts_id')->textInput()->label(false) ?>
        </div>
    </div>

    <?= $form->field($model, 'postal_code')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <br>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <?php
                echo $form->field($model, 'is_default', [
                    'template' => '{input}<label>'.Yii::t('app','Save as fixed address').'</label>{error}{hint}',
                    'labelOptions' => ['class' => 'cbx-label']
                ])->widget(CheckboxX::classname(), [
                    'pluginOptions'=>['threeState'=>false]
                ])->label(false);
            ?>
        </div>
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
