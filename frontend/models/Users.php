<?php

/**
 * This is the model class for table "p_users".
 *
 * The followings are the available columns in table 'p_users':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $role
 * @property string $name
 * @property string $ot4estvo
 * @property string $family
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property Activecard[] $activecards
 * @property Roles $role0
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'p_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, role', 'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('email, password, name, ot4estvo, family, phone', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, password, role, name, ot4estvo, family, phone', 'safe', 'on'=>'search'),
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
			'activecards' => array(self::HAS_MANY, 'Activecard', 'user_id'),
			'role0' => array(self::BELONGS_TO, 'Roles', 'role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'name' => 'Name',
			'ot4estvo' => 'Ot4estvo',
			'family' => 'Family',
			'phone' => 'Phone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ot4estvo',$this->ot4estvo,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
