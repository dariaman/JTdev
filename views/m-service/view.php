<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\MService */
$this->title = $model->serviceId;
$this->params['breadcrumbs'][] = ['label' => 'Mservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 function status($status){
    if($status){
         $active_inactive = '<span class="glyphicon glyphicon-ok"></span';
    }else{
        $active_inactive =  '<span class="glyphicon glyphicon-remove"></span';
    }
    return $active_inactive;
};
?>
<div class="mservice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->serviceId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->serviceId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'serviceId',
            'serviceJudul',
            // 'serviceStatus',
            [
                'label'=>'Status',
                'format'=>'raw',
                'value'=>status($model->serviceStatus)
            ],
        ],
    ]) ?>

</div>