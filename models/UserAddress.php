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
            [['selectPreset'],'safe'],
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
            'selectPreset' => Yii::t('app','Select Address'),
        ];
    }

    public function scenarios(){
        $parent = parent::scenarios();

        $parent['useAddressInChoseCheckout'] = [
            'selectPreset'
        ];

        return $parent;
    }

    public function ambilProvice(){
        $modelForm = new FormOrder();

        return $modelForm->ambilProvice();
    }

    public function ambilCity($province_id){
        $modelForm = new FormOrder();
        return $modelForm->ambilCity($province_id);
    }

    /*mengambil data city di rajaongkir.com*/
    public function ambilProviceAndCityByOne(){

        $cacing = Yii::$app->cache; //add library cache

        $presetDefault = $cacing->get('defaultPresetLoc_'.$this->city_id.'_'.$this->province_id); // buat mbedain aja


        if($presetDefault === false){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$this->city_id."&province=".$this->province_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: 2e1133159f82d8cde07efe55272489ad"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $result = json_decode($response,true);
                $result = $result['rajaongkir']['results'];


                $cacing->set('defaultPresetLoc_'.$this->city_id.'_'.$this->province_id, $result, 3600); // di cache 300 detik
                $presetDefault = $cacing->get('defaultPresetLoc_'.$this->city_id.'_'.$this->province_id);
            }
        }

        return $presetDefault;
    }
}
