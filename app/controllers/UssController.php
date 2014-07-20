<?php

namespace app\controllers;

use app\models\USSWo;

class UssController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $sql='select * from tpt_wo';
        $model=USSWo::findBySql($sql);
        return $this->render('index',[
            'model'=>$model,
        ]);
    }

}
