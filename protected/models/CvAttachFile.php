<?php

Yii::import('application.models._base.BaseCvAttachFile');

class CvAttachFile extends BaseCvAttachFile
{
    /**
     * @return CvAttachFile
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'CvAttachFile|CvAttachFiles', $n);
    }

}