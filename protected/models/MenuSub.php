<?php

Yii::import('application.models._base.BaseMenuSub');

class MenuSub extends BaseMenuSub {

    /**
     * @return MenuSub
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'MenuSub|MenuSubs', $n);
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('show', $this->show, true);
        $criteria->compare('order_no', $this->order_no, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
    }

}
