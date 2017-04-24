<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MShop */

$this->title = 'Create shop';
$this->params['breadcrumbs'][] = ['label' => 'shop', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mshop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
