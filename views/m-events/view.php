<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MEvents */

$this->title = $model->eventId;
$this->params['breadcrumbs'][] = ['label' => 'Mevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mevents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->eventId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->eventId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eventId',
            'eventJudul',
            'eventDeskripsi:ntext',
            'eventTgl',
            'eventGambarUrl:url',
            'eventDibuatTgl',
            'eventDibuatOleh',
            'eventStatus',
        ],
    ]) ?>

</div>
