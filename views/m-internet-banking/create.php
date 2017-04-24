<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MInternetBanking */

$this->title = 'Create Internet Banking';
$this->params['breadcrumbs'][] = ['label' => 'Minternet Bankings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minternet-banking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
