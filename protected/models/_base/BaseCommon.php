<?php

/**
 * This is the model base class for the table "common".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Common".
 *
 * Columns in table "common" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $code
 * @property string $string
 * @property double $number
 * @property string $date_time
 * @property string $content
 * @property string $e_num
 *
 */
abstract class BaseCommon extends AweActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'common';
    }

    public static function representingColumn() {
        return 'code';
    }

    public function rules() {
        return array(
            array('code', 'required'),
            array('number', 'numerical'),
            array('code', 'length', 'max' => 10),
            array('string', 'length', 'max' => 255),
            array('e_num', 'length', 'max' => 1),
            array('date_time, content', 'safe'),
            array('string, number, date_time, content, e_num', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, code, string, number, date_time, content, e_num', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'string' => Yii::t('app', 'String'),
            'number' => Yii::t('app', 'Number'),
            'date_time' => Yii::t('app', 'Date Time'),
            'content' => Yii::t('app', 'Content'),
            'e_num' => Yii::t('app', 'E Num'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('string', $this->string, true);
        $criteria->compare('number', $this->number);
        $criteria->compare('date_time', $this->date_time, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('e_num', $this->e_num, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
                ), parent::behaviors());
    }

}