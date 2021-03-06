<?php

/**
 * This is the model base class for the table "user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "User".
 *
 * Columns in table "user" available as properties of the model,
 * followed by relations of table "user" available as properties of the model.
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $user_role
 * @property string $telephone_no
 * @property string $email
 * @property string $last_login
 * @property string $active
 * @property integer $user_id
 *
 * @property Company[] $companies
 * @property Cv[] $cvs
 * @property JobContent[] $jobContents
 * @property User $user
 * @property User[] $users
 */
abstract class BaseUser extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'user';
    }

    public static function representingColumn() {
        return 'username';
    }

    public function rules() {
        return array(
            array('username, password, first_name, last_name, user_role, last_login, active, user_id', 'required'),
            array('user_id', 'numerical', 'integerOnly'=>true),
            array('username, password, first_name, last_name, user_role, email', 'length', 'max'=>255),
            array('telephone_no', 'length', 'max'=>45),
            array('active', 'length', 'max'=>3),
            array('telephone_no, email', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, username, password, first_name, last_name, user_role, telephone_no, email, last_login, active, user_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'companies' => array(self::HAS_MANY, 'Company', 'user_id'),
            'cvs' => array(self::HAS_MANY, 'Cv', 'user_id'),
            'jobContents' => array(self::HAS_MANY, 'JobContent', 'user_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'users' => array(self::HAS_MANY, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'username' => Yii::t('app', 'Username'),
                'password' => Yii::t('app', 'Password'),
                'first_name' => Yii::t('app', 'First Name'),
                'last_name' => Yii::t('app', 'Last Name'),
                'user_role' => Yii::t('app', 'User Role'),
                'telephone_no' => Yii::t('app', 'Telephone No'),
                'email' => Yii::t('app', 'Email'),
                'last_login' => Yii::t('app', 'Last Login'),
                'active' => Yii::t('app', 'Active'),
                'user_id' => Yii::t('app', 'User'),
                'companies' => null,
                'cvs' => null,
                'jobContents' => null,
                'user' => null,
                'users' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('user_role', $this->user_role, true);
        $criteria->compare('telephone_no', $this->telephone_no, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}