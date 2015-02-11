<?php

Yii::import('application.models._base.BaseCountry');

class Country extends BaseCountry
{
    /**
     * @return Country
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Country|Countries', $n);
    }

    public static function representingColumn() {
        return "name";
    }
}