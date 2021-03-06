<?php

/**
 * This is the model base class for the table "cv_has_province".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CvHasProvince".
 *
 * Columns in table "cv_has_province" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $cv_id
 * @property integer $province_id
 *
 */
abstract class BaseCvHasProvince extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cv_has_province';
    }

    public static function representingColumn() {
        return array(
            'cv_id',
            'province_id',
        );
    }

    public function rules() {
        return array(
            array('cv_id, province_id', 'required'),
            array('cv_id, province_id', 'numerical', 'integerOnly'=>true),
            array('cv_id, province_id', 'safe', 'on'=>'search'),
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
                'cv_id' => Yii::t('app', 'Cv'),
                'province_id' => Yii::t('app', 'Province'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('cv_id', $this->cv_id);
        $criteria->compare('province_id', $this->province_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}