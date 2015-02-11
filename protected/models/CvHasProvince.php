<?php

Yii::import('application.models._base.BaseCvHasProvince');

class CvHasProvince extends BaseCvHasProvince {

    /**
     * @return CvHasProvince
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'CvHasProvince|CvHasProvinces', $n);
    }

//    public function attributeLabels() {
//        return array_merge(parent::attributeLabels(), array(
//            'province_id' => Yii::t('app', 'Where wolud you like to work'),
//        )); 
//    }
}
