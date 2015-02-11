<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FBShareWidget
 *
 * @author adsavin
 */
class FBShareWidget extends CWidget {

    public $link;
    public $width;
    
    public function run() {
        $this->render("facebookShare", array(
            "link" => $this->link,
            "width" => $this->width,
        ));
    }

}
