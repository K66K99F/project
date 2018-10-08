<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Apartment;

/**
 * ApartmentSearch represents the model behind the search form of `app\models\Apartment`.
 */
class ApartmentSearch extends Apartment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'area_id', 'street_id', 'home', 'apartment', 'rooms', 'house_type_id', 'quadrature', 'elevator', 'price', 'stage_complete', 'payment', 'layout_type', 'user_id', 'status'], 'integer'],
            [['storey', 'rights_house', 'comments', 'date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Apartment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
            'street_id' => $this->street_id,
            'home' => $this->home,
            'apartment' => $this->apartment,
            'rooms' => $this->rooms,
            'house_type_id' => $this->house_type_id,
            'quadrature' => $this->quadrature,
            'elevator' => $this->elevator,
            'price' => $this->price,
            'stage_complete' => $this->stage_complete,
            'payment' => $this->payment,
            'layout_type' => $this->layout_type,
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'storey', $this->storey])
            ->andFilterWhere(['like', 'rights_house', $this->rights_house])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
