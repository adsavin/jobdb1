<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobByProvinceWidget
 *
 * @author adsavin
 */
class JobByProvinceWidget extends CWidget {

    public $provinces;

    public function run() {
        $this->render("jobByProvince", array(
            "provinces" => $this->provinces,
        ));
    }

}
