<?php

use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider'=>$dataProvider,
    'headerRowOptions'=> ['class'=>'success']
]);
?>