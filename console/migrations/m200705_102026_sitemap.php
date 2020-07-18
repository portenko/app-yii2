<?php

use yii\db\Migration;

/**
 * Class m200705_102026_sitemap
 */
class m200705_102026_sitemap extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('sitemap', [
            'id' => $this->primaryKey(),
            'loc' => $this->string()->notNull(),
            'lastmod' => $this->integer()->null()->unsigned(),
            'changefreq' => $this->string()->null(),
            'priority' => $this->string()->null()->defaultValue('0.8'),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-sitemap-loc', 'sitemap', 'loc');
        $this->createIndex('idx-sitemap-lastmod', 'sitemap', 'lastmod');
        $this->createIndex('idx-sitemap-priority', 'sitemap', 'priority');
    }

    public function safeDown()
    {
        $this->dropTable('sitemap');
    }
}
