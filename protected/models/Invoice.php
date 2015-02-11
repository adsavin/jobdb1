<?php

Yii::import('application.models._base.BaseInvoice');

class Invoice extends BaseInvoice {

    public $sum;

    /**
     * @return Invoice
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Invoice|Invoices', $n);
    }

    protected function beforeValidate() {
        $this->created_date = date("Y-m-d H:i:s");
        $this->user_id = Yii::app()->user->id;

        if ($this->isNewRecord) {
            $sql = 'SELECT getJobCode("IV") AS refNo';
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $row = $command->queryRow();
            $this->no = $row['refNo'];
        }

        return parent::beforeValidate();
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('jobContent.id, jobContent.company_id', 'safe', 'on' => 'search'),
//            array('payment_status', 'length', 'max' => 10),
        ));
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('no', $this->no, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('payment_status', $this->payment_status, true);
        $criteria->compare('discount', $this->discount);
        $criteria->compare('total', $this->total);
        $criteria->compare('company_id', $this->company_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
