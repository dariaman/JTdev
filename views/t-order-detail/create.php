<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TOrderDetail */

$this->title = 'Create Torder Detail';
$this->params['breadcrumbs'][] = ['label' => 'Torder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torder-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
