<?php

namespace jobsrey\ols\models;

use Yii;

/**
 * This is the model class for table "shop_user_address".
 *
 * @property int $id
 * @property string $recipient_name
 * @property string $address
 * @property int $province_id
 * @property int $city_id
 * @property int $districts_id
 * @property int $postal_code
 * @property string $phone_number
 * @property int $is_default
 * @property int $user_id
 */
class UserAddress extends \yii\db\ActiveRecord
{

    public $selectPreset; //untuk memilih alamat

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipient_name', 'address', 'province_id', 'city_id', 'postal_code', 'phone_number'], 'required'],
            [['address'], 'string'],
            [['province_id', 'city_id', 'districts_id', 'postal_code', 'is_default', 'user_id'], 'integer'],
            [['recipient_name'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 50],
            [['is_default'],'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'recipient_name' => Yii::t('app', 'Recipient Name'),
            'address' => Yii::t('app', 'Address'),
            'province_id' => Yii::t('app', 'Province'),
            'city_id' => Yii::t('app', 'City'),
            'districts_id' => Yii::t('app', 'Districts'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'is_default' => Yii::t('app', 'Save as fixed address'),
            'user_id' => Yii::t('app', 'User'),
        ];
    }

    public function ambilProvice(){
        $modelForm = new FormOrder();

        return $modelForm->ambilProvice();
    }
}
