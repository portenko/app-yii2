<?php

use yii\db\Migration;

/**
 * Class m200705_101719_tags_relationship
 */
class m200705_101719_tags_relationship extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tags_relationship', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer()->notNull()->unsigned(),
            'rel_id' => $this->integer()->notNull()->unsigned(),
            'type' => $this->string()->null()->defaultValue('posts'),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-tags_relationship-tag_id', 'tags_relationship', 'tag_id');
        $this->createIndex('idx-tags_relationship-rel_id', 'tags_relationship', 'rel_id');
        $this->createIndex('idx-tags_relationship-type', 'tags_relationship', 'type');
    }

    public function safeDown()
    {
        $this->dropTable('tags_relationship');
    }
}
