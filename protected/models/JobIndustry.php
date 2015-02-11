<?php

Yii::import('application.models._base.BaseJobIndustry');

class JobIndustry extends BaseJobIndustry
{
    /**
     * @return JobIndustry
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'JobIndustry|JobIndustries', $n);
    }

}