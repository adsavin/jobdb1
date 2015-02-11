<?php

Yii::import('application.models._base.BaseAssignments');

class Assignments extends BaseAssignments
{
    /**
     * @return Assignments
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Assignments|Assignments', $n);
    }

}