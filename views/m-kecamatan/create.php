<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKecamatan */

$this->title = 'Create Mkecamatan';
$this->params['breadcrumbs'][] = ['label' => 'Mkecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkecamatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
