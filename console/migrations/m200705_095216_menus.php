<?php

use yii\db\Migration;

/**
 * Class m200705_095216_menus
 */
class m200705_095216_menus extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('menus', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'data' => $this->text()->null(),
            'comment' => $this->string()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'lang' => $this->string()->null()->defaultValue('en'),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-menus-code', 'menus', 'code');
        $this->createIndex('idx-menus-name', 'menus', 'name');
        $this->createIndex('idx-menus-status', 'menus', 'status');
        $this->createIndex('idx-menus-lang', 'menus', 'lang');
    }

    public function safeDown()
    {
        $this->dropTable('menus');
    }
}
