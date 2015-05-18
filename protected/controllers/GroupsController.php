<?php

class GroupsController extends Controller {

public function filters() {
	return array(
			'accessControl', 
			);
}
public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update','admin'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Groups'),
		));
	}

	public function actionCreate() {
            $this->Beforefilter();
		$model = new Groups;
		if (isset($_POST['Groups'])) {
                    $model->setAttributes($_POST['Groups']);
                    if ($model->save()) {
                            if(Yii::app()->getRequest()->getIsAjaxRequest()){
                                Yii::app()->end();
                            }else{
                                $this->redirect(CController::createUrl('groups/admin'));
                            }
                    }
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
            $this->Beforefilter();
		//$model = $this->loadModel($id, 'Groups');
            $model = Groups::model()->findByPk($id);
		if (isset($_POST['Groups'])) {
			$model->setAttributes($_POST['Groups']);

			if ($model->save()) {
				$this->redirect(CController::createUrl('groups/admin'));
			}
		}
		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
            $this->Beforefilter();
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Groups')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
            $this->Beforefilter();
		$dataProvider = new CActiveDataProvider('Groups');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
            $this->Beforefilter();
		$model = new Groups('search');
		$model->unsetAttributes();

		if (isset($_GET['Groups']))
			$model->setAttributes($_GET['Groups']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}