<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MUserAlamatTambahan */

$this->title = $model->alamatId;
$this->params['breadcrumbs'][] = ['label' => 'Muser Alamat Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-alamat-tambahan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->alamatId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->alamatId], [
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
            'alamatId',
            'userId',
            'userAlamat',
            'userKota',
            'userKelurahan',
            'userKecamatan',
            'userDaerah',
            'userKodePos',
            'alamatStatus:boolean',
        ],
    ]) ?>

</div>
