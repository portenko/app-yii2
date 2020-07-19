<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Posts;

/**
 * PostsSearch represents the model behind the search form of `common\models\Posts`.
 */
class PostsSearch extends Posts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'status', 'alternate_id', 'sort', 'author_id', 'publish_at', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url_slug', 'lead', 'content', 'cover', 'cover_alt', 'type', 'lang', 'meta_title', 'meta_description', 'meta_keywords', 'recommended_posts'], 'safe'],
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
        $query = Posts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'defaultOrder' => [
                    'publish_at' => SORT_DESC
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
            'category_id' => $this->category_id,
            'status' => $this->status,
            'alternate_id' => $this->alternate_id,
            'sort' => $this->sort,
            'author_id' => $this->author_id,
            'publish_at' => $this->publish_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url_slug', $this->url_slug])
            ->andFilterWhere(['like', 'lead', $this->lead])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'cover_alt', $this->cover_alt])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'recommended_posts', $this->recommended_posts]);

        return $dataProvider;
    }
}
