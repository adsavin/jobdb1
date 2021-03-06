<?php

/**
 * This is the model base class for the table "sequence".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Sequence".
 *
 * Columns in table "sequence" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $seq_job_code
 * @property integer $seq_value
 *
 */
abstract class BaseSequence extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'sequence';
    }

    public static function representingColumn() {
        return 'seq_job_code';
    }

    public function rules() {
        return array(
            array('seq_job_code, seq_value', 'required'),
            array('seq_value', 'numerical', 'integerOnly'=>true),
            array('seq_job_code', 'length', 'max'=>45),
            array('seq_job_code, seq_value', 'safe', 'on'=>'search'),
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
                'seq_job_code' => Yii::t('app', 'Seq Job Code'),
                'seq_value' => Yii::t('app', 'Seq Value'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('seq_job_code', $this->seq_job_code, true);
        $criteria->compare('seq_value', $this->seq_value);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}