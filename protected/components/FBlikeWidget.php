<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FBlikeWidget
 *
 * @author adsavin
 */
class FBlikeWidget extends CWidget {

    public $link;
    public $width;
    public $height;

    public function run() {
        if (!YII_DEBUG) {
            $this->width = "100%";
            $this->render("facebookLike", array(
                "link" => $this->link,
                "width" => $this->width,
                "height" => $this->height,
            ));
        }
    }

}
