<?php
$this->title = 'Page1';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>My First Page1</h1>
<hr />
ทดสอบ github
<hr />
ฉันชื่อ วิโรจน์ ธัชศฤงคารสกุล
<hr />
<?php echo 'ฉันชื่อ วิโรจน์ ธัชศฤงคารสกุล แบบ php'; ?>
<hr />
<?= 'ฉันชื่อ วิโรจน์ ธัชศฤงคารสกุล อีกแบบ'; ?>
<?php YII::$app->db->open() ?>