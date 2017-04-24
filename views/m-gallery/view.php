<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MGallery */

$this->title = $model->galleriId;
$this->params['breadcrumbs'][] = ['label' => 'Mgalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->galleriId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->galleriId], [
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
            'galleriId',
            'galleriJudul',
            'galleriDeskripsi:ntext',
            'galleriTgl',
            'galleriGambarUrl:url',
            'galleriDibuatTgl',
            'galleriDibuatOleh',
            'galleriStatus',
        ],
    ]) ?>

</div>
