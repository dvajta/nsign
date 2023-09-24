<?php

namespace frontend\models;

use frontend\components\notify\SubscriberNotifyInterface;
use frontend\models\events\NotifyEvent;
use frontend\models\schema\SubscriberSchema;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Subscriber extends SubscriberSchema
{
    public const SIGNUP = 'Регистрация';
    public const VERIFICATION = 'Верификация';
    public const LOGIN = 'Вход';
    public const LOGOUT = 'Выход';
    public const SEND = 'Отправка сообщения';

    public const STATUS_ACTIVE = 0;
    public const STATUS_BLOCK = 1;

    public const NOTIFY_SUBSCRIBER = 'notify-subscriber';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Возвращает список событий.
     * @return string[]
     */
    public static function getEventList(): array
    {
        return [
            self::LOGIN,
            self::LOGOUT,
            self::SIGNUP,
            self::VERIFICATION,
            self::SEND
        ];
    }

    /**
     * Отправка уведомления по тригеру.
     * @param SubscriberNotifyInterface $typeNotify
     */
    public function notify(SubscriberNotifyInterface $typeNotify): void
    {
        $event = new NotifyEvent();
        $event->typeNotify = $typeNotify;
        $event->subscriber = $this;
        $this->trigger(self::NOTIFY_SUBSCRIBER, $event);
    }
}
