<?php

namespace app\controllers;

use Yii;
use app\models\MissionLocalSearch;
class CufController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new MissionLocalSearch();
        $params['USSWoSearch']['id']=12;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
