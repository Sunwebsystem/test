<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
    public $cpassword;
    public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('username', 'required','message'=>'Please enter username.'),
                        array('password', 'required','message'=>'Please enter password.'),
                        array('cpassword', 'required','message'=>'Please re-enter password.'),
                        
                        array('cpassword', 'compare', 'compareAttribute'=>'password','message'=>'Password and confirm password does not match.'),
                        
                        array('email', 'required','message'=>'Please enter email address.'),
                        array('email', 'email','message'=>'Please enter valid email address.'),
                        array('firstname', 'required','message'=>'Please enter first name.'),
                        array('lastname', 'required','message'=>'Please enter last name.'),
                        
                        array('dob', 'required','message'=>'Please enter date of birthday.'),
                        array('contact_no', 'required','message'=>'Please enter contact No..'),
                    
			array('is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>70),
			array('firstname, lastname', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>6),
			array('contact_no', 'length', 'max'=>20),
			array('dob, created, modified', 'safe'),
			array('firstname, lastname, gender, dob, contact_no, is_active, is_deleted, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, username, password, email, firstname, lastname, gender, dob, contact_no, is_active, is_deleted, created, modified', 'safe', 'on'=>'search'),
		);
	}
        
        
        public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'email' => Yii::t('app', 'Email'),
			'firstname' => Yii::t('app', 'Firstname'),
			'lastname' => Yii::t('app', 'Lastname'),
			'gender' => Yii::t('app', 'Gender'),
			'dob' => Yii::t('app', 'Dob'),
			'contact_no' => Yii::t('app', 'Contact No'),
			'is_active' => Yii::t('app', 'Is Active'),
			'is_deleted' => Yii::t('app', 'Is Deleted'),
			'created' => Yii::t('app', 'Created'),
			'modified' => Yii::t('app', 'Modified'),
                        'cpassword' => Yii::t('app', 'Confirm Passwprd'),
		);
	}
        
        
        /**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return crypt($password,$this->password)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return crypt($password, $this->generateSalt());
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 *
	 * The {@link http://php.net/manual/en/function.crypt.php PHP `crypt()` built-in function}
	 * requires, for the Blowfish hash algorithm, a salt string in a specific format:
	 *  - "$2a$"
	 *  - a two digit cost parameter
	 *  - "$"
	 *  - 22 characters from the alphabet "./0-9A-Za-z".
	 *
	 * @param int cost parameter for Blowfish hash algorithm
	 * @return string the salt
	 */
	protected function generateSalt($cost=10)
	{
		if(!is_numeric($cost)||$cost<4||$cost>31){
			throw new CException(Yii::t('Cost parameter must be between 4 and 31.'));
		}
		// Get some pseudo-random data from mt_rand().
		$rand='';
		for($i=0;$i<8;++$i)
			$rand.=pack('S',mt_rand(0,0xffff));
		// Add the microtime for a little more entropy.
		$rand.=microtime();
		// Mix the bits cryptographically.
		$rand=sha1($rand,true);
		// Form the prefix that specifies hash algorithm type and cost parameter.
		$salt='$2a$'.str_pad((int)$cost,2,'0',STR_PAD_RIGHT).'$';
		// Append the random salt string in the required base64 format.
		$salt.=strtr(substr(base64_encode($rand),0,22),array('+'=>'.'));
		return $salt;
	}
}
