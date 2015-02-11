<?php
$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Video"),
    "htmlHeaderOptions" => array(
        "class" => "box-header",
    ),
));
?>
<iframe width="100%" height="200px" 
        src="//www.youtube.com/embed/vyT-oGDnMqE" 
        frameborder="0" 
        allowfullscreen>

</iframe>
<?php
$this->endWidget();