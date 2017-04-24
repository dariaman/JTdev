<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MUserAlamatTambahan */

$this->title = 'Create Muser Alamat Tambahan';
$this->params['breadcrumbs'][] = ['label' => 'Muser Alamat Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-alamat-tambahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
