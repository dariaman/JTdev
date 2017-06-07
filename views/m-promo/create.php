<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MPromo */

$this->title = 'Create Promo';
$this->params['breadcrumbs'][] = ['label' => 'Mpromos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpromo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
