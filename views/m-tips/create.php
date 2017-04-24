<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MTips */

$this->title = 'Create Tips';
$this->params['breadcrumbs'][] = ['label' => 'Mtips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
