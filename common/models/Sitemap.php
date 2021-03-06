<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sitemap".
 *
 * @property int $id
 * @property string $loc
 * @property int|null $lastmod
 * @property string|null $changefreq
 * @property string|null $priority
 * @property int $created_at
 * @property int $updated_at
 */
class Sitemap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sitemap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loc'], 'required'],
            [['lastmod', 'created_at', 'updated_at'], 'integer'],
            [['loc', 'changefreq', 'priority'], 'string', 'max' => 255],
            [['lastMod'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loc' => 'Loc',
            'lastmod' => 'Lastmod',
            'lastMod' => 'Lastmod',
            'changefreq' => 'Changefreq',
            'priority' => 'Priority',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param $value
     */
    public function setLastMod($value){
        $this->lastmod = strtotime($value);
    }

    /**
     * @return string|null
     * @throws \yii\base\InvalidConfigException
     */
    public function getLastMod(){
        return Yii::$app->formatter->asDatetime($this->lastmod??time(), "dd.MM.Y");
    }
}
