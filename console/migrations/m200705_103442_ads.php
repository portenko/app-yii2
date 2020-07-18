<?php

use yii\db\Migration;

/**
 * Class m200705_103442_ads
 */
class m200705_103442_ads extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('ads', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
            'data' => $this->text()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'lang' => $this->string()->null()->defaultValue('en'),
            'is_unlimited' => $this->smallInteger()->notNull()->defaultValue(0),
            'date_from' => $this->integer()->null()->unsigned(),
            'date_to' => $this->integer()->null()->unsigned(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);

        $this->createIndex('idx-ads-code', 'ads', 'code');
        $this->createIndex('idx-ads-name', 'ads', 'name');
        $this->createIndex('idx-ads-status', 'ads', 'status');
        $this->createIndex('idx-ads-lang', 'ads', 'lang');
        $this->createIndex('idx-ads-is_unlimited', 'ads', 'is_unlimited');
        $this->createIndex('idx-ads-date_from', 'ads', 'date_from');
        $this->createIndex('idx-ads-date_to', 'ads', 'date_to');
    }

    public function safeDown()
    {
        $this->dropTable('ads');
    }
}
