<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MTestimoni */

$this->title = 'Create Mtestimoni';
$this->params['breadcrumbs'][] = ['label' => 'Mtestimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtestimoni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
