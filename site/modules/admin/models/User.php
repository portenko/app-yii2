<?php

namespace site\modules\admin\models;

/**
 * Class User
 * @package site\modules\admin\models
 */
class User extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [
                'username', 'unique', 'targetClass' => self::class,
                'message' => 'This username is already taken'
            ],
            ['username', 'string', 'min' => 3, 'max' => 25],
            ['email', 'required'],
            ['email', 'email'],
            [
                'email', 'unique', 'targetClass' => self::class,
                'message' => 'This email is already taken'
            ],
            ['email', 'string', 'max' => 50],
            ['status', 'integer'],

            ['role', 'required'],

            [['first_name', 'last_name', 'role'], 'string'],

            [['password'], 'safe']
        ];
    }

    public function getPassword(){}
}
