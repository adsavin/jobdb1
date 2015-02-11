<?php

/**
 * This is the model base class for the table "job_industry".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "JobIndustry".
 *
 * Columns in table "job_industry" available as properties of the model,
 * followed by relations of table "job_industry" available as properties of the model.
 *
 * @property integer $id
 * @property string $job_industry_name
 * @property string $image
 *
 * @property Company[] $companies
 */
abstract class BaseJobIndustry extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'job_industry';
    }

    public static function representingColumn() {
        return 'job_industry_name';
    }

    public function rules() {
        return array(
            array('job_industry_name', 'required'),
            array('job_industry_name, image', 'length', 'max'=>255),
            array('image', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, job_industry_name, image', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'companies' => array(self::MANY_MANY, 'Company', 'company_has_job_industry(job_industry_id, company_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'job_industry_name' => Yii::t('app', 'Job Industry Name'),
                'image' => Yii::t('app', 'Image'),
                'companies' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('job_industry_name', $this->job_industry_name, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}