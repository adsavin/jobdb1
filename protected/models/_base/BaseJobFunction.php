<?php

/**
 * This is the model base class for the table "job_function".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "JobFunction".
 *
 * Columns in table "job_function" available as properties of the model,
 * followed by relations of table "job_function" available as properties of the model.
 *
 * @property integer $id
 * @property string $job_function_name
 *
 * @property Cv[] $cvs
 * @property JobContent[] $jobContents
 */
abstract class BaseJobFunction extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'job_function';
    }

    public static function representingColumn() {
        return 'job_function_name';
    }

    public function rules() {
        return array(
            array('job_function_name', 'required'),
            array('job_function_name', 'length', 'max'=>255),
            array('id, job_function_name', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cvs' => array(self::MANY_MANY, 'Cv', 'cv_has_job_function(job_function_id, cv_id)'),
            'jobContents' => array(self::HAS_MANY, 'JobContent', 'job_function_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'job_function_name' => Yii::t('app', 'Job Function Name'),
                'cvs' => null,
                'jobContents' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('job_function_name', $this->job_function_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}