<?php

use yii\db\Migration;

/**
 * Class m200705_094941_tags
 */
class m200705_094941_tags extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'type' => $this->string()->null()->defaultValue('posts'),
            'lang' => $this->string()->null()->defaultValue('en'),
            'sort' => $this->integer()->unsigned()->null(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-tags-name', 'tags', 'name');
        $this->createIndex('idx-tags-status', 'tags', 'status');
        $this->createIndex('idx-tags-type', 'tags', 'type');
        $this->createIndex('idx-tags-lang', 'tags', 'lang');
        $this->createIndex('idx-tags-sort', 'tags', 'sort');
    }

    public function safeDown()
    {
        $this->dropTable('tags');
    }
}
