<?php

Yii::import('application.models._base.BaseJobContentTranslate');

class JobContentTranslate extends BaseJobContentTranslate
{
    /**
     * @return JobContentTranslate
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'JobContentTranslate|JobContentTranslates', $n);
    }

}