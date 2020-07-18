<?php

use yii\db\Migration;

/**
 * Class m200705_094037_categories
 */
class m200705_094037_categories extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'type' => $this->string()->null()->defaultValue('posts'),
            'lang' => $this->string()->null()->defaultValue('en'),
            'sort' => $this->integer()->unsigned()->null(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-categories-name', 'categories', 'name');
        $this->createIndex('idx-categories-status', 'categories', 'status');
        $this->createIndex('idx-categories-type', 'categories', 'type');
        $this->createIndex('idx-categories-lang', 'categories', 'lang');
        $this->createIndex('idx-categories-sort', 'categories', 'sort');
    }

    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
