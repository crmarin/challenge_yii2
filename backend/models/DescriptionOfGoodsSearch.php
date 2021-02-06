<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DescriptionOfGoods;

/**
 * DescriptionOfGoodsSearch represents the model behind the search form of `backend\models\DescriptionOfGoods`.
 */
class DescriptionOfGoodsSearch extends DescriptionOfGoods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'oadode_id', 'user_id'], 'integer'],
            [['description', 'ecl_group', 'ecl_item'], 'safe'],
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
        $query = DescriptionOfGoods::find();

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

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'oadode_id',
                'user_id',
                'description',
                'ecl_group',
                'ecl_item',
            ]
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'oadode_id' => $this->oadode_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'ecl_group', $this->ecl_group])
            ->andFilterWhere(['like', 'ecl_item', $this->ecl_item]);

        return $dataProvider;
    }
}
