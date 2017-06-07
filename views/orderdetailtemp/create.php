<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orderdetailtemp */

$this->title = 'Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'order-detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetailtemp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
