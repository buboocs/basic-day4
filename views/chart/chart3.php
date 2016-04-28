<?php

$gdata = $dataProvider->getModels();
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;

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
?>
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