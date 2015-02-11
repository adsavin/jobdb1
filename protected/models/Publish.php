<?php

Yii::import('application.models._base.BasePublish');

class Publish extends BasePublish {

    /**
     * @return Publish
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Publish|Publishes', $n);
    }

    protected function beforeValidate() {
        if ($this->isNewRecord) {
            $this->payment_status = "Pending";
        }
        $this->payment_status = str_replace("'", "", $this->payment_status);
        return parent::beforeValidate();
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'job_content_id' => Yii::t('app', 'Job Position'),
        ));
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('jobContent.company_id', 'safe', 'on' => 'search'),
//            array('payment_status', 'length', 'max'=>10),
        ));
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('payment_status', $this->payment_status, true);
        $criteria->compare('job_content_id', $this->job_content_id);
        $criteria->compare('invoice_id', $this->invoice_id);

        if (isset($this->jobContent)) {
            $criteria->with = array(
                "jobContent" => array(
                    "condition" => "jobContent.company_id = :company_id",
                    'params' => array(
                        ":company_id" => $this->jobContent->company_id,
                    )
                )
            );
//            $criteria->compare('jobContent.company_id', $this->jobContent->company_id);
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
