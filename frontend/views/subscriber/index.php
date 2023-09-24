<?php

use frontend\models\Subscriber;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\search\SubscriberSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriber-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'event_id',
                'value' => static function ($model) {
                    return Subscriber::getEventList()[$model->event_id];
                },
                'filter' => \yii\helpers\Html::activeDropDownList(
                    $searchModel,
                    'event_id',
                    Subscriber::getEventList(),
                    ['class' => 'form-control', 'prompt' => 'Все']
                ),
            ],
            'email:email',
            [
                'attribute' => 'status',
                'value' => static function ($model) {
                    return $model->status === 0 ? 'Нет' : 'Да';
                },
                'filter' => \yii\helpers\Html::activeDropDownList(
                    $searchModel,
                    'status',
                    ['0' => 'Нет', '1' => 'Да'],
                    ['class' => 'form-control', 'prompt' => 'Все']
                ),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscriber $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
