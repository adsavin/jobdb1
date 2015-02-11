<?php

Yii::import('application.models._base.BaseHighestEduLevel');

class HighestEduLevel extends BaseHighestEduLevel
{
    /**
     * @return HighestEduLevel
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'HighestEduLevel|HighestEduLevels', $n);
    }

}