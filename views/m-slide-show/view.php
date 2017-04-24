<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MSlideShow */

$this->title = $model->slideId;
$this->params['breadcrumbs'][] = ['label' => 'Mslide Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mslide-show-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->slideId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->slideId], [
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
            'slideId',
            'slideUrl:url',
            'slideStatus',
        ],
    ]) ?>

</div>
