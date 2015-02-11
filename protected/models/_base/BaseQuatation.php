<?php

/**
 * This is the model base class for the table "quatation".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Quatation".
 *
 * Columns in table "quatation" available as properties of the model,
 * followed by relations of table "quatation" available as properties of the model.
 *
 * @property integer $id
 * @property integer $position
 * @property integer $price
 * @property integer $discount
 * @property string $remark
 * @property string $last_update
 * @property integer $user_id
 *
 * @property User $user
 */
abstract class BaseQuatation extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'quatation';
    }

    public static function representingColumn() {
        return 'last_update';
    }

    public function rules() {
        return array(
            array('position, price, last_update, user_id', 'required'),
            array('position, price, discount, user_id', 'numerical', 'integerOnly'=>true),
            array('remark', 'length', 'max'=>255),
            array('discount, remark', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, position, price, discount, remark, last_update, user_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'position' => Yii::t('app', 'Position'),
                'price' => Yii::t('app', 'Price'),
                'discount' => Yii::t('app', 'Discount'),
                'remark' => Yii::t('app', 'Remark'),
                'last_update' => Yii::t('app', 'Last Update'),
                'user_id' => Yii::t('app', 'User'),
                'user' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('position', $this->position);
        $criteria->compare('price', $this->price);
        $criteria->compare('discount', $this->discount);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('last_update', $this->last_update, true);
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