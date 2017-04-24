<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Musers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Muser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userId',
            'userEmail:email',
            'userNamaDepan',
            'userNamaBelakang',
            'userKelamin',
            // 'userPassword',
            // 'userAlamat',
            // 'userKota',
            // 'userKelurahan',
            // 'userKecamatan',
            // 'userDaerah',
            // 'userKodePos',
            // 'userNoTelp',
            // 'userNoHp',
            // 'userStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
