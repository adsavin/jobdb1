<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListCvWidget
 *
 * @author adsavin
 */
class ListCvWidget extends CWidget {

    public function run() {
        $model = new Cv();
        $model->unsetAttributes();
        $model->status = "Published";

        $this->render("listcv", array(
            "model" => $model,
        ));
    }

}
