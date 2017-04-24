<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MSlideShow */

$this->title = 'Create Mslide Show';
$this->params['breadcrumbs'][] = ['label' => 'Mslide Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mslide-show-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
