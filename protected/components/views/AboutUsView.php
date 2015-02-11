<?php
$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Contact Us"),
    "htmlHeaderOptions" => array(
        "class" => "box-header"
    ),
));

echo Common::model()->findByAttributes(array("code" => "CONTACT_US"))->content;

$this->endWidget();