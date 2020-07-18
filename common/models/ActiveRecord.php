<?php

namespace common\models;

use Yii;

/**
 * Class ActiveRecord
 * @package common\models
 *
 * @property ActiveRecord|null $next
 * @property ActiveRecord|null $prev
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * @return array|string[]
     */
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::class,
        ];
    }
    /**
     * @param int $sort
     * @return |null
     */
    protected function getNextOrPrev($sort = SORT_ASC)
    {
        $all = $this->find()->orderBy(['sort' => $sort])->all();
        foreach($all as $key => $item)
        {
            if($item->id === $this->id){
                return isset($all[$key+1]) ? $all[$key+1] : null;
            }
        }
        return null;
    }

    /**
     * @return Object|null
     */
    public function getNext()
    {
        return $this->getNextOrPrev(SORT_ASC);
    }

    /**
     * @return Object|null
     */
    public function getPrev()
    {
        return $this->getNextOrPrev(SORT_DESC);
    }

    /**
     * @param string $sort
     * @return bool
     */
    public function changeSort($sort = 'up')
    {
        $model = $sort === 'up' ? $this->prev : $this->next;
        if($model){
            $sort = $this->sort;
            $this->sort = $model->sort;
            $model->sort = $sort;
            $this->save(false);
            $model->save(false);
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert && isset($this->sort) && empty($this->sort))
        {
            $this->updateAttributes(['sort' => $this->id * 10]);
        }
        parent::afterSave($insert, $changedAttributes);
    }
}