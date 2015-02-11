<?php

Yii::import('application.models._base.BaseItemchildren');

class Itemchildren extends BaseItemchildren
{
    /**
     * @return Itemchildren
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Itemchildren|Itemchildrens', $n);
    }

}