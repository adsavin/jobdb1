<?php

Yii::import('application.models._base.BaseJobType');

class JobType extends BaseJobType
{
    /**
     * @return JobType
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'JobType|JobTypes', $n);
    }

}