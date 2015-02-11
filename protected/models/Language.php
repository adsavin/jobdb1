<?php

Yii::import('application.models._base.BaseLanguage');

class Language extends BaseLanguage
{
    /**
     * @return Language
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Language|Languages', $n);
    }

}