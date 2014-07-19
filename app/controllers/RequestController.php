<?php

namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class RequestController extends \yii\web\Controller
{
    public function actionUss()
    {
        $connection=Yii::$app->db3;
        
//        echo '<pre>';
//        print_r($connection);
//        echo '</pre>';
        
        	
        $model = $connection->createCommand('SELECT * FROM tpt_wo');
        print_r($model);
        $wo = $model->queryAll();

        
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
