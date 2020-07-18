<?php

namespace common\models;

use Yii;

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
 */
class Posts extends ActiveRecord
{
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
            [['name'], 'required'],
            [['category_id', 'status', 'alternate_id', 'sort', 'author_id', 'publish_at', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'url_slug', 'lead', 'cover', 'cover_alt', 'type', 'lang', 'meta_keywords', 'recommended_posts'], 'string', 'max' => 255],
            [['meta_title'], 'string', 'max' => 65],
            [['meta_description'], 'string', 'max' => 120],
            [['publishAt'], 'safe']
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
            'cover_alt' => 'Cover alternative text',
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
            'publish_at' => 'Publish at',
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
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getPublishAt(){
        return date("Y-m-d\TH:i:s", $this->publish_at);
        //return Yii::$app->formatter->asDatetime($this->publish_at, "Y-m-d\TH:i:s");
    }
}
