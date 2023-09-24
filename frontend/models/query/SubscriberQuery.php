<?php

namespace frontend\models\query;

use frontend\models\Subscriber;
use yii\db\ActiveQuery;

class SubscriberQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Subscriber[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Subscriber|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function byEventActual(string $email, $event): self
    {
        return $this->andWhere([
            'status' => Subscriber::STATUS_ACTIVE,
            'email' => $email,
            'event_id' => $event
        ]);
    }
}