<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 * @property string|null $pic
 * @property string|null $pic_alt
 * @property int $status
 * @property string|null $lang
 * @property int $created_at
 * @property int $updated_at
 */
class Authors extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'pic', 'pic_alt', 'lang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pic' => 'Author photo',
            'pic_alt' => 'Alternative text for photo',
            'status' => 'Status',
            'lang' => 'Lang',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
