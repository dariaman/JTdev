<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */

$this->title = 'Tambah Service Product';
$this->params['breadcrumbs'][] = ['label' => 'Service Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mservice-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
