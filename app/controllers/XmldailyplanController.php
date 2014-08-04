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
use app\models\PlanLocal;
use app\models\MiseoGroupLocal;
use app\models\MissionLocal;
use app\models\SplittedStripLocal;

/**
 * XmldailyplanController implements the CRUD actions for Xml model.
 */
class XmldailyplanController extends Controller {

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
    public function actionIndex() {
        $searchModel = new XmlSearch();
        $params = Yii::$app->request->queryParams;
        $params['XmlSearch']['xml_type_id'] = 2;
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
    public function actionCreate() {
        $model = new Xml();
        if (Yii::$app->request->isPost) {
            $uploaded = UploadedFile::getInstance($model, 'name');

            $model->load(Yii::$app->request->post());

            $model->name = $uploaded->baseName . '.' . $uploaded->extension;
            $model->path = 'uploaded/xml';
            $model->user_id = Yii::$app->user->identity->id;
            $model->status = 0;
            $model->xml_type_id = 2;
            if ($model->validate() && $model->save()) {
                $uploaded->saveAs('uploads/xml/' . $model->name);
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
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
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->name) {
            if (file_exists(Yii::getAlias('@urlUploads') . '/' . $model->name)) {
                @unlink(Yii::getAlias('@urlUploads') . '/' . $model->name);
                $model->delete();
            }
        }

        return $this->redirect(['index']);
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
     * 20140803
     */
    public function actionImport(){
        $id=Yii::$app->getRequest()->get('id');
        $model=$this->findModel($id);
        
        
        $request=Yii::getAlias('@urlUploads/').$model->name;
        $content=utf8_encode(file_get_contents($request));
        $xml=simplexml_load_string($content);
        
        //echo '<pre>'.print_r($xml,true).'</pre>';
        
        if (is_object($xml)) {
            foreach ($xml as $key => $data) {
                if ($data['DBTable']=='PLAN_LOCAL') {
                    PlanLocal::insertGetId($data);
                } else {
                    //echo '<br/>==GROUPS';
                    MiseoGroupLocal::insertGetId($data);
                    foreach($data->Groups as $keygroups=>$groups){
                        foreach($groups as $keygroup=>$group){
                            if($group['DBTable']){
                                //echo '<br/>===GROUP';
                                MiseoGroupLocal::insertGetId($group);
                                foreach($group->Groups as $keysubgroups => $subgroups){
                                    foreach ($subgroups as $keysubgroup => $subgroup){
                                        if($subgroup['DBTable']){
                                            //echo '<br/>====SUB-GROUP';
                                            MiseoGroupLocal::insertGetId($subgroup);
                                            foreach($subgroup->Requests as $keyrequests=>$requests){
                                                foreach($requests as $keyrequest=>$request){
                                                    if($request['DBTable']){
                                                        //echo '<br/>=====MISSION';
                                                        MissionLocal::insertGetId($request);
                                                        foreach($request->STRIPS as $keystrips=>$strips){
                                                            foreach($strips as $keystrip=>$strip){
                                                                if($strip['DBTable']){
                                                                    //echo '<br/>======SPLITTED-STRIP-LOCAL';
                                                                    SplittedStripLocal::insertGetId($strip);
                                                                }
                                                            }
                                                        }//strips
                                                    }
                                                }
                                            }//requests
                                        }
                                    }//end subgroups
                                }//end group->Groups
                            }
                        }//end
                    }//end 
                }
                
            }
        }
        $model->status=1;
        $model->save();
        return $this->redirect(['index']);
    }

}
