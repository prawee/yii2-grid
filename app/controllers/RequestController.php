<?php

namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class RequestController extends \yii\web\Controller
{
    public function actionUss()
    {
//        echo '<pre>';
//        print_r(Yii::$app->db2);
//        echo '</pre>';
        
//        $sql = "select * from tpt_wo";
//        $command = $db->createCommand($sql);
//        $rows = $command->queryAll();
//        
//        $query = new Query;
//        $provider = new ArrayDataProvider([
//            'allModels' => $query->from('post')->all(),
//            'sort' => [
//                'attributes' => ['id', 'username', 'email'],
//            ],
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//        ]);
//        // get the posts in the current page
//        $posts = $provider->getModels();
        return $this->render('uss');
    }

}
