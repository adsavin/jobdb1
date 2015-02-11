<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyJobWidget
 *
 * @author adsavin
 */
class CompanyJobWidget extends CWidget {

    public function run() {
        
        $this->render("company_job", array(
            "companies" => Company::model()->findAll("1=1 order by name"),
        ));
    }

}
