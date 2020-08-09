<?php

use yii\db\Migration;

/**
 * Class m200809_135446_options_default_data
 */
class m200809_135446_options_default_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('options', [
            'code' => 'GENERAL_SETTINGS',
            'name' => 'General options for website',
            'value' => null,
            'data' => '{}',
            'template' => '',
            'type' => 'general',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('options', [
            'code' => 'AUTHORS_IMAGE',
            'name' => 'Image options for authors',
            'value' => null,
            'data' => '{"width":"150","height":"150","quality":"85"}',
            'template' => 'authors_image',
            'type' => 'options',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('options', [
            'code' => 'POSTS_COVER',
            'name' => 'Cover options for posts',
            'value' => null,
            'data' => '{"width":"150","height":"150","quality":"85"}',
            'template' => 'posts_cover',
            'type' => 'options',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('options', [
            'code' => 'USERS_ROLES',
            'name' => 'Roles for users of admin panel',
            'value' => 'admin,manager,user',
            'data' => null,
            'template' => 'users_roles',
            'type' => 'options',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('options');
    }
}
