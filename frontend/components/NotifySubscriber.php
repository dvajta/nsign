<?php

namespace frontend\components;

use frontend\models\events\NotifyEvent;
use frontend\models\Subscriber;
use yii\base\Component;
use yii\base\Event;

class NotifySubscriber extends Component
{
    /**
     * Инициализация подписки на событие.
     */
    public function init(): void
    {
        Event::on(Subscriber::class, Subscriber::NOTIFY_SUBSCRIBER, [$this, 'send']);
    }

    public function send(NotifyEvent $event): void
    {
        $event->typeNotify->process();
    }
}