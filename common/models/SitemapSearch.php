<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sitemap;

/**
 * Class SitemapSearch
 * @package common\models
 */
class SitemapSearch extends Sitemap
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lastmod', 'created_at', 'updated_at'], 'integer'],
            [['loc', 'changefreq', 'priority'], 'safe'],
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
        $query = Sitemap::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'lastmod' => SORT_DESC
                ],
            ],
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
            'lastmod' => $this->lastmod,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'loc', $this->loc])
            ->andFilterWhere(['like', 'changefreq', $this->changefreq])
            ->andFilterWhere(['like', 'priority', $this->priority]);

        return $dataProvider;
    }
}
