<?php

namespace common\user;

use Yii;

/**
 * Class User
 * @package common\user
 */
class User extends \yii\web\User
{
    /**
     * @return null
     */
    public function getUsername() {
        return $this->identity ? $this->identity->username : null;
    }

    /**
     * @return null
     */
    public function getName() {
        return $this->identity ? $this->identity->username : null;
    }

    /**
     * @param string $permissionName
     * @param array $params
     * @param bool $allowCaching
     * @return bool
     */
    public function can($permissionName, $params = [], $allowCaching = true)
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        //var_dump($permissionName, $this->identity->role, $permissionName === $this->identity->role); exit;


        return $permissionName === Yii::$app->user->identity->role;
        //return parent::can($permissionName, $params, $allowCaching);
    }
}
