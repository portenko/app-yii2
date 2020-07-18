<?php

use yii\db\Migration;

/**
 * Class m200705_123141_add_admin_user
 */
class m200705_123141_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'admin@mail.here',
            'status' => 1,
            'role' => 'admin',
            'lang' => 'en',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
    }
}
