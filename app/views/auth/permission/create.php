<?php
/*
 * 2014-06-27
 * prawee@hotmail.com
 */
//use yii\widgets\Pjax;

$this->title = 'Create Permission';
$this->params['breadcrumbs'][] = $this->title;

//Pjax::begin([
//'id' => "permissionPjax",
//'enablePushState' => false
//]);
echo $this->render('_formItem',['model'=>$model]);
//Pjax::end();