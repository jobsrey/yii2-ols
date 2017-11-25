<?php

namespace jobsrey\ols\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use jobsrey\ols\models\UserAddress;

/**
 * UserAddressSearch represents the model behind the search form about `jobsrey\ols\models\UserAddress`.
 */
class UserAddressSearch extends UserAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'city_id', 'districts_id', 'postal_code', 'is_default', 'user_id'], 'integer'],
            [['recipient_name', 'address', 'phone_number'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserAddress::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'districts_id' => $this->districts_id,
            'postal_code' => $this->postal_code,
            'is_default' => $this->is_default,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'recipient_name', $this->recipient_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
