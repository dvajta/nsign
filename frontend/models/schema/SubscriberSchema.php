<?php

namespace frontend\models\schema;

use frontend\models\query\SubscriberQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $event_id ID события
 * @property string $email Email подписчика
 * @property int $status Статус
 * @property string $created_at Создан
 * @property string $updated_at Обновлен
 */
class SubscriberSchema extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'email'], 'required'],
            [['event_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['event_id', 'email'], 'unique', 'targetAttribute' => ['event_id', 'email']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Событие',
            'email' => 'Email подписчика',
            'status' => 'Статус (Заблокирован или нет)',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public static function find(): SubscriberQuery
    {
        return new SubscriberQuery(static::class);
    }
}