<!--<h3 class="header">Jobs by Industry
    <span class="header-line"></span>  
</h3>-->
<?php
$commons = Common::model()->findAll("code like :code", array(":code" => "LOGO_%"));
$setting;
foreach ($commons as $common) {
    if (isset($common->number)) {
        $setting[$common->code] = $common->number;
        continue;
    }
    if (isset($common->date_time)) {
        $setting[$common->code] = $common->date_time;
        continue;
    }
    if (isset($common->e_num)) {
        $setting[$common->code] = $common->e_num;
        continue;
    }
    if (isset($common->string)) {
        $setting[$common->code] = $common->string;
        continue;
    }
    if (isset($common->content)) {
        $setting[$common->code] = $common->content;
        continue;
    }
}

//$rawData = JobIndustry::model()->findAll();
$rawData = Company::model()->findAll();
$listDataProvider = new CArrayDataProvider($rawData, array(
    'pagination' => false, //always false
        ));

$this->widget('bootstrap.widgets.BootSlider', array(
    'itemView' => '_list', //_lsit is the php file to render
    'id' => $id, //id of Carousel
    'slide' => $setting["LOGO_TIME"] == 0 ? array(false, 2000) : array(true, $setting["LOGO_TIME"]),
    'dataProvider' => $listDataProvider,
    'coloumCount' => $setting["LOGO_COLUM"], //no of items to shown in slider
    'rows' => $setting["LOGO_ROW"],
    "navig" => $setting["LOGO_NAVIG"],
    "itemWidth" => $setting["LOGO_WIDE"],
    "itemHeight" => $setting["LOGO_LONG"],
    "style" => "min-height: ". ($setting["LOGO_ROW"] * ($setting["LOGO_LONG"] + 12)) ."px;",
//    "style_control" => "margin-top: ". (($setting["LOGO_ROW"] * ($setting["LOGO_LONG"] + 12)) - 5) ."px;",
//    "style_control_left" => "left: ". (($setting["LOGO_COLUM"] * ($setting["LOGO_WIDE"])/2)) ."px;",
//    "style_control_right" => "right: ". (($setting["LOGO_COLUM"] * ($setting["LOGO_WIDE"])/2)) ."px;",
));
