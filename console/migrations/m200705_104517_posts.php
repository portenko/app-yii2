<?php

use yii\db\Migration;

/**
 * Class m200705_104517_posts
 */
class m200705_104517_posts extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->null()->unsigned(),
            'name' => $this->string()->notNull(),
            'url_slug' => $this->string()->null(),
            'lead' => $this->string()->null(),
            'content' => $this->text()->null(),
            'cover' => $this->string()->null(),
            'cover_alt' => $this->string()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'type' => $this->string()->null()->defaultValue('posts'),
            'lang' => $this->string()->null()->defaultValue('en'),
            'meta_title' => $this->string(65)->null(),
            'meta_description' => $this->string(120)->null(),
            'meta_keywords' => $this->string()->null(),
            'alternate_id' => $this->integer()->null()->unsigned(),
            'sort' => $this->integer()->unsigned()->null(),
            'author_id' => $this->integer()->null()->unsigned(),
            'recommended_posts' => $this->string()->null(),
            'publish_at' => $this->integer()->notNull()->unsigned(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-posts-category_id', 'posts', 'category_id');
        $this->createIndex('idx-posts-name', 'posts', 'name');
        $this->createIndex('idx-posts-url_slug', 'posts', 'url_slug');
        $this->createIndex('idx-posts-status', 'posts', 'status');
        $this->createIndex('idx-posts-type', 'posts', 'type');
        $this->createIndex('idx-posts-lang', 'posts', 'lang');
        $this->createIndex('idx-posts-alternate_id', 'posts', 'alternate_id');
        $this->createIndex('idx-posts-sort', 'posts', 'sort');
        $this->createIndex('idx-posts-author_id', 'posts', 'author_id');
        $this->createIndex('idx-posts-publish_at', 'posts', 'publish_at');
    }

    public function safeDown()
    {
        $this->dropTable('posts');
    }
}
