<?php

/*
 * 2014-06-24
 * prawee@hotmail.com
 */

//use Yii;
use \wbraganca\fancytree\FancytreeWidget;
//use \yii\web\JsExpression;
use yii\helpers\Html;
use kartik\icons\Icon;
//use yii\bootstrap\ButtonGroup;
//use admin\app\components\Controller;
use yii\bootstrap\Modal;

$this->title = 'Permission Management';

$data = null;
$items= null;
foreach ($auth->getRoles() as $role) {
    $items['title'] = ucfirst($role->name);
    $items['key'] = $role->name;
    $items['folder'] = true;

    $permissions = $auth->getPermissionsByRole($role->name);
    $items['children'] = null;
    foreach ($permissions as $permission) {
        $hasChild=$auth->hasChild($role,$permission);
        if($hasChild):
            $items['children'][] = [
                'title' => ucfirst($permission->description),
                'key' => $permission->name,
            ];
        endif;
    }
    $data[] = $items;
}

/*
 * 20140707
 * Added permission not setting
 */
$permission_not_set=$auth->getPermissions();
//Controller::debug($permission_not_set);
$items_not_set=null;
foreach($permission_not_set as $notset){
    $items_no_set['title']=$notset->description;
    $items_no_set['key']=$notset->name;
    
    $permission_childs=$auth->getPermissionsByRole($notset->name);
    $items_no_set['children']=null;
    foreach($permission_childs as $permission_child){
        $hasChild=$auth->hasChild($notset,$permission_child);
        if($hasChild):
            $items_no_set['children'][]=[
                'title'=>$permission_child->description,
                'key'=>$permission_child->name,
            ];
        endif;
    }
    if($items_no_set['children']):
        $data[]=$items_no_set;
    endif;
}

Modal::begin([
    'id' => 'form-modal',
    'header' => Icon::show('check') . '<b> Permission</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
$fancytree = FancytreeWidget::widget([
            'class' => 'expanded',
            'options' => [
                'persist'=>true,
                'selectMode' => 3,
                'source' => $data,
                'extensions' => ['childcounter'],
                'childcounter' => [
                    'deep' => true,
                    'hideZeros' => true,
                    'hideExpanded' => true,
                ],
            ],
        ]);
echo $fancytree;

echo Html::tag('br');
echo Html::a(Icon::show('folder-open') . 'Add Roles', ['/auth/permission/create'],[
    'class' => 'btn btn-success'
]);
echo ' ';
echo Html::a(Icon::show('folder-open') . 'Add Relations', ['/auth/permission/relations'],[
    'class' => 'btn btn-success'
]);
echo ' ';
echo Html::a(Icon::show('times') . 'Cancel', ['/setting/index'],[
    'class' => 'btn btn-danger'
]);

Modal::end();