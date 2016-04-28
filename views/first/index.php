
<h1>first/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php
/* @var $this yii\web\View */
$link1 = Yii::$app->urlManager->createUrl([
    'first/page4',
    ]);
?>

<a href="<?= $link1 ?>">1.หน้า4</a>
<hr />


