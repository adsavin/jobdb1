<?php

Yii::import('application.models._base.BaseNationality');

class Nationality extends BaseNationality
{
    /**
     * @return Nationality
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Nationality|Nationalities', $n);
    }

}