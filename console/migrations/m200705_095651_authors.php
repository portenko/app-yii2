<?php

use yii\db\Migration;

/**
 * Class m200705_095651_authors
 */
class m200705_095651_authors extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'pic' => $this->string()->null(),
            'pic_alt' => $this->string()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'lang' => $this->string()->null()->defaultValue('en'),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-authors-name', 'authors', 'name');
        $this->createIndex('idx-authors-status', 'authors', 'status');
        $this->createIndex('idx-authors-lang', 'authors', 'lang');
    }

    public function safeDown()
    {
        $this->dropTable('authors');
    }
}
