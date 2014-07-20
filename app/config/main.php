<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\controllers',
    'defaultRoute'=>'uss/index',
    'modules' => [
        'auth' => [
            'class' => 'auth\Module',
            'modal'=>true,
            'tableMap' => [
                'User' => 'user'
            ],
        ],
    ],
    'components' => [
        'user' => [
            'class' => 'auth\components\User',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@auth/views/default'=>'@app/views/auth/default',
                ],
            ],
        ],
    ],
    'params' => $params,
];
