<?php

namespace site\modules\admin\models;

/**
 * Class Profile
 * @package site\modules\admin\models
 */
class Profile extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            [
                'email', 'unique', 'targetClass' => self::class,
                'message' => 'This email is already taken'
            ],
            ['email', 'string', 'max' => 50],
            ['status', 'integer'],
            [['first_name', 'last_name', 'role'], 'string'],
            [['password'], 'safe']
        ];
    }
    public function getPassword(){}
}
