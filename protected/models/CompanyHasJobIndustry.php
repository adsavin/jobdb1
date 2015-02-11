<?php

Yii::import('application.models._base.BaseCompanyHasJobIndustry');

class CompanyHasJobIndustry extends BaseCompanyHasJobIndustry
{
    /**
     * @return CompanyHasJobIndustry
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CompanyHasJobIndustry|CompanyHasJobIndustries', $n);
    }

}