<?php

namespace jobsrey\ols\models;

use Yii;

/**
 * This is the model class for table "shop_produk".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $qty
 * @property string $description
 * @property int $is_new
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'qty'], 'required'],
            [['price'], 'number'],
            [['qty', 'is_new'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'qty' => Yii::t('app', 'Qty'),
            'description' => Yii::t('app', 'Description'),
            'is_new' => Yii::t('app', 'Is New'),
        ];
    }
}
