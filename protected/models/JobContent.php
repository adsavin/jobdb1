<?php

Yii::import('application.models._base.BaseJobContent');

class JobContent extends BaseJobContent {

    /**
     * @return JobContent
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'JobContent|JobContents', $n);
    }

    public function afterConstruct() {
        $this->status = 'New';
    }

    protected function beforeValidate() {
        if ($this->isNewRecord) {
            $this->job_reference_number = ""; //need to modify
            $this->created_date = date("Y-m-d H:i:s");
            $this->count_like = 0;
            $this->count_view = 0;
        }
        $this->user_id = Yii::app()->user->id;
        $this->last_update = date("Y-m-d H:i:s");
        return parent::beforeValidate();
    }

    public function searchPublishedJob() {
        $criteria = new CDbCriteria;
        $criteria->compare('job_title', $this->job_title, true);
        $criteria->compare('company_id', $this->company_id);

        $criteria->with = array(
            "publishes" => array(
                "condition" => "'" . date("Y-m-d") . "' between start_date AND end_date",
            ),
        );

        $criteria->order = "last_update desc";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $sql = 'SELECT getJobCode("JW") AS refNo';
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $row = $command->queryRow();
            $this->job_reference_number = $row['refNo'];
        }

        return parent::beforeSave();
    }

}
