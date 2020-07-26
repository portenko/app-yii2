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
            [['code', 'name', 'value'], 'required'],
            [['data'], 'string'],
            [['status', 'is_unlimited', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name', 'value', 'lang'], 'string', 'max' => 255],
            [['date_from', 'date_to', 'dateFrom', 'dateTo'], 'safe']
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
            'is_unlimited' => 'Is unlimited?',
            'date_from' => 'Date from',
            'dateFrom' => 'Date from',
            'date_to' => 'Date to',
            'dateTo' => 'Date to',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $value
     */
    public function setDateFrom($value){
        $this->date_from = strtotime($value);
    }

    /**
     * @return string|null
     * @throws \yii\base\InvalidConfigException
     */
    public function getDateFrom(){
        return $this->date_from?Yii::$app->formatter->asDatetime($this->date_from, "dd.MM.Y H:i"):null;
    }

    /**
     * @param $value
     */
    public function setDateTo($value){
        $this->date_to = strtotime($value);
    }

    /**
     * @return string|null
     * @throws \yii\base\InvalidConfigException
     */
    public function getDateTo(){
        return $this->date_to?Yii::$app->formatter->asDatetime($this->date_to, "dd.MM.Y H:i"):null;
    }
}
