<?php

use frontend\models\Subscriber;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Subscriber $model */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscriber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'event_id',
                'value' => static function ($model) {
                    return Subscriber::getEventList()[$model->event_id];
                }
            ],
            'email:email',
            [
                'attribute' => 'status',
                'value' => static function ($model) {
                    return $model->status === 0 ? 'Нет' : 'Да';
                },
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
