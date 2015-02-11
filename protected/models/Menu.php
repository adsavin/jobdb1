<?php

Yii::import('application.models._base.BaseMenu');

class Menu extends BaseMenu {

    /**
     * @return Menu
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Menu|Menus', $n);
    }

}
