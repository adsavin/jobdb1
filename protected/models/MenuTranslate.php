<?php

Yii::import('application.models._base.BaseMenuTranslate');

class MenuTranslate extends BaseMenuTranslate
{
    /**
     * @return MenuTranslate
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'MenuTranslate|MenuTranslates', $n);
    }

}