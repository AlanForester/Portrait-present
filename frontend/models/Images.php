<?php

/**
 * This is the model class for table "p_images".
 *
 * The followings are the available columns in table 'p_images':
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $typek
 * @property integer $activ_id
 * @property string $options_delivery
 * @property string $info_delivery
 * @property string $coment
 *
 * The followings are the available model relations:
 * @property Cards $activ
 */
class Images extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'p_images';
	}
        
          public static function i($id) {
          return Yii::app()->createAbsoluteUrl("/image/view1/",array('id' => $id));
      }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img', 'required'),
			array('activ_id', 'numerical', 'integerOnly'=>true),
			array('name, typek, options_delivery', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, img, typek, activ_id, options_delivery, info_delivery, coment', 'safe', 'on'=>'search'),
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
			'activ' => array(self::BELONGS_TO, 'Cards', 'activ_id'),
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
			'img' => 'Img',
			'typek' => 'Typek',
			'activ_id' => 'Activ',
			'options_delivery' => 'Options Delivery',
			'info_delivery' => 'Info Delivery',
			'coment' => 'Coment',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('typek',$this->typek,true);
		$criteria->compare('activ_id',$this->activ_id);
		$criteria->compare('options_delivery',$this->options_delivery,true);
		$criteria->compare('info_delivery',$this->info_delivery,true);
		$criteria->compare('coment',$this->coment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
