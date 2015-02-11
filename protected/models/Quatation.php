<?php

Yii::import('application.models._base.BaseQuatation');

class Quatation extends BaseQuatation {

    /**
     * @return Quatation
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Quatation|Quatations', $n);
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'discount' => Yii::t('app', 'Discount') . " (%)",
        ));
    }

    protected function beforeValidate() {
        $this->user_id = Yii::app()->user->id;
        $this->last_update = date("Y-m-d H:i:s");
        
        return parent::beforeValidate();
    }
}
