<?php

Yii::import('application.models._base.BaseCoor');

class Coor extends BaseCoor
{
    /**
     * @return Coor
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Coor|Coors', $n);
    }

}