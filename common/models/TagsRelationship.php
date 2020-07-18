<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags_relationship".
 *
 * @property int $id
 * @property int $tag_id
 * @property int $rel_id
 * @property string|null $type
 * @property int $created_at
 * @property int $updated_at
 */
class TagsRelationship extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags_relationship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_id', 'rel_id', 'created_at', 'updated_at'], 'required'],
            [['tag_id', 'rel_id', 'created_at', 'updated_at'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'rel_id' => 'Rel ID',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
