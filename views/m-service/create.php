<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MService */

$this->title = 'Create service';
$this->params['breadcrumbs'][] = ['label' => 'Mservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mservice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
