<?php

class Utils {

    /**
     * Return list of enum elements of the model.
     * @param unknown_type $model
     * @param unknown_type $attribute
     */
    public static function enumItem($model, $attribute) {
        $attr = $attribute;
        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);

        foreach (explode(',', $matches[1]) as $value)             
            $values[$value] = str_replace("'", null, $value);        

        return $values;
    }

    public static function getSequence() {
        return array(
            'header' => Yii::t('app', 'No.'),
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array(
                'style' => 'width:20px;text-align: center;vertical-align: middle'
            ),
            'headerHtmlOptions' => array(
                'style' => 'text-align: center;border-bottom-color: #3b5998;vertical-alignment: bottom'
            ),
        );
    }

    public static function getCheckBoxImage() {
        //return  CHtml::image(Yii::app()->request->baseUrl.'/images/check_box.png',"this is alt tag of image",array("width"=>"20px" ,"height"=>"20px"));
        //checked
        return CHtml::image(Yii::app()->request->baseUrl . '/images/checked.jpeg', "this is alt tag of image", array("width" => "15px", "height" => "15px"));
    }

    public static function getEmptyChecBoxImage() {
        //return CHtml::image(Yii::app()->request->baseUrl.'/images/emptycheck.png',"this is alt tag of image",array("width"=>"20px" ,"height"=>"20px"));
        return CHtml::image(Yii::app()->request->baseUrl . '/images/un_checked.jpeg', "this is alt tag of image", array("width" => "15px", "height" => "15px"));
    }

    public static function getOptMenus($action, $model) {
        switch ($action) {
            case "admin":
                return array(
                    array('label' => Yii::t('app', 'List'), 'icon' => 'list', 'url' => array('index')),
                    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
                    
                );
            case "create":
                return array(
                    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
                );
            case "update" || "repost":
                return array(
                    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//                    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
                );
            case "view":
                return array(
                    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
                    array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
                    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
                );
            default:
                break;
        }
    }

    public static function handleException($exc, $transaction = NULL) {
        if (isset($transaction)) {
            $transaction->rollback();
        }
        Yii::app()->user->setFlash('error', Yii::t('app', Yii::app()->params['fixThingsUp']));
        if (YII_DEBUG) {
            echo $exc;
        }
    }

    public static function setCommonPrint() {
        $mPDF = Yii::app()->ePdf->mpdf();
        $mPDF->PDFA = true;
        $mPDF->PDFAauto = true;
        $style = file_get_contents(Yii::getPathOfAlias('theme') . '/css/print/bootstrap.min.css');
        $style .= file_get_contents(Yii::getPathOfAlias('theme') . '/css/print/print.css');
        $mPDF->WriteHTML($style, 1);
        return $mPDF;
    }

}
