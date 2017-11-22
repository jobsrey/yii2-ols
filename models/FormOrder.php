<?php

namespace jobsrey\ols\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class FormOrder extends Model
{
    public $product_id; //id produk
    public $qty; //jumlah barang yang di beli
    public $price; // harga
    public $delivery_courier; //kurir pengiriman
    public $msg_to_seller; //pesan untuk penjual
    public $delivery_package; //jenis paket pengiriman (YES REguler)
    public $address_id; //id alamat
    public $user_id; //id user
    public $is_user_insurance; //menggunakan asuransi


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['product_id', 'qty','delivery_courier','delivery_package'], 'required'],
            // rememberMe must be a boolean value
            [['is_user_insurance'], 'boolean'],
            // password is validated by validatePassword()

            [['msg_to_seller'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'ID'),
            'qty' => Yii::t('app', 'Qty'),
            'delivery_courier' => Yii::t('app', 'Delivery courier'),
            'delivery_package' => Yii::t('app', 'Delivery package'),
            'is_user_insurance' => Yii::t('app', 'Insurance'),
            'msg_to_seller' => Yii::t('app', 'Note to seller'),
        ];
    }

}
