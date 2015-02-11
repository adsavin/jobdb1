<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvinceJobWidget
 *
 * @author adsavin
 */
class ProvinceJobWidget extends CWidget {

    public $provinces;

    public function run() {
        $this->render("province_job", array(
            "provinces" => $this->provinces,
        ));
    }

}
