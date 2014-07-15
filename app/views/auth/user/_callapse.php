<?php

foreach ($roles as $role) {
    //VarDumper::dump($role,10,true);
    $roleHeader = $form->field($model, 'roleName[]')->radio();
    $roleHeader.= Icon::show('plus-square') . ucfirst($role->name);


    $permissions = Yii::$app->authManager->getPermissionsByRole($role->name);
    //VarDumper::dump($permissions, 10, true);
    $content = null;
    foreach ($permissions as $permission) {
        $content.=Html::tag('ul', $permission->name);
    }



    //$content=$form->field($model,'roleName[]')->checkboxList(ArrayHelper::getColumn($permissions,'description'));
    $items[$roleHeader] = [
        'content' => $content,
        'contentOptions' => [
            'class' => ''
        ]
    ];
}
echo Collapse::widget([
    'items' => $items,
]);

