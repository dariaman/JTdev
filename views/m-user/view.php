<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MUser */

$this->title = $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'Musers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userId], [
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
            'userId',
            'userEmail:email',
            'userNamaDepan',
            'userNamaBelakang',
            'userKelamin',
            'userPassword',
            'userAlamat',
            'userKota',
            'userKelurahan',
            'userKecamatan',
            'userDaerah',
            'userKodePos',
            'userNoTelp',
            'userNoHp',
            'userStatus',
        ],
    ]) ?>

</div>
