<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\helpers\Json;
use kartik\checkbox\CheckboxX;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\UserAddress */
/* @var $form yii\widgets\ActiveForm */

$opts = Json::htmlEncode([
        'urlGetPreset' => Url::to(['user-address/get-preset']),
    ]);

 
$this->registerJs("var _opts = {$opts};",\yii\web\View::POS_HEAD);

/*data preset*/
$dataPreset = ArrayHelper::map(\jobsrey\ols\models\UserAddress::find()->asArray()->all(), 'id', 'recipient_name');



/*register select2 javascript ajax custom*/
$this->registerJs($this->render('dropdownPresetAlamatFormrReadOnly.js'),\yii\web\View::POS_HEAD);


?>

<div class="user-address-form">

    <?php $form = ActiveForm::begin([
        'id'=>'form-setting',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'selectPreset')->dropDownList($dataPreset,['id'=>'Preset']) ?>
    
    <?= $form->field($model, 'recipient_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6,'readonly'=>true]) ?>


    <?= $form->field($model, 'province_id')->dropDownList($model->ambilProvice(), ['id'=>'city-id','readonly'=>true]); ?>
    
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
            <?= $form->field($model, 'districts_id')->textInput(['readonly'=>true])->label(false) ?>
        </div>
    </div>

    <?= $form->field($model, 'postal_code')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true,'readonly'=>true]) ?>

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
