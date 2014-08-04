<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use auth\Asset;
use auth\components\AccessControl;
use auth\models\AssignmentForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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

    public function init() {
        parent::init();
        Asset::register($this->view);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $params=Yii::$app->request->queryParams;
        $params['UserSearch']['role']=88;
        $dataProvider = $searchModel->search($params);
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAdministrator() {
        $searchModel = new UserSearch();
        $params=Yii::$app->request->queryParams;
        $params['UserSearch']['role']=99;
        $dataProvider = $searchModel->search($params);

        return $this->render('administrator', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionChild() {
        $id=Yii::$app->getRequest()->get('id');
        $searchModel = new UserSearch();
        $params=Yii::$app->request->queryParams;
        $params['UserSearch']['role']=77;
        $params['UserSearch']['parent_id']=$id;
        $dataProvider = $searchModel->search($params);

        return $this->render('child', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->id]);
            $model->role=88;
            if($model->save()):
                return $this->redirect(['index']);
            endif;
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }
    public function actionCreateAdmin() {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->id]);
            $model->role=99;
            if($model->save()):
                return $this->redirect(['administrator']);
            endif;
        } else {
            return $this->render('create-admin', [
                        'model' => $model,
            ]);
        }
    }
    public function actionCreateChild() {
        $id=Yii::$app->getRequest()->get('id');
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->id]);
            $model->role=77;
            $model->parent_id=$id;
            if($model->save()):
                return $this->redirect(['child','id'=>$id]);
            endif;
        } else {
            return $this->render('create-child', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }
    public function actionUpdateAdmin($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['administrator']);
        } else {
            return $this->render('update-admin', [
                        'model' => $model,
            ]);
        }
    }
    public function actionUpdateChild($id) {
        $ref=Yii::$app->getRequest()->get('ref');
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->id]);
            $model->role=77;
            if($model->save()):
                return $this->redirect(['child','id'=>$ref]);
            endif;
        } else {
            return $this->render('update-child', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if($id!==1){
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }
    public function actionDeleteAdmin($id) {
        if($id!==1){
            $this->findModel($id)->delete();
        }
        return $this->redirect(['administrator']);
    }
    public function actionDeleteChild($id) {
        $ref=Yii::$app->getRequest()->get('ref');
        if($id!==1){
            $this->findModel($id)->delete();
        }
        return $this->redirect(['child','id'=>$ref]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     * 2014-08-04
     */
    public function actionPermission($id){
        $user = User::findOne($id);
        $model = new AssignmentForm();

        if (isset($user->id)):
            return $this->render('permission', [
                        'user' => $user,
                        'model' => $model,
            ]);
        else:
            $this->redirect(['index']);
        endif;
    }
    public function actionPermissionChild($id){
        $user = User::findOne($id);
        $model = new AssignmentForm();

        if (isset($user->id)):
            return $this->render('permission-child', [
                        'user' => $user,
                        'model' => $model,
            ]);
        else:
            $this->redirect(['index']);
        endif;
    }
    public function actionAssignment(){
        $key=Yii::$app->getRequest()->get('key');
        $type=Yii::$app->getRequest()->get('type');
        $userId=Yii::$app->getRequest()->get('userid');
        
        $auth = Yii::$app->authManager;
        $auth->init();

        $role = $auth->getRole($key);
        $permission = $auth->getPermission($key);

        $item = is_object($role) ? $role : $permission;

        if (is_object($item) && isset($userId)) {
            if ($type === 'true'):
                //Yii::$app->getSession()->setFlash('info-modal','Adding '.$item->name);
                $chkAuth = $auth->getAssignment($item->name, $userId);
                //!isset($chkAuth->roleName)?$auth->assign($item,$userId):'';
                if (!isset($chkAuth->roleName)):
                    Yii::$app->getSession()->setFlash('success-modal', 'Added ' . $item->name . ' Completed.');
                    $auth->assign($item, $userId);
                else:
                    Yii::$app->getSession()->setFlash('info-modal', 'Exist data.');
                endif;
            else:
                Yii::$app->getSession()->setFlash('error-modal', 'Deleted ' . $item->name . ' Already!');
                $auth->revoke($item, $userId);
            endif;
        }
    }

}
