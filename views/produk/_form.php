<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">


    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-8">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->widget(TinyMce::className(), [
            'options' => ['rows' => 20],
            // 'language' => 'es',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);?>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Properties</div>
            <div class="panel-body">
                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'qty')->textInput() ?>

                <?= $form->field($model, 'is_new')
                        ->dropDownList(
                            [1=>Yii::t('app','New'),0=>Yii::t('app','Second')]);
                ?>
                
                <?php
                    $data = [
                        "red" => "red",
                        "green" => "green",
                        "blue" => "blue",
                        "orange" => "orange",
                        "white" => "white",
                        "black" => "black",
                        "purple" => "purple",
                        "cyan" => "cyan",
                        "teal" => "teal"
                    ];
                     
                    // Tagging support Multiple
                    $model->tagValues =  ['red', 'green']; // initial value
                    echo $form->field($model, 'tagValues')->widget(Select2::classname(), [
                        'data' => $data,
                        'options' => ['placeholder' => Yii::t('app','Select a tag ...'), 'multiple' => true],
                        'pluginOptions' => [
                            'tags' => true,
                            'tokenSeparators' => [',', ' '],
                            'maximumInputLength' => 10
                        ],
                    ]);
                ?>

                <?= $form->field($model, 'post_status')
                        ->dropDownList(
                            [0=>Yii::t('app','Draf'),1=>Yii::t('app','Post'),3=>Yii::t('app','No Active')]);
                ?>

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
