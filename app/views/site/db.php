<?php
//echo '<pre>';
//print_r($db);
//echo '</pre>';

$sql='select * from tpt_wo';
$a=$db->createCommand($sql)->queryAll();
//print_r($a);