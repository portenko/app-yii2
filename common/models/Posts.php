<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $url_slug
 * @property string|null $lead
 * @property string|null $content
 * @property string|null $cover
 * @property string|null $cover_alt
 * @property int $status
 * @property string|null $type
 * @property string|null $lang
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int|null $alternate_id
 * @property int|null $sort
 * @property int|null $author_id
 * @property string|null $recommended_posts
 * @property int $publish_at
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Categories|null $category
 * @property Authors|null $author
 * @property Posts[]|null $listMap
 */
class Posts extends ActiveRecord
{
    const SCENARIO_POSTS = 'posts';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'publishAt'], 'required', 'on' => $this::SCENARIO_POSTS],
            [['name'], 'required', 'on' => $this::SCENARIO_DEFAULT],
            [['category_id', 'status', 'alternate_id', 'sort', 'author_id', 'publish_at', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'url_slug', 'lead', 'cover', 'cover_alt', 'type', 'lang', 'meta_keywords', 'recommended_posts'], 'string', 'max' => 255],
            [['meta_title'], 'string', 'max' => 65],
            [['meta_description'], 'string', 'max' => 120],
            [['recommendedPosts'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Title',
            'url_slug' => 'URL slug',
            'lead' => 'Lead',
            'content' => 'Content',
            'cover' => 'Cover',
            'cover_alt' => 'Alternative text for cover',
            'status' => 'Status',
            'type' => 'Type',
            'lang' => 'Lang',
            'meta_title' => 'Meta title',
            'meta_description' => 'Meta description',
            'meta_keywords' => 'Meta keywords',
            'alternate_id' => 'Alternate ID',
            'sort' => 'Sort',
            'author_id' => 'Author',
            'recommended_posts' => 'Recommended posts',
            'recommendedPosts' => 'Recommended posts',
            'publish_at' => 'Publish at',
            'publishAt' => 'Publish at',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ];
    }

    /**
     * @param $value
     */
    public function setPublishAt($value){
        $this->publish_at = strtotime($value);
    }

    /**
     * @return string|null
     * @throws \yii\base\InvalidConfigException
     */
    public function getPublishAt(){
        return $this->publish_at?Yii::$app->formatter->asDatetime($this->publish_at, "dd.MM.yyyy HH:mm"):null;
    }

    /**
     * @param string $type
     * @return array
     */
    public function getAlternateListMap($type = 'posts')
    {
        $posts = self::find()
            ->where([
                'and', [
                    'status' => self::STATUS_ACTIVE,
                    'type' => $type
                ],
                [
                    'not', ['id' => $this->id]
                ]
            ])
            ->orderBy(['publish_at' => SORT_DESC])
            ->all();
        return ArrayHelper::map($posts, 'id', 'name');
    }

    /**
     * @return string
     */
    public function getIdName()
    {
        return $this->id . ' - ' . $this->name;
    }

    /**
     * @param string $type
     * @return array
     */
    public static function listMap($type = 'posts')
    {
        $posts = self::find()
            ->where([
                'and', [
                    'status' => self::STATUS_ACTIVE,
                    'type' => $type
                ]
            ])
            ->orderBy(['publish_at' => SORT_DESC])
            ->all();
        return ArrayHelper::map($posts, 'id', 'idName');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    /**
     * @param $value
     */
    public function setRecommendedPosts($value)
    {
        $this->recommended_posts = Json::encode($value);
    }

    /**
     * @return array|string
     */
    public function getRecommendedPosts()
    {
        return !empty($this->recommended_posts) ? Json::decode($this->recommended_posts) : [];
    }

}
