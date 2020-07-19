<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string|null $type
 * @property string|null $lang
 * @property int|null $sort
 * @property int $created_at
 * @property int $updated_at
 * @property Categories[] $listMap
 */
class Categories extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'type', 'lang'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'type' => 'Type',
            'lang' => 'Lang',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param string $type
     * @return array
     */
    public static function listMap($type = 'posts')
    {
        $categories = self::find()
            ->where([
                'status' => self::STATUS_ACTIVE,
                'type' => $type,
            ])
            ->orderBy(['sort' => SORT_ASC])
            ->all();
        return ArrayHelper::map($categories, 'id', 'name');
    }

}
