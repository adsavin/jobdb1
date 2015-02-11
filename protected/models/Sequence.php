<?php

Yii::import('application.models._base.BaseSequence');

class Sequence extends BaseSequence
{
    /**
     * @return Sequence
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Sequence|Sequences', $n);
    }

}