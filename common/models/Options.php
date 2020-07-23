<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $value
 * @property string|null $data
 * @property string $template
 * @property string $type
 * @property int $created_at
 * @property int $updated_at
 * @property mixed|string|null $val
 */
class Options extends ActiveRecord
{
    public $json = [];

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
            [['name', 'data', 'template', 'type'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['code', 'value'], 'string', 'max' => 255],
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
            'value' => 'Value',
            'data' => 'Data',
            'template' => 'Form template',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $code
     * @param null $key
     * @return mixed|string|null
     */
    public static function val($code, $key = null)
    {
        $option = Options::findOne(['code' => $code]);
        if($key === null){
            return $option->value??null;
        }

        $json = [];
        if(isset($option) && !empty($option->data)){
            $json = Json::decode($option->data);
        }
        return $json[$key]??null;
    }

    /**
     * @param $code
     * @param bool $isNew
     * @return Options|null
     */
    public static function getByCode($code, $isNew = false){
        $option = Options::findOne(['code' => $code]);
        if($option === null && $isNew === true){
            $option = new Options(['code' => $code]);
        }
        return $option;
    }
}
