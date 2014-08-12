<?php

namespace app\controllers;

use Yii;
use app\models\Xml;
use app\models\XmlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use auth\Asset;
use yii\web\UploadedFile;
use app\models\MiseoGroupLocal;
use app\models\MissionLocal;
use app\models\SplittedStripLocal;
use yii\helpers\Json;
use app\models\User;

/**
 * XmlController implements the CRUD actions for Xml model.
 */
class XmlController extends Controller {

    public function behaviors() {
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
    }

    /**
     * Lists all Xml models.
     * @return mixed
     */
    public function actionIndex($id) {
        $type=Yii::$app->getRequest()->get('type');
        $searchModel = new XmlSearch();
        $params=Yii::$app->request->queryParams;
        $params['XmlSearch']['scene_id']=$id;
        $params['XmlSearch']['xml_type_id']=$type;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Xml model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Xml model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $type=Yii::$app->getRequest()->get('type');
        $model = new Xml();
        if (Yii::$app->request->isPost) {
            $uploaded = UploadedFile::getInstance($model,'name');
            
            $model->load(Yii::$app->request->post());
            
            $model->name=$uploaded->baseName.'.'.$uploaded->extension;
            $model->path='uploaded/xml';
            $model->scene_id=$id;
            $model->status=0;
            $model->xml_type_id=$type;
            if ($model->validate() && $model->save()) {  
                $uploaded->saveAs('uploads/xml/'.$model->name);
                return $this->redirect(['index', 'id' => $id,'type'=>$type]);
            }else{
                return $this->render('create', [
                        'model' => $model,
                ]);
            }
        }else{
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Xml model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Xml model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete() {
        $id=Yii::$app->getRequest()->get('id');
        $ref=Yii::$app->getRequest()->get('ref');
        $type=Yii::$app->getRequest()->get('type');
        $model=$this->findModel($id);
        if ($model->name) {
            if (file_exists(Yii::getAlias('@urlUploads') . '/' . $model->name)) {
                @unlink(Yii::getAlias('@urlUploads') . '/' . $model->name);
                $model->delete();
            }
        }

        return $this->redirect(['index','id'=>$ref,'type'=>$type]);
    }

    /**
     * Finds the Xml model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Xml the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Xml::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /*
     * 20140724
     */
    public function actionImport(){
        $id=Yii::$app->getRequest()->get('id');
        $ref=Yii::$app->getRequest()->get('ref');
        $type=Yii::$app->getRequest()->get('type');
        $model=$this->findModel($id);
        
        
        $request=Yii::getAlias('@urlUploads/').$model->name;
        $content=utf8_encode(file_get_contents($request));
        $xml=simplexml_load_string($content);
        if(is_object($xml)){
            //MiseoGroupLocal::updateBySceneId($xml,$ref);
            //MissionLocal::updateBySceneId($xml->Requests,$ref);
            //SplittedStripLocal::updateBySceneId($xml->Requests,$ref);
            //MissionLocal::insertByLoop($xml->Requests,$ref);
            //SplittedStripLocal::insertByLoop($xml->Requests,$ref);
            //echo '<pre>'.print_r($model->attributes,true).'</pre>';
            //echo '<pre>'.print_r($xml,true).'</pre>';
            //$missionId=MissionLocal::insertGetId2($xml,$model);
            $missionId=3;
            
        }
        //$model->status=1;
        $model->save();
        return $this->redirect(['index','id'=>$ref,'type'=>$type]);
    }

    public function actionClient() {
        $out = [];
        if (Yii::$app->getRequest()->post('depdrop_parents')) {
            $parents = end(Yii::$app->getRequest()->post('depdrop_parents'));
            $list = User::find()->where(['parent_id' => $parents])->asArray()->all();
            $selected = null;
            if ($parents != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id'], 'name' => $account['username']];
                    if ($i == 0) {
                        $selected = $account['id'];
                    }
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

}
