<?php

namespace frontend\components\notify;

class SMSNotify implements SubscriberNotifyInterface
{
    public function process(): void
    {
        file_put_contents('notifySMS.txt', 'Отправка уведомления по SMS!');
        //TODO: Реализуется отправка уведомлений по SMS
    }
}