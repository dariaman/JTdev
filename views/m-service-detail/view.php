
<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */
$this->title = $model->serviceDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Mservice Details', 'url' => ['index']];
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
<div class="mservice-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->serviceDetailId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->serviceDetailId], [
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
            'serviceDetailId',
            'serviceDetailJudul',
            'serviceDetailDeskripsi:ntext',
            'serviceDetailGambar',
            'serviceJudul',
            'servicejudulheader',
            [
                'label'=>'Status',
                'format'=>'raw',
                'value'=>status($model->serviceDetailStatus)
            ]
            // 'serviceDetailStatus',
        ],
    ]) ?>

</div>