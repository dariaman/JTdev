<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MFaq */

$this->title = 'Update Mfaq: ' . $model->faqId;
$this->params['breadcrumbs'][] = ['label' => 'Mfaqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->faqId, 'url' => ['view', 'id' => $model->faqId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mfaq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
