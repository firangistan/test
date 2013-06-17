<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $name
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string $about
 * @property string $created_on
 * @property string $updated_on
 * @property string $ip
 * @property integer $active
 * @property integer $power
 * @property integer $ban
 *
 * The followings are the available model relations:
 * @property BugFeature[] $bugFeatures
 * @property Comment[] $comments
 * @property Complaint[] $complaints
 * @property Feedback[] $feedbacks
 * @property Module[] $modules
 * @property Money[] $moneys
 * @property Post[] $posts
 * @property Report[] $reports
 * @property Resource[] $resources
 * @property Status[] $statuses
 * @property StatusComment[] $statusComments
 * @property Todo[] $todos
 */
class User extends CActiveRecord
{
	const USER_ACTIVE = 0;
	const USER_FLAGGED = 1;
	const USER_BANNED = 2;

	const POWER_ADMIN = 0;
	const POWER_MODERATOR = 1;
	const POWER_USER = 2;

	const BAN_ACTIVE = 0;
	const BAN_DEACTIVE = 1;

	public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, password, password_repeat, active, power, ban', 'required'),
			array('password', 'compare'),
			array('username','unique'),
			array('active, power, ban', 'numerical', 'integerOnly'=>true),
			array('name, lastname, username, password, ip', 'length', 'max'=>45),
			array('about, created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, lastname, username, password, about, created_on, updated_on, ip, active, power, ban', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bugFeatures' => array(self::HAS_MANY, 'BugFeature', 'user_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'complaints' => array(self::HAS_MANY, 'Complaint', 'user_id'),
			'feedbacks' => array(self::HAS_MANY, 'Feedback', 'user_id'),
			'modules' => array(self::HAS_MANY, 'Module', 'user_id'),
			'moneys' => array(self::HAS_MANY, 'Money', 'user_id'),
			'posts' => array(self::HAS_MANY, 'Post', 'user_id'),
			'reports' => array(self::HAS_MANY, 'Report', 'user_id'),
			'resources' => array(self::HAS_MANY, 'Resource', 'user_id'),
			'statuses' => array(self::HAS_MANY, 'Status', 'user_id'),
			'statusComments' => array(self::HAS_MANY, 'StatusComment', 'user_id'),
			'todos' => array(self::HAS_MANY, 'Todo', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'username' => 'Username',
			'password' => 'Password',
			'about' => 'About',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'ip' => 'Ip',
			'active' => 'Active',
			'power' => 'Power',
			'ban' => 'Ban',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('power',$this->power);
		$criteria->compare('ban',$this->ban);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterValidate() {
		parent::afterValidate();
		if(!$this->hasErrors()) {
			$this->password = $this->hashPassword($this->password);
		}
	}

	public function validatePassword($password) {
		return md5($password) === $this->password;
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior'=>array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'created_on',
				'updateAttribute' => 'updated_on',
				'setUpdateOnCreate' => true,
			),
		);
	}

	public function getUserStatus() {
		return array(
			self::USER_ACTIVE => 'Active',
			self::USER_FLAGGED => 'Flagged',
			self::USER_BANNED => 'Banned',
		);
	}

	public function getUserPower() {
		return array(
			self::POWER_ADMIN => 'Administrator',
			self::POWER_MODERATOR => 'Moderator',
			self::POWER_USER => 'User',
		);
	}

	public function getUserBanStatus() {
		return array(
			self::BAN_DEACTIVE => 'Active',
			self::BAN_ACTIVE => 'Banned',
		);
	}

	public function hashPassword($password) {
		return md5($password);
	}
}