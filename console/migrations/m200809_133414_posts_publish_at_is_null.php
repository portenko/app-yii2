<?php

use yii\db\Migration;

/**
 * Class m200809_133414_posts_publish_at_is_null
 */
class m200809_133414_posts_publish_at_is_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('posts', 'publish_at', $this->integer()->null()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('posts', 'publish_at', $this->integer()->notNull()->unsigned());
    }
}
