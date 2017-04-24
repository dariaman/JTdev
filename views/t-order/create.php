<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TOrder */

$this->title = 'Buat Order';
$this->params['breadcrumbs'][] = ['label' => 'Torders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
