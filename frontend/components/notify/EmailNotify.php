<?php

namespace frontend\components\notify;

class EmailNotify implements SubscriberNotifyInterface
{
    public function process(): void
    {
        file_put_contents('notifyEmail.txt', 'Отправка уведомления на почту!');
        //TODO: Реализуется отправка уведомлений на почту
    }
}