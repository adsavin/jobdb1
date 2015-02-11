<?php
$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Job By Provinces"),
    "htmlHeaderOptions" => array(
        "class" => "box-header"
    ),
    "htmlContentOptions" => array(
        "style" => "padding: 1px 1px 1px;border: none;",
    ),
));
echo
//CHtml::link(
CHtml::image("images/laos_map.jpg", "Job By Province", array(
    "alt" => "Lao Map",
    "usemap" => "laos_map",
))
//        , "#"
//)
;

$this->endWidget();
?>

<map name="laos_map" id="laos_map">
    <?php
    foreach ($provinces as $province) {
        $c = "";
        $i = 1;
        foreach ($province->coors as $coor) {
            $c .= $coor->x . "," . $coor->y;
            if ($i <= count($province->coors)) {
                $c .= ",";
            } else {
                $i = 0;
            }
            $i++;
        }
        echo CHtml::tag("area", array("shape" => "poly", "coords" => $c, "alt" => $province->province_name_en, "href" => "index.php?r=site/viewProvince&id=" . $province->id));
    }
    ?>
</map>