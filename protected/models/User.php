<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

    public $captcha;
    
    /**
     * @return User
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'User|Users', $n);
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('username', 'unique', 'message' => Yii::t("app", 'Name already exist'), 'criteria' => array(
                    'condition' => 'username = :name',
                    'params' => array(
                        ':name' => $this->username,
                    ),
                )),
            array("email", "email"),
            array("captcha", "captcha"),
            array("captcha", "required"),
        ));
    }

}
