<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MVideo */

$this->title = 'Create Mvideo';
$this->params['breadcrumbs'][] = ['label' => 'Mvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mvideo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
