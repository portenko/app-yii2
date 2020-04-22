<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200422_200610_add_additional_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'first_name', $this->string()->null()->after('username'));
        $this->addColumn('user', 'last_name', $this->string()->null()->after('first_name'));
        $this->addColumn('user', 'role', $this->string()->null()->after('status'));
        $this->addColumn('user', 'lang', $this->string()->null()->after('role'));

        $this->createIndex('idx-user-role', 'user', 'role');
        $this->createIndex('idx-user-lang', 'user', 'lang');
        $this->createIndex('idx-user-status', 'user', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'first_name');
        $this->dropColumn('user', 'last_name');
        $this->dropColumn('user', 'role');
        $this->dropColumn('user', 'lang');
    }
}
