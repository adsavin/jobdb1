<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaticMapWidget
 *
 * @author adsavin
 */
class StaticMapWidget extends CWidget {

    public $center;
    public $width = "400px";
    public $height = "300px";

    public function init() {
        parent::init();
        $this->center = "58.613742,24.929102";
    }

    public function run() {
        $this->widget('ext.widgets.google.XGoogleStaticMap', array(
            'center' => $this->center,
            'alt' => Yii::t("app", "Company Location"), // Alt text for image
            'zoom' => 7, // Google map zoom level
            'width' => $this->width, // image width
            'height' => $this->height, // image Height
            'markers' => array(
                array(
                    'style' => array('color' => 'blue', 'label' => 'T'),
                    'locations' => array('58.37292,26.71326'),
                ),
                array(
                    'style' => array('color' => 'green'),
                    'locations' => array('Tallinn, EST', 'Viljandi, EST'),
                ),
            ),
            'paths' => array(
                array(
                    'style' => array('color' => 'red', 'fillcolor' => 'yellow', 'weight' => 3),
                    'locations' => array('58.59,26.27', '58.59,26.89', '58.23,26.89', '58.23,26.27', '58.59,26.27'),
                ),
                array(
                    'style' => array('color' => 'red', 'fillcolor' => 'yellow', 'weight' => 3),
                    'locations' => array('58.81,26.29', '59.27,25.95', '59.34,25.32', '59.17,24.73', '58.91,24.42', '58.61,24.91', '58.81,26.29'),
                ),
            ),
            'linkUrl' => array('site/extensions', 'item' => 'maps'), // Where the image should link
            'linkOptions' => array('target' => '_blank'), // HTML options for link tag
            'imageOptions' => array('class' => 'map-image', "style" => "width: $this->width;height: $this->height"), // HTML options for img tag
        ));
    }

}
