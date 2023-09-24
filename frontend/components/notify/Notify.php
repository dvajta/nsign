<?php

namespace frontend\components\notify;

use frontend\models\Subscriber;

class Notify
{
    /**
     * @param string $email
     */
    public static function send(string $email, SubscriberNotifyInterface $typeNotify, string $eventName): void
    {
        $inversionEventList = array_flip(Subscriber::getEventList());
        $eventId = $inversionEventList[$eventName];
        $subscribers = Subscriber::find()->byEventActual($email, $eventId)->all();
        /** @var Subscriber $subscriber */
        foreach ($subscribers as $subscriber) {
            $subscriber->notify($typeNotify);
        }
    }
}