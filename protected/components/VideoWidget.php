<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoWidget
 *
 * @author adsavin
 */
class VideoWidget extends CWidget {
    public function run() {
        if (!YII_DEBUG) {
            $this->render("video");
        }
    }
}
