<?php
use kartik\grid\GridView;
use yz\shoppingcart\ShoppingCart;

return  [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'class'=>'kartik\grid\ExpandRowColumn',
        'width'=>'50px',
        'value'=>function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail'=>function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_detail_produk_checkout', ['model'=>$model]);
        },
        'headerOptions'=>['class'=>'kartik-sheet-style'], 
        'expandOneOnly'=>true
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'kartik\grid\EditableColumn',
        'label'=>'QTY',
        'attribute'=>'quantity', 
        'readonly'=>function($model, $key, $index, $widget) {
            return $model->quantity;
        },
        'editableOptions'=>[
            'header'=>Yii::t('app','Qty'), 
            'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>5000]
            ],
            'formOptions' => [
                'action' => ['editqty'],
            ],
            'pluginEvents' => [
                'editableSuccess'=> "function(val,form, data, jqXHR) { 
                    // $.pjax.reload({container:'#crud-checkout'});
                    location.reload();
                }",
            ],
        ],
        'hAlign'=>'right', 
        'vAlign'=>'middle',
        'width'=>'7%',
        // 'format'=>['decimal', 2],
        'pageSummary'=>'Total'
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'PRICE',
        'attribute'=>'cost',
        'pageSummary'=>true,
        'format'=>['decimal', 2],
        'value'                 => function ($model, $key, $index, $widget) { 
            return $model->getCost();
        },
    ],
    /*[
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'name',
        'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'Name', 'size'=>'md']
    ],
    [
        'attribute'=>'color',
        'value'=>function ($model, $key, $index, $widget) {
            return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" . 
                $model->color . '</code>';
        },
        'filterType'=>GridView::FILTER_COLOR,
        'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'150px',
        'noWrap'=>true
    ],
    [
        'class'=>'kartik\grid\BooleanColumn',
        'attribute'=>'status', 
        'vAlign'=>'middle',
    ],*/
    /*[
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'], 
    ],*/
    ['class' => 'kartik\grid\CheckboxColumn']
];
