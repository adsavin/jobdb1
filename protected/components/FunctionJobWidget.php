<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FunctionJobWidget
 *
 * @author adsavin
 */
class FunctionJobWidget extends CWidget {
    public function run() {        
        $this->render("function_job", array(
            "functions" => JobFunction::model()->findAll("1=1 order by job_function_name"),
        ));
    }
}
