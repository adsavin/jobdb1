<?php

Yii::import('application.models._base.BaseCompany');

class Company extends BaseCompany {

    public $imageFullPath;

    /**
     * @return Company
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Company|Companies', $n);
    }

    public function getPath() {
        return Yii::getPathOfAlias('webroot') . '/images/company/' . $this->logo;
    }

    public function afterFind() {
        parent::afterFind();
        $this->imageFullPath = $this->getPath();
    }

    public static function representingColumn() {
        return "name";
    }

//    protected function beforeSave() {
//        if ($this->isNewRecord) {
//            $sql = 'SELECT getJobCode("CO") AS refNo';
//            $connection = Yii::app()->db;
//            $command = $connection->createCommand($sql);
//            $row = $command->queryRow();
//            $this->no = $row['refNo'];
//        }
//
//        return parent::beforeSave();
//    }

    protected function beforeValidate() {
        if ($this->isNewRecord) {
            $sql = 'SELECT getJobCode("CO") AS refNo';
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $row = $command->queryRow();
            $this->no = $row['refNo'];
        }
        return parent::beforeValidate();
    }

}
