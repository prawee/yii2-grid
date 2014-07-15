<?php

/*
 * 2014-06-24
 * prawee@hotmail.com
 */

use \wbraganca\fancytree\FancytreeWidget;
//use \yii\web\JsExpression;
use yii\helpers\Html;
use kartik\icons\Icon;
//use yii\bootstrap\ButtonGroup;

$this->title = 'Permission Management';
$this->params['breadcrumbs'][] = $this->title;

$data = null;
foreach ($auth->getRoles() as $role) {
    $items['title'] = ucfirst($role->name);
    $items['key'] = $role->name;
    $items['folder'] = true;

    $permissions = Yii::$app->authManager->getPermissionsByRole($role->name);
    $items['children'] = null;
    foreach ($permissions as $permission) {
        $items['children'][] = [
            'title' => ucfirst($permission->description),
            'key' => $permission->name,
        ];
    }

    $data[] = $items;
}

$fancytree = FancytreeWidget::widget([
            'class' => 'expanded',
            'options' => [
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
echo Html::a(Icon::show('folder-open') . 'Add Role', [
    '/auth/permission/create'
        ], [
    'class' => 'btn btn-primary'
]);

//echo ButtonGroup::widget([
//    'encodeLabels' =>false,
//    'buttons' => [
//        [
//            'label' =>Icon::show('folder-open').' Add Role',
//            'url' =>['/auth/permission/create'],
//            'options' => [
//                'class' => 'btn-primary',
//            ],
//        ], [
//            'label' => Icon::show('doc') . 'Add Permission',
//            'url' => '#',
//            'options' => [
//                'class' => 'btn-success',
//            ],
//        ],[
//            'label' => Icon::show('times-circle') . 'Delete Item',
//            'url' => '#',
//            'options' => [
//                'class' => 'btn-danger',
//            ],
//        ]
//    ],
//]);


