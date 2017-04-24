<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MFaq */

$this->title = $model->faqId;
$this->params['breadcrumbs'][] = ['label' => 'Mfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mfaq-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->faqId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->faqId], [
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
            'faqId',
            'faqJudul',
            'faqDeskripsi',
            'faqStatus',
        ],
    ]) ?>

</div>
