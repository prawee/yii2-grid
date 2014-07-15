<?php
use yii\bootstrap\Collapse;
use yii\rbac\DbManager;
use yii\rbac\Assignment;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;


foreach($roles as $role){
    //$roleHeader = $form->field($model, 'roleName[]')->radio().ucfirst($role->name);
    $roleHeader=Html::activeCheckbox($model,'roleName[]');
    //$roleHeader.=Icon::show('plus-square');
    $roleHeader.=ucfirst($role->name);
    
    $permissions = Yii::$app->authManager->getPermissionsByRole($role->name);
    $content = null;
    foreach ($permissions as $permission) {
        $content.=' '.Html::tag('span', $permission->description,['class'=>'label label-info']);
    }
    
    $items[$roleHeader] = [
        'content' => $content,
        'contentOptions' => [
            'class' => 'in'
        ]
    ];
}
echo Collapse::widget([
    'id'=>'permission-collapse',
    'items' => $items,
]);