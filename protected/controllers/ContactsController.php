<?php

class ContactsController extends Controller {


	public function actionView($id) {
            $this->Beforefilter();
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Contacts'),
		));
	}

	public function actionCreate() {
            $this->Beforefilter();
		$model = new Contacts;
		if (isset($_POST['Contacts'])) {
			$model->setAttributes($_POST['Contacts']);
                        $model->user_id = Yii::app()->user->id;
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
                                    Yii::app()->end();
				else
                                    $this->redirect(CController::CreateUrl('contacts/admin'));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
            $this->Beforefilter();
		//$model = $this->loadModel($id, 'Contacts');
                $model = Contacts::model()->findByPk($id);


		if (isset($_POST['Contacts'])) {
			$model->setAttributes($_POST['Contacts']);

			if ($model->save()) {
				//$this->redirect(array('view', 'id' => $model->id));
                            $this->redirect(CController::CreateUrl('contacts/admin'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
            $this->Beforefilter();
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$model = Contacts::model()->findByPk($id)->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
            $this->Beforefilter();
		$dataProvider = new CActiveDataProvider('Contacts');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
            $this->Beforefilter();
		$model = new Contacts('search');
		$model->unsetAttributes();

		if (isset($_GET['Contacts']))
			$model->setAttributes($_GET['Contacts']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}