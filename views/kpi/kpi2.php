<?php
$this->title = 'kpi2';
$this->params['breadcrumbs'][] = [
    'label' => 'kpi',
    'url' => ['/kpi/index',]
];
$this->params['breadcrumbs'][] = $this->title;
use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //สีที่เมาส์
    'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive table-hover'],
    
    //สี หัวฟิว
    'headerRowOptions'=> ['class'=>'success'],
    'columns' => [
        'kpiname',
        'divide',
        'denom',
        'result',
        'target'
        ]
]);
?>