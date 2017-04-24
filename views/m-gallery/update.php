<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MGallery */

$this->title = 'Update Gallery: ';
$this->params['breadcrumbs'][] = ['label' => 'Mgalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->galleriId, 'url' => ['view', 'id' => $model->galleriId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mgallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
