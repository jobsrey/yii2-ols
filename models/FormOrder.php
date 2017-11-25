<?php

namespace jobsrey\ols\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
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

    /*untuk onkir*/
    public $provice_id;
    public $city_id;

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
            [['qty'],'integer'],
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
            'provice_id' => Yii::t('app','Province'),
            'city_id' => Yii::t('app','City'),
        ];
    }


    //scenario
    public function scenarios(){
        $parent = parent::scenarios();
        $parent['orderForm'] = [
            'qty','product_id','msg_to_seller',
        ];

        return $parent;
    }


    /*mengambil data province di rajaongkir.com*/
    public function ambilProvice(){

        $cacing = Yii::$app->cache; //add library cache

        $dataProvince = $cacing->get('dataProvince'); // buat mbedain aja

        if($dataProvince === false){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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

                $result = ArrayHelper::map($result, 'province_id', 'province');

                $cacing->set('dataProvince', $result, 3600); // di cache 300 detik

                $dataProvince = $cacing->get('dataProvince');

            }
        }

        return $dataProvince;
    }

    /*mengambil data city di rajaongkir.com*/
    public function ambilCity($province_id){

        $cacing = Yii::$app->cache; //add library cache

        $dataCity = $cacing->get('dataCity_'.$province_id); // buat mbedain aja

        if($dataCity === false){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province_id,
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

                $result = ArrayHelper::map($result, 'city_id', 'city_name');

                $cacing->set('dataCity_'.$province_id, $result, 3600); // di cache 300 detik

                $dataCity = $cacing->get('dataCity_'.$province_id);
            }
        }

        return $dataCity;
    }

    /*mengambil data city di rajaongkir.com*/
    public function ambilCityDep($province_id){

        $cacing = Yii::$app->cache; //add library cache

        $dataCity = $cacing->get('dataCityDep_'.$province_id); // buat mbedain aja

        if($dataCity === false){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province_id,
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

                $cacing->set('dataCityDep_'.$province_id, $result, 3600); // di cache 300 detik

                $dataCity = $cacing->get('dataCityDep_'.$province_id);
            }
        }

        return $dataCity;
    }



}
