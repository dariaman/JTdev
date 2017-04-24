<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MUserAlamatTambahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Muser Alamat Tambahans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-alamat-tambahan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Muser Alamat Tambahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'alamatId',
            'userId',
            'userAlamat',
            'userKota',
            'userKelurahan',
            // 'userKecamatan',
            // 'userDaerah',
            // 'userKodePos',
            // 'alamatStatus:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
