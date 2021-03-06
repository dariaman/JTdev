<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MSlideShow */

$this->title = 'Update Slide Show : ' . $model->slideId;
$this->params['breadcrumbs'][] = ['label' => 'Slide Show', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slideId, 'url' => ['view', 'id' => $model->slideId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mslide-show-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
