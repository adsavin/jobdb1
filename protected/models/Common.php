<?php

Yii::import('application.models._base.BaseCommon');

class Common extends BaseCommon {

    /**
     * @return Common
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Common|Commons', $n);
    }

}
