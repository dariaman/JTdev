<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MShopDetail */

$this->title = 'Create Mshop Detail';
$this->params['breadcrumbs'][] = ['label' => 'Mshop Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mshop-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
