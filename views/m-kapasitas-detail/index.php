<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MKapasitasDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'kapasitas Detail';
$this->params['breadcrumbs'][] = $this->title;
/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title = Yii::t('app', 'New Kapasitas');
      $url = Url::toRoute(['/m-kapasitas-detail/create']);
      $options = ['id'=>'kapasitas-id-create',
                    'data-pjax' => 0,
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon = '<span class="fa fa-plus fa-lg"></span>';
      
      $label = $icon .' '. $title;
      $content = Html::a($label,$url,$options);
      return $content;
     }
  /*
   * Tombol View
  */
  function tombolView($url, $model){
        $title = Yii::t('app', 'View');
        $icon = '<span class="glyphicon glyphicon-eye-open"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/m-kapasitas-detail/view','id'=>$model->kapasitasId]);
        $options1 = [
                    'id'=>'view-kapasitas-id',
                    // 'class'=>"btn btn-default btn-xs",      
                    // 'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],  
                ];
        $content = '<li>'.Html::a($label,$url,$options1).'</li>';
        return $content;
    }
 /*
   * Tombol Update
  */
  function tombolUpdate($url, $model){
        $title = Yii::t('app', 'Edit');
        $icon = '<span class="glyphicon glyphicon-edit"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/m-kapasitas-detail/update','id'=>$model->kapasitasId]);
        $options1 = [
                    'id'=>'edit-kapasitas-id',
                    // 'class'=>"btn btn-default btn-xs",      
                    // 'style'=>['width'=>'170px', 'height'=>'25px','border'=> 'none','background-color'=>'white'],  
                  ];
         $content = '<li>'.Html::a($label,$url,$options1).'</li>';
        return $content;
    }
     /*
   * Tombol Delete
  */
  function tombolDelete($url, $model){
        $title = Yii::t('app', 'Delete');
        $icon = '<span class="glyphicon glyphicon-trash"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/m-kapasitas-detail/delete','id'=>$model->kapasitasId]);
        $options1 = [ 'id'=>'delete-kapasitas-id',
                       'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                            ],
                    // 'class'=>"btn btn-default btn-xs",       
                  ];
        $content = '<li>'.Html::a($label,$url,$options1).'</li>';
        return $content;
    }
 #status service
  function Status($model){
      if ($model->kapasitasStatus == 1){
            return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
        }else if($model->kapasitasStatus == 0){
            return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
       }
  }
/**
 * GRID Master Kapasitas
 * @author aditiya  [aditiyakurniawan30@gmail.com]
 * @since 1.0.0
*/
$attDinamik =[];
$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'kapasitasJudul','SIZE' => '30px','label'=>'Judul','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'kapasitasHarga','SIZE' => '30px','label'=>'Harga','align'=>'center','warna'=>'73, 162, 182, 1','grp'=>false]],
      ['ID' =>2, 'ATTR' =>['FIELD'=>'servicejuduldetail','SIZE' => '30px','label'=>'Service Detail','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>3, 'ATTR' =>['FIELD'=>'kapasitasDeskripsi','SIZE' => '40%','label'=>'Deskripsi','align'=>'center','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>4, 'ATTR' =>['FIELD'=>'kapasitasStatus','SIZE' => '30px','label'=>'Status','align'=>'center','warna'=>'73, 162, 182, 1','grp'=>false]],
    ];
$gvHeadColomnBT = ArrayHelper::map($headColomnBT, 'ID', 'ATTR');
$attDinamik[] =[
  'class'=>'kartik\grid\SerialColumn',
  //'contentOptions'=>['class'=>'kartik-sheet-style'],
  'width'=>'10px',
  'header'=>'No.',
  'headerOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'verdana, arial, sans-serif',
      'font-size'=>'9pt',
      'background-color'=>'rgba(73, 162, 182, 1)',
    ]
  ],
  'contentOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'tahoma, arial, sans-serif',
      'font-size'=>'9pt',
    ]
  ],
];
foreach($gvHeadColomnBT as $key =>$value[]){
      # code...
    if($value[$key]['FIELD'] == 'kapasitasStatus'){
        $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'format' => 'raw',
        'value'=>function($model){
                  return status($model);
                },
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>true,
        'headerOptions'=>[
            'style'=>[
                'text-align'=>'center',
                'width'=>$value[$key]['SIZE'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
                'background-color'=>'rgba('.$value[$key]['warna'].')',
            ]
        ],
        'contentOptions'=>[
            'style'=>[
                'width'=>$value[$key]['SIZE'],
                'text-align'=>$value[$key]['align'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
            ]
        ],
        ];
    }elseif($value[$key]['FIELD'] == 'kapasitasHarga'){
         $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'format' => 'raw',
        'value'=>function($model){
                  return 'Rp '.number_format($model->kapasitasHarga,2);
                },
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>true,
        'headerOptions'=>[
            'style'=>[
                'text-align'=>'center',
                'width'=>$value[$key]['SIZE'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
                'background-color'=>'rgba('.$value[$key]['warna'].')',
            ]
        ],
        'contentOptions'=>[
            'style'=>[
                'width'=>$value[$key]['SIZE'],
                'text-align'=>$value[$key]['align'],
                'font-family'=>'tahoma, arial, sans-serif',
                'font-size'=>'8pt',
            ]
        ],
        ];

    }else{
        $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filter'=>true,
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>false,
        //'group'=>$value[$key]['grp'],
        'headerOptions'=>[
            'style'=>[
            'text-align'=>'center',
            'width'=>$value[$key]['SIZE'],
            'font-family'=>'tahoma, arial, sans-serif',
            'font-size'=>'8pt',
            'background-color'=>'rgba('.$value[$key]['warna'].')',
          ]
        ],
        'contentOptions'=>[
          'style'=>[
            'width'=>$value[$key]['SIZE'],
            'text-align'=>$value[$key]['align'],
            'font-family'=>'tahoma, arial, sans-serif',
            'font-size'=>'8pt',
          ]
        ],
      ];
    }
      
  };
   /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => '{view}{update}{delete}',
    'dropdownOptions'=>['class'=>'pull-right drop','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
        /* View PO | Permissian All */
          'view' => function ($url, $model) {
                  return tombolView($url, $model);
                },
          'update' => function ($url, $model) {
                  return tombolUpdate($url, $model);
                },
          'delete' => function ($url, $model) {
                  return tombolDelete($url, $model);
                },
    ],
    'headerOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
        'background-color'=>'rgba(73, 162, 182, 1)',
      ]
    ],
    'contentOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'height'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
      ]
    ],
  ];
  $gvkapasitas=GridView::widget([
      'id'=>'gv-kapasitas-id',
      'dataProvider' => $dataProvider,
      // 'filterModel' => $searchModel,
      'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
      'columns' => $attDinamik,
      'pjax'=>true,
      'pjaxSettings'=>[
        'options'=>[
            'enablePushState'=>false,
            'id'=>'gv-kapasitas-id',
        ],
      ],
      'panel' => [
            'heading'=>false,
            'type'=>'info',
            'before'=> tombolCreate(),
            'showFooter'=>false,
      ],
      /* 'export' =>['target' => GridView::TARGET_BLANK],
      'exportConfig' => [
        GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
        GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
      ], */
      'toolbar'=> [
          ['content'=>''],
            //'{export}',
        //'{items}',
      ],
      'hover'=>true, //cursor select
      'responsive'=>true,
      'responsiveWrap'=>true,
      'bordered'=>true,
      'striped'=>true,
    ]);
?>
<div class="mkapasitas-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $gvkapasitas ?>
</div>