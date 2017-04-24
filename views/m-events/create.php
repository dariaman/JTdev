<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MEvents */

$this->title = 'Create Mevents';
$this->params['breadcrumbs'][] = ['label' => 'Mevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
