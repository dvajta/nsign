<?php

namespace frontend\components\notify;

interface SubscriberNotifyInterface
{
    public function process(): void;
}