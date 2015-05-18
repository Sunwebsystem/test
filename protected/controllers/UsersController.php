<?php

class UsersController extends Controller {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login','registration','logout'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('index','dashboard','create','admin','update','view','admin_dashboard','admin'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
				'users'=>array('*'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
            $this->Beforefilter();
		$this->render('view', array(
			'model' => $model = Users::model()->findByPk($id)
		));
	}

	public function actionCreate() {
            $this->Beforefilter();
		$model = new Users;
		if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);
                        $model->password = $model->validatePassword($_POST['Users']['password']);
                        if($model->validate('email'))
                        {
			/*if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}*/
                        }
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
            $this->Beforefilter();
		//$model = $this->loadModel($id, 'Users');
                $model = Users::model()->findByPk($id);

		if (isset($_POST['Users'])) {
			$model->setAttributes($_POST['Users']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
            $this->Beforefilter();
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Users')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
            $this->Beforefilter();
		$dataProvider = new CActiveDataProvider('Users');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		//print_r($_SESSION);
                $this->Beforefilter();
		$model = new Users('search');
		$model->unsetAttributes();

		if (isset($_GET['Users']))
			$model->setAttributes($_GET['Users']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        
        public function actionLogin(){
            $this->layout = 'login';
            $model=new LoginForm;
            if(isset($_POST['LoginForm'])){
                    $model->attributes=$_POST['LoginForm'];
                    if($model->validate() && $model->login()){
                        $userdata = Yii::app()->user->User;
                        if($userdata['user_type'] == 'admin'){
                            $this->redirect (CController::createUrl('users/admin_dashboard'));
                        }else{
                            $this->redirect (CController::createUrl('users/dashboard'));
                        }
                        //$this->redirect (CController::createUrl('users/dashboard'));
                    }
		}
            $this->render('login',array('model'=>$model));
	}
        
        public function actionDashboard(){
            $this->render('dashboard');
        }
        
        public function actionAdmin_dashboard(){
            $this->Beforefilter();
            $this->render('admin_dashboard');
        }
        
        public function actionRegistration(){
            $this->layout = 'login';
            $model = new Users();
            if(!empty($_POST)){
                $_POST['Users']['password'] = md5($_POST['Users']['password']);
                $_POST['Users']['cpassword'] = md5($_POST['Users']['cpassword']);
                $model->attributes=$_POST['Users'];
                if($model->save()){
                    $errors = "Your registration has been successfully done";
                    Yii::app()->user->setFlash('success',Yii::t('messages',$errors));
                    $this->redirect (CController::createUrl('users/login'));
                }
            }
            $this->render('signup',array('model'=>$model));
        }
        
        public function actionLogout(){
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
	}

}