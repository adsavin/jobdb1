<?php

Yii::import('application.models._base.BaseJobFunction');

class JobFunction extends BaseJobFunction
{
    /**
     * @return JobFunction
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'JobFunction|JobFunctions', $n);
    }

}