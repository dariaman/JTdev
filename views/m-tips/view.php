<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MTips */

$this->title = $model->tipsId;
$this->params['breadcrumbs'][] = ['label' => 'Mtips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtips-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tipsId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tipsId], [
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
            'tipsId',
            'tipsJudul',
            'tipsDeskripsi:ntext',
            'tipsDibuatTgl',
            'tipsDibuatOleh',
            'tipsStatus',
        ],
    ]) ?>

</div>
