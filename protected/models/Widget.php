<?php

Yii::import('application.models._base.BaseWidget');

class Widget extends BaseWidget
{
    /**
     * @return Widget
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Widget|Widgets', $n);
    }

}