<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKelurahan */

$this->title = 'Create Kelurahan';
$this->params['breadcrumbs'][] = ['label' => 'Kelurahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkelurahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
