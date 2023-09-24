<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriber}}`.
 */
class m230919_164144_create_subscriber_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscriber}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull()->comment('ID события'),
            'email' => $this->string()->notNull()->comment('Email подписчика'),
            'status' => $this->boolean()->notNull()->defaultValue(false)->comment('Статус'),
            'created_at' => $this->dateTime()->notNull()->comment('Создан'),
            'updated_at' => $this->dateTime()->notNull()->comment('Обновлен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscriber}}');
    }
}
