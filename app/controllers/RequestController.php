<?php

namespace app\controllers;

use Yii;
use app\models\Scene;
use app\models\SceneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use auth\Asset;
use app\models\USSWo;
use yii\data\ActiveDataProvider;
use app\models\StripAccessLocal;

/**
 * RequestController implements the CRUD actions for Scene model.
 */
class RequestController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function init() {
        parent::init();
        Asset::register($this->view);
        //auto insert
        $models=  USSWo::find()->all();
        foreach($models as $model){
            $mgl=Scene::find()->where(['id'=>$model->id])->one();
            if(!is_object($mgl)){
                $scene=new Scene;
                $scene->id=$model->id;
                $scene->wo_doc_name=$model->wo_doc_name;
                $scene->aoi_name=$model->aoi_name;
                $scene->save();
            }
        }
    }

    /**
     * Lists all Scene models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SceneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Scene model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Scene model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Scene();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Scene model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Scene model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Scene model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scene the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scene::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionInfo($id)
    {
        $model=  USSWo::findOne($id);
        return $this->render('info',[
            'model'=>$model,
        ]);
    }
    public function actionOrbit($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StripAccessLocal::find()->where(['scene_id'=>$id]),
        ]);
        return $this->render('orbit',[
            'dataProvider'=>$dataProvider,
        ]);
    }  
}
