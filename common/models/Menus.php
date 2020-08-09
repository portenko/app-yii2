<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $data
 * @property string|null $comment
 * @property int $status
 * @property string|null $lang
 * @property int $created_at
 * @property int $updated_at
 */
class Menus extends ActiveRecord
{
    public $json = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['data'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name', 'comment', 'lang'], 'string', 'max' => 255],
            [['json'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'data' => 'Data',
            'comment' => 'Comment',
            'status' => 'Status',
            'lang' => 'Lang',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
