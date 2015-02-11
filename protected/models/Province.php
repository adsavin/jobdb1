<?php

Yii::import('application.models._base.BaseProvince');

class Province extends BaseProvince {

    /**
     * @return Province
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Province|Provinces', $n);
    }

    public static function representingColumn() {
        return "province_name_en";
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('province_name_lo', $this->province_name_lo, true);
        $criteria->compare('province_name_en', $this->province_name_en, true);
        $criteria->compare('province_code', $this->province_code, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            "pagination" => array(
                "pageSize" => 20,
            ),
        ));
    }

    public function afterFind() {
        parent::afterFind();
        $this->jobContents = JobContent::model()->findAll("province_id is null or province_id=".$this->id);
    }
}
