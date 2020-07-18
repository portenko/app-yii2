<?php

use yii\db\Migration;

/**
 * Class m200705_102909_options
 */
class m200705_102909_options extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('options', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->null(),
            'value' => $this->string()->null(),
            'data' => $this->text()->null(),
            'template' => $this->string()->null(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-options-code', 'options', 'code');
        $this->createIndex('idx-options-name', 'options', 'name');
    }

    public function safeDown()
    {
        $this->dropTable('options');
    }
}
