<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">


    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-8">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'qty')->textInput() ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'is_new')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Properties</div>
            <div class="panel-body">
                Ini untuk properties
                - tag
                - kategori
                - upload gambar
                - diskon
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
