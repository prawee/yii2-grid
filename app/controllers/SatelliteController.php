<?php

namespace app\controllers;

use Yii;
use app\models\USSWoSearch;

class SatelliteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new USSWoSearch();
        $params['USSWoSearch']['id']=12;
        $dataProvider = $searchModel->searchx(Yii::$app->request->queryParams);
        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
