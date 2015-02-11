<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportController
 *
 * @author adsavin
 */
class ReportController extends SBaseController {

    public $layout = '//layouts/column2';

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Publish');
        $criteria = new CDbCriteria();        
        $criteria->order = "last_update desc";
        $dataProvider->pagination = array(
            "pageSize" => 20,
        );
        $dataProvider->criteria = $criteria;
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

}
