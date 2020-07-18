<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $value
 * @property string|null $data
 * @property int $status
 * @property string|null $lang
 * @property int $is_unlimited
 * @property int|null $date_from
 * @property int|null $date_to
 * @property int $created_at
 * @property int $updated_at
 */
class Ads extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'value', 'created_at', 'updated_at'], 'required'],
            [['data'], 'string'],
            [['status', 'is_unlimited', 'date_from', 'date_to', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name', 'value', 'lang'], 'string', 'max' => 255],
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
            'value' => 'Value',
            'data' => 'Data',
            'status' => 'Status',
            'lang' => 'Lang',
            'is_unlimited' => 'Is Unlimited',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
