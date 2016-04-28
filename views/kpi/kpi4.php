<?php
$this->title = 'kpi4';
$this->params['breadcrumbs'][] = [
    'label' => 'kpi',
    'url' => ['/kpi/index',]
];
$this->params['breadcrumbs'][] = $this->title;
//use yii\grid\GridView;
use kartik\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    
    //เพิ่มหัวส่งออก สำหรับ kartik
    'panel'=>['before'=>''],
    
    //fix หัวฟิวเวลาเลื่อน
    // 'floatHeader' => true,
    
    //สีที่เมาส์
    'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive table-hover'],
    
    //สี หัวฟิว
    'headerRowOptions'=> ['class'=>'warning'],
    'columns' => [
        [
            'label'=>'ตัวชี้วัด',
            'attribute'=>'kpiname',
            'headerOptions' => ['class'=>'text-center']
            ],
        [
            'label'=>'ผลงาน',
            'attribute'=>'divide',
            'format'=>['decimal',0],
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-right'],
            ],
        [
            'label'=>'เป้าหมาย',
            'attribute'=>'denom',
            'format'=>['decimal',0],
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-right'],
            ],
        [
            'label'=>'ร้อยละ',
            'attribute'=>'result',
            'format'=>['decimal',2],
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-right'],
            ],
        [
            'label'=>'เกณฑ์',
            'attribute'=>'target',
            'format'=>['decimal',0],
            'headerOptions' => ['class'=>'text-center'],
            'contentOptions' => ['class'=>'text-right'],
            ]
        ]
]);
?>