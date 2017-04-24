<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MAdmin */

$this->title = 'Create Madmin';
$this->params['breadcrumbs'][] = ['label' => 'Madmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="madmin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
