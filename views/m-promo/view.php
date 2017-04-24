<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MPromo */

$this->title = $model->promoId;
$this->params['breadcrumbs'][] = ['label' => 'Mpromos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpromo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->promoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->promoId], [
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
            'promoId',
            'promoJudul',
            'promoDeskripsi:ntext',
            'promoTgl',
            'promoGambarUrl:url',
            'promoDibuatTgl',
            'promoDibuatOleh',
            'promoStatus',
        ],
    ]) ?>

</div>
