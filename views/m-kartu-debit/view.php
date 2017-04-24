<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MKartuDebitKredit */

$this->title = $model->kartuId;
$this->params['breadcrumbs'][] = ['label' => 'Mkartu Debit Kredits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkartu-debit-kredit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kartuId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kartuId], [
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
            'kartuId',
            'kartuJudul',
            'kartuStatus',
        ],
    ]) ?>

</div>
