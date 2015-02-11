<?php

Yii::import('application.models._base.BaseMenuSubTranslate');

class MenuSubTranslate extends BaseMenuSubTranslate
{
    /**
     * @return MenuSubTranslate
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'MenuSubTranslate|MenuSubTranslates', $n);
    }

}