<?php

/**
 * BootWidget class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */
/**
 * 
  Bootstrap Slider widget.
  Copyright (c) 2012,Francis J Attokkaran
  All rights reserved.
 */
Yii::import('zii.widgets.CListView');

class BootSlider extends CListView {

    public $coloumCount;
    public $slide = false;
    public $timewait = 6000;
    public $rows = 1;
    public $navig = "Y";
    public $itemWidth = 130;
    public $itemHeight = 116;
    public $style;
    public $style_control;
    public $style_control_left;
    public $style_control_right;

    public function init() {
        parent::init();

        $bootstrap = Yii::app()->bootstrap;
//        $bootstrap->registerCarousel();
//		$bootstrap->enableTransitions(); //enable for older version of bootstrap
//		Yii::app()->bootstrap->registerScriptFile('bootstrap.min.js',CClientScript::POS_END);
//		Yii::app()->bootstrap->registerScrollSpy();		
    }

    public function run() {
        //$ppagination=false;
        $dataArray = $this->dataProvider->getData();
        //print_r($data);
        $owner = $this->getOwner();
        $render = $owner instanceof CController ? 'renderPartial' : 'render';
        if (isset($this->slide[0]) && $this->slide[0] == true) {
            $timewait = isset($this->slide[1]) ? $this->slide[1] : 6000;
        }

        echo CHtml::tag("div", array("class" => "carousel", "id" => $this->id, "style" => $this->style));
        echo CHtml::tag("div", array("class" => "carousel-inner"));
        $size = count($dataArray);
        $page = $size / ($this->rows * $this->coloumCount);
        $n = 0;
        for ($p = 0; $p < $page; $p++) {
            if ($p == 0) {                  //first page set active
                echo CHtml::tag("div", array("class" => "active item"));
            } else {
                echo CHtml::tag("div", array("class" => "item"));
            }
            for ($row = 0; $row < $this->rows; $row++) {
                echo CHtml::tag("div", array("class" => "row-fluid"));
                for ($col = 0; $col < $this->coloumCount; $col++) {
                    if (!isset($dataArray[$n])) {
                        break;
                    }
                    echo $owner->$render($this->itemView, array(
                        'data' => $dataArray[$n],
                        "itemWidth" => $this->itemWidth,
                        "itemHeight" => $this->itemHeight
                    ));
                    $n++;
                }
                echo CHtml::closeTag("div"); //close row-fluid
            }
            echo CHtml::closeTag("div"); //close item
        }

        echo CHtml::closeTag("div"); //close carousel-inner
        echo CHtml::closeTag("div"); // close carousel
        if ($this->navig == "Y") {
            echo CHtml::tag("div", array("class" => "row-fluid carousel-navig-row"));
            echo CHtml::link("&laquo;", '#' . $this->id, array(
                "class" => "carousel-navig prev",
                "data-slide" => "prev",
                "style" => $this->style_control . $this->style_control_left,
            ));
            echo "&nbsp;";
            
            for ($index = 0; $index < $page; $index++) {
                echo CHtml::link($index + 1, '#' . $this->id, array(
                "class" => "carousel-navig num",
                "data-slide-to" => $index,
                "style" => $this->style_control . $this->style_control_right,
            ));            
            echo "&nbsp;";
            }
            
            echo CHtml::link("&raquo;", '#' . $this->id, array(
                "class" => "carousel-navig next",
                "data-slide" => "next",
                "style" => $this->style_control . $this->style_control_right,
            ));
            echo CHtml::closeTag("div");
        }
        ?>

        <?php

        if (isset($this->slide[0]) && $this->slide[0] == true) {
            Yii::app()->clientScript->registerScript($this->id, "$('#" . $this->id . "')                
                .carousel({
                interval: $timewait,                    
                }).effect('slide');", CClientScript::POS_END);
            Yii::app()->clientScript->registerScript($this->id . "ev", 
                    "$('#$this->id').bind('slide.bs.carousel', function (e) {
                       $('#$this->id').effect('slide');
                    });"
                    . "$('.carousel-navig').bind('onClick', function (e) {                        
                       $('#$this->id').effect('slide');
                    });", CClientScript::POS_END);
        }
    }

}
