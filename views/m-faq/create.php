<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MFaq */

$this->title = 'Create FAQ';
$this->params['breadcrumbs'][] = ['label' => 'Mfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mfaq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
