<?php

namespace app\controllers;

use auth\components\AccessControl;
use yii\filters\VerbFilter;

class SettingController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access'=>[
                'class'=>  AccessControl::className(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
