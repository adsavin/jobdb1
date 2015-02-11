<?php

if ($data['logo'] != NULL) {
    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/company/' . $data['logo'], $data['name'], array(
                "style" => "width: " . $itemWidth . "px; height: " . $itemHeight . "px;",
            )), array("/site/viewCompany", "id" => $data["id"]), array(
        "class" => "thumbnail",
        "style" => "display: inline-block;",
            )
    );
}