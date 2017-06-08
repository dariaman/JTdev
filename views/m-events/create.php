<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MEvents */

$this->title = 'Create event';
$this->params['breadcrumbs'][] = ['label' => 'events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
