<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKota */

$this->title = 'Create Mkota';
$this->params['breadcrumbs'][] = ['label' => 'Mkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
