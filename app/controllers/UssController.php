<?php

namespace app\controllers;

use Yii;
use app\models\USSWo;
use app\models\USSWoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use auth\components\AccessControl;
use auth\Asset;

use app\models\MiseoGroupLocal;
use app\models\MissionLocal;
use app\models\SplittedStripLocal;
use yii\data\ActiveDataProvider;
use app\models\StripAccessLocal;

/**
 * UssController implements the CRUD actions for USSWo model.
 */
class UssController extends Controller
{
    public function behaviors()
    {
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
    
    public function init()
    {
        parent::init();
        Asset::register($this->view);
        
        //auto insert
        $models=  USSWo::find()->all();
        foreach($models as $model){
            $mgl=MiseoGroupLocal::find()->where(['scene_id'=>$model->id])->one();
            if(!is_object($mgl)){
                MiseoGroupLocal::insertBySceneId($model->id);
                //MissionLocal::insertBySceneId($model->id);
                //SplittedStripLocal::insertBySceneId($model->id);
            }
        }
    }

    /**
     * Lists all USSWo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new USSWoSearch();
        $dataProvider = $searchModel->searchx(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single USSWo model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new USSWo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new USSWo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing USSWo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing USSWo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the USSWo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return USSWo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = USSWo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionInfo($id)
    {
        $model=$this->findModel($id);
        return $this->render('info',[
            'model'=>$model,
        ]);
    }
    public function actionOrbit($id)
    {
        $model=SplittedStripLocal::find()->select(['id'])->where(['scene_id'=>$id])->orderBy(['id'=>SORT_DESC])->asArray()->all();
        
        $dataProvider = new ActiveDataProvider([
            'query' => StripAccessLocal::find()->where(['splitted_strip_local_id'=>[11,12]]),
        ]);
        return $this->render('orbit',[
            'model'=>$model,
            'dataProvider'=>$dataProvider,
        ]);
    }  
}
