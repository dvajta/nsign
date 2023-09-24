<?php

namespace frontend\models\events;

use frontend\components\notify\SubscriberNotifyInterface;
use frontend\models\Subscriber;
use yii\base\Event;

class NotifyEvent extends Event
{
    public SubscriberNotifyInterface $typeNotify;
    public Subscriber $subscriber;
}