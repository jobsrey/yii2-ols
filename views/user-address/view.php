<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model jobsrey\ols\models\UserAddress */
?>
<div class="user-address-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'recipient_name',
            'address:ntext',
            'province_id',
            'city_id',
            'districts_id',
            'postal_code',
            'phone_number',
            'is_default',
            'user_id',
        ],
    ]) ?>

</div>
