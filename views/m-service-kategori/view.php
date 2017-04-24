<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\MServiceKategori */
$this->title = $model->serviceKategoriId;
$this->params['breadcrumbs'][] = ['label' => 'Mservice Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if($model->serviceKategoriStatus){
    $status = '<span class="glyphicon glyphicon-ok"></span';
}else{
    $status = '<span class="glyphicon glyphicon-reamove"></span';
}
?>
<div class="mservice-kategori-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->serviceKategoriId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->serviceKategoriId], [
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
            'serviceKategoriId',
            'serviceKategoriJudul',
            'serviceKategoriGambarUrl:url',
            // 'serviceKategoriStatus',
            [
                'label'=>'Status',
                'format'=>'raw',
                'value'=>$status
            ],
            'serviceNama',
        ],
    ]) ?>

</div>