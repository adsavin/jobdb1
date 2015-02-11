<?php

$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Job Alerts"),
    "htmlHeaderOptions" => array(
        "class" => "box-header"
    ),
));

echo CHtml::link(CHtml::image("images/job_alert.jpg", "Job Alert", array()), array("site/index"));

$this->endWidget();