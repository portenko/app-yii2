<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $value
 * @property string|null $data
 * @property string $template
 * @property int $created_at
 * @property int $updated_at
 */
class Options extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['name', 'data', 'template'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['code', 'value'], 'string', 'max' => 255],
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
            'template' => 'Form template',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
