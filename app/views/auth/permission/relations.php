<?php
/*
 * 2014-07-16
 * prawee@hotmail.com
 */

$this->title = 'Create Relations';
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_formRelation',['model'=>$model]);