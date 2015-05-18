<?php

Yii::import('application.models._base.BaseContacts');

class Contacts extends BaseContacts
{
    public $groupname;
    public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public function relations() {
		return array(
                    'User'=>array(self::BELONGS_TO,'Users','user_id'),
                    'Groups'=>array(self::BELONGS_TO,'Groups','group_id'),
		);
	}
        
        public function rules() {
		return array(
                        array('firstname', 'required','message'=>'Please enter first name'),
                        array('lastname', 'required','message'=>'Please enter last name'),
                        array('email', 'required','message'=>'Please enter email address'),
                        array('email', 'email','message'=>'Please enter valid email address'),
                        array('contact_no', 'required','message'=>'Please enter mobile No'),
                        array('contact_no', 'match','pattern'=>'/^[0-9]+$/','message'=>'Please enter 10 digit mobile No'),
                        
                        array('group_id', 'required','message'=>'Please select group name'),
			array('user_id', 'required'),
			array('user_id, group_id', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname', 'length', 'max'=>50),
			array('contact_no', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			array('created, modified', 'safe'),
			array('group_id, firstname, lastname, contact_no, email, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, group_id, firstname, lastname, contact_no, email, created, modified,groupname', 'safe', 'on'=>'search'),
		);
	}
        
        public function search() {
		$criteria = new CDbCriteria;
                $criteria->with = array('Groups');
		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('group_id', $this->group_id);
		$criteria->compare('t.firstname', $this->firstname, true);
		$criteria->compare('t.lastname', $this->lastname, true);
		$criteria->compare('contact_no', $this->contact_no, true);
		$criteria->compare('email', $this->email, true);
                $criteria->compare('Groups.name', $this->groupname, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('modified', $this->modified, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}