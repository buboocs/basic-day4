<?php

$gdata = $dataProvider->getModels();
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Yearselect;

HighchartsAsset::register($this)->withScripts([
    'highcharts-more',
    // 'themes/dark-unica'
    'themes/grid'
]);

$xname =[];
$result=[];
$target=[];
for ($i = 0; $i < count($gdata); $i++) {
    $xname[]=$gdata[$i]['kpiname'];
    $result[]=$gdata[$i]['result'];
    $target[]=$gdata[$i]['target'];
}
$xlabel = implode("','", $xname);
$rvalue = implode(",", $result);
$gvalue = implode(",", $target);

$y = isset($_REQUEST['year'])?$_REQUEST['year']:date('Y');
?>

<?= Html::beginForm(); ?>
<?= Html::label('ปีงบประมาณ') ?>
<?= Html::dropDownList('year', $y, ArrayHelper::map(
    Yearselect::find()->orderBy('yearvalue desc')->all(),
    'yearvalue', 'yearthai'),
    ['class' => 'form-control', 'prompt' => 'โปรดเลือกปี...', 'required' => true]);
?>
<?= Html::submitButton('ค้นหา',['class'=>'btn btn-primary']); ?>
<?=Html::endForm(); ?>


<div id="container"></div>
<?php 
$this->registerJS("
    $(function () {
    $('#container').highcharts({
        title: {
            text: 'chart2'
        },
        xAxis: {
            categories: ['$xlabel']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'ผลลัพธ์',
            data: [$rvalue]
        }, {
            type: 'spline',
            name: 'เป้าหมาย',
            data: [$gvalue],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }]
    });
});
      " );
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