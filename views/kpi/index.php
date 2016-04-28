<?php
$this->title = 'kpi';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>kpi/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php
/* @var $this yii\web\View */
$link1 = Yii::$app->urlManager->createUrl([
    'kpi/kpi1',
    ]);
$link2 = Yii::$app->urlManager->createUrl([
    'kpi/kpi2',
    ]);
$link3 = Yii::$app->urlManager->createUrl([
    'kpi/kpi3',
    ]);
?>

<a href="<?= $link1 ?>">1.แสดงผลตัวชี้วัดที่ QOF</a>
<br/>
<a href="<?= $link2 ?>">2.แสดงผลลัพธ์ตัวชี้วัดที่ QOF</a>
<br/>
<a href="<?= $link3 ?>">3.ตัวชี้วัดที่ QOF</a>
<hr />
